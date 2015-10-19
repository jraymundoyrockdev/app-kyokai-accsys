<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;
use KyokaiAccSys\Http\Requests;

class IncomeServicesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('income.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $services = $this->apiClient->call('GET', 'services', [], 'list');

        return view('income.services.create', ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $this->apiClient->call('POST', 'income-services', $request->all());

        if (!empty($result->errors)) {
            $errorResponse = $this->errorResponseSetter->set($result->errors, $request->all());

            return redirect()->route('income-services.create')->with($errorResponse);
        }

        return redirect()->route('income-services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('income.services.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
