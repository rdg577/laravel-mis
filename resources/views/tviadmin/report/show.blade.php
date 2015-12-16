@extends('tviadmin')

@section('content')
    <div class="container">

        <h1>Report Data Summary</h1>
        <p><small>Report Date : {{ $report_date->petsa }}</small></p>

        @include('tviadmin.report.profile', array('institution' => $institution))

        @include('tviadmin.report.trainers', array('data_summary_trainers' => $data_summary_trainers))

        @include('tviadmin.report.trainees', array('data_summary_trainees' => $data_summary_trainees))

        @include('tviadmin.report.cooperative_training', array('data_summary_cooperative_trainings' => $data_summary_cooperative_trainings))

        @include('tviadmin.report.industry_extension', array('data_summary_industry_extension' => $data_summary_industry_extension))

    </div>
@endsection