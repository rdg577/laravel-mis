<?php
$regions = \App\Region::all()->sortBy('name');
$institutions = \App\Institution::all()->sortBy('name');
?>

@extends('sysadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        {!! Form::open(['url'=>'/users/register', 'role'=>'form', 'class'=>'form-horizontal']) !!}
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" placeholder="Full Name" class="form-control" name="name"
                                    value="{{ old('name') }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" placeholder="Email" class="form-control" name="email"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" placeholder="Password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation">
                            </div>
                            <div class="form-group">
                                <label for="user_type">User Type:</label>
                                <select name="user_type" class="form-control">
                                    <option value="System Administrator">System Administrator</option>
                                    <option value="TVI Administrator" selected>TVI Administrator</option>
                                    <option value="Region Administrator">Region Administrator</option>
                                    <option value="Cluster Administrator">Cluster Administrator</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="institution_id">Institution:</label>
                                <select name="institution_id" class="form-control">
                                    @foreach($institutions as $institution)
                                        <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="region_id">Region:</label>
                                <select name="region_id" class="form-control">
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Register</button>
                                <button type="reset" class="btn">Reset fields</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection