@extends('rtaadmin')

@section('content')

    <h1>Institutions</h1>

    @if(count($institutions))
        <div class="panel panel-default">
            <div class="panel-heading">Region Name: {{ $region->name }}</div>
            <div class="panel-body">
                <ol>
                    @foreach($institutions as $institution)
                        <li><a href="/rta-institutions/{{ $institution->id }}">{{ $institution->name }}</a></li>
                    @endforeach
                </ol>
            </div>
        </div>
    @endif

@endsection