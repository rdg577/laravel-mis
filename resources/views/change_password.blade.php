@extends($page)

@section('content')
    @include('errors.list')

    <div class="flash-message">
        @foreach(['danger', 'warning', 'success', 'info'] as $msg)
            @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">
                    {{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change password</div>
                <div class="panel-body">
                {!! Form::open(['url' => '/change-password', 'role' => 'form', 'class' => 'form-vertical']) !!}
                    <div class="form-group">
                        {!! Form::label('old_password', 'Old Password: ') !!}
                        {!! Form::password('old_password', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password: ') !!}
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm Password: ') !!}
                        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop