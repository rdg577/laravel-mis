@extends("rtaadmin.summary_rpt2")

@section("content")

<h1>Dropouts from Transferred Trainees</h1>
<p>Institution: {{ $institution->name }}</p>
<p>Report Schedule : {{ $report_date->petsa }}</p>

<ul class="nav nav-tabs">
<?php
$active = "class=active";
$sectors = $isr->getSectorsFromDropoutTransferees();
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

        <?php $subsectors = $isr->getSubsectorsFromDropoutTransferees($sector->id); ?>
        @foreach($subsectors as $subsector)

            <div class="panel panel-info new_enrollees" style="margin-top: 0.5em;">
                <div class="panel-heading">{{ $subsector->name }}</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="3">Occupation</th>
                            <th colspan="15">Regular</th>
                            <th colspan="15">Extension</th>
                            <th colspan="3" rowspan="2">Grand Total</th>
                        </tr>
                        <tr>
                            <th colspan="3">Level 1 to 2</th><th colspan="3">Level 2 to 3</th><th colspan="3">Level 3 to 4</th>
                            <th colspan="3">Level 4 to 5</th><th colspan="3">Total</th>
                            <th colspan="3">Level 1 to 2</th><th colspan="3">Level 2 to 3</th><th colspan="3">Level 3 to 4</th>
                            <th colspan="3">Level 4 to 5</th><th colspan="3">Total</th>
                        </tr>
                        <tr>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                            <th>M</th><th>F</th><th>T</th><th>M</th><th>F</th><th>T</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $entries = $isr->getOccupationsFromDropoutTransferees($subsector->id);
                    $entries_total = $isr->getSumOccupationsFromDropoutTransferees($subsector->id);
                    ?>
                    @foreach($entries as $entry)
                        <?php $occupation = \App\Occupation::findOrFail($entry->occupation_id); ?>
                        <tr>
                            <td>{{ $occupation->name }}</td>
                            <td>{{ $entry->regular_level1_to_level2_male }}</td>
                            <td>{{ $entry->regular_level1_to_level2_female }}</td>
                            <td>{{ ($entry->regular_level1_to_level2_male + $entry->regular_level1_to_level2_female) }}</td>
                            <td>{{ $entry->regular_level2_to_level3_male }}</td>
                            <td>{{ $entry->regular_level2_to_level3_female }}</td>
                            <td>{{ ($entry->regular_level2_to_level3_male + $entry->regular_level2_to_level3_female) }}</td>
                            <td>{{ $entry->regular_level3_to_level4_male }}</td>
                            <td>{{ $entry->regular_level3_to_level4_female }}</td>
                            <td>{{ ($entry->regular_level3_to_level4_male + $entry->regular_level3_to_level4_female) }}</td>
                            <td>{{ $entry->regular_level4_to_level5_male }}</td>
                            <td>{{ $entry->regular_level4_to_level5_female }}</td>
                            <td>{{ ($entry->regular_level4_to_level5_male + $entry->regular_level4_to_level5_female) }}</td>
                            <td>{{ ($entry->regular_level1_to_level2_male +
                                    $entry->regular_level2_to_level3_male +
                                    $entry->regular_level3_to_level4_male +
                                    $entry->regular_level4_to_level5_male) }}</td>
                            <td>{{ ($entry->regular_level1_to_level2_female +
                                    $entry->regular_level2_to_level3_female +
                                    $entry->regular_level3_to_level4_female +
                                    $entry->regular_level4_to_level5_female) }}</td>
                            <td>{{ ($entry->regular_level1_to_level2_male + $entry->regular_level1_to_level2_female) +
                                   ($entry->regular_level2_to_level3_male + $entry->regular_level2_to_level3_female) +
                                   ($entry->regular_level3_to_level4_male + $entry->regular_level3_to_level4_female) +
                                   ($entry->regular_level4_to_level5_male + $entry->regular_level4_to_level5_female) }}</td>

                            <td>{{ $entry->extension_level1_to_level2_male }}</td>
                            <td>{{ $entry->extension_level1_to_level2_female }}</td>
                            <td>{{ ($entry->extension_level1_to_level2_male + $entry->extension_level1_to_level2_female) }}</td>
                            <td>{{ $entry->extension_level2_to_level3_male }}</td>
                            <td>{{ $entry->extension_level2_to_level3_female }}</td>
                            <td>{{ ($entry->extension_level2_to_level3_male + $entry->extension_level2_to_level3_female) }}</td>
                            <td>{{ $entry->extension_level3_to_level4_male }}</td>
                            <td>{{ $entry->extension_level3_to_level4_female }}</td>
                            <td>{{ ($entry->extension_level3_to_level4_male + $entry->extension_level3_to_level4_female) }}</td>
                            <td>{{ $entry->extension_level4_to_level5_male }}</td>
                            <td>{{ $entry->extension_level4_to_level5_female }}</td>
                            <td>{{ ($entry->extension_level4_to_level5_male + $entry->extension_level4_to_level5_female) }}</td>
                            <td>{{ ($entry->extension_level1_to_level2_male +
                                    $entry->extension_level2_to_level3_male +
                                    $entry->extension_level3_to_level4_male +
                                    $entry->extension_level4_to_level5_male) }}</td>
                            <td>{{ ($entry->extension_level1_to_level2_female +
                                    $entry->extension_level2_to_level3_female +
                                    $entry->extension_level3_to_level4_female +
                                    $entry->extension_level4_to_level5_female) }}</td>
                            <td>{{ ($entry->extension_level1_to_level2_male + $entry->extension_level1_to_level2_female) +
                                   ($entry->extension_level2_to_level3_male + $entry->extension_level2_to_level3_female) +
                                   ($entry->extension_level3_to_level4_male + $entry->extension_level3_to_level4_female) +
                                   ($entry->extension_level4_to_level5_male + $entry->extension_level4_to_level5_female) }}</td>

                            {{-- grand total --}}
                            <td>
                            {{
                                ($entry->regular_level1_to_level2_male +
                                $entry->regular_level2_to_level3_male +
                                $entry->regular_level3_to_level4_male +
                                $entry->regular_level4_to_level5_male) +
                                ($entry->extension_level1_to_level2_male +
                                $entry->extension_level2_to_level3_male +
                                $entry->extension_level3_to_level4_male +
                                $entry->extension_level4_to_level5_male)
                            }}
                            </td>
                            <td>
                            {{
                                ($entry->regular_level1_to_level2_female +
                                $entry->regular_level2_to_level3_female +
                                $entry->regular_level3_to_level4_female +
                                $entry->regular_level4_to_level5_female) +
                                ($entry->extension_level1_to_level2_female +
                                $entry->extension_level2_to_level3_female +
                                $entry->extension_level3_to_level4_female +
                                $entry->extension_level4_to_level5_female)
                            }}
                            </td>
                            <td>
                            {{
                                ($entry->regular_level1_to_level2_male +
                                $entry->regular_level2_to_level3_male +
                                $entry->regular_level3_to_level4_male +
                                $entry->regular_level4_to_level5_male) +
                                ($entry->extension_level1_to_level2_male +
                                $entry->extension_level2_to_level3_male +
                                $entry->extension_level3_to_level4_male +
                                $entry->extension_level4_to_level5_male) +
                                ($entry->regular_level1_to_level2_female +
                                $entry->regular_level2_to_level3_female +
                                $entry->regular_level3_to_level4_female +
                                $entry->regular_level4_to_level5_female) +
                                ($entry->extension_level1_to_level2_female +
                                $entry->extension_level2_to_level3_female +
                                $entry->extension_level3_to_level4_female +
                                $entry->extension_level4_to_level5_female)
                            }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>TOTAL</th>
                            <th>{{ $entries_total[0]->reg_l1_m }}</th><th>{{ $entries_total[0]->reg_l1_f }}</th>
                            <th>{{ $entries_total[0]->reg_l1_m + $entries_total[0]->reg_l1_f }}</th>
                            <th>{{ $entries_total[0]->reg_l2_m }}</th><th>{{ $entries_total[0]->reg_l2_f }}</th>
                            <th>{{ $entries_total[0]->reg_l2_m + $entries_total[0]->reg_l2_f }}</th>
                            <th>{{ $entries_total[0]->reg_l3_m }}</th><th>{{ $entries_total[0]->reg_l3_f }}</th>
                            <th>{{ $entries_total[0]->reg_l3_m + $entries_total[0]->reg_l3_f }}</th>
                            <th>{{ $entries_total[0]->reg_l4_m }}</th><th>{{ $entries_total[0]->reg_l4_f }}</th>
                            <th>{{ $entries_total[0]->reg_l4_m + $entries_total[0]->reg_l4_f }}</th>
                            
                            <th>{{ $entries_total[0]->reg_total_m }}</th><th>{{ $entries_total[0]->reg_total_f }}</th>
                            <th>{{ $entries_total[0]->reg_total_m + $entries_total[0]->reg_total_f }}</th>
                            
                            <th>{{ $entries_total[0]->ext_l1_m }}</th><th>{{ $entries_total[0]->ext_l1_f }}</th>
                            <th>{{ $entries_total[0]->ext_l1_m + $entries_total[0]->ext_l1_f }}</th>
                            <th>{{ $entries_total[0]->ext_l2_m }}</th><th>{{ $entries_total[0]->ext_l2_f }}</th>
                            <th>{{ $entries_total[0]->ext_l2_m + $entries_total[0]->ext_l2_f }}</th>
                            <th>{{ $entries_total[0]->ext_l3_m }}</th><th>{{ $entries_total[0]->ext_l3_f }}</th>
                            <th>{{ $entries_total[0]->ext_l3_m + $entries_total[0]->ext_l3_f }}</th>
                            <th>{{ $entries_total[0]->ext_l4_m }}</th><th>{{ $entries_total[0]->ext_l4_f }}</th>
                            <th>{{ $entries_total[0]->ext_l4_m + $entries_total[0]->ext_l4_f }}</th>
                            
                            <th>{{ $entries_total[0]->ext_total_m }}</th><th>{{ $entries_total[0]->ext_total_f }}</th>
                            <th>{{ $entries_total[0]->ext_total_m + $entries_total[0]->ext_total_f }}</th>

                            <th>{{ $entries_total[0]->reg_total_m + $entries_total[0]->ext_total_m }}</th>
                            <th>{{ $entries_total[0]->reg_total_f + $entries_total[0]->ext_total_f }}</th>
                            <th>{{ $entries_total[0]->reg_total_m + $entries_total[0]->ext_total_m +
                                    $entries_total[0]->reg_total_f + $entries_total[0]->ext_total_f }}</th>
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
