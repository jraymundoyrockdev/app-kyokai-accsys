<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client as GuzzleClient;

class APIAuth
{

    /**
     * @var GuzzleClient
     */
    protected $client;


    public function __construct(GuzzleClient $client){
        $this->client = $client;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('userToken')) {

            $response = $this->client->post('http://api-gfccm-systems.com:8080/api/api-token-refresh',
                [
                    'form_params' => [
                        'username' => $request->input('username')
                    ]
                ]);

            $result = json_decode($response->getBody()->getContents(), true);

            return $next($request);
        }

        return redirect()->route('login');
    }
}
