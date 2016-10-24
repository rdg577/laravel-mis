@extends('printing')

@section('content')

    <h1>Report 2 - Government [Short-Term Trainees]</h1>

    <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

    <div class="row">
        @foreach($institutions as $institution)
            <?php
                $rows = $rpt2->getShortTermTraineesByInstitutionID($institution->id);
            ?>
            @foreach($rows as $row)
                <div class="col col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $institution->name }}</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Male</td>
                                <td>Female</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Registered</td><td>{{ $row->registered_male }}</td><td>{{ $row->registered_female }}</td><td>{{ $row->registered_total }}</td>
                            </tr>
                            <tr>
                                <td>Started Training</td><td>{{ $row->started_training_male }}</td><td>{{ $row->started_training_female }}</td><td>{{ $row->started_training_total }}</td>
                            </tr>
                            <tr>
                                <td>Completed Training</td><td>{{ $row->completed_training_male }}</td><td>{{ $row->completed_training_female }}</td><td>{{ $row->completed_training_total }}</td>
                            </tr>
                            <tr>
                                <td>Sent for Assessment</td><td>{{ $row->sent_assessment_male }}</td><td>{{ $row->sent_assessment_female }}</td><td>{{ $row->sent_assessment_total }}</td>
                            </tr>
                            <tr>
                                <td>Assessed</td><td>{{ $row->assessed_male }}</td><td>{{ $row->assessed_female }}</td><td>{{ $row->assessed_total }}</td>
                            </tr>
                            <tr>
                                <td>Competent</td><td>{{ $row->competent_male }}</td><td>{{ $row->competent_female }}</td><td>{{ $row->competent_total }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                <td>{{ $row->registered_male +
                                                    $row->started_training_male +
                                                    $row->completed_training_male +
                                                    $row->sent_assessment_male +
                                                    $row->assessed_male +
                                                    $row->competent_male }}</td>
                                <td>{{ $row->registered_female +
                                                    $row->started_training_female +
                                                    $row->completed_training_female +
                                                    $row->sent_assessment_female +
                                                    $row->assessed_female +
                                                    $row->competent_female }}</td>
                                <td>{{ $row->registered_total +
                                                    $row->started_training_total +
                                                    $row->completed_training_total +
                                                    $row->sent_assessment_total +
                                                    $row->assessed_total +
                                                    $row->competent_total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>

@endsection