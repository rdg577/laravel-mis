@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Warning! Deleting this is permanent. Do you want to continue?</div>
                    <div class="panel-body">
                        {!! Form::model($user,
                            [
                                'method' => 'DELETE',
                                'url'=>'/users/' . $user->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            {!! Form::submit('Yes, Delete!', ['class' => 'btn btn-danger']) !!}
                            <a role="button" class="btn btn-success" href="/users">No!</a>
                            <p>&nbsp;</p>
                            <table class="table table-stripe">
                                <tbody>
                                    <tr>
                                        <th>Name :</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>User Type :</th>
                                        <td>{{ $user->user_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Institution / College :</th>
                                        <td>{{ $user->institution->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Region :</th>
                                        <td>{{ $user->region->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection