<?php

namespace KyokaiAccSys\Http\Controllers;


use KyokaiAccSys\Http\Requests;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.users.index');
    }
}
