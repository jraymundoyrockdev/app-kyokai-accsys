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
        $fund = $this->apiClient->call('GET', 'funds');

        return view('admin.funds.index', ['funds' => $fund->Funds]);
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
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $fund = $this->apiClient->call('POST', 'funds', $request->all());

        if (!empty($fund->errors)) {
            $errorResponse = $this->errorResponseSetter->set($fund->errors, $request->all());

            return redirect()->route('admin.funds.create')->with($errorResponse);
        }

        return redirect()->route('admin.funds.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $fund = $this->apiClient->call('GET', 'funds/' . $id);

        return view('admin.funds.edit', ['fund' => reset($fund->Fund)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $fund = $this->apiClient->call('PUT', 'funds/' . $id, $request->all());

        if (!empty($fund->errors)) {
            $errorResponse = $this->errorResponseSetter->set($fund->errors, $request->all());

            return redirect()->route('admin.funds.update', [$id . '/edit'])->with($errorResponse);
        }

        return redirect()->route('admin.funds.index');
    }

    /**
     * Show items of a Fund
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showItems($id)
    {
        $fund = $this->apiClient->call('GET', 'funds/' . $id);

        return view('admin.fund-items.index', ['fund' => reset($fund->Fund)]);
    }

    /**
     * Show item of a Fund
     *
     * @param int $id
     * @param int $fundId
     * @return \Illuminate\View\View
     */
    public function showItem($id, $fundId)
    {
        $item = $this->apiClient->call('GET', 'fund-items/' . $fundId);

        return view('admin.fund-items.edit', ['id' => $id, 'item' => reset($item->FundItem)]);
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
