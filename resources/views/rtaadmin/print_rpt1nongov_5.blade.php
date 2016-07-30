@extends('printing')

@section('content')
    @foreach($sectors as $sector)
        <h1>Report 1 - Non-Government : Short-Term Trainees</h1>
        <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

        <div class="well well-sm">{{ $sector->name }}</div>

        <div class="row">
                @foreach($occupations as $occupation)
                    @if($occupation->subsector->sector->id == $sector->id)
                        <div class="col col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <?php
                            $short_term_trainees = $rpt1->getShortTermTraineesByOccupation($occupation->id);
                            ?>

                            <div class="panel panel-default occupation">
                                <div class="panel-heading">Occupation: {{ $occupation->name }} <br>[Sub-sector: {{ $occupation->subsector->name }}]</div>
                                @foreach($short_term_trainees as $short_term_trainee)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Registered</td>
                                                <td>{{ $short_term_trainee->registered_male }}</td>
                                                <td>{{ $short_term_trainee->registered_female }}</td>
                                                <td>{{ $short_term_trainee->registered_total}}</td>
                                            </tr>
                                            <tr>
                                                <td>Started Training</td>
                                                <td>{{ $short_term_trainee->started_training_male }}</td>
                                                <td>{{ $short_term_trainee->started_training_female }}</td>
                                                <td>{{ $short_term_trainee->started_training_total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Completed Training</td>
                                                <td>{{ $short_term_trainee->completed_training_male }}</td>
                                                <td>{{ $short_term_trainee->completed_training_female }}</td>
                                                <td>{{ $short_term_trainee->completed_training_total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Sent Assessment</td>
                                                <td>{{ $short_term_trainee->sent_assessment_male }}</td>
                                                <td>{{ $short_term_trainee->sent_assessment_female }}</td>
                                                <td>{{ $short_term_trainee->sent_assessment_total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Assessed</td>
                                                <td>{{ $short_term_trainee->assessed_male }}</td>
                                                <td>{{ $short_term_trainee->assessed_female }}</td>
                                                <td>{{ $short_term_trainee->assessed_total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Competent</td>
                                                <td>{{ $short_term_trainee->competent_male }}</td>
                                                <td>{{ $short_term_trainee->competent_female }}</td>
                                                <td>{{ $short_term_trainee->competent_total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>{{ $short_term_trainee->registered_male +
                                                        $short_term_trainee->started_training_male +
                                                        $short_term_trainee->completed_training_male +
                                                        $short_term_trainee->sent_assessment_male +
                                                        $short_term_trainee->assessed_male +
                                                        $short_term_trainee->competent_male }}</td>
                                                <td>{{  $short_term_trainee->registered_female +
                                                        $short_term_trainee->started_training_female +
                                                        $short_term_trainee->completed_training_female +
                                                        $short_term_trainee->sent_assessment_female +
                                                        $short_term_trainee->assessed_female +
                                                        $short_term_trainee->competent_female }}</td>
                                                <td>{{ $short_term_trainee->registered_total +
                                                        $short_term_trainee->started_training_total +
                                                        $short_term_trainee->completed_training_total +
                                                        $short_term_trainee->sent_assessment_total +
                                                        $short_term_trainee->assessed_total +
                                                        $short_term_trainee->competent_total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
        </div>

    @endforeach

@endsection