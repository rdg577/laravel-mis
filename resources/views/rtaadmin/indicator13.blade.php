<?php
$participating_mses = $participating_mls = $registered_mses = $registered_mls = $rate = 0;

$total = $student_ratio->registered_companies()[0]->total;

if($total > 0) {
    $participating_mses = ($student_ratio->cooperative_trainings()[0]->mse  / $total) * 100;
    $participating_mls = ($student_ratio->cooperative_trainings()[0]->medium_large / $total) * 100;

    $registered_mses = ($student_ratio->registered_companies()[0]->mse  / $total) * 100;
    $registered_mls = ($student_ratio->registered_companies()[0]->medium_large / $total) * 100;

    $rate = ($student_ratio->cooperative_trainings()[0]->total) / ($total) * 100;
}

?>
<div class="col col-lg-8 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 13 - Cooperative training company participation rate</div>
        <div class="panel-body">
            <div class="col-lg-6 col-md-6">
                <p>Participating Companies</p>
                <ul class="list-group">
                    <li class="list-group-item">MSEs : {{ $student_ratio->cooperative_trainings()[0]->mse }} [{{ round($participating_mses, 1) }}%]</li>
                    <li class="list-group-item">Medium and Large : {{ $student_ratio->cooperative_trainings()[0]->medium_large }} [{{ round($participating_mls, 1) }}%]</li>
                    <li class="list-group-item">Total : {{ ($student_ratio->cooperative_trainings()[0]->total) }}</li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6">
                <p>Registered Companies</p>
                <ul class="list-group">
                    <li class="list-group-item">MSEs : {{ $student_ratio->registered_companies()[0]->mse }} [{{ round($registered_mses, 1) }}%]</li>
                    <li class="list-group-item">Medium and Large : {{ $student_ratio->registered_companies()[0]->medium_large }} [{{ round($registered_mls, 1) }}%]</li>
                    <li class="list-group-item">Total : {{ $student_ratio->registered_companies()[0]->total }}</li>
                </ul>
            </div>

            <div>
                <p><em>Participation Rate => {{ round($rate, 1) }}%</em></p>
            </div>
        </div>
    </div>
</div>