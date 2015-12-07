@extends('tviadmin')

@section('content')
    <h1>Institutional Indicators</h1>

    @include('tviadmin.report.profile', array('institution' => $institution))

    @include('tviadmin.indicators.indicator1', array('trainer_ratio' => $trainer_ratio))

@endsection