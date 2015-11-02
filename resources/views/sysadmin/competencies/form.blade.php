<?php
    $sectors = \App\Sector::all();
?>

<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <?php
        $subsectors = \App\Sector::find($sector_id)->subsectors->lists('name', 'id');
        $occupations = \App\Subsector::find($subsector_id)->occupations->lists('name', 'id');
    ?>

    <div class="form-group">
            {!! Form::label('name', 'Competency Name : ') !!}
            {!! Form::text('name', null, ['placeholder' => 'Competency Name',
                                          'class' => 'form-control',
                                          'value' => '{{ old("name") }}']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('code', 'Competency Code : ') !!}
            {!! Form::text('code', null, ['placeholder' => 'Competency Code',
                                          'class' => 'form-control',
                                          'value' => '{{ old("code") }}']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('active', 'Is Active? : ') !!}
            {!! Form::select('active', array('1' => 'True',
                                            '0' => 'False'
                                          ), $active,
                                          ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            <select name="sector_id" id="sector" class="form-control" data-url="{{ url('load-sub-sectors') }}">
                @foreach($sectors as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', $subsectors, $subsector_id, ['class' => 'form-control', 'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('occupation_id', 'Occupation : ') !!}
            {!! Form::select('occupation_id', $occupations, $occupation_id, ['class' => 'form-control', 'id' => 'occupation']) !!}
        </div>

@elseif($submitButtonText=='Save')

    <div class="form-group">
        {!! Form::label('name', 'Competency Name : ') !!}
        {!! Form::text('name', null, ['placeholder' => 'Competency Name',
                                      'class' => 'form-control',
                                      'value' => '{{ old("name") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('code', 'Competency Code : ') !!}
        {!! Form::text('code', null, ['placeholder' => 'Competency Code',
                                      'class' => 'form-control',
                                      'value' => '{{ old("code") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('active', 'Is Active? : ') !!}
        {!! Form::select('active', array('1' => 'True',
                                        '0' => 'False'
                                      ), 1,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector_id', 'Sector : ') !!}
        <select name="sector_id" id="sector" class="form-control" data-url="{{ url('load-sub-sectors') }}">
            @foreach($sectors as $sector)
                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('subsector_id', 'Sub-sector : ') !!}
        <select name="subsector_id" id="subsector" class="form-control" data-url="{{ url('load-occupations') }}">
            <option>- Select sector first -</option>
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('occupation_id', 'Occupation : ') !!}
        <select name="occupation_id" id="occupation" class="form-control" data-url="">
            <option>- Select sub-sector first -</option>
        </select>
    </div>

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>