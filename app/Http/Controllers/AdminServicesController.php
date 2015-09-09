<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;
use KyokaiAccSys\Http\Requests;

class AdminServicesController extends AbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $result = $this->apiClient->call('GET', 'services');

        return view('admin.services.index', ['services' => $result->Services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $this->apiClient->call('POST', 'services', $request->all());

        return redirect()->route('admin.services.index');
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
        $result = $this->apiClient->call('GET', 'services/' . $id);

        return view('admin.services.update', ['service' => reset($result->Service)]);
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
        $result = $this->apiClient->call('PUT', 'services/' . $id, $request->all(), $id);

        return redirect()->route('admin.services.index');
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
