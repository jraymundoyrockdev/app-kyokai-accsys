@extends('layouts.master')

@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Users List</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Role</th>
                                <th>Ministry</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{!! $user->username !!}</td>
                                    <td>{!! $user->ministry->name !!}</td>
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

    <input type="button" value="test" id="test">
@endsection