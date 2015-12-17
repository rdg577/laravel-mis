<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 12/17/15
 * Time: 2:28 PM
 */
?>
@extends('rtaadmin')

@section('content')
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
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $institution->name }} Profile</div>
                    <div class="panel-body">
                        <div class="row">

                            <div class=" dean col-lg-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Dean</div>
                                    <div class="panel-body">
                                        <div><p>Name: {{ $institution->dean_name }}</p>
                                            <p>Phone Number : {{ $institution->dean_phone }}</p>
                                            <p>Email Address : {{ $institution->dean_email }}</p>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" dean col-lg-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Year Established</div>
                                    <div class="panel-body">
                                        <div><p>Year: {{ $institution->year_establish }}</p></div>
                                    </div>
                                </div>
                            </div>

                            <div class=" dean col-lg-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Ownership</div>
                                    <div class="panel-body">
                                        <div><p>{{ $institution->ownership }}</p></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class=" dean col-lg-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Status</div>
                                    <div class="panel-body">
                                        <div><p>{{ $institution->status }}</p></div>
                                    </div>
                                </div>
                            </div>

                            <div class=" dean col-lg-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Contact Details</div>
                                    <div class="panel-body">
                                        <div><p>Office : {{ $institution->office_telno }}</p>
                                            <p>Fax : {{ $institution->fax }}</p>
                                            <p>P.O. Box No. : {{ $institution->po_box }}</p>
                                            <p>Office Email : {{ $institution->office_email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" dean col-lg-4 col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">City / Region</div>
                                    <div class="panel-body">
                                        <div><p>City/Sub-City/Town : {{ $institution->city }}</p>
                                            <p>Region : {{ $institution->region->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection