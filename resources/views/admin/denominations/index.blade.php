@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Denominations'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Denomination List</h5>
                        {!! link_to_route('admin.denominations.create', 'Create New Denomination', [], ['class' => 'btn btn-primary btn-xs pull-right'])!!}
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($denominations as $d)
                                <tr>
                                    <td>{!! $d->amount !!}</td>
                                    <td>{!! $d->description !!}</td>
                                    <td>
                                        <a href="{!! route('admin.denominations.edit', [$d->id]) !!}"
                                           class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection