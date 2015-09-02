@extends('layouts.master')


@section('main-body')

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Ministry List</h5>
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal5">Create New Ministry <i
                                        class="fa fa-plus"></i></button>
                        </div>

                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($ministries as $m)
                                <tr>
                                    <td>{!! $m->name !!}</td>
                                    <td>{!! $m->description !!}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs ">Edit <i
                                                    class="fa fa-pencil"></i></button>
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
    @include('admin.ministries.modal.create-form')
@endsection