<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;

use KyokaiAccSys\Http\Requests;
use KyokaiAccSys\Http\Controllers\Controller;

class AdminDenominationsController extends AbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $result = $this->apiClient->call('GET', 'denominations');

        return view('admin.denominations.index', ['denominations' => $result->Denominations]);
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
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $result = $this->apiClient->call('POST', 'denominations', $request->all());

        if ($result->message == 'Validation Error') {
            return redirect()->route('admin.denominations.create')->with(
                ['amount' => reset($result->errors->amount),'amountError' => $request->get('amount')]
            );
        }

        echo $result->message;
        print_r($result);
        die;
        return redirect()->route('admin.denominations.index');
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
        $result = $this->apiClient->call('GET', 'denominations/' . $id);

        return view('admin.denominations.update', ['denomination' => reset($result->Denomination)]);
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
        $result = $this->apiClient->call('PUT', 'denominations/' . $id, $request->all(), $id);

        return redirect()->route('admin.denominations.index');
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
