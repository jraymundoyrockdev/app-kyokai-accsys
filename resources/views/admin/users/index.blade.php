@extends('layouts.master')

@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Users Account List</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Ministry</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{!! $user->username !!}</td>
                                    <td>{!! $user->member->firstname . '&nbsp;' . $user->member->lastname !!}</td>
                                    <td>{!! $user->ministry->name !!}</td>
                                    <td>{!! $user->role->name !!}</td>
                                    <td>set active</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Data Found</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection