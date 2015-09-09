<?php

namespace KyokaiAccSys\Http\Controllers\Auth;

use KyokaiAccSys\User;
use Validator;
use KyokaiAccSys\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Redirect;
use KyokaiAccSys\Services\KyokaiApiClient;

class AuthController extends Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var KyokaiApiClient
     */
    protected $client;

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     * @param $request Request
     * @param $client KyokaiApiClient
     *
     */
    public function __construct(Request $request, KyokaiApiClient $client)
    {
        $this->request = $request;
        $this->client = $client;
    }


    /**
     * Show the login form
     *
     * @return mixed
     */
    public function getIndex()
    {
        if ($this->request->ajax()) {
            $this->session->forget('url.intended');
        }

        return view('auth.login');
    }

    /**
     * Log the user in
     *
     * @return mixed
     */
    public function postIndex()
    {
        try {
            $result = $this->client->call('POST', 'api-token-auth', $this->request->only(['username', 'password']));
            $this->request->session()->put('userToken', $result->token);
            return Redirect::to('/');

        } catch (ClientException $e) {
            $result = $e->getResponse()->getBody()->getContents();
            return Redirect::to('/auth/login')->with('errorMessage', $result);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
