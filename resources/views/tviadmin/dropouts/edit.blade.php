@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit dropout</div>
                    <div class="panel-body">
                        {!! Form::model($dropout,
                            [
                                'method' => 'PATCH',
                                'url'=>'/dropouts/' . $dropout->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('tviadmin.dropouts.form', ['dropout' => $dropout,
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