@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit new enrollees</div>
                    <div class="panel-body">
                        {!! Form::model($new_enrollee,
                            [
                                'method' => 'PATCH',
                                'url'=>'/trainees-new-enrollees/' . $new_enrollee->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.new_enrollees.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $new_enrollee->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection