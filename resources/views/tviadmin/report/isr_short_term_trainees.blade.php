@extends("tviadmin.report.summary_rpt2")

@section("content")

<h1>Short-Term Trainees</h1>
<p>Institution: {{ $institution->name }}</p>
<p>Report Schedule : {{ $report_date->petsa }}</p>

<ul class="nav nav-tabs">
<?php
$active = "class=active";
$sectors = $isr->getSectorsFromShortTermTrainees();
?>
@foreach($sectors as $sector)
    <li {{ $active }}><a data-toggle="tab" href="#sector-{{ $sector->id }}">{{ $sector->name }}</a> </li>
    <?php $active = ""; ?>
@endforeach
</ul>

<div class="tab-content">
    <?php $active = "in active"; ?>
    @forelse($sectors as $sector)

        <div id="sector-{{ $sector->id }}" class="tab-pane fade {{ $active }}">

        <?php $subsectors = $isr->getSubsectorsFromShortTermTrainees($sector->id); ?>
        @foreach($subsectors as $subsector)

            <div class="panel panel-info new_enrollees" style="margin-top: 0.5em;">
                <div class="panel-heading">{{ $subsector->name }}</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="2">Occupation</th>
                            <th colspan="3">Registered</th><th colspan="3">Started Training</th><th colspan="3">Completed Training</th>
                            <th colspan="3">Sent Assessment</th><th colspan="3">Assessed</th><th colspan="3">Competent</th>
                        </tr>
                        <tr>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $entries = $isr->getOccupationsFromShortTermTrainees($subsector->id);
                    $entries_total = $isr->getSumOccupationsFromShortTermTrainees($subsector->id);
                    ?>
                    @foreach($entries as $entry)
                        <?php $occupation = \App\Occupation::findOrFail($entry->occupation_id); ?>
                        <tr>
                            <td>{{ $occupation->name }}</td>
                            <td>{{ $entry->registered_male }}</td>
                            <td>{{ $entry->registered_female }}</td>
                            <td>{{ ($entry->registered_male + $entry->registered_female) }}</td>
                            <td>{{ $entry->started_training_male }}</td>
                            <td>{{ $entry->started_training_female }}</td>
                            <td>{{ ($entry->started_training_male + $entry->started_training_female) }}</td>
                            <td>{{ $entry->completed_training_male }}</td>
                            <td>{{ $entry->completed_training_female }}</td>
                            <td>{{ ($entry->completed_training_male + $entry->completed_training_female) }}</td>
                            <td>{{ $entry->sent_assessment_male }}</td>
                            <td>{{ $entry->sent_assessment_female }}</td>
                            <td>{{ ($entry->sent_assessment_male + $entry->sent_assessment_female) }}</td>
                            <td>{{ $entry->assessed_male }}</td>
                            <td>{{ $entry->assessed_female }}</td>
                            <td>{{ ($entry->assessed_male + $entry->assessed_female) }}</td>
                            <td>{{ $entry->competent_male }}</td>
                            <td>{{ $entry->competent_female }}</td>
                            <td>{{ ($entry->competent_male + $entry->competent_female) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>TOTAL</th>
                            <th>{{ $entries_total[0]->registered_male }}</th>
                            <th>{{ $entries_total[0]->registered_female }}</th>
                            <th>{{ ($entries_total[0]->registered_male + $entries_total[0]->registered_female) }}</th>
                            <th>{{ $entries_total[0]->started_training_male }}</th>
                            <th>{{ $entries_total[0]->started_training_female }}</th>
                            <th>{{ ($entries_total[0]->started_training_male + $entries_total[0]->started_training_female) }}</th>
                            <th>{{ $entries_total[0]->completed_training_male }}</th>
                            <th>{{ $entries_total[0]->completed_training_female }}</th>
                            <th>{{ ($entries_total[0]->completed_training_male + $entries_total[0]->completed_training_female) }}</th>
                            <th>{{ $entries_total[0]->sent_assessment_male }}</th>
                            <th>{{ $entries_total[0]->sent_assessment_female }}</th>
                            <th>{{ ($entries_total[0]->sent_assessment_male + $entries_total[0]->sent_assessment_female) }}</th>
                            <th>{{ $entries_total[0]->assessed_male }}</th>
                            <th>{{ $entries_total[0]->assessed_female }}</th>
                            <th>{{ ($entries_total[0]->assessed_male + $entries_total[0]->assessed_female) }}</th>
                            <th>{{ $entries_total[0]->competent_male }}</th>
                            <th>{{ $entries_total[0]->competent_female }}</th>
                            <th>{{ ($entries_total[0]->competent_male + $entries_total[0]->competent_female) }}</th>
                    </tfoot>
                </table>
            </div>

        @endforeach
        </div>
        <?php $active = ""; ?>
    @empty
        <p class="alert-info">...No records found...</p>
    @endforelse
</div>

@endsection
