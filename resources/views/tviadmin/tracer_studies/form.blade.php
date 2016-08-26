<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <input type="hidden" name="institution_id" value="{{ $tracer_study->institution->id }}">

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('proposal', 'Number of Proposed Tracer Study : ') !!}
        {!! Form::input('number', 'proposal', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('completed', 'Completed Tracer Study : ') !!}
        {!! Form::input('number', 'completed', null, ['class' => 'form-control']) !!}
    </div>


@elseif($submitButtonText=='Save')

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('proposal', 'Number of Proposed Tracer Study : ') !!}
        {!! Form::input('number', 'proposal', 0, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('completed', 'Completed Tracer Study : ') !!}
        {!! Form::input('number', 'completed', 0, ['class' => 'form-control']) !!}
    </div>

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>