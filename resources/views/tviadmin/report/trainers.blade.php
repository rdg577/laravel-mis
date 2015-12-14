<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Number of Trainers</div>
            <div class="panel-body">
                <div class="row">
                    <?php

                    $tmaleA = $tfemaleA = $totalA = 0;
                    $tmaleB = $tfemaleB = $totalB = 0;
                    $tmaleC = $tfemaleC = $totalC = 0;

                    ?>

                    @foreach($data_summary_trainers->subsectors() as $subsector)
                        <?php

                        $levelA = $data_summary_trainers->levelA($subsector->id);
                        $levelB = $data_summary_trainers->levelB($subsector->id);
                        $levelC = $data_summary_trainers->levelC($subsector->id);

                        $tmaleA += $levelA[0]->male; $tfemaleA += $levelA[0]->female; $totalA += ($levelA[0]->male + $levelA[0]->female);
                        $tmaleB += $levelB[0]->male; $tfemaleB += $levelB[0]->female; $totalB += ($levelB[0]->male + $levelB[0]->female);
                        $tmaleC += $levelC[0]->male; $tfemaleC += $levelC[0]->female; $totalC += ($levelC[0]->male + $levelC[0]->female);
                        ?>


                        <div class="col-lg-4 col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $subsector->name }}</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th>&nbsp;</th><th>Male</th><th>Female</th><th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Level A</td>
                                            <td>{{ $levelA[0]->male }}</td>
                                            <td>{{ $levelA[0]->female }}</td>
                                            <td>{{ $levelA[0]->total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level B</td>
                                            <td>{{ $levelB[0]->male }}</td>
                                            <td>{{ $levelB[0]->female }}</td>
                                            <td>{{ $levelB[0]->total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Level C</td>
                                            <td>{{ $levelC[0]->male }}</td>
                                            <td>{{ $levelC[0]->female }}</td>
                                            <td>{{ $levelC[0]->total }}</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th>{{ $levelA[0]->male + $levelB[0]->male + $levelC[0]->male }}</th>
                                            <th>{{ $levelA[0]->female + $levelB[0]->female + $levelC[0]->female }}</th>
                                            <th>{{ $levelA[0]->male + $levelB[0]->male + $levelC[0]->male +
                                                            $levelA[0]->female + $levelB[0]->female + $levelC[0]->female}}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">Summary -> Number of Trainers</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>&nbsp;</th><th>Male</th><th>Female</th><th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Level A</td>
                                <td>{{ $tmaleA }}</td>
                                <td>{{ $tfemaleA }}</td>
                                <td>{{ $totalA }}</td>
                            </tr>
                            <tr>
                                <td>Level B</td>
                                <td>{{ $tmaleB }}</td>
                                <td>{{ $tfemaleB }}</td>
                                <td>{{ $totalB }}</td>
                            </tr>
                            <tr>
                                <td>Level C</td>
                                <td>{{ $tmaleC }}</td>
                                <td>{{ $tfemaleC }}</td>
                                <td>{{ $totalC }}</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>TOTAL</th>
                                <th>{{ ($tmaleA + $tmaleB + $tmaleC) }}</th>
                                <th>{{ ($tfemaleA + $tfemaleB + $tfemaleC) }}</th>
                                <th>{{ ($tmaleA + $tmaleB + $tmaleC) + ($tfemaleA + $tfemaleB + $tfemaleC) }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>