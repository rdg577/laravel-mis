@extends('rtaadmin')

@section('content')

    <a href="/report-2/gov-short-term-trainees/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 2 - Government [Short-Term Trainees]</h1>

    <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

    <div class="row">
        @forelse($institutions as $institution)
        <?php
            $row_data = $rpt2->getShortTermTraineesByInstitutionID($institution->id);
        ?>

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
                                <td>Registered</td><td>{{ $row_data[0]->registered_male }}</td><td>{{ $row_data[0]->registered_female }}</td><td>{{ $row_data[0]->registered_total }}</td>
                            </tr>
                            <tr>
                                <td>Started Training</td><td>{{ $row_data[0]->started_training_male }}</td><td>{{ $row_data[0]->started_training_female }}</td><td>{{ $row_data[0]->started_training_total }}</td>
                            </tr>
                            <tr>
                                <td>Completed Training</td><td>{{ $row_data[0]->completed_training_male }}</td><td>{{ $row_data[0]->completed_training_female }}</td><td>{{ $row_data[0]->completed_training_total }}</td>
                            </tr>
                            <tr>
                                <td>Sent for Assessment</td><td>{{ $row_data[0]->sent_assessment_male }}</td><td>{{ $row_data[0]->sent_assessment_female }}</td><td>{{ $row_data[0]->sent_assessment_total }}</td>
                            </tr>
                            <tr>
                                <td>Assessed</td><td>{{ $row_data[0]->assessed_male }}</td><td>{{ $row_data[0]->assessed_female }}</td><td>{{ $row_data[0]->assessed_total }}</td>
                            </tr>
                            <tr>
                                <td>Competent</td><td>{{ $row_data[0]->competent_male }}</td><td>{{ $row_data[0]->competent_female }}</td><td>{{ $row_data[0]->competent_total }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                <td>{{ $row_data[0]->registered_male +
                                                    $row_data[0]->started_training_male +
                                                    $row_data[0]->completed_training_male +
                                                    $row_data[0]->sent_assessment_male +
                                                    $row_data[0]->assessed_male +
                                                    $row_data[0]->competent_male }}</td>
                                <td>{{ $row_data[0]->registered_female +
                                                    $row_data[0]->started_training_female +
                                                    $row_data[0]->completed_training_female +
                                                    $row_data[0]->sent_assessment_female +
                                                    $row_data[0]->assessed_female +
                                                    $row_data[0]->competent_female }}</td>
                                <td>{{ $row_data[0]->registered_total +
                                                    $row_data[0]->started_training_total +
                                                    $row_data[0]->completed_training_total +
                                                    $row_data[0]->sent_assessment_total +
                                                    $row_data[0]->assessed_total +
                                                    $row_data[0]->competent_total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @empty
            <div class="col col-lg-12">
                <p class="alert alert-info">No Records...</p>
            </div>
        @endforelse
    </div>

@endsection