<?php namespace KyokaiAccSys\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class ClientResponseEvaluator
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Config
     */
    protected $responseMessages;


    public function __construct(Request $request)
    {
        $this->responseMessages = Config::get('response-messages.auth');
        $this->request = $request;
    }

    public function evaluate($response)
    {
        $content = $response->getBody()->getContents();

        $decodedContent = json_decode($content, false);

        if (property_exists($decodedContent, 'error')) {
            return $message = $decodedContent;
        }

        return $decodedContent;
    }
}
