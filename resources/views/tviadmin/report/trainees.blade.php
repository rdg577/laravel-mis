<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Number of Trainees</div>
            <div class="panel-body">
                <?php
                $tlevel1n2_reg_male = $tlevel3n4_reg_male = $tlevel5_reg_male = 0;
                $tlevel1n2_ext_male = $tlevel3n4_ext_male = $tlevel5_ext_male = 0;

                $tlevel1n2_reg_female = $tlevel3n4_reg_female = $tlevel5_reg_female = 0;
                $tlevel1n2_ext_female = $tlevel3n4_ext_female = $tlevel5_ext_female = 0;
                ?>

                @foreach($data_summary_trainees->subsectors() as $subsector_id)
                    <?php
                    // get subsector
                    $subsector = \App\Subsector::findOrFail($subsector_id[0]);

                    $level1 = $data_summary_trainees->level1($subsector->id);
                    $level2 = $data_summary_trainees->level2($subsector->id);
                    $level3 = $data_summary_trainees->level3($subsector->id);
                    $level4 = $data_summary_trainees->level4($subsector->id);
                    $level5 = $data_summary_trainees->level5($subsector->id);

                    $tlevel1n2_reg_male += ($level1[0]->regular_male + $level2[0]->regular_male);
                    $tlevel3n4_reg_male += ($level3[0]->regular_male + $level4[0]->regular_male);
                    $tlevel5_reg_male += $level5[0]->regular_male;

                    $tlevel1n2_reg_female += ($level1[0]->regular_female + $level2[0]->regular_female);
                    $tlevel3n4_reg_female += ($level3[0]->regular_female + $level4[0]->regular_female);
                    $tlevel5_reg_female += $level5[0]->regular_female;

                    $tlevel1n2_ext_male += ($level1[0]->extension_male + $level2[0]->extension_male);
                    $tlevel3n4_ext_male += ($level3[0]->extension_male + $level4[0]->extension_male);
                    $tlevel5_ext_male += $level5[0]->extension_male;

                    $tlevel1n2_ext_female += ($level1[0]->extension_female + $level2[0]->extension_female);
                    $tlevel3n4_ext_female += ($level3[0]->extension_female + $level4[0]->extension_female);
                    $tlevel5_ext_female += $level5[0]->extension_female;
                    ?>

                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $subsector->name }}</div>
                                <div class="panel-body">

                                    <div class="regular col-lg-4 col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Regular</div>
                                            <div class="panel-body">
                                                <table class="table table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Level</th><th>Male</th><th>Female</th><th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Level I</td>
                                                        <td>{{ $level1[0]->regular_male }}</td>
                                                        <td>{{ $level1[0]->regular_female }}</td>
                                                        <td>{{ $level1[0]->regular_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level II</td>
                                                        <td>{{ $level2[0]->regular_male }}</td>
                                                        <td>{{ $level2[0]->regular_female }}</td>
                                                        <td>{{ $level2[0]->regular_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level III</td>
                                                        <td>{{ $level3[0]->regular_male }}</td>
                                                        <td>{{ $level3[0]->regular_female }}</td>
                                                        <td>{{ $level3[0]->regular_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level IV</td>
                                                        <td>{{ $level4[0]->regular_male }}</td>
                                                        <td>{{ $level4[0]->regular_female }}</td>
                                                        <td>{{ $level4[0]->regular_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level V</td>
                                                        <td>{{ $level5[0]->regular_male }}</td>
                                                        <td>{{ $level5[0]->regular_female }}</td>
                                                        <td>{{ $level5[0]->regular_total }}</td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <th>Total</th>
                                                        <th>{{ $level1[0]->regular_male + $level2[0]->regular_male +
                                                                $level3[0]->regular_male + $level4[0]->regular_male +
                                                                $level5[0]->regular_male}}</th>
                                                        <th>{{ $level1[0]->regular_female + $level2[0]->regular_female +
                                                                $level3[0]->regular_female + $level4[0]->regular_female +
                                                                $level5[0]->regular_female}}</th>
                                                        <th>{{ $level1[0]->regular_male + $level2[0]->regular_male +
                                                                $level3[0]->regular_male + $level4[0]->regular_male +
                                                                $level5[0]->regular_male + $level1[0]->regular_female +
                                                                $level2[0]->regular_female + $level3[0]->regular_female +
                                                                $level4[0]->regular_female + $level5[0]->regular_female}}</th>

                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div> {{--regular col-lg-4 col-md-4--}}

                                    <div class="extension col-lg-4 col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Extension</div>
                                            <div class="panel-body">
                                                <table class="table table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Level</th><th>Male</th><th>Female</th><th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Level I</td>
                                                        <td>{{ $level1[0]->extension_male }}</td>
                                                        <td>{{ $level1[0]->extension_female }}</td>
                                                        <td>{{ $level1[0]->extension_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level II</td>
                                                        <td>{{ $level2[0]->extension_male }}</td>
                                                        <td>{{ $level2[0]->extension_female }}</td>
                                                        <td>{{ $level2[0]->extension_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level III</td>
                                                        <td>{{ $level3[0]->extension_male }}</td>
                                                        <td>{{ $level3[0]->extension_female }}</td>
                                                        <td>{{ $level3[0]->extension_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level IV</td>
                                                        <td>{{ $level4[0]->extension_male }}</td>
                                                        <td>{{ $level4[0]->extension_female }}</td>
                                                        <td>{{ $level4[0]->extension_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level V</td>
                                                        <td>{{ $level5[0]->extension_male }}</td>
                                                        <td>{{ $level5[0]->extension_female }}</td>
                                                        <td>{{ $level5[0]->extension_total }}</td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                    <th>Total</th>
                                                    <th>{{ $level1[0]->extension_male + $level2[0]->extension_male +
                                                                $level3[0]->extension_male + $level4[0]->extension_male +
                                                                $level5[0]->extension_male}}</th>
                                                    <th>{{ $level1[0]->extension_female + $level2[0]->extension_female +
                                                                $level3[0]->extension_female + $level4[0]->extension_female +
                                                                $level5[0]->extension_female}}</th>
                                                    <th>{{ $level1[0]->extension_male + $level2[0]->extension_male +
                                                                $level3[0]->extension_male + $level4[0]->extension_male +
                                                                $level5[0]->extension_male + $level1[0]->extension_female +
                                                                $level2[0]->extension_female + $level3[0]->extension_female +
                                                                $level4[0]->extension_female + $level5[0]->extension_female}}</th>

                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div> {{--extension col-lg-4 col-md-4--}}

                                    <div class="summary col-lg-4 col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Summary [ {{ $subsector->name }} ]</div>
                                            <div class="panel-body">
                                                <table class="table table-bordered table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Level</th><th>Male</th><th>Female</th><th>Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Level I</td>
                                                        <td>{{ $level1[0]->regular_male + $level1[0]->extension_male }}</td>
                                                        <td>{{ $level1[0]->regular_female + $level1[0]->extension_female }}</td>
                                                        <td>{{ $level1[0]->regular_total + $level1[0]->extension_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level II</td>
                                                        <td>{{ $level2[0]->regular_male + $level2[0]->extension_male }}</td>
                                                        <td>{{ $level2[0]->regular_female + $level2[0]->extension_female }}</td>
                                                        <td>{{ $level2[0]->regular_total + $level2[0]->extension_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level III</td>
                                                        <td>{{ $level3[0]->regular_male + $level3[0]->extension_male }}</td>
                                                        <td>{{ $level3[0]->regular_female + $level3[0]->extension_female }}</td>
                                                        <td>{{ $level3[0]->regular_total + $level3[0]->extension_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level IV</td>
                                                        <td>{{ $level4[0]->regular_male + $level4[0]->extension_male }}</td>
                                                        <td>{{ $level4[0]->regular_female + $level4[0]->extension_female }}</td>
                                                        <td>{{ $level4[0]->regular_total + $level4[0]->extension_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level V</td>
                                                        <td>{{ $level5[0]->regular_male + $level5[0]->extension_male }}</td>
                                                        <td>{{ $level5[0]->regular_female + $level5[0]->extension_female }}</td>
                                                        <td>{{ $level5[0]->regular_total + $level5[0]->extension_total }}</td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                    <th>Total</th>
                                                    <th>{{ $level1[0]->regular_male + $level2[0]->regular_male +
                                                                $level3[0]->regular_male + $level4[0]->regular_male +
                                                                $level5[0]->regular_male +
                                                            $level1[0]->extension_male + $level2[0]->extension_male +
                                                                $level3[0]->extension_male + $level4[0]->extension_male +
                                                                $level5[0]->extension_male }}</th>
                                                    <th>{{ $level1[0]->regular_female + $level2[0]->regular_female +
                                                                $level3[0]->regular_female + $level4[0]->regular_female +
                                                                $level5[0]->regular_female +
                                                            $level1[0]->extension_female + $level2[0]->extension_female +
                                                                $level3[0]->extension_female + $level4[0]->extension_female +
                                                                $level5[0]->extension_female }}</th>
                                                    <th>{{ $level1[0]->regular_male + $level2[0]->regular_male +
                                                                $level3[0]->regular_male + $level4[0]->regular_male +
                                                                $level5[0]->regular_male + $level1[0]->regular_female +
                                                                $level2[0]->regular_female + $level3[0]->regular_female +
                                                                $level4[0]->regular_female + $level5[0]->regular_female  +
                                                            $level1[0]->extension_male + $level2[0]->extension_male +
                                                                $level3[0]->extension_male + $level4[0]->extension_male +
                                                                $level5[0]->extension_male + $level1[0]->extension_female +
                                                                $level2[0]->extension_female + $level3[0]->extension_female +
                                                                $level4[0]->extension_female + $level5[0]->extension_female }}</th>

                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                @endforeach {{--foreach($data_summary_trainees->subsectors() as $subsector_id)--}}

                <div class="row">
                    <div class="summary col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Summary -> Number of Trainees</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="level1n2 col-lg-3 col-md-3">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th rowspan="2">&nbsp;</th>
                                                <th colspan="2">Level 1 and 2</th>
                                            </tr>
                                            <tr>
                                                <th>Regular</th><th>Extension</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Male</th>
                                                <td>{{ $tlevel1n2_reg_male }}</td>
                                                <td>{{ $tlevel1n2_ext_male }}</td>
                                            </tr>
                                            <tr>
                                                <th>Female</th>
                                                <td>{{ $tlevel1n2_reg_female }}</td>
                                                <td>{{ $tlevel1n2_ext_female }}</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th>{{ $tlevel1n2_reg_male + $tlevel1n2_reg_female }}</th>
                                                <th>{{ $tlevel1n2_ext_male + $tlevel1n2_ext_female }}</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="level3n4 col-lg-3 col-md-3">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th rowspan="2">&nbsp;</th>
                                                <th colspan="2">Level 3 and 4</th>
                                            </tr>
                                            <tr>
                                                <th>Regular</th><th>Extension</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Male</th>
                                                <td>{{ $tlevel3n4_reg_male }}</td>
                                                <td>{{ $tlevel3n4_ext_male }}</td>
                                            </tr>
                                            <tr>
                                                <th>Female</th>
                                                <td>{{ $tlevel3n4_reg_female }}</td>
                                                <td>{{ $tlevel3n4_ext_female }}</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Total</th>

                                                <th>{{ $tlevel3n4_reg_male + $tlevel3n4_reg_female }}</th>
                                                <th>{{ $tlevel3n4_ext_male + $tlevel3n4_ext_female }}</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="level5 col-lg-3 col-md-3">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th rowspan="2">&nbsp;</th>
                                                <th colspan="2">Level 5</th>
                                            </tr>
                                            <tr>
                                                <th>Regular</th><th>Extension</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Male</th>
                                                <td>{{ $tlevel5_reg_male }}</td>
                                                <td>{{ $tlevel5_ext_male }}</td>
                                            </tr>
                                            <tr>
                                                <th>Female</th>
                                                <td>{{ $tlevel5_reg_female }}</td>
                                                <td>{{ $tlevel5_ext_female }}</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Total</th>

                                                <th>{{ $tlevel5_reg_male + $tlevel5_reg_female }}</th>
                                                <th>{{ $tlevel5_ext_male + $tlevel5_ext_female }}</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="total col-lg-3 col-md-3">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Male</th>
                                                <td>{{ $tlevel1n2_reg_male + $tlevel1n2_ext_male +
                                                $tlevel3n4_reg_male + $tlevel3n4_ext_male +
                                                $tlevel5_reg_male + $tlevel5_ext_male }}</td>
                                            </tr>
                                            <tr>
                                                <th>Female</th>
                                                <td>{{ $tlevel1n2_reg_female + $tlevel1n2_ext_female +
                                                $tlevel3n4_reg_female + $tlevel3n4_ext_female +
                                                $tlevel5_reg_female + $tlevel5_ext_female }}</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th>{{ $tlevel1n2_reg_male + $tlevel1n2_ext_male +
                                                $tlevel3n4_reg_male + $tlevel3n4_ext_male +
                                                $tlevel5_reg_male + $tlevel5_ext_male +

                                                $tlevel1n2_reg_female + $tlevel1n2_ext_female +
                                                $tlevel3n4_reg_female + $tlevel3n4_ext_female +
                                                $tlevel5_reg_female + $tlevel5_ext_female }}</th>
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
        </div>
    </div>
</div>