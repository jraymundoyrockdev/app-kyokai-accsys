@extends('layouts.master')

@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>User's Roles List</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($userRoles as $role)
                                <tr>
                                    <td>{!! $role->name !!}</td>
                                    <td>{!! $role->description !!}</td>
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