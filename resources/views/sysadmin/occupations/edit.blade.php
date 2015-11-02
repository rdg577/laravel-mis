@extends('sysadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit occupation</div>
                    <div class="panel-body">
                        {!! Form::model($occupation,
                            [
                                'method' => 'PATCH',
                                'url'=>'/occupations/' . $occupation->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('sysadmin.occupations.form', [
                                                                'submitButtonText' => 'Update',
                                                                'level' => $occupation->level,
                                                                'active' => $occupation->active,
                                                                'sector_id' => $occupation->subsector->sector->id,
                                                                'subsector_id' => $occupation->subsector->id
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection