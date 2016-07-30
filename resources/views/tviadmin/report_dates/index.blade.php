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
    <h1>Reporting Schedules</h1>

    {!! $report_dates->render() !!}

    <div class="panel panel-default">
        <div class="panel-heading"><a href="/create-report-date" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Schedule</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse($report_dates as $report_date)
                    <tr>
                        <td>{{ $report_date->petsa }}</td>
                        <td>
                            <a href="report-dates/{{ $report_date->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        </td>
                        <td>
                            <a href="report-dates/{{ $report_date->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
                        <td>
                            <a href="report-dates/{{ $report_date->id }}" title="View"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Sorry, no records....</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    {!! $report_dates->render() !!}

@endsection