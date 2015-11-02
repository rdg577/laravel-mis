@extends('sysadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Sub-sector</div>
                    <div class="panel-body">
                        {!! Form::open(['url'   => '/subsectors',
                                        'role'  => 'form',
                                        'class' => 'form-horizontal'
                                       ]
                            ) !!}
                            @include('sysadmin.subsectors.form', ['submitButtonText' => 'Save'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection