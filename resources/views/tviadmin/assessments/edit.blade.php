@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit assessment</div>
                    <div class="panel-body">
                        {!! Form::model($assessment,
                            [
                                'method' => 'PATCH',
                                'url'=>'/assessments/' . $assessment->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('tviadmin.assessments.form', ['assessment' => $assessment,
                                                                   'report_dates' => $report_dates,
                                                                   'sectors' => $sectors,
                                                                   'subsectors' => $subsectors,
                                                                   'occupations' => $occupations,
                                                                   'submitButtonText' => 'Update'
                                                                  ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection