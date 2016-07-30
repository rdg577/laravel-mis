@extends('rtaadmin')

@section('content')
@include('errors.list')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create report schedule</div>
                <div class="panel-body">
                    {!! Form::open(['url'   => '/create-report-date',
                                                'role'  => 'form',
                                                'class' => 'form-horizontal'
                                               ]
                                    ) !!}

                    {!! Form::hidden('user_id', $user->id) !!}

                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {!! Form::label('petsa', 'Report Schedule : ') !!}
                            {{--{!! Form::input('date', 'petsa', null, ['placeholder' => '', 'class' => 'form-control']) !!}--}}
                            {!! Form::text('petsa', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection