@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit institution</div>
                    <div class="panel-body">
                        {!! Form::model($institution,
                            [
                                'method' => 'PATCH',
                                'url'=>'/tvi/' . $institution->id . '/profile',
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('tviadmin.profile.form', ['submitButtonText' => 'Update',
                                                                    'status' => $institution->status,
                                                                    'ownership' => $institution->ownership,
                                                                    'urban_rural' => $institution->urban_rural,
                                                                    'cluster_leader' => $institution->cluster_leader,
                                                                    'region_id' => $institution->region_id])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection