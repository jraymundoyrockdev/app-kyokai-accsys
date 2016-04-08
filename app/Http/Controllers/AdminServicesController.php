<?php

namespace KyokaiAccSys\Http\Controllers;

use KyokaiAccSys\Http\Requests;

class AdminServicesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.services.edit', ['id' => $id]);
    }
}
