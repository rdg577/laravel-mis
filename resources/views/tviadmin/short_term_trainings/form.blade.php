<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    @include('tviadmin.short_term_trainings.updateform', ['report_dates' => $report_dates,
                                                            'short_term_training' => $short_term_training,
                                                            'sectors' => $sectors,
                                                            'subsectors' => $subsectors,
                                                            'occupations' => $occupations,
                                                            'competencies' => $competencies])

@elseif($submitButtonText=='Save')

    @include('tviadmin.short_term_trainings.createform', ['report_dates' => $report_dates,
                                                            'report_date_id' => $report_date_id,
                                                            'sectors' => $sectors])

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>