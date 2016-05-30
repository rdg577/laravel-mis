@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit short-term training</div>
                    <div class="panel-body">
                        {!! Form::model($short_term_training,
                            [
                                'method' => 'PATCH',
                                'url'=>'/short-term-trainings/' . $short_term_training->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('tviadmin.short_term_trainings.form', array(
                                                                                 'submitButtonText' => 'Update',
                                                                                 'active' => $short_term_training->active,
                                                                                 'short_term_training' => $short_term_training,
                                                                                 'report_dates' => $report_dates,
                                                                                 'sectors' => $sectors,
                                                                                 'subsectors' => $subsectors,
                                                                                 'occupations' => $occupations,
                                                                                 'competencies' => $competencies
                                                                            ))
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection