@extends('sysadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit competency</div>
                    <div class="panel-body">
                        {!! Form::model($competency,
                            [
                                'method' => 'PATCH',
                                'url'=>'/competencies/' . $competency->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('sysadmin.competencies.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $competency->active,
                                                                'sector_id' => $competency->occupation->subsector->sector->id,
                                                                'subsector_id' => $competency->occupation->subsector->id,
                                                                'occupation_id' => $competency->occupation->id
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection