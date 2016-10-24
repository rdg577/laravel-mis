@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit graduates</h1></div>
                    <div class="panel-body">
                        {!! Form::model($graduate,
                            [
                                'method' => 'PATCH',
                                'url'=>'/trainees-graduates/' . $graduate->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.graduates.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $graduate->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection