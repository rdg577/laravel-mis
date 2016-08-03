@extends('rtaadmin')

@section('content')

    <a href="/report-2/non-gov-transferees/print/{{ $report_date->id }}" target="_blank" class="btn btn-info btn-sm">
      <span class="glyphicon glyphicon-print"></span> Print
    </a>
    <h1>Report 2 - Non-Government [Transferees]</h1>

    <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

    <div class="row">
        @forelse($institutions as $institution)
        <?php
            $row_data = $rpt2->getTransfereesByInstitutionID($institution->id);
        ?>

            <div class="col col-lg-12 col-md-12 col-sm-12">
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
                                                    <td>Level 1 to 2</td><td>{{ $row_data[0]->reg_level1_to_level2_male }}</td><td>{{ $row_data[0]->reg_level1_to_level2_female }}</td><td>{{ $row_data[0]->reg_level1_to_level2_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 2 to 3</td><td>{{ $row_data[0]->reg_level2_to_level3_male }}</td><td>{{ $row_data[0]->reg_level2_to_level3_female }}</td><td>{{ $row_data[0]->reg_level2_to_level3_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 3 to 4</td><td>{{ $row_data[0]->reg_level3_to_level4_male }}</td><td>{{ $row_data[0]->reg_level3_to_level4_female }}</td><td>{{ $row_data[0]->reg_level3_to_level4_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 4 to 5</td><td>{{ $row_data[0]->reg_level4_to_level5_male }}</td><td>{{ $row_data[0]->reg_level4_to_level5_female }}</td><td>{{ $row_data[0]->reg_level4_to_level5_total }}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>TOTAL</td>
                                                    <td>{{ $row_data[0]->reg_level1_to_level2_male +
                                                                        $row_data[0]->reg_level2_to_level3_male +
                                                                        $row_data[0]->reg_level3_to_level4_male +
                                                                        $row_data[0]->reg_level4_to_level5_male }}</td>
                                                    <td>{{ $row_data[0]->reg_level1_to_level2_female +
                                                                        $row_data[0]->reg_level2_to_level3_female +
                                                                        $row_data[0]->reg_level3_to_level4_female +
                                                                        $row_data[0]->reg_level4_to_level5_female }}</td>
                                                    <td>{{ $row_data[0]->reg_level1_to_level2_total +
                                                                        $row_data[0]->reg_level2_to_level3_total +
                                                                        $row_data[0]->reg_level3_to_level4_total +
                                                                        $row_data[0]->reg_level4_to_level5_total }}</td>
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
                                                    <td>Level 1 to 2</td><td>{{ $row_data[0]->ext_level1_to_level2_male }}</td><td>{{ $row_data[0]->ext_level1_to_level2_female }}</td><td>{{ $row_data[0]->ext_level1_to_level2_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 2 to 3</td><td>{{ $row_data[0]->ext_level2_to_level3_male }}</td><td>{{ $row_data[0]->ext_level2_to_level3_female }}</td><td>{{ $row_data[0]->ext_level2_to_level3_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 3 to 4</td><td>{{ $row_data[0]->ext_level3_to_level4_male }}</td><td>{{ $row_data[0]->ext_level3_to_level4_female }}</td><td>{{ $row_data[0]->ext_level3_to_level4_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 4 to 5</td><td>{{ $row_data[0]->ext_level4_to_level5_male }}</td><td>{{ $row_data[0]->ext_level4_to_level5_female }}</td><td>{{ $row_data[0]->ext_level4_to_level5_total }}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>TOTAL</td>
                                                    <td>{{ $row_data[0]->ext_level1_to_level2_male +
                                                                        $row_data[0]->ext_level2_to_level3_male +
                                                                        $row_data[0]->ext_level3_to_level4_male +
                                                                        $row_data[0]->ext_level4_to_level5_male }}</td>
                                                    <td>{{ $row_data[0]->ext_level1_to_level2_female +
                                                                        $row_data[0]->ext_level2_to_level3_female +
                                                                        $row_data[0]->ext_level3_to_level4_female +
                                                                        $row_data[0]->ext_level4_to_level5_female }}</td>
                                                    <td>{{ $row_data[0]->ext_level1_to_level2_total +
                                                                        $row_data[0]->ext_level2_to_level3_to_level3_total +
                                                                        $row_data[0]->ext_level3_to_level4_total +
                                                                        $row_data[0]->ext_level4_to_level5_total }}</td>
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
        @empty
            <div class="col col-lg-12">
                <p class="alert alert-info">No Records...</p>
            </div>
        @endforelse
    </div>

@endsection