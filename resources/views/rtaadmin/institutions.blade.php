@extends('rtaadmin')

@section('content')

    <h1>Institutions</h1>

    <div class="panel panel-default">
        <div class="panel-heading">Region Name: {{ $region->name }}</div>
        <div class="panel-body">
            <?php $num = 0; ?>
            @forelse($institutions as $institution)
                <?php $num++; ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">{{ $num }}.) {{ $institution->name }}</div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div><a href="/rta-institutions/{{ $institution->id }}">view profile</a> | <a href="/rta-institutions/{{ $institution->id }}/summary-report/">summary report</a></div></div>
                </div>

            @empty
                <div class="alert-info">Records not found!</div>
            @endforelse
        </div>
    </div>

@endsection