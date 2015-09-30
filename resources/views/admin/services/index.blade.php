@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Services'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Services List</h5>
                        {!! link_to_route('admin.services.create', 'Create New Service', [], ['class' => 'btn btn-primary btn-xs pull-right'])!!}
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($services as $s)
                                <tr>
                                    <td>{!! $s->name !!}</td>
                                    <td>{!! $s->description !!}</td>
                                    <td>
                                        <a href="{!! route('admin.services.edit', [$s->id]) !!}"
                                           class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection