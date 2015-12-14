<?php
$reg_level1n2_percentage = 0;
$reg_level3n4_percentage = 0;
$reg_level5_percentage = 0;
$ext_level1n2_percentage = 0;
$ext_level3n4_percentage = 0;
$ext_level5_percentage = 0;

$total_regular = $student_ratio->regular()[0]->total;
$total_extension = $student_ratio->extension()[0]->total;

if($total_regular > 0 and $total_extension > 0) {
    $reg_level1n2_percentage = ($student_ratio->level1n2_regular()[0]->total / $student_ratio->regular()[0]->total) * 100;
    $reg_level3n4_percentage = ($student_ratio->level3n4_regular()[0]->total / $student_ratio->regular()[0]->total) * 100;
    $reg_level5_percentage = ($student_ratio->level5_regular()[0]->total / $student_ratio->regular()[0]->total) * 100;

    $ext_level1n2_percentage = ($student_ratio->level1n2_extension()[0]->total / $student_ratio->extension()[0]->total) * 100;
    $ext_level3n4_percentage = ($student_ratio->level3n4_extension()[0]->total / $student_ratio->extension()[0]->total) * 100;
    $ext_level5_percentage = ($student_ratio->level5_extension()[0]->total / $student_ratio->extension()[0]->total) * 100;
}

?>
<div class="col col-lg-6 col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 6 - Distribution of Trainees per Level</div>
        <div class="panel-body">
            <div class="col-lg-6 col-md-6">
                <p>Regular</p>
                <ul class="list-group">
                    <li class="list-group-item">Level 1 & 2 : {{ $student_ratio->level1n2_regular()[0]->total }}</li>
                    <li class="list-group-item">Level 3 & 4 : {{ $student_ratio->level3n4_regular()[0]->total }}</li>
                    <li class="list-group-item">Level 5 : {{ ($student_ratio->level5_regular()[0]->total == null ? 0 : $student_ratio->level5_regular()[0]->total) }}</li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6">
                <p>Extension</p>
                <ul class="list-group">
                    <li class="list-group-item">Level 1 & 2 : {{ $student_ratio->level1n2_extension()[0]->total }}</li>
                    <li class="list-group-item">Level 3 & 4 : {{ $student_ratio->level3n4_extension()[0]->total }}</li>
                    <li class="list-group-item">Level 5 : {{ ($student_ratio->level5_extension()[0]->total == null ? 0 : $student_ratio->level5_extension()[0]->total) }}</li>
                </ul>
            </div>


            <div>
                <p><em>Regular (1n2 : 3n4 : 5) => {{ round($reg_level1n2_percentage, 1) }}% : {{ round($reg_level3n4_percentage, 1) }}% : {{ round($reg_level5_percentage, 1) }}%</em></p>
                <p><em>Extension (1n2 : 3n4 : 5) => {{ round($ext_level1n2_percentage, 1) }}% : {{ round($ext_level3n4_percentage, 1) }}% : {{ round($ext_level5_percentage, 1) }}%</em></p>
            </div>
        </div>
    </div>
</div>