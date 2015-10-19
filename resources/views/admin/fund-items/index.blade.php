@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Fund Items'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Fund Items List - {!! $fund->name !!}</h5>
                        {!! link_to_route(
                            'admin-fund-item-create',
                            'Create New Item',
                            ['id'=>$fund->id],
                            ['class' => 'btn btn-primary btn-xs pull-right'])!!}
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th class="table100 text-center">Status</th>
                                <th class="table100 text-center">Action</th>
                            </tr>
                            </thead>
                            @forelse($fund->item as $item)
                                <tr>
                                    <td>{!! $item->name !!}</td>
                                    <td><input name="{!! $item->name !!}"
                                               id="{!! $item->id !!}"
                                               class="fund-item-switch bootstrap-switch"
                                               data-switch-get="{!! $item->status !!}"
                                               data-switch-value="0"
                                               data-on-text="active"
                                               data-off-text="inactive"
                                               type="checkbox" {!! ($item->status == 'active') ? 'checked' : '' !!}
                                               data-size="mini"></td>
                                    <td class="text-center">
                                        <a href="{!! route('admin-fund-item', [$item->fund_id, $item->id]) !!}"
                                           class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                            @endforelse

                            <tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('module-scripts')
    {!! Html::script('js/modules/admin/fund-items.js') !!}
@endsection