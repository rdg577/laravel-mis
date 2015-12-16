<?php
$regular_rate = $extension_rate = $rate = 0;

$total_regular_assessed = $student_ratio->assessed()[0]->regular_total;
$total_extension_assessed = $student_ratio->assessed()[0]->extension_total;

if($total_extension_assessed > 0 and $total_regular_assessed > 0) {
    $regular_rate = ($student_ratio->competent()[0]->regular_total / $total_regular_assessed) * 100;
    $extension_rate = ($student_ratio->competent()[0]->extension_total / $total_extension_assessed) * 100;

    $rate = ($student_ratio->competent()[0]->regular_total + $student_ratio->competent()[0]->extension_total) /
            ($total_regular_assessed + $total_extension_assessed) * 100;
}

?>
<div class="col col-lg-6 col-md-6 col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 7 - Assessment Success Rate</div>
        <div class="panel-body">
            <div class="col-lg-6 col-md-6">
                <p>Regular trainees</p>
                <ul class="list-group">
                    <li class="list-group-item">Assessed : {{ $student_ratio->assessed()[0]->regular_total }}</li>
                    <li class="list-group-item">Competent : {{ $student_ratio->competent()[0]->regular_total }}</li>
                    <li class="list-group-item">Success Rate : {{ round($regular_rate, 1) }}%</li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6">
                <p>Extension trainees</p>
                <ul class="list-group">
                    <li class="list-group-item">Assessed : {{ $student_ratio->assessed()[0]->extension_total }}</li>
                    <li class="list-group-item">Competent : {{ $student_ratio->competent()[0]->extension_total }}</li>
                    <li class="list-group-item">Success Rate : {{ round($extension_rate, 1) }}%</li>
                </ul>
            </div>

            <div>
                <p><em>Overall Success Rate => {{ round($rate, 1) }}%</em></p>
            </div>
        </div>
    </div>
</div>