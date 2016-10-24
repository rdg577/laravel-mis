@extends("tviadmin.report.summary_rpt2")

@section("content")

<h1>Saving on Graduates</h1>
<p>Institution: {{ $institution->name }}</p>
<p>Report Schedule : {{ $report_date->petsa }}</p>

<ul class="nav nav-tabs">
<?php
$active = "class=active";
$sectors = $isr->getSectorsFromSavingGraduates();
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

            <div class="panel panel-info" style="margin-top: 0.5em;">
                <div class="panel-heading">Savings</div>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th rowspan="2">Sub-sector</th>
                        <th colspan="6">Regular</th>
                        <th colspan="6">Extension</th>
                        <th rowspan="2">Grand Total</th>
                    </tr>
                    <tr>
                        <th>Level 1</th><th>Level 2</th><th>Level 3</th><th>Level 4</th><th>Level 5</th><th>Total</th>
                        <th>Level 1</th><th>Level 2</th><th>Level 3</th><th>Level 4</th><th>Level 5</th><th>Total</th>
                    </tr>
                    </thead>

                    <?php $rows = $isr->getSumAmountPerSubsectorFromSavingGraduates($sector->id); ?>
                    <tbody>
                    @foreach($rows as $row)
                        <?php $subsector = \App\Subsector::findOrFail($row->subsector_id); ?>
                        <tr>
                            <td>{{ $subsector->name }}</td>
                            <td>{{ number_format($row->reg_l1_saving,2) }}</td>
                            <td>{{ number_format($row->reg_l2_saving,2) }}</td>
                            <td>{{ number_format($row->reg_l3_saving,2) }}</td>
                            <td>{{ number_format($row->reg_l4_saving,2) }}</td>
                            <td>{{ number_format($row->reg_l5_saving,2) }}</td>
                            <td>{{ number_format($row->reg_total_saving,2) }}</td>
                            <td>{{ number_format($row->ext_l1_saving,2) }}</td>
                            <td>{{ number_format($row->ext_l2_saving,2) }}</td>
                            <td>{{ number_format($row->ext_l3_saving,2) }}</td>
                            <td>{{ number_format($row->ext_l4_saving,2) }}</td>
                            <td>{{ number_format($row->ext_l5_saving,2) }}</td>
                            <td>{{ number_format($row->ext_total_saving,2) }}</td>
                            <td>{{ number_format(($row->reg_total_saving + $row->ext_total_saving),2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>

                    <?php $rows = $isr->getSumAmountPerSectorFromSavingGraduates($sector->id); ?>
                    <tfoot>
                    @foreach($rows as $row)
                        <tr bgcolor="#f0e68c">
                            <th>TOTAL</th>
                            <th>{{ number_format($row->reg_l1_saving, 2) }}</th>
                            <th>{{ number_format($row->reg_l2_saving, 2) }}</th>
                            <th>{{ number_format($row->reg_l3_saving, 2) }}</th>
                            <th>{{ number_format($row->reg_l4_saving, 2) }}</th>
                            <th>{{ number_format($row->reg_l5_saving, 2) }}</th>
                            <th>{{ number_format($row->reg_total_saving, 2) }}</th>
                            <th>{{ number_format($row->ext_l1_saving, 2) }}</th>
                            <th>{{ number_format($row->ext_l2_saving, 2) }}</th>
                            <th>{{ number_format($row->ext_l3_saving, 2) }}</th>
                            <th>{{ number_format($row->ext_l4_saving, 2) }}</th>
                            <th>{{ number_format($row->ext_l5_saving, 2) }}</th>
                            <th>{{ number_format($row->ext_total_saving, 2) }}</th>
                            <th>{{ number_format(($row->reg_total_saving + $row->ext_total_saving), 2) }}</th>
                        </tr>
                    @endforeach
                    </tfoot>

                </table>

            </div>

            <div class="panel panel-info" style="margin-top: 0.5em;">
                <div class="panel-heading">Graduates</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="3">Sub-Sector</th>
                            <th colspan="18">Regular</th>
                            <th colspan="18">Extension</th>
                            <th colspan="3" rowspan="2">Grand Total</th>
                        </tr>
                        <tr>
                            <th colspan="3">Level 1</th><th colspan="3">Level 2</th><th colspan="3">Level 3</th>
                            <th colspan="3">Level 4</th><th colspan="3">Level 5</th><th colspan="3">Total</th>
                            <th colspan="3">Level 1</th><th colspan="3">Level 2</th><th colspan="3">Level 3</th>
                            <th colspan="3">Level 4</th><th colspan="3">Level 5</th><th colspan="3">Total</th>
                        </tr>
                        <tr>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                            <th>M</th><th>F</th><th>T</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php $entries = $isr->getSumPerSubsectorFromSavingGraduates($sector->id); ?>
                    @foreach($entries as $entry)
                        <?php $subsector = \App\Subsector::findOrFail($entry->subsector_id); ?>
                        <tr>
                                <td>{{ $subsector->name }}</td>
                                <td>{{ $entry->reg_l1_m }}</td>
                                <td>{{ $entry->reg_l1_f }}</td>
                                <td>{{ ($entry->reg_l1_m + $entry->reg_l1_f) }}</td>
                                <td>{{ $entry->reg_l2_m }}</td>
                                <td>{{ $entry->reg_l2_f }}</td>
                                <td>{{ ($entry->reg_l2_m + $entry->reg_l2_f) }}</td>
                                <td>{{ $entry->reg_l3_m }}</td>
                                <td>{{ $entry->reg_l3_f }}</td>
                                <td>{{ ($entry->reg_l3_m + $entry->reg_l3_f) }}</td>
                                <td>{{ $entry->reg_l4_m }}</td>
                                <td>{{ $entry->reg_l4_f }}</td>
                                <td>{{ ($entry->reg_l4_m + $entry->reg_l4_f) }}</td>
                                <td>{{ $entry->reg_l5_m }}</td>
                                <td>{{ $entry->reg_l5_f }}</td>
                                <td>{{ ($entry->reg_l5_m + $entry->reg_l5_f) }}</td>
                                <td>{{ ($entry->reg_total_m) }}</td>
                                <td>{{ ($entry->reg_total_f) }}</td>
                                <td>{{ ($entry->reg_total_m + $entry->reg_total_f) }}</td>

                                <td>{{ $entry->ext_l1_m }}</td>
                                <td>{{ $entry->ext_l1_f }}</td>
                                <td>{{ ($entry->ext_l1_m + $entry->ext_l1_f) }}</td>
                                <td>{{ $entry->ext_l2_m }}</td>
                                <td>{{ $entry->ext_l2_f }}</td>
                                <td>{{ ($entry->ext_l2_m + $entry->ext_l2_f) }}</td>
                                <td>{{ $entry->ext_l3_m }}</td>
                                <td>{{ $entry->ext_l3_f }}</td>
                                <td>{{ ($entry->ext_l3_m + $entry->ext_l3_f) }}</td>
                                <td>{{ $entry->ext_l4_m }}</td>
                                <td>{{ $entry->ext_l4_f }}</td>
                                <td>{{ ($entry->ext_l4_m + $entry->ext_l4_f) }}</td>
                                <td>{{ $entry->ext_l5_m }}</td>
                                <td>{{ $entry->ext_l5_f }}</td>
                                <td>{{ ($entry->ext_l5_m + $entry->ext_l5_f) }}</td>
                                <td>{{ ($entry->ext_total_m) }}</td>
                                <td>{{ ($entry->ext_total_f) }}</td>
                                <td>{{ ($entry->ext_total_m + $entry->ext_total_f) }}</td>

                                {{-- grand total --}}
                                <td>
                                {{
                                    ($entry->reg_total_m + $entry->ext_total_m)
                                }}
                                </td>
                                <td>
                                {{
                                    ($entry->reg_total_f + $entry->ext_total_f)
                                }}
                                </td>
                                <td>
                                {{
                                    ($entry->reg_total_m + $entry->ext_total_m) +
                                    ($entry->reg_total_f + $entry->ext_total_f)
                                }}
                                </td>
                            </tr>
                    @endforeach
                    </tbody>

                    <?php $rows = $isr->getSumPerSectorFromSavingGraduates($sector->id); ?>
                    <tfoot>
                        @foreach($rows as $row)
                            <tr bgcolor="#f0e68c">
                                <th>TOTAL</th>
                                <th>{{ $row->reg_l1_m }}</th><th>{{ $row->reg_l1_f }}</th>
                                <th>{{ $row->reg_l1_m + $row->reg_l1_f }}</th>
                                <th>{{ $row->reg_l2_m }}</th><th>{{ $row->reg_l2_f }}</th>
                                <th>{{ $row->reg_l2_m + $row->reg_l2_f }}</th>
                                <th>{{ $row->reg_l3_m }}</th><th>{{ $row->reg_l3_f }}</th>
                                <th>{{ $row->reg_l3_m + $row->reg_l3_f }}</th>
                                <th>{{ $row->reg_l4_m }}</th><th>{{ $row->reg_l4_f }}</th>
                                <th>{{ $row->reg_l4_m + $row->reg_l4_f }}</th>
                                <th>{{ $row->reg_l5_m }}</th><th>{{ $row->reg_l5_f }}</th>
                                <th>{{ $row->reg_l5_m + $row->reg_l5_f }}</th>

                                <th>{{ $row->reg_total_m }}</th><th>{{ $row->reg_total_f }}</th>
                                <th>{{ $row->reg_total_m + $row->reg_total_f }}</th>

                                <th>{{ $row->ext_l1_m }}</th><th>{{ $row->ext_l1_f }}</th>
                                <th>{{ $row->ext_l1_m + $row->ext_l1_f }}</th>
                                <th>{{ $row->ext_l2_m }}</th><th>{{ $row->ext_l2_f }}</th>
                                <th>{{ $row->ext_l2_m + $row->ext_l2_f }}</th>
                                <th>{{ $row->ext_l3_m }}</th><th>{{ $row->ext_l3_f }}</th>
                                <th>{{ $row->ext_l3_m + $row->ext_l3_f }}</th>
                                <th>{{ $row->ext_l4_m }}</th><th>{{ $row->ext_l4_f }}</th>
                                <th>{{ $row->ext_l4_m + $row->ext_l4_f }}</th>
                                <th>{{ $row->ext_l5_m }}</th><th>{{ $row->ext_l5_f }}</th>
                                <th>{{ $row->ext_l5_m + $row->ext_l5_f }}</th>

                                <th>{{ $row->ext_total_m }}</th><th>{{ $row->ext_total_f }}</th>
                                <th>{{ $row->ext_total_m + $row->ext_total_f }}</th>

                                <th>{{ $row->reg_total_m + $row->ext_total_m }}</th>
                                <th>{{ $row->reg_total_f + $row->ext_total_f }}</th>
                                <th>{{ $row->reg_total_m + $row->ext_total_m +
                                        $row->reg_total_f + $row->ext_total_f }}</th>
                            </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>

        </div>
        <?php $active = ""; ?>
    @empty
        <p class="alert-info">...No records found...</p>
    @endforelse
</div>

@endsection
