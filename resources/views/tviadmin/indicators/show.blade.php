@extends('tviadmin')

@section('content')
    <h1>Institutional Indicators</h1>

    @include('tviadmin.report.profile', array('institution' => $institution))

    <div class="row">
        @include('tviadmin.indicators.indicator1', array('trainer_ratio' => $trainer_ratio))

        @include('tviadmin.indicators.indicator2', array('student_ratio' => $student_ratio, 'trainer_ratio' => $trainer_ratio))

        @include('tviadmin.indicators.indicator3', array('student_ratio' => $student_ratio))
    </div>

    <div class="row">
        @include('tviadmin.indicators.indicator4', array('student_ratio' => $student_ratio))

        @include('tviadmin.indicators.indicator5', array('student_ratio' => $student_ratio))
    </div>

    <div class="row">
        @include('tviadmin.indicators.indicator6', array('student_ratio' => $student_ratio))

        @include('tviadmin.indicators.indicator7', array('student_ratio' => $student_ratio))
    </div>

    <div class="row">
        @include('tviadmin.indicators.indicator8', array('student_ratio' => $student_ratio))
    </div>

    <div class="row">
        @include('tviadmin.indicators.indicator9', array('student_ratio' => $student_ratio))

        @include('tviadmin.indicators.indicator10', array('student_ratio' => $student_ratio))

        @include('tviadmin.indicators.indicator11', array('student_ratio' => $student_ratio))
    </div>

    <div class="row">
        @include('tviadmin.indicators.indicator12', array('student_ratio' => $student_ratio))

        @include('tviadmin.indicators.indicator13', array('student_ratio' => $student_ratio))
    </div>

    <div class="row">
        @include('tviadmin.indicators.indicator14', array('student_ratio' => $student_ratio))
    </div>

@endsection