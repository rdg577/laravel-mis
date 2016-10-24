@extends('tviadmin ')
@section('content')
    @include('errors.list')
    <div class="container">
        <h1>Action Research</h1>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Create action research title(s) entry</h1></div>
                    <div class="panel-body">
                        {!! Form::open([
										'url'   => '/action-research-titles/' . $action_research->id,
                                        'role'  => 'form',
                                        'class' => 'form-vertical'
                                       ]
                            ) !!}

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Action Research Proposal Title(s)</div>
                                        <div class="panel-body">
                                            @for($i = 1; $i <= $action_research->proposal; $i++)
                                                <div class="form-group-sm{{ $errors->has('proposal.' . $i ) ? ' has-error' : '' }}">
                                                    {!! Form::label('proposal[' . $i . ']', 'Title # ' . $i . ' :') !!}
                                                    {!! Form::text('proposal[' . $i . ']', null,
                                                    ['placeholder' => 'Title # ' . $i,
                                                    'class' => 'form-control',
                                                    'value' => '{{ old("name") }}'] ) !!}
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Action Research Completed Title(s)</div>
                                        <div class="panel-body">
                                            @for($i = 1; $i <= $action_research->completed; $i++)
                                                <div class="form-group-sm{{ $errors->has('completed.' . $i ) ? ' has-error' : '' }}">
                                                    {!! Form::label('completed[' . $i . ']', 'Title # ' . $i . ' :') !!}
                                                    {!! Form::text('completed[' . $i . ']', null,
                                                    ['placeholder' => 'Title # ' . $i,
                                                    'class' => 'form-control',
                                                    'value' => '{{ old("name") }}'] ) !!}
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
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