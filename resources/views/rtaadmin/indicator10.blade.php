<?php
$below17s = $from17to19s = $above19s = 0;

if($student_ratio->ages()[0]->total > 0) {
    $below17s = ($student_ratio->ages()[0]->below17 / $student_ratio->ages()[0]->total) * 100;
    $from17to19s = ($student_ratio->ages()[0]->from17to19 / $student_ratio->ages()[0]->total) * 100;
    $above19s = ($student_ratio->ages()[0]->above19 / $student_ratio->ages()[0]->total) * 100;
}
?>
<div class="col col-lg-4 col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 10 - Young people in the training system</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Ages</p>
                <ul class="list-group">
                    <li class="list-group-item">Below 17 years old  : {{ $student_ratio->ages()[0]->below17 }} [ {{ round($below17s, 1) }}% ]</li>
                    <li class="list-group-item">From 17 to 19 years old : {{ $student_ratio->ages()[0]->from17to19 }} [ {{ round($from17to19s, 1) }}% ]</li>
                    <li class="list-group-item">Above 19 years old : {{ $student_ratio->ages()[0]->above19 }} [ {{ round($above19s, 1) }}% ]</li>
                </ul>
            </div>
        </div>
    </div>
</div>