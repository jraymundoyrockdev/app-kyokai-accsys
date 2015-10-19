<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;
use KyokaiAccSys\Http\Requests;

class AdminRolesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $result = $this->apiClient->call('GET', 'roles');

        return view('admin.roles.index', ['roles' => ($result->Roles)]);
    }

}
