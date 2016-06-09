<?php
    $regions = \App\Region::orderBy('name', 'asc')->lists('name', 'id');
    $institutions = \App\Institution::orderBy('name', 'asc')->lists('name', 'id');
?>

<div class="col-md-8 col-md-offset-2">
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['placeholder' => 'Full Name',
                                      'class' => 'form-control',
                                      'value' => '{{ old("name") }}']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['placeholder' => 'Email',
                                       'class' => 'form-control',
                                       'value' => '{{ old("email") }}']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::input('password', 'password', null, ['placeholder' => 'Password', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm Password:') !!}
        {!! Form::input('password', 'password_confirmation', null, ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('user_type', 'User Type:') !!}
        {!! Form::select('user_type', array('System Administrator' => 'System Administrator',
                                            'TVI Administrator' => 'TVI Administrator',
                                            'Region Administrator' => 'Region Administrator',
                                            'Cluster Administrator' => 'Cluster Administrator'
                                      ), $user_type, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('institution_id', 'Institution:') !!}
        {!! Form::select('institution_id', $institutions, $institution_id, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('region_id', 'Region:') !!}
        {!! Form::select('region_id', $regions, $region_id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>