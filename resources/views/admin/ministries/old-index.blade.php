@extends('layouts.master')
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Ministry List</h5>
                        {!! link_to_route('admin.ministry.create', 'Create New Ministry', [], ['class' => 'btn btn-primary btn-xs pull-right'])!!}
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
                                    <td>{!! $m->name !!}</td>a
                                    <td>{!! $m->description !!}</td>
                                    <td>
                                        <a href="{!! route('admin.ministry.edit', [$m->id]) !!}"
                                           class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
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