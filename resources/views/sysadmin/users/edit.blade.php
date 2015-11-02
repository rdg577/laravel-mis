@extends('sysadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit user</div>
                    <div class="panel-body">
                        {!! Form::model($user,
                            [
                                'method' => 'PATCH',
                                'url'=>'/users/' . $user->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            @include('sysadmin.users.form', ['submitButtonText' => 'Update',
                                                             'user_type' => $user->user_type,
                                                             'institution_id' => $user->institution_id,
                                                             'region_id' => $user->region_id])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection