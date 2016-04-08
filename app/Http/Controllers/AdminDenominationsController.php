<?php

namespace KyokaiAccSys\Http\Controllers;

use KyokaiAccSys\Http\Requests;

class AdminDenominationsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.denominations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.denominations.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.denominations.edit', ['id' => $id]);
    }

}
