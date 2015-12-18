@extends('......sysadmin')

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
    <h1>Institutions</h1>
    <a href="/institutions/create" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Telephone</th>
                <th>Dean</th>
                <th>Mobile No.</th>
                <th>Region</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse($institutions as $institution)
                <tr>
                    <td>{{ $institution->name }}</td>
                    <td>{{ $institution->office_telno }}</td>
                    <td>{{ $institution->dean_name }}</td>
                    <td>{{ $institution->dean_phone }}</td>
                    <td>{{ $institution->region->name }}</td>
                    <td>
                        @if($institution->name != 'None')
                            <a href="institutions/{{ $institution->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        @endif
                    </td>
                    <td>
                        @if($institution->name != 'None')
                            <a href="institutions/{{ $institution->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        @endif
                    </td>
                    <td>
                        @if($institution->name != 'None')
                            <a href="institutions/{{ $institution->id }}" title="View"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Sorry, no records....</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    {!! $institutions->render() !!}
@stop