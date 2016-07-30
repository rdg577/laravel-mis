@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit re-enrollees</div>
                    <div class="panel-body">
                        {!! Form::model($re_enrollee,
                            [
                                'method' => 'PATCH',
                                'url'=>'/trainees-re-enrollees/' . $re_enrollee->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.re_enrollees.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $re_enrollee->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection