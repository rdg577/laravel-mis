<?php
$regularMalePercentage = 0;
$regularFemalePercentage = 0;
$extensionMalePercentage = 0;
$extensionFemalePercentage = 0;
$totalFemalePercentage = 0;

$total_students = $student_ratio->total()[0]->total;
$total_regular = $student_ratio->regular()[0]->total;
$total_extension = $student_ratio->extension()[0]->total;

if($total_students > 0 and $total_regular > 0 and $total_extension > 0) {
    $regularMalePercentage = ($student_ratio->regular()[0]->male / $total_regular) * 100;
    $regularFemalePercentage = ($student_ratio->regular()[0]->female / $total_regular) * 100;

    $extensionMalePercentage = ($student_ratio->extension()[0]->male / $total_extension) * 100;
    $extensionFemalePercentage = ($student_ratio->extension()[0]->female / $total_extension) * 100;

    $totalFemalePercentage = (($student_ratio->regular()[0]->female + $student_ratio->extension()[0]->female) / $total_students) * 100;
}

?>
<div class="col col-lg-4 col-md-4 col-sm-4">
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