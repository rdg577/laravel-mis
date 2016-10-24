@extends('printing')

@section('content')


    <h1>Report 2 - Non-Government [Transferees]</h1>

    <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

    <div class="row">
        @foreach($institutions as $institution)
            <?php
                $rows = $rpt2->getTransfereesByInstitutionID($institution->id);
            ?>
            @foreach($rows as $row)
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
                                                        <td>Level 1 to 2</td><td>{{ $row->reg_level1_to_level2_male }}</td><td>{{ $row->reg_level1_to_level2_female }}</td><td>{{ $row->reg_level1_to_level2_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level 2 to 3</td><td>{{ $row->reg_level2_to_level3_male }}</td><td>{{ $row->reg_level2_to_level3_female }}</td><td>{{ $row->reg_level2_to_level3_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level 3 to 4</td><td>{{ $row->reg_level3_to_level4_male }}</td><td>{{ $row->reg_level3_to_level4_female }}</td><td>{{ $row->reg_level3_to_level4_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level 4 to 5</td><td>{{ $row->reg_level4_to_level5_male }}</td><td>{{ $row->reg_level4_to_level5_female }}</td><td>{{ $row->reg_level4_to_level5_total }}</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>TOTAL</td>
                                                        <td>{{ $row->reg_level1_to_level2_male +
                                                                            $row->reg_level2_to_level3_male +
                                                                            $row->reg_level3_to_level4_male +
                                                                            $row->reg_level4_to_level5_male }}</td>
                                                        <td>{{ $row->reg_level1_to_level2_female +
                                                                            $row->reg_level2_to_level3_female +
                                                                            $row->reg_level3_to_level4_female +
                                                                            $row->reg_level4_to_level5_female }}</td>
                                                        <td>{{ $row->reg_level1_to_level2_total +
                                                                            $row->reg_level2_to_level3_total +
                                                                            $row->reg_level3_to_level4_total +
                                                                            $row->reg_level4_to_level5_total }}</td>
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
                                                        <td>Level 1 to 2</td><td>{{ $row->ext_level1_to_level2_male }}</td><td>{{ $row->ext_level1_to_level2_female }}</td><td>{{ $row->ext_level1_to_level2_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level 2 to 3</td><td>{{ $row->ext_level2_to_level3_male }}</td><td>{{ $row->ext_level2_to_level3_female }}</td><td>{{ $row->ext_level2_to_level3_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level 3 to 4</td><td>{{ $row->ext_level3_to_level4_male }}</td><td>{{ $row->ext_level3_to_level4_female }}</td><td>{{ $row->ext_level3_to_level4_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level 4 to 5</td><td>{{ $row->ext_level4_to_level5_male }}</td><td>{{ $row->ext_level4_to_level5_female }}</td><td>{{ $row->ext_level4_to_level5_total }}</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>TOTAL</td>
                                                        <td>{{ $row->ext_level1_to_level2_male +
                                                                            $row->ext_level2_to_level3_male +
                                                                            $row->ext_level3_to_level4_male +
                                                                            $row->ext_level4_to_level5_male }}</td>
                                                        <td>{{ $row->ext_level1_to_level2_female +
                                                                            $row->ext_level2_to_level3_female +
                                                                            $row->ext_level3_to_level4_female +
                                                                            $row->ext_level4_to_level5_female }}</td>
                                                        <td>{{ $row->ext_level1_to_level2_total +
                                                                            $row->ext_level2_to_level3_to_level3_total +
                                                                            $row->ext_level3_to_level4_total +
                                                                            $row->ext_level4_to_level5_total }}</td>
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
        @endforeach
    </div>

@endsection