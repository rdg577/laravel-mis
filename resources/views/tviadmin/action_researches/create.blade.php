@extends('tviadmin ')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Create action research entry</h1></div>
                    <div class="panel-body">
                        {!! Form::open([
										'url'   => '/action-research',
                                        'role'  => 'form',
                                        'class' => 'form-vertical'
                                       ]
                            ) !!}
                            {!! Form::hidden('institution_id', $institution_id) !!}

                            <div class="form-group">
                                {!! Form::label('report_date_id', 'Report Schedule :') !!}
                                {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">

                                    <div class="form-group">
                                        {!! Form::label('proposal', 'Number of Proposed Action Research : ') !!}
                                        {!! Form::input('number', 'proposal', 0, ['class' => 'form-control',
                                                                                    'data-url' => url('load-proposal-title-fields'),
                                                                                    'id' => 'proposal']) !!}
                                    </div>

                                    <div id="proposed_titles"></div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">

                                    <div class="form-group">
                                        {!! Form::label('completed', 'Completed Action Research : ') !!}
                                        {!! Form::input('number', 'completed', 0, ['class' => 'form-control',
                                                                                    'data-url' => url('load-completed-title-fields'),
                                                                                    'id' => 'completed']) !!}
                                    </div>

                                    <div id="completed_titles"></div>

                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                                {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection