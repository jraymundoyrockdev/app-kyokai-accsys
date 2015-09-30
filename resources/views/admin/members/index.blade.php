@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Members'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Members List</h5>
                        {!! link_to_route('admin.members.create', 'Create New Member', [], ['class' => 'btn btn-primary btn-xs pull-right'])!!}
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Apellation</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($members as $m)
                                <tr>
                                    <td>{!! $m->firstname . ' ' . $m->middlename . ' ' . $m->lastname !!}</td>
                                    <td>{!! $m->apellation !!}</td>
                                    <td>{!! $m->address !!}</td>
                                    <td>
                                        <a href="{!! route('admin.members.edit', [$m->id]) !!}"
                                           class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>No Data Found</tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection