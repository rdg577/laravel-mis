<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $industry_extension1->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Schedule :') !!}
            {!! Form::select('report_date_id', $report_dates, $industry_extension1->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $industry_extension1->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', $subsectors, $industry_extension1->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('identified_technologies', 'Number of Technologies identified through Value Chain Analysis :') !!}
            {!! Form::input('number', 'identified_technologies', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('benchmarked_technologies', 'Benchmarked Technologies :') !!}
            {!! Form::input('number', 'benchmarked_technologies', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('proper_documentation', 'Proper Documentation - Technology :') !!}
            {!! Form::input('number', 'proper_documentation', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('prototype', 'Prototype - Technology :') !!}
            {!! Form::input('number', 'prototype', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('competent_entrepreneurs', 'Competent Entrepreneurs - Technology :') !!}
            {!! Form::input('number', 'competent_entrepreneurs', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('transferred', 'Technology Transfer - Technology :') !!}
            {!! Form::input('number', 'transferred', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('capital', 'Capital in Million - Technology :') !!}
            {!! Form::input('number', 'capital', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('remarks', 'Remarks : ') !!}
            {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
        </div>

    </div> {{--div class="update-form"--}}

@elseif($submitButtonText=='Save')

    <div class="create-form">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Schedule :') !!}
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
            {!! Form::select('subsector_id', array('- select sector first -'), null, ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('identified_technologies', 'Number of Technologies identified through Value Chain Analysis :') !!}
            {!! Form::input('number', 'identified_technologies', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('benchmarked_technologies', 'Benchmarked Technologies :') !!}
            {!! Form::input('number', 'benchmarked_technologies', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('proper_documentation', 'Proper Documentation - Technology :') !!}
            {!! Form::input('number', 'proper_documentation', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('prototype', 'Prototype - Technology :') !!}
            {!! Form::input('number', 'prototype', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('competent_entrepreneurs', 'Competent Entrepreneurs - Technology :') !!}
            {!! Form::input('number', 'competent_entrepreneurs', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('transferred', 'Technology Transfer - Technology :') !!}
            {!! Form::input('number', 'transferred', 0, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('capital', 'Capital in Million - Technology :') !!}
            {!! Form::input('number', 'capital', 0, ['class' => 'form-control']) !!}
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