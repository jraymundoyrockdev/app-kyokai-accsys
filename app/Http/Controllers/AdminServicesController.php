<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;
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
        $result = $this->apiClient->call('GET', 'services');

        return view('admin.services.index', ['services' => $result->Services]);
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
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $service = $this->apiClient->call('POST', 'services', $request->all());

        if (!empty($service->errors)) {
            $errorResponse = $this->errorResponseSetter->set($service->errors, $request->all());

            return redirect()->route('admin.services.create')->with($errorResponse);
        }

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
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $result = $this->apiClient->call('GET', 'services/' . $id);

        return view('admin.services.edit', ['service' => reset($result->Service)]);
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
        $service = $this->apiClient->call('PUT', 'services/' . $id, $request->all());

        if (!empty($service->errors)) {
            $errorResponse = $this->errorResponseSetter->set($service->errors, $request->all());

            return redirect()->route('admin.services.update', [$id . '/edit'])->with($errorResponse);
        }

        return redirect()->route('admin.services.index');
    }
}
