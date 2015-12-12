@extends('rtaadmin')

@section('content')

    <h1>Institutions</h1>

    @if(count($institutions))
        <div class="panel panel-default">
            <div class="panel-heading">Region: {{ $region->name }}</div>
            <div class="panel-body">
                <ol>
                    @foreach($institutions as $institution)
                        <li>{{ $institution->name }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    @endif

@endsection