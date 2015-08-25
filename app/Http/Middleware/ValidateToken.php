<?php

namespace KyokaiAccSys\Http\Middleware;

use Closure;
use KyokaiAccSys\Services\KyokaiApiClient;

class ValidateToken
{
    /**
     * @var KyokaiApiClient
     */
    protected $apiClient;

    public function __construct(KyokaiApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
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

            $result = $this->apiClient->call('POST', 'api-token-refresh');

            print_r($result->error);

            return $next($request);
        }

        return redirect()->route('login');
    }
}
