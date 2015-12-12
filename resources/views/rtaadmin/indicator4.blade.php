<?php
$ratio = ($student_ratio->extension()[0]->total / $student_ratio->regular()[0]->total);
?>
<div class="col col-lg-6 col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 4 - Regular-Extension Trainee Ratio</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Trainees</p>
                <ul class="list-group">
                    <li class="list-group-item">Regular : {{ $student_ratio->regular()[0]->total }}</li>
                    <li class="list-group-item">Extension : {{ $student_ratio->extension()[0]->total }}</li>
                    <li class="list-group-item">Total : {{ $student_ratio->total()[0]->total }}</li>
                </ul>
            </div>
            <div>
                <p><em>Regular-Extension Ratio => 1 : {{ round($ratio, 1) }}</em></p>
            </div>
        </div>
    </div>
</div>