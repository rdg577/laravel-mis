@extends('rtaadmin')

@section('content')
@include('errors.list')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit report schedule</div>
                <div class="panel-body">
                    {!! Form::model($report_date,
                                        [
                                            'method' => 'PATCH',
                                            'url'=>'/report-dates/' . $report_date->id,
                                            'role'=>'form', 'class'=>'form-horizontal'
                                        ]) !!}

                    {!! Form::hidden('user_id', $user->id) !!}

                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {!! Form::label('petsa', 'Report Schedule : ') !!}
                            {!! Form::input('text', 'petsa', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                            <div><em>example: <br />2016 - a year, <br />30 Apr 2016 - a long date, <br />30/04/2016 - a short date, <br />01/01/2016 to 30/04/2016 - a range</em></div>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection