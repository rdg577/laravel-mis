@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit entry for Cooperative Training on Graduates</h1></div>
                    <div class="panel-body">
                        {!! Form::model($cooperative_training_graduate,
                            [
                                'method' => 'PATCH',
                                'url'=>'/cooperative-training-graduates/' . $cooperative_training_graduate->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.cooperative_training_graduates.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $cooperative_training_graduate->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection