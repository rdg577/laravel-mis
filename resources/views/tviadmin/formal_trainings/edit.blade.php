@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit formal training</div>
                    <div class="panel-body">
                        {!! Form::model($formal_training,
                            [
                                'method' => 'PATCH',
                                'url'=>'/formal-trainings/' . $formal_training->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('tviadmin.formal_trainings.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $formal_training->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection