@extends('rtaadmin')

@section('content')

    <h1>Regional Level Indicators</h1>
    <p><small>Report Date : {{ $petsa }}</small></p>

    <div class="panel panel-default">
        <div class="panel-heading">Region: {{ $region->name }}</div>
        <div class="panel-body">
            <div class="row">
                @include('rtaadmin.indicator1', compact('trainer_ratio'))

                @include('rtaadmin.indicator2', compact('trainer_ratio', 'student_ratio'))

                @include('rtaadmin.indicator3', compact('student_ratio'))
            </div>

            <div class="row">
                @include('rtaadmin.indicator4', compact('student_ratio'))
                
                @include('rtaadmin.indicator5', array('student_ratio' => $student_ratio))
            </div>

            <div class="row">
                @include('rtaadmin.indicator6', array('student_ratio' => $student_ratio))

                @include('rtaadmin.indicator7', array('student_ratio' => $student_ratio))
            </div>

            <div class="row">
                @include('rtaadmin.indicator8', array('student_ratio' => $student_ratio))
            </div>

            <div class="row">
                @include('rtaadmin.indicator9', array('student_ratio' => $student_ratio))

                @include('rtaadmin.indicator10', array('student_ratio' => $student_ratio))

                @include('rtaadmin.indicator11', array('student_ratio' => $student_ratio))
            </div>

            <div class="row">
                @include('rtaadmin.indicator12', array('student_ratio' => $student_ratio))

                @include('rtaadmin.indicator13', array('student_ratio' => $student_ratio))
            </div>

            <div class="row">
                @include('rtaadmin.indicator14', array('student_ratio' => $student_ratio))
                
                @include('rtaadmin.indicator15', compact('industry_extension'))
            </div>

            <div class="row">
                @include('rtaadmin.indicator16', compact('industry_extension'))

                @include('rtaadmin.indicator17', compact('industry_extension'))
            </div>

            <div class="row">
                @include('rtaadmin.indicator18', compact('industry_extension'))
            </div>

        </div>
    </div>

@endsection