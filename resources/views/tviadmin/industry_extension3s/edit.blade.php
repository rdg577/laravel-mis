@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit industry extension 3</h1></div>
                    <div class="panel-body">
                        {!! Form::model($industry_extension3,
                            [
                                'method' => 'PATCH',
                                'url'=>'/industry-extension-3/' . $industry_extension3->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('tviadmin.industry_extension3s.form', ['industry_extension3' => $industry_extension3,
                                                                               'report_dates' => $report_dates,
                                                                               'sectors' => $sectors,
                                                                               'subsectors' => $subsectors,
                                                                               'submitButtonText' => 'Update'
                                                                            ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection