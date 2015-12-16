<?php

?>
<div class="col col-lg-12 col-md-12 col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 8 - Top 3 Occupations</div>
        <div class="panel-body">

            <div class="col-lg-6 col-md-6">
                <p>Regular</p>
                <ul class="list-group">
                    @foreach($student_ratio->top3_occupations_regular() as $o)
                        <?php
                        $occupation = \App\Occupation::find($o->occupation_id)
                        ?>
                        <li class="list-group-item">{{ $occupation->name }} : {{ $o->total }}</li>

                    @endforeach
                </ul>

                <p>Male</p>
                <ul class="list-group">
                    @foreach($student_ratio->top3_occupations_regular_male() as $o)
                        <?php
                        $occupation = \App\Occupation::find($o->occupation_id)
                        ?>
                        <li class="list-group-item">{{ $occupation->name }} : {{ $o->total }}</li>

                    @endforeach
                </ul>

                <p>Female</p>
                <ul class="list-group">
                    @foreach($student_ratio->top3_occupations_regular_female() as $o)
                        <?php
                        $occupation = \App\Occupation::find($o->occupation_id)
                        ?>
                        <li class="list-group-item">{{ $occupation->name }} : {{ $o->total }}</li>

                    @endforeach
                </ul>
            </div>

            <div class="col-lg-6 col-md-6">
                <p>Extension</p>
                <ul class="list-group">
                    @foreach($student_ratio->top3_occupations_extension() as $o)
                        <?php
                        $occupation = \App\Occupation::find($o->occupation_id)
                        ?>
                        <li class="list-group-item">{{ $occupation->name }} : {{ $o->total }}</li>

                    @endforeach
                </ul>

                <p>Male</p>
                <ul class="list-group">
                    @foreach($student_ratio->top3_occupations_extension_male() as $o)
                        <?php
                        $occupation = \App\Occupation::find($o->occupation_id)
                        ?>
                        <li class="list-group-item">{{ $occupation->name }} : {{ $o->total }}</li>

                    @endforeach
                </ul>

                <p>Female</p>
                <ul class="list-group">
                    @foreach($student_ratio->top3_occupations_extension_female() as $o)
                        <?php
                        $occupation = \App\Occupation::find($o->occupation_id)
                        ?>
                        <li class="list-group-item">{{ $occupation->name }} : {{ $o->total }}</li>

                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>