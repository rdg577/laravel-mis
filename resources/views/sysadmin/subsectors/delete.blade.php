@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Warning! Deleting this is permanent. Do you want to continue?</div>
                    <div class="panel-body">
                        {!! Form::model($subsector,
                            [
                                'method' => 'DELETE',
                                'url'=>'/subsectors/' . $subsector->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            {!! Form::submit('Yes, Delete!', ['class' => 'btn btn-danger']) !!}
                            <a role="button" class="btn btn-success" href="/subsectors">No!</a>
                            <p>&nbsp;</p>
                            <table class="table table-stripe">
                                <tbody>
                                    <tr>
                                        <th>Sub-sector Name :</th>
                                        <td>{{ $subsector->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sector :</th>
                                        <td>{{ $subsector->sector->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Is Active? :</th>
                                        <td>
                                            @if($subsector->active)
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