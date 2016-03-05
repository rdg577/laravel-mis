<?php
$micro = $small = $rate = 0;

if($student_ratio->cooperative_trainings()[0]->mse > 0) {
    $micro = $student_ratio->ie_supported_mse()[0]->micro / $student_ratio->cooperative_trainings()[0]->mse * 100;
    $small = $student_ratio->ie_supported_mse()[0]->small / $student_ratio->cooperative_trainings()[0]->mse * 100;

    $rate = ($student_ratio->ie_supported_mse()[0]->micro + $student_ratio->ie_supported_mse()[0]->small) /
            $student_ratio->cooperative_trainings()[0]->mse * 100;
}

?>
<div class="col col-lg-4 col-md-4 col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 14 - Rate of IE supported MSEs</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Enterprises</p>
                <ul class="list-group">
                    <li class="list-group-item">Micro : {{ $student_ratio->ie_supported_mse()[0]->micro }} [{{ round($micro, 1) }}%]</li>
                    <li class="list-group-item">Small : {{ $student_ratio->ie_supported_mse()[0]->small }} [{{ round($small, 1) }}%]</li>
                    <li class="list-group-item">Total : {{ $student_ratio->cooperative_trainings()[0]->mse }}</li>
                </ul>
            </div>

            <div>
                <p><em>Rate of IE supported MSEs => {{ round($rate, 1) }}%</em></p>
            </div>
        </div>
    </div>
</div>