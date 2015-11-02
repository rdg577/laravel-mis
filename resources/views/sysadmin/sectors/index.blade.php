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
    <h1>Sectors</h1>
    <a href="/sectors/create" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Is Active?</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sectors as $sector)
                <tr>
                    <td>{{ $sector->name }}</td>
                    <td>
                        @if($sector->active)
                            {{ 'True' }}
                        @else
                            {{ 'False' }}
                        @endif
                    </td>
                    <td>
                        <a href="sectors/{{ $sector->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="sectors/{{ $sector->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="sectors/{{ $sector->id }}" title="View"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Sorry, no records....</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    {!! $sectors->render() !!}
@stop