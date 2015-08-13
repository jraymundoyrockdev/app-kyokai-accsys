@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Funds'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Funds List</h5>
                        {!! link_to_route('admin.funds.create', 'Create New Fund', [], ['class' => 'btn btn-primary btn-xs pull-right'])!!}
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($funds as $f)
                                <tr>
                                    <td>{!! $f->name !!}</td>
                                    <td>{!! $f->description !!}</td>
                                    <td class="table100 text-center"><span class="label label-success">{!! strtoupper($f->category) !!}</span></td>
                                    <td class="table100 text-center">
                                        <a href="{!! route('admin.funds.edit', [$f->id]) !!}"
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