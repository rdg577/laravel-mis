@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Viewing User Profile</div>
                    <div class="panel-body">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection