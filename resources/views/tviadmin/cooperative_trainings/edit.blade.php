@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit entry for Cooperative Training with Partner Industries</h1></div>
                    <div class="panel-body">
                        {!! Form::model($cooperative_training,
                            [
                                'method' => 'PATCH',
                                'url'=>'/cooperative-trainings/' . $cooperative_training->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('tviadmin.cooperative_trainings.form', ['cooperative_training' => $cooperative_training,
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