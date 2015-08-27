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
    { //$request->session()->put('userToken', 'ss');
        if ($request->session()->get('userToken')) {
            return $next($request);
            $result = $this->apiClient->call('POST', 'api-token-refresh');

            /* echo "<pre>";
             print_r($result);
             echo "</pre>";*/

            if (!empty($result['token'])) {
                $request->session()->put('userToken', $result['token']);

                return $next($request);
            }

            $request->session()->flush();

            return redirect()->route('login');

        }

        return redirect()->route('login');
    }
}
