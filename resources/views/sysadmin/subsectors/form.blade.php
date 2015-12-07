<?php
    $sectors = \App\Sector::orderBy('name', 'asc')->lists('name', 'id');
?>

<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="form-group">
        {!! Form::label('name', 'Sector Name : ') !!}
        {!! Form::text('name', null, ['placeholder' => 'Sub-sector Name',
                                      'class' => 'form-control',
                                      'value' => '{{ old("name") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector_id', 'Sector : ') !!}
        {!! Form::select('sector_id', $sectors, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('active', 'Is Active? : ') !!}
        {!! Form::select('active', array('1' => 'True',
                                        '0' => 'False'
                                      ), $active,
                                      ['class' => 'form-control']) !!}
    </div>

@elseif($submitButtonText=='Save')

    <div class="form-group">
        {!! Form::label('name', 'Sector Name : ') !!}
        {!! Form::text('name', null, ['placeholder' => 'Sub-sector Name',
                                      'class' => 'form-control',
                                      'value' => '{{ old("name") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector_id', 'Sector : ') !!}
        {!! Form::select('sector_id', $sectors, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('active', 'Is Active? : ') !!}
        {!! Form::select('active', array('1' => 'True',
                                        '0' => 'False'
                                      ), 1,
                                      ['class' => 'form-control']) !!}
    </div>

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>