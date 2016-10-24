@extends('printing')

@section('content')
    @foreach($sectors as $sector)
        <h1>Report 1 - Government : Dropout Short-Term Trainees</h1>
        <p>Report Schedule : {{ $report_date->petsa }} .::. Region: {{ $region->name }}</p>

        <div class="well well-sm">{{ $sector->name }}</div>
        @foreach($occupations as $occupation)
            @if($occupation->subsector->sector->id == $sector->id)
                <div class="panel panel-default occupation">
                    <div class="panel-heading">Occupation: {{ $occupation->name }} [ Sub-sector: {{ $occupation->subsector->name }} ]</div>
                    <div class="panel-body">
                        <?php
                        $reg_dropout_short_term_trainees = $rpt1gov->getRegularDropoutShortTermTraineesByOccupation($occupation->id);
                        $ext_dropout_short_term_trainees = $rpt1gov->getExtensionDropoutShortTermTraineesByOccupation($occupation->id);
                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @foreach($reg_dropout_short_term_trainees as $reg_dropout_short_term_trainee)
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
                                                    <td>Level 1</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level1_male }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level1_female }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level1_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 2</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level2_male }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level2_female }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level2_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 3</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level3_male }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level3_female }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level3_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 4</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level4_male }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level4_female }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level4_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 5</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level5_male }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level5_female }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level5_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level1_male +
                                                            $reg_dropout_short_term_trainee->reg_level2_male +
                                                            $reg_dropout_short_term_trainee->reg_level3_male +
                                                            $reg_dropout_short_term_trainee->reg_level4_male +
                                                            $reg_dropout_short_term_trainee->reg_level5_male }}</td>
                                                    <td>{{  $reg_dropout_short_term_trainee->reg_level1_female +
                                                            $reg_dropout_short_term_trainee->reg_level2_female +
                                                            $reg_dropout_short_term_trainee->reg_level3_female +
                                                            $reg_dropout_short_term_trainee->reg_level4_female +
                                                            $reg_dropout_short_term_trainee->reg_level5_female }}</td>
                                                    <td>{{ $reg_dropout_short_term_trainee->reg_level1_total +
                                                            $reg_dropout_short_term_trainee->reg_level2_total +
                                                            $reg_dropout_short_term_trainee->reg_level3_total +
                                                            $reg_dropout_short_term_trainee->reg_level4_total +
                                                            $reg_dropout_short_term_trainee->reg_level5_total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @foreach($ext_dropout_short_term_trainees as $ext_dropout_short_term_trainee)
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
                                                    <td>Level 1</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level1_male }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level1_female }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level1_male + $ext_dropout_short_term_trainee->ext_level1_female }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 2</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level2_male }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level2_female }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level2_male + $ext_dropout_short_term_trainee->ext_level2_female }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 3</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level3_male }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level3_female }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level3_male + $ext_dropout_short_term_trainee->ext_level3_female }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 4</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level4_male }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level4_female }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level4_male + $ext_dropout_short_term_trainee->ext_level4_female }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Level 5</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level5_male }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level5_female }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level5_male + $ext_dropout_short_term_trainee->ext_level5_female }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level1_male +
                                                            $ext_dropout_short_term_trainee->ext_level2_male +
                                                            $ext_dropout_short_term_trainee->ext_level3_male +
                                                            $ext_dropout_short_term_trainee->ext_level4_male +
                                                            $ext_dropout_short_term_trainee->ext_level5_male }}</td>
                                                    <td>{{  $ext_dropout_short_term_trainee->ext_level1_female +
                                                            $ext_dropout_short_term_trainee->ext_level2_female +
                                                            $ext_dropout_short_term_trainee->ext_level3_female +
                                                            $ext_dropout_short_term_trainee->ext_level4_female +
                                                            $ext_dropout_short_term_trainee->ext_level5_female }}</td>
                                                    <td>{{ $ext_dropout_short_term_trainee->ext_level1_male +
                                                            $ext_dropout_short_term_trainee->ext_level2_male +
                                                            $ext_dropout_short_term_trainee->ext_level3_male +
                                                            $ext_dropout_short_term_trainee->ext_level4_male +
                                                            $ext_dropout_short_term_trainee->ext_level5_male +
                                                            $ext_dropout_short_term_trainee->ext_level1_female +
                                                            $ext_dropout_short_term_trainee->ext_level2_female +
                                                            $ext_dropout_short_term_trainee->ext_level3_female +
                                                            $ext_dropout_short_term_trainee->ext_level4_female +
                                                            $ext_dropout_short_term_trainee->ext_level5_female }}</td>
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