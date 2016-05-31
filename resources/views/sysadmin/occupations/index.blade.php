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
    <h1>Occupations</h1>
    <a href="/occupations/create" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Level</th>
                <th>Sub-sector</th>
                <th>Sector</th>
                <th>Is Active?</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse($occupations as $occupation)
                <tr>
                    <td>{{ $occupation->name }}</td>
                    <td>{{ $occupation->code }}</td>
                    <td>{{ $occupation->level }}</td>
                    <td>
                        @if(!is_null($occupation->subsector))

                            {{ $occupation->subsector->name }}
                        @endif
                    </td>
                    <td>
                        @if(!(is_null($occupation->subsector->sector)) &&
                            !(is_null($occupation->subsector->sector)))

                            {{ $occupation->subsector->sector->name }}
                        @endif
                    </td>
                    <td>
                        @if($occupation->active)
                            {{ 'True' }}
                        @else
                            {{ 'False' }}
                        @endif
                    </td>
                    <td>
                        <a href="occupations/{{ $occupation->id }}/edit" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                    {{--<td>
                        <a href="occupations/{{ $occupation->id }}/delete" title="Delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </td>--}}
                    <td>
                        <a href="occupations/{{ $occupation->id }}" title="View"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Sorry, no records....</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    {!! $occupations->render() !!}
@stop