<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $industry_extension3->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Date :') !!}
            {!! Form::select('report_date_id', $report_dates, $industry_extension3->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $industry_extension3->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', $subsectors, $industry_extension3->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('high_level', 'High Level Managers : ') !!}
            {!! Form::input('number', 'high_level', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mid_level', 'Middle Level Managers : ') !!}
            {!! Form::input('number', 'mid_level', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('low_level', 'Low Level Managers : ') !!}
            {!! Form::input('number', 'low_level', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('remarks', 'Remarks : ') !!}
            {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
        </div>

    </div> {{--div class="update-form"--}}

@elseif($submitButtonText=='Save')

    <div class="create-form">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Date :') !!}
            {!! Form::select('report_date_id', $report_dates, $report_date_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, null, ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', array('- select sector first -'), null, ['class' => 'form-control', 'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('high_level', 'High Level Managers : ') !!}
            {!! Form::input('number', 'high_level', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('mid_level', 'Middle Level Managers : ') !!}
            {!! Form::input('number', 'mid_level', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('low_level', 'Low Level Managers : ') !!}
            {!! Form::input('number', 'low_level', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('remarks', 'Remarks : ') !!}
            {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
        </div>

    </div> {{--div class="create-form"--}}

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>