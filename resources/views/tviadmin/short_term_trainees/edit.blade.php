@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit new enrollees</div>
                    <div class="panel-body">
                        {!! Form::model($short_term_trainee,
                            [
                                'method' => 'PATCH',
                                'url'=>'/short-term-trainees/' . $short_term_trainee->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.short_term_trainees.form', [
                                                                'submitButtonText' => 'Update',
                                                                'sectors' => $sectors,
                                                                'subsectors' => $subsectors,
                                                                'occupations' => $occupations,
                                                                'active' => $short_term_trainee->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection