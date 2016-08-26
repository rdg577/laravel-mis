@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit cooperative training on transferee</div>
                    <div class="panel-body">
                        {!! Form::model($cooperative_training_transferee,
                            [
                                'method' => 'PATCH',
                                'url'=>'/cooperative-training-transferees/' . $cooperative_training_transferee->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.cooperative_training_transferees.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $cooperative_training_transferee->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection