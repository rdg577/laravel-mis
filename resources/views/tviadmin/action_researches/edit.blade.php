@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit action research</div>
                    <div class="panel-body">
                        {!! Form::model($action_research,
                            [
                                'method' => 'PATCH',
                                'url'=>'/action-research/' . $action_research->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.action_researches.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $action_research->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection