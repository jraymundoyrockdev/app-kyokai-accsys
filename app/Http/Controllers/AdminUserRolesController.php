<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;
use KyokaiAccSys\Http\Requests;

class AdminUserRolesController extends AbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $result = $this->apiClient->call('GET', 'user-roles');

        return view('admin.user-roles.index', ['userRoles' => ($result->UserRoles)]);
    }

}
