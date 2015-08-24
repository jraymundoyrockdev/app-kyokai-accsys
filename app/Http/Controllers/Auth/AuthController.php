<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var GuzzleClient
     */
    protected $client;

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     * @param $request Request
     * @param $client GuzzleClient
     *
     */
    public function __construct(Request $request, GuzzleClient $client)
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
            $response = $this->login($this->request);
            $result = json_decode($response->getBody()->getContents(), true);
            $this->request->session()->put('userToken', $result['token']);

            return Redirect::to('/');

        } catch (ClientException $e) {
            $result = $e->getResponse()->getBody()->getContents();
            return Redirect::to('/auth/login')->with('errorMessage', $result);
        }
    }

    protected function login($request)
    {
        return $this->client->post('http://api-gfccm-systems.com/api/api-token-auth',
            [
                'form_params' => [
                    'username' => $request->input('username'),
                    'password' => $request->input('password')
                ]
            ]
        );
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
