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
    <h1>Competencies</h1>
    <a href="/competencies/create" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Occupation</th>
                <th>Sub-sector</th>
                <th>Sector</th>
                <th>Is Active?</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse($competencies as $competency)
                <tr>
                    <td>{{ $competency->name }}</td>
                    <td>{{ $competency->code }}</td>
                    <td>{{ $competency->occupation->name }}</td>
                    <td>{{ $competency->occupation->subsector->name }}</td>
                    <td>{{ $competency->occupation->subsector->sector->name }}</td>
                    <td>
                        @if($competency->active)
                            {{ 'True' }}
                        @else
                            {{ 'False' }}
                        @endif
                    </td>
                    <td>
                        <a href="competencies/{{ $competency->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="competencies/{{ $competency->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="competencies/{{ $competency->id }}" title="View"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Sorry, no records....</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    {!! $competencies->render() !!}
@stop