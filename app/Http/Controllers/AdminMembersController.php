<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;

use KyokaiAccSys\Http\Requests;
use KyokaiAccSys\Http\Controllers\Controller;

class AdminMembersController extends AbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $result = $this->apiClient->call('GET', 'members');

        return view('admin.members.index', ['members' => $result->Members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $this->apiClient->call('POST', 'members', $request->all());

        if (!empty($result->errors)) {
            $errorResponse = $this->errorResponseSetter->set($result->errors, $request->all());

            return redirect()->route('admin.members.create')->with($errorResponse);
        }

        return redirect()->route('admin.members.index');
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
        //
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
