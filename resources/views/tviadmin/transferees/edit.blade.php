@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit transferees</div>
                    <div class="panel-body">
                        {!! Form::model($transferee,
                            [
                                'method' => 'PATCH',
                                'url'=>'/trainees-transferees/' . $transferee->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.transferees.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $transferee->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection