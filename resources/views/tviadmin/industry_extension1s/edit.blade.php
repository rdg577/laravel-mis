@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit industry extension 1</div>
                    <div class="panel-body">
                        {!! Form::model($industry_extension1,
                            [
                                'method' => 'PATCH',
                                'url'=>'/industry-extension-1/' . $industry_extension1->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('tviadmin.industry_extension1s.form', ['industry_extension1' => $industry_extension1,
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