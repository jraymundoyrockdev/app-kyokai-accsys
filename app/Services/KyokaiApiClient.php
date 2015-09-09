<?php namespace KyokaiAccSys\Services;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use KyokaiAccSys\Services\ClientResponseEvaluator;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class KyokaiApiClient
 * KyokaiAccSys Service for Http Requests over api
 *
 * @author jraymundo.yrockdev@gmail.com
 * @package KyokaiAccSys\Services
 *
 */
class KyokaiApiClient
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * @var Api Server
     */
    protected $server;

    /**
     * @var Api Environment
     */
    protected $environment;

    protected $returnData = false;

    protected $guzzleMethods = [
        'get' => 'query',
        'post' => 'form_params',
        'put' => 'json'
    ];

    protected $clientResponseEvaluator;

    public function __construct(
        Request $request,
        GuzzleClient $client,
        ClientResponseEvaluator $clientResponseEvaluator,
        Application $environment
    )
    {
        $this->request = $request;
        $this->client = $client;
        $this->clientResponseEvaluator = $clientResponseEvaluator;

        $this->server = 'gfccm';
        $this->environment = $environment->environment();
    }

    /**
     * @param $method
     * @param $endpoint
     * @param $params
     * @param string $verb
     * @param array $arg
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function call($method, $endpoint, $params = [], $verb = '', $arg = [])
    {
        $apiUrl = $this->buildUrl($this->server, $this->environment, $endpoint);

        $params = $this->buildParamsWithHeaders($params, $this->guzzleMethods[strtolower($method)]);

        /*           echo "<pre>";
                   print_r($params);
                   echo "</pre>";*/

        try {
            $response = $this->client->{$method}($apiUrl, $params);
            //return $content = $response->getBody()->getContents();
            return $decodedContent = json_decode($response->getBody()->getContents(), $this->returnData);

        } catch (ClientException $e) {
            return json_decode($e->getResponse()->getBody()->getContents(), $this->returnData);
        }

    }

    /**
     * @param $server
     * @param $environment
     * @param $endpoint
     * @return string
     */
    protected function buildUrl($server, $environment, $endpoint)
    {
        $api = Config::get('api-server.' . $server);

        return $api[$environment] . $endpoint;
    }

    /**
     * @param array $params
     * @return array
     */
    protected function buildParamsWithHeaders($params, $guzzleMethodParam)
    {
        $params = [$guzzleMethodParam => $params];

        return array_merge($params, $this->buildHeaders());
    }

    /**
     * Build Headers
     *
     * @return array
     */
    protected function buildHeaders()
    {
        return [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->request->session()->get('userToken'),
                'Accept' => 'application/json'
            ]
        ];
    }

    /**
     * @param string $server
     * @return $this
     */
    public function switchServer($server = 'gfccm')
    {
        if ($server) {
            $this->server = $server;
        }

        return $this;
    }

    /**
     * @param string $environment
     * @return $this
     */
    public function switchEnv($environment = 'dev')
    {
        if ($environment) {
            $this->environment = $environment;
        }

        return $this;
    }

    /**
     * Convert returned data JSON object
     * @return $this
     */
    public function asArray()
    {
        $this->returnData = true;

        return $this;
    }

}
