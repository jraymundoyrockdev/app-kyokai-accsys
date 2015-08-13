<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;
use KyokaiAccSys\Http\Requests;

class AdminFundsController extends AbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $result = $this->apiClient->call('GET', 'funds');

        return view('admin.funds.index', ['funds' => $result->Funds]);
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
        $result = $this->apiClient->call('POST', 'funds', $request->all());

        if (!empty($result->errors)) {
            $errorResponse = $this->errorResponseSetter->set($result->errors, $request->all());

            return redirect()->route('admin.funds.create')->with($errorResponse);
        }

        return redirect()->route('admin.funds.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $result = $this->apiClient->call('GET', 'funds/' . $id);

        return view('admin.funds.edit', ['fund' => reset($result->Fund)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $result = $this->apiClient->call('PUT', 'funds/' . $id, $request->all());

        if (!empty($result->errors)) {
            $errorResponse = $this->errorResponseSetter->set($result->errors, $request->all());

            return redirect()->route('admin.funds.update', [$id . '/edit'])->with($errorResponse);
        }

        return redirect()->route('admin.funds.index');
    }

}
