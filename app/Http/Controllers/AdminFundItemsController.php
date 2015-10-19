<?php

namespace KyokaiAccSys\Http\Controllers;

use Illuminate\Http\Request;
use KyokaiAccSys\Http\Requests;

class AdminFundItemsController extends BaseController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $this->apiClient->call('POST', 'fund-items', $request->all());

        if (!empty($item->errors)) {
            $errorResponse = $this->errorResponseSetter->set($item->errors, $request->all());

            return redirect()->route('admin-fund-item-create', [
                'id' => $request->get('fund_id')
            ])->with($errorResponse);
        }

        return redirect()->route('admin-fund-items', [$request->get('fund_id')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = $this->apiClient->call('PUT', 'fund-items/' . $id, $request->all());

        if (!empty($item->errors)) {
            $errorResponse = $this->errorResponseSetter->set($item->errors, $request->all());

            return redirect()->route('admin-fund-item', [
                'fundId' => $request->get('fund_id'),
                'id' => $id
            ])->with($errorResponse);
        }

        return redirect()->route('admin-fund-items', [$request->get('fund_id')]);
    }
}
