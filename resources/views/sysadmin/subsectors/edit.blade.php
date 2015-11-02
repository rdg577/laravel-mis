@extends('sysadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit sub-sector</div>
                    <div class="panel-body">
                        {!! Form::model($subsector,
                            [
                                'method' => 'PATCH',
                                'url'=>'/subsectors/' . $subsector->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('sysadmin.subsectors.form', [
                                                                    'submitButtonText' => 'Update',
                                                                    'active' => $subsector->active
                                                                 ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection