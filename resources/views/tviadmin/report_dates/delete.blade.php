@extends('tviadmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Warning! Deleting this is permanent. Do you want to continue?</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col col-md-8 col-md-offset-2">
                                {!! Form::model($report_date,
                                    [
                                        'method' => 'DELETE',
                                        'url'=>'/report-dates/' . $report_date->id,
                                        'role'=>'form', 'class'=>'form-horizontal'
                                    ]
                                    ) !!}
                                    {!! Form::submit('Yes, Delete!', ['class' => 'btn btn-danger']) !!}
                                    <a role="button" class="btn btn-success" href="/report-dates">No!</a>
                                    <p>&nbsp;</p>
                                    <table class="table table-stripe">
                                        <tbody>
                                            <tr>
                                                <th>Report Date : </th>
                                                <td>{{ $report_date->petsa }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="alert alert-danger">
                                        WARNING!!! Once this is deleted, all data related to this report date will be deleted also permanently.
                                    </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection