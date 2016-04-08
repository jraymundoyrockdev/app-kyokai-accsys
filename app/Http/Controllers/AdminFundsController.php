<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;
use KyokaiAccSys\Http\Requests;

class AdminFundsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.funds.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.funds.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.funds.edit', ['id' => $id]);
    }

    /**
     * Show items of a Fund
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showItems($id)
    {
        return view('admin.fund-items.index', ['id' => $id]);
    }

    /**
     * Show item of a Fund
     *
     * @param int $fundId
     * @param int %id
     * @return mixed
     */
    public function showItem($fundId, $id)
    {
        return view('admin.fund-items.edit', ['id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function createItem($id)
    {
        return view('admin.fund-items.create', ['id' => $id]);
    }
}
