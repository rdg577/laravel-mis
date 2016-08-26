@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit dropout short term trainees</div>
                    <div class="panel-body">
                        {!! Form::model($dropout_shortterm,
                            [
                                'method' => 'PATCH',
                                'url'=>'/dropout-short-term/' . $dropout_shortterm->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.dropout_short_term.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $dropout_shortterm->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection