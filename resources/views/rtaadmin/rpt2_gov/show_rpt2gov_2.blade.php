@extends('rtaadmin')

@section('content')

    <a href="/report-2/gov-re-enrollees/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 2 - Government [Re-Enrollees]</h1>

    <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

    <div class="row">
        @forelse($institutions as $institution)
            <?php
            $rows = $rpt2->getReEnrolleesByInstitutionID($institution->id);
            ?>
            @foreach($rows as $row)
                <div class="col col-lg-6 col-md-6 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $institution->name }}</div>
                        <div class="panel-body">
                            <div class="table">
                                <div class="row">
                                    <div class="col col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Regular</div>
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
                                                    <td>Level 1</td><td>{{ $row->reg_level1_male }}</td><td>{{ $row->reg_level1_female }}</td><td>{{ $row->reg_level1_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 2</td><td>{{ $row->reg_level2_male }}</td><td>{{ $row->reg_level2_female }}</td><td>{{ $row->reg_level2_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 3</td><td>{{ $row->reg_level3_male }}</td><td>{{ $row->reg_level3_female }}</td><td>{{ $row->reg_level3_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 4</td><td>{{ $row->reg_level4_male }}</td><td>{{ $row->reg_level4_female }}</td><td>{{ $row->reg_level4_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 5</td><td>{{ $row->reg_level5_male }}</td><td>{{ $row->reg_level5_female }}</td><td>{{ $row->reg_level5_total }}</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>TOTAL</td>
                                                    <td>{{ $row->reg_level1_male +
                                                                    $row->reg_level2_male +
                                                                    $row->reg_level3_male +
                                                                    $row->reg_level4_male +
                                                                    $row->reg_level5_male }}</td>
                                                    <td>{{ $row->reg_level1_female +
                                                                    $row->reg_level2_female +
                                                                    $row->reg_level3_female +
                                                                    $row->reg_level4_female +
                                                                    $row->reg_level5_female }}</td>
                                                    <td>{{ $row->reg_level1_total +
                                                                    $row->reg_level2_total +
                                                                    $row->reg_level3_total +
                                                                    $row->reg_level4_total +
                                                                    $row->reg_level5_total }}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Extension</div>
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
                                                    <td>Level 1</td><td>{{ $row->ext_level1_male }}</td><td>{{ $row->ext_level1_female }}</td><td>{{ $row->ext_level1_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 2</td><td>{{ $row->ext_level2_male }}</td><td>{{ $row->ext_level2_female }}</td><td>{{ $row->ext_level2_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 3</td><td>{{ $row->ext_level3_male }}</td><td>{{ $row->ext_level3_female }}</td><td>{{ $row->ext_level3_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 4</td><td>{{ $row->ext_level4_male }}</td><td>{{ $row->ext_level4_female }}</td><td>{{ $row->ext_level4_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 5</td><td>{{ $row->ext_level5_male }}</td><td>{{ $row->ext_level5_female }}</td><td>{{ $row->ext_level5_total }}</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>TOTAL</td>
                                                    <td>{{ $row->ext_level1_male +
                                                                    $row->ext_level2_male +
                                                                    $row->ext_level3_male +
                                                                    $row->ext_level4_male +
                                                                    $row->ext_level5_male }}</td>
                                                    <td>{{ $row->ext_level1_female +
                                                                    $row->ext_level2_female +
                                                                    $row->ext_level3_female +
                                                                    $row->ext_level4_female +
                                                                    $row->ext_level5_female }}</td>
                                                    <td>{{ $row->ext_level1_total +
                                                                    $row->ext_level2_total +
                                                                    $row->ext_level3_total +
                                                                    $row->ext_level4_total +
                                                                    $row->ext_level5_total }}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @empty
            <div class="col col-lg-12">
                <p class="alert alert-info">No Records...</p>
            </div>
        @endforelse
    </div>

@endsection