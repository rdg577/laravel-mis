@extends('tviadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Warning! Deleting this is permanent. Do you want to continue?</div>
                    <div class="panel-body">
                        {!! Form::model($industry_extension2,
                            [
                                'method' => 'DELETE',
                                'url'=>'/industry-extension-2/' . $industry_extension2->id,
                                'role'=>'form', 'class'=>'form-horizontal'
                            ]
                            ) !!}
                            {!! Form::submit('Yes, Delete!', ['class' => 'btn btn-danger']) !!}
                            <a role="button" class="btn btn-success" href="/industry-extension-2/{{ $industry_extension2->report_date->id }}">No!</a>
                            <p>&nbsp;</p>
                            <table class="table table-stripe">
                                <tbody>
                                    <tr>
                                        <th>Report Date :</th>
                                        <td>{{ $industry_extension2->report_date->petsa }}</td>
                                    </tr>
                                    <tr>
                                        <th>Occupation :</th>
                                        <td>{{ $industry_extension2->occupation->name }}</td>
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