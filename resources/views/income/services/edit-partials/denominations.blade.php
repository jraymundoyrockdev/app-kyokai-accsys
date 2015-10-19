{!! Form::open(['class' => 'form-horizontal']) !!}
<div class="form-group">
    <label class="col-sm-2 control-label">10</label>

    <div class="col-sm-10">
        {!! Form::text('tens', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Tens']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">20</label>

    <div class="col-sm-10">
        {!! Form::text('twentys', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Twentys']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">50</label>

    <div class="col-sm-10">
        {!! Form::text('fiftys', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Fiftys']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">100</label>

    <div class="col-sm-10">
        {!! Form::text('on_hundreds', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'One Hundreds']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">200</label>

    <div class="col-sm-10">
        {!! Form::text('two_hundreds', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Two Hundreds']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">500</label>

    <div class="col-sm-10">
        {!! Form::text('five_hundreds', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Five Hundreds']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">1000</label>

    <div class="col-sm-10">
        {!! Form::text('one_thousands', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'One Thousands']) !!}
    </div>
</div>
{!! Form::close() !!}