<?php

namespace KyokaiAccSys\Http\Controllers;


use KyokaiAccSys\Http\Requests;

class AdminRolesController extends BaseController
{
    /**
     * Display Roles
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.roles.index');
    }
}
