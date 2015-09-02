<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'admin.ministry.store','class' => 'form-horizontal lg-12']) !!}
            <div class="modal-header">
                <h4 class="modal-title">Create New Ministry</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">{!! Form::text('name', '', ['class' => 'form-control']) !!}</div>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">{!! Form::textarea('description', '', ['class' => 'form-control']) !!}</div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-10 col-sm-offset-2">
                    {!! Form::button('cancel',  ['class' => 'btn btn-white', 'data-dismiss'=>'modal']) !!}
                    {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
