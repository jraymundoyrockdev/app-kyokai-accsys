@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Users Account'])@endsection
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
                                    <td>{!! $user->member->ministry->name !!}</td>
                                    <td>{!! $user->role->name !!}</td>
                                    <td>
                                        <input id="<?= $user->id ?>"
                                               class="user-switch bootstrap-switch"
                                               data-switch-get="<?= $user->status ?>"
                                               data-switch-value="0"
                                               data-on-text="active"
                                               data-off-text="inactive"
                                               type="checkbox" <?= ($user->status == 'active') ? 'checked' : '' ?>
                                               data-size="mini">
                                    </td>
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

@section('module-scripts')
    {!! Html::script('js/modules/admin/user.js') !!}
@endsection
