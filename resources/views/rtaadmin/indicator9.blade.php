<?php
$mses = $mls = 0;

if($student_ratio->cooperative_trainings()[0]->total > 0) {
    $mses = ($student_ratio->cooperative_trainings()[0]->mse / $student_ratio->cooperative_trainings()[0]->total) * 100;
    $mls = ($student_ratio->cooperative_trainings()[0]->medium_large / $student_ratio->cooperative_trainings()[0]->total) * 100;
}

?>
<div class="col col-lg-4 col-md-4 col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 9 - Companies providing cooperative training</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Companies</p>
                <ul class="list-group">
                    <li class="list-group-item">MSEs : {{ $student_ratio->cooperative_trainings()[0]->mse }} [ {{ round($mses, 1) }}% ]</li>
                    <li class="list-group-item">Medium and Large : {{ $student_ratio->cooperative_trainings()[0]->medium_large }} [ {{ round($mls, 1) }}% ]</li>
                    <li class="list-group-item">Total : {{ $student_ratio->cooperative_trainings()[0]->total  }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>