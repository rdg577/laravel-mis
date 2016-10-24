@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit dropout graduates</h1></div>
                    <div class="panel-body">
                        {!! Form::model($dropout_graduate,
                            [
                                'method' => 'PATCH',
                                'url'=>'/dropout-graduates/' . $dropout_graduate->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.dropout_graduates.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $dropout_graduate->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection