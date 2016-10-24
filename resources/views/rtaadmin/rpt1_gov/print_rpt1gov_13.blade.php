@extends('printing')

@section('content')
    @foreach($sectors as $sector)
        <h1>Report 1 - Government : Cooperative Training on Transferees</h1>
        <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

        <div class="well well-sm">{{ $sector->name }}</div>
        @foreach($occupations as $occupation)
            @if($occupation->subsector->sector->id == $sector->id)
                <div class="panel panel-default occupation">
                    <div class="panel-heading">Occupation: {{ $occupation->name }} [ Sub-sector: {{ $occupation->subsector->name }} ]</div>
                    <div class="panel-body">
                        <?php
                        $reg_cooperative_training_transferees = $rpt1gov->getRegularCooperativeTrainingTransfereesByOccupation($occupation->id);
                        $ext_cooperative_training_transferees = $rpt1gov->getExtensionCooperativeTrainingTransfereesByOccupation($occupation->id);
                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @foreach($reg_cooperative_training_transferees as $reg_cooperative_training_transferee)
                                    <div class="panel panel-default regular">
                                        <div class="panel-heading">Regular</div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Level 1 to 2</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level1_to_level2_male }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level1_to_level2_female }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level1_to_level2_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 2 to 3</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level2_to_level3_male }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level2_to_level3_female }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level2_to_level3_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 3 to 4</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level3_to_level4_male }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level3_to_level4_female }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level3_to_level4_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 4 to 5</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level4_to_level5_male }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level4_to_level5_female }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level4_to_level5_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level1_to_level2_male +
                                                            $reg_cooperative_training_transferee->reg_level2_to_level3_male +
                                                            $reg_cooperative_training_transferee->reg_level3_to_level4_male +
                                                            $reg_cooperative_training_transferee->reg_level4_to_level5_male }}</td>
                                                    <td>{{  $reg_cooperative_training_transferee->reg_level1_to_level2_female +
                                                            $reg_cooperative_training_transferee->reg_level2_to_level3_female +
                                                            $reg_cooperative_training_transferee->reg_level3_to_level4_female +
                                                            $reg_cooperative_training_transferee->reg_level4_to_level5_female }}</td>
                                                    <td>{{ $reg_cooperative_training_transferee->reg_level1_to_level2_total +
                                                            $reg_cooperative_training_transferee->reg_level2_to_level3_total +
                                                            $reg_cooperative_training_transferee->reg_level3_to_level4_total +
                                                            $reg_cooperative_training_transferee->reg_level4_to_level5_total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @foreach($ext_cooperative_training_transferees as $ext_cooperative_training_transferee)
                                    <div class="panel panel-default extension">
                                        <div class="panel-heading">Extension</div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>&nbsp;</td><td>Male</td><td>Female</td><td>Total</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Level 1 to 2</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level1_to_level2_male }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level1_to_level2_female }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level1_to_level2_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 2 to 3</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level2_to_level3_male }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level2_to_level3_female }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level2_to_level3_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 3 to 4</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level3_to_level4_male }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level3_to_level4_female }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level3_to_level4_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 4 to 5</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level4_to_level5_male }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level4_to_level5_female }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level4_to_level5_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level1_to_level2_male +
                                                            $ext_cooperative_training_transferee->ext_level2_to_level3_male +
                                                            $ext_cooperative_training_transferee->ext_level3_to_level4_male +
                                                            $ext_cooperative_training_transferee->ext_level4_to_level5_male }}</td>
                                                    <td>{{  $ext_cooperative_training_transferee->ext_level1_to_level2_female +
                                                            $ext_cooperative_training_transferee->ext_level2_to_level3_female +
                                                            $ext_cooperative_training_transferee->ext_level3_to_level4_female +
                                                            $ext_cooperative_training_transferee->ext_level4_to_level5_female }}</td>
                                                    <td>{{ $ext_cooperative_training_transferee->ext_level1_to_level2_total +
                                                            $ext_cooperative_training_transferee->ext_level2_to_level3_total +
                                                            $ext_cooperative_training_transferee->ext_level3_to_level4_total +
                                                            $ext_cooperative_training_transferee->ext_level4_to_level5_total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            @endif
        @endforeach

    @endforeach

@endsection