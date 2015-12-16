<?php
$regularPercentage = 0;
$extensionPercentage = 0;
$ratio_regular = 0;
$ratio_extension = 0;

$total_trainer = $trainer_ratio->total()[0]->total;
$total_students = $student_ratio->total()[0]->total;

if($total_trainer > 0 and $total_students > 0) {
    $regularPercentage = ($student_ratio->regular()[0]->total / $total_students) * 100;
    $extensionPercentage = ($student_ratio->extension()[0]->total / $total_students) * 100;

    $ratio_regular = $student_ratio->regular()[0]->total / $total_trainer;
    $ratio_extension = $student_ratio->extension()[0]->total / $total_trainer;
}

?>
<div class="col col-lg-4 col-md-4 col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 2 - Teacher:Student Ratio</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Trainees (Student)</p>
                <ul class="list-group">
                    <li class="list-group-item">Regular : {{ $student_ratio->regular()[0]->total }} [{{ round($regularPercentage, 0) }}%]</li>
                    <li class="list-group-item">Extension : {{ $student_ratio->extension()[0]->total }} [{{ round($extensionPercentage, 0) }}%]</li>
                    <li class="list-group-item">Total : {{ $total_students }}</li>
                </ul>
            </div>
            <div><p><em>Teacher-Student(Regular) Ratio => 1 : {{ round($ratio_regular, 1) }}</em></p></div>
            <div><p><em>Teacher-Student(Extension) Ratio => 1 : {{ round($ratio_extension, 1) }}</em></p></div>
        </div>
    </div>
</div>