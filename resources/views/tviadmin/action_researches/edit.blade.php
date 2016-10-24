@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="flash-message">
        @foreach(['danger', 'warning', 'success', 'info'] as $msg)
            @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">
                    {{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit action research</h1></div>
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