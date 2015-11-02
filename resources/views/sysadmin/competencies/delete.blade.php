@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Warning! Deleting this is permanent. Do you want to continue?</div>
                    <div class="panel-body">
                        {!! Form::model($competency,
                            [
                                'method' => 'DELETE',
                                'url'=>'/competencies/' . $competency->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            {!! Form::submit('Yes, Delete!', ['class' => 'btn btn-danger']) !!}
                            <a role="button" class="btn btn-success" href="/competencies">No!</a>
                            <p>&nbsp;</p>
                            <table class="table table-stripe">
                                <tbody>
                                    <tr>
                                        <th>Competency Name :</th>
                                        <td>{{ $competency->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Code :</th>
                                        <td>{{ $competency->code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Occupation :</th>
                                        <td>{{ $competency->occupation->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sub-sector Name :</th>
                                        <td>{{ $competency->occupation->subsector->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sector Name :</th>
                                        <td>{{ $competency->occupation->subsector->sector->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Is Active? :</th>
                                        <td>
                                            @if($competency->active)
                                                {{ 'True' }}
                                            @else
                                                {{ 'False' }}
                                            @endif
                                        </td>
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