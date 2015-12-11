<?php
$total_students = $student_ratio->total()[0]->total;

$regularMalePercentage = ($student_ratio->regular()[0]->male / $student_ratio->regular()[0]->total) * 100;
$regularFemalePercentage = ($student_ratio->regular()[0]->female / $student_ratio->regular()[0]->total) * 100;

$extensionMalePercentage = ($student_ratio->extension()[0]->male / $student_ratio->extension()[0]->total) * 100;
$extensionFemalePercentage = ($student_ratio->extension()[0]->female / $student_ratio->extension()[0]->total) * 100;

$total_female_students = ($student_ratio->regular()[0]->female + $student_ratio->extension()[0]->female);
$totalFemalePercentage = ($total_female_students / $total_students) * 100;
?>
<div class="col col-lg-4 col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 3 - Share of Female Trainees</div>
        <div class="panel-body">
            <div class="col-lg-6 col-md-6">
                <p>Regular</p>
                <ul class="list-group">
                    <li class="list-group-item">M : {{ $student_ratio->regular()[0]->male }} [{{ round($regularMalePercentage,0) }}%]</li>
                    <li class="list-group-item">F : {{ $student_ratio->regular()[0]->female }} [{{ round($regularFemalePercentage,0) }}%]</li>
                    <li class="list-group-item">Total : {{ $student_ratio->regular()[0]->total }}</li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6">
                <p>Extension</p>
                <ul class="list-group">
                    <li class="list-group-item">M : {{ $student_ratio->extension()[0]->male }} [{{ round($extensionMalePercentage,0) }}%]</li>
                    <li class="list-group-item">F : {{ $student_ratio->extension()[0]->female }} [{{ round($extensionFemalePercentage,0) }}%]</li>
                    <li class="list-group-item">Total : {{ $student_ratio->extension()[0]->total }}</li>
                </ul>
            </div>
            <div><p><em>Share of Female Trainees => {{ round($totalFemalePercentage, 1) }}%</em></p></div>
        </div>
    </div>
</div>