@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Warning! Deleting this is permanent. Do you want to continue?</div>
                    <div class="panel-body">
                        {!! Form::model($institution,
                            [
                                'method' => 'DELETE',
                                'url'=>'/institutions/' . $institution->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            {!! Form::submit('Yes, Delete!', ['class' => 'btn btn-danger']) !!}
                            <a role="button" class="btn btn-success" href="/institutions">No!</a>
                            <p>&nbsp;</p>
                            <table class="table table-stripe">
                                <tbody>
                                    <tr>
                                        <th>Name :</th>
                                        <td>{{ $institution->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dean :</th>
                                        <td>{{ $institution->dean_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ownership :</th>
                                        <td>{{ $institution->ownership }}</td>
                                    </tr>
                                    <tr>
                                        <th>City :</th>
                                        <td>{{ $institution->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Region :</th>
                                        <td>
                                            @if(!is_null($institution->region))
                                                {{ $institution->region->name }}</td>
                                            @endif
                                        <td>
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