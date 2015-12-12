<?php
$regular = ($student_ratio->dropouts()[0]->regular / $student_ratio->dropouts()[0]->total) * 100;
$extension = ($student_ratio->dropouts()[0]->extension / $student_ratio->dropouts()[0]->total) * 100;
$short_term = ($student_ratio->dropouts()[0]->short_term / $student_ratio->dropouts()[0]->total) * 100;
?>
<div class="col col-lg-4 col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 11 - Dropouts from the training system</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Trainees</p>
                <ul class="list-group">
                    <li class="list-group-item">Regular  : {{ $student_ratio->dropouts()[0]->regular }} [ {{ round($regular, 1) }}% ]</li>
                    <li class="list-group-item">Extension : {{ $student_ratio->dropouts()[0]->extension }} [ {{ round($extension, 1) }}% ]</li>
                    <li class="list-group-item">Short-term : {{ $student_ratio->dropouts()[0]->short_term }} [ {{ round($short_term, 1) }}% ]</li>
                </ul>
            </div>
        </div>
    </div>
</div>