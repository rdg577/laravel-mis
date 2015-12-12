<?php
$regular_rate = ($student_ratio->competent()[0]->regular_total / $student_ratio->assessed()[0]->regular_total) * 100;
$extension_rate = ($student_ratio->competent()[0]->extension_total / $student_ratio->assessed()[0]->extension_total) * 100;

$rate = ($student_ratio->competent()[0]->regular_total + $student_ratio->competent()[0]->extension_total) /
        ($student_ratio->assessed()[0]->regular_total + $student_ratio->assessed()[0]->extension_total) * 100;
?>
<div class="col col-lg-6 col-md-6">
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