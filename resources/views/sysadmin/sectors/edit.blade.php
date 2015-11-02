@extends('sysadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit sector</div>
                    <div class="panel-body">
                        {!! Form::model($sector,
                            [
                                'method' => 'PATCH',
                                'url'=>'/sectors/' . $sector->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('sysadmin.sectors.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $sector->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection