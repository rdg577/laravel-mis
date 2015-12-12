<?php
$total = $student_ratio->total()[0]->total;

$regular_rate = ($student_ratio->assessed()[0]->regular_total / $total) * 100;
$extension_rate = ($student_ratio->assessed()[0]->extension_total / $total) * 100;

$rate = ($student_ratio->assessed()[0]->regular_total + $student_ratio->assessed()[0]->extension_total) / ($total) * 100;
?>
<div class="col col-lg-4 col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 12 - Share of trainees taking CoC exams</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Trainees</p>
                <ul class="list-group">
                    <li class="list-group-item">Regular : {{ $student_ratio->assessed()[0]->regular_total }} [{{ round($regular_rate, 1) }}%]</li>
                    <li class="list-group-item">Extension : {{ $student_ratio->assessed()[0]->extension_total }} [{{ round($extension_rate, 1) }}%]</li>
                    <li class="list-group-item">Total : {{ ($student_ratio->assessed()[0]->regular_total + $student_ratio->assessed()[0]->extension_total) }}</li>
                </ul>
            </div>

            <div>
                <p><em>CoC Examinees Share Rate => {{ round($rate, 1) }}%</em></p>
            </div>
        </div>
    </div>
</div>