<?php



?>
<div class="col col-lg-8 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 14B - Number of Disabled Trainees</div>
        <div class="panel-body">
            <div class="col-lg-3 col-md-3">
                <p>Mental</p>
                <ul class="list-group">
                    <li class="list-group-item">Male : {{ $student_ratio->disabilities()[0]->mental_male }}</li>
                    <li class="list-group-item">Female :{{ $student_ratio->disabilities()[0]->mental_female }} </li>
                    <li class="list-group-item">Total : {{ ($student_ratio->disabilities()[0]->mental_male + $student_ratio->disabilities()[0]->mental_female) }}</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3">
                <p>Visual</p>
                <ul class="list-group">
                    <li class="list-group-item">Male : {{ $student_ratio->disabilities()[0]->visual_male }}</li>
                    <li class="list-group-item">Female :{{ $student_ratio->disabilities()[0]->visual_female }} </li>
                    <li class="list-group-item">Total : {{ ($student_ratio->disabilities()[0]->visual_male + $student_ratio->disabilities()[0]->visual_female) }}</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3">
                <p>Hearing</p>
                <ul class="list-group">
                    <li class="list-group-item">Male : {{ $student_ratio->disabilities()[0]->hearing_male }}</li>
                    <li class="list-group-item">Female :{{ $student_ratio->disabilities()[0]->hearing_female }} </li>
                    <li class="list-group-item">Total : {{ ($student_ratio->disabilities()[0]->hearing_male + $student_ratio->disabilities()[0]->hearing_female) }}</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3">
                <p>Physical</p>
                <ul class="list-group">
                    <li class="list-group-item">Male : {{ $student_ratio->disabilities()[0]->physical_male }}</li>
                    <li class="list-group-item">Female :{{ $student_ratio->disabilities()[0]->physical_female }} </li>
                    <li class="list-group-item">Total : {{ ($student_ratio->disabilities()[0]->physical_male + $student_ratio->disabilities()[0]->physical_female) }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>