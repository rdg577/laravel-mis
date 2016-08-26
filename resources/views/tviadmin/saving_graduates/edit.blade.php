@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit saving on graduates</div>
                    <div class="panel-body">
                        {!! Form::model($saving_graduate,
                            [
                                'method' => 'PATCH',
                                'url'=>'/saving-graduates/' . $saving_graduate->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.saving_graduates.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $saving_graduate->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection