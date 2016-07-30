@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit dropout from transferees</div>
                    <div class="panel-body">
                        {!! Form::model($dropout_transferee,
                            [
                                'method' => 'PATCH',
                                'url'=>'/dropout-from-transferees/' . $dropout_transferee->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.dropout_transferees.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $dropout_transferee->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection