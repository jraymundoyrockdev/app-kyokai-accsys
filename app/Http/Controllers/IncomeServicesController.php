<?php namespace KyokaiAccSys\Http\Controllers;

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
        return view('income.services.create');
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

    public function monthServiceList($year, $month)
    {
        return view('income.services.month-list', ['year' => $year, 'month' => $month]);
    }
}
