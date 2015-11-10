<?php
    $url = \Illuminate\Support\Facades\Request::url();
?>
@extends('tviadmin')

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
    <h1>Trainers</h1>
    <div class="panel panel-default">
        <div class="panel-heading"><a href="/dropouts/create" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="4">Report Dates</th>
                </tr>
            </thead>
            <tbody>
                @forelse($report_dates as $report_date)
                    <tr>
                        <td><a href="{{ $url . '/' . $report_date->id }}" title="View">{{ $report_date->petsa }}</a></td>
                        <td>
                            <a href="{{ $url . '/' . $report_date->id }}/save-as" title="Save As"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span></a>
                        </td>
                        <td>
                            <a href="{{ 'report-dates/' . $report_date->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                        <td>
                            <a href="{{ $url . '/' . $report_date->id }}" title="View"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Sorry, no records....</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    {!! $report_dates->render() !!}
@stop