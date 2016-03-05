<?php
$total_levelA = $industry_extension->ie_capacitated_trainers()[0]->levelA_male +
                $industry_extension->ie_capacitated_trainers()[0]->levelA_female;
$total_levelB = $industry_extension->ie_capacitated_trainers()[0]->levelB_male +
                $industry_extension->ie_capacitated_trainers()[0]->levelB_female;
$total_levelC = $industry_extension->ie_capacitated_trainers()[0]->levelC_male +
                $industry_extension->ie_capacitated_trainers()[0]->levelC_female;
?>
<div class="col col-lg-8 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 15 - No. of Trainers Capacitated</div>
        <div class="panel-body">
            <div class="col-lg-4 col-md-4">
                <p>Level A</p>
                <ul class="list-group">
                    <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers()[0]->levelA_male }}</li>
                    <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers()[0]->levelA_female }}</li>
                    <li class="list-group-item">Total : {{ $total_levelA }}</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-4">
                <p>Level B</p>
                <ul class="list-group">
                    <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers()[0]->levelB_male }}</li>
                    <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers()[0]->levelB_female }}</li>
                    <li class="list-group-item">Total : {{ $total_levelB }}</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-4">
                <p>Level C</p>
                <ul class="list-group">
                    <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers()[0]->levelC_male }}</li>
                    <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers()[0]->levelC_female }}</li>
                    <li class="list-group-item">Total : {{ $total_levelC }}</li>
                </ul>
            </div>

            <div>
                <p><em>Total Trainers Capacitated => {{ $total_levelA + $total_levelB + $total_levelC }} </em></p>
            </div>
        </div>
    </div>
</div>