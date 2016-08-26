@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit saving on transferee</div>
                    <div class="panel-body">
                        {!! Form::model($saving_transferee,
                            [
                                'method' => 'PATCH',
                                'url'=>'/saving-transferees/' . $saving_transferee->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.saving_transferees.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $saving_transferee->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection