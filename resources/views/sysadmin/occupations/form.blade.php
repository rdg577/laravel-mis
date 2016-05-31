<?php
    $sectors = \App\Sector::orderBy('name')->get();
?>

<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <?php
        $subsectors = \App\Sector::find($sector_id)->subsectors->sortBy('name')->lists('name', 'id');
    ?>

    <div class="form-group">
            {!! Form::label('name', 'Occupation Name : ') !!}
            {!! Form::text('name', null, ['placeholder' => 'Occupation Name',
                                          'class' => 'form-control',
                                          'value' => '{{ old("name") }}']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('code', 'Occupation Code : ') !!}
            {!! Form::text('code', null, ['placeholder' => 'Occupation Code',
                                          'class' => 'form-control',
                                          'value' => '{{ old("code") }}']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('level', 'Level : ') !!}
            {!! Form::select('level', array('Level I' => 'Level I',
                                            'Level II' => 'Level II',
                                            'Level III' => 'Level III',
                                            'Level IV' => 'Level IV',
                                            'Level V' => 'Level V'
                                          ), $level,
                                          ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('active', 'Is Active? : ') !!}
            {!! Form::select('active', array('1' => 'True',
                                            '0' => 'False'
                                          ), $active,
                                          ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector', 'Sector : ') !!}
            <select name="sector_id" id="sector" class="form-control" data-url="{{ url('load-sub-sectors') }}">
                @foreach($sectors as $sector)
                    <option value="{{ $sector->id }}"
                    @if($sector->id == $sector_id)
                        selected
                    @endif
                    >{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', $subsectors, $subsector_id, ['class' => 'form-control', 'id' => 'subsector']) !!}
        </div>

@elseif($submitButtonText=='Save')

    <div class="form-group">
        {!! Form::label('name', 'Occupation Name : ') !!}
        {!! Form::text('name', null, ['placeholder' => 'Occupation Name',
                                      'class' => 'form-control',
                                      'value' => '{{ old("name") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('code', 'Occupation Code : ') !!}
        {!! Form::text('code', null, ['placeholder' => 'Occupation Code',
                                      'class' => 'form-control',
                                      'value' => '{{ old("code") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('level', 'Level : ') !!}
        {!! Form::select('level', array('Level I' => 'Level I',
                                        'Level II' => 'Level II',
                                        'Level III' => 'Level III',
                                        'Level IV' => 'Level IV',
                                        'Level V' => 'Level V'
                                      ), null,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('active', 'Is Active? : ') !!}
        {!! Form::select('active', array('1' => 'True',
                                        '0' => 'False'
                                      ), 1,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector', 'Sector : ') !!}
        <select name="sector_id" id="sector" class="form-control" data-url="{{ url('load-sub-sectors') }}">
            @foreach($sectors as $sector)
                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::label('subsector_id', 'Sub-sector : ') !!}
        <select name="subsector_id" id="subsector" class="form-control">
            <option>- Select sector first -</option>
        </select>
    </div>

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>