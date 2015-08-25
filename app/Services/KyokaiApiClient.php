<?php namespace KyokaiAccSys\Services;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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

    protected $psr7Request;

    protected $guzzleMethods = [
        'get' => 'query',
        'post' => 'form_params',
        'put' => 'body'
    ];

    public function __construct(Request $request, GuzzleClient $client)
    {
        $this->request = $request;
        $this->client = $client;

        $this->server = 'gfccm';
        $this->environment = 'dev';
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

        $guzzleMethodParam = $this->guzzleMethods[strtolower($method)];

        $params = $this->buildParams($params);

        $headers = $this->buildHeaders();

        echo "<pre>";
        print_r($headers);
        echo "</pre>";

        try {

            $result = $this->client->{$method}($apiUrl, $headers);

            return json_decode($result->getBody()->getContents(), true);

        } catch (ClientException $e) {
            return json_decode($e->getResponse()->getBody()->getContents());
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
    protected function buildParams($params = [])
    {
        return array_merge($params, ['Authorization' => 'Bearer ' . $this->request->session()->get('userToken')]);
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

}
