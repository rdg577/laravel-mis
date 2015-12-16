<?php
$rate = 0;

if($student_ratio->total()[0]->total > 0 or $student_ratio->short_term()[0]->total) {
    $rate = ($student_ratio->short_term()[0]->total / ($student_ratio->total()[0]->total + $student_ratio->short_term()[0]->total)) * 100;
}

?>
<div class="col col-lg-6 col-md-6 col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 5 - Rate of Short Term Trainees</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Trainees</p>
                <ul class="list-group">
                    <li class="list-group-item">Short-term : {{ $student_ratio->short_term()[0]->total }}</li>
                    <li class="list-group-item">Regular : {{ $student_ratio->regular()[0]->total }}</li>
                    <li class="list-group-item">Extension : {{ $student_ratio->extension()[0]->total }}</li>
                    <li class="list-group-item">Total : {{ $student_ratio->total()[0]->total + $student_ratio->short_term()[0]->total }}</li>
                </ul>
            </div>
            <div>
                <p><em>Short-term Trainees Rate => {{ round($rate, 1) }}%</em></p>
            </div>
        </div>
    </div>
</div>