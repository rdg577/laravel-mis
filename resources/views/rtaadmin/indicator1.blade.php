<?php
$total = $trainer_ratio->total()[0]->total;
$levelAPercentage = ($trainer_ratio->levelA()[0]->total / $total) * 100;
$levelBPercentage = ($trainer_ratio->levelB()[0]->total / $total) * 100;
$levelCPercentage = ($trainer_ratio->levelC()[0]->total / $total) * 100;
?>
<div class="col col-lg-4 col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 1 - Trainers Ratio</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <p>Level</p>
                <ul class="list-group">
                    <li class="list-group-item">A : {{ $trainer_ratio->levelA()[0]->total }} [{{ round($levelAPercentage, 0) }}%]</li>
                    <li class="list-group-item">B : {{ $trainer_ratio->levelB()[0]->total }} [{{ round($levelBPercentage, 0) }}%]</li>
                    <li class="list-group-item">C : {{ $trainer_ratio->levelC()[0]->total }} [{{ round($levelCPercentage, 0) }}%]</li>
                    <li class="list-group-item">Total : {{ $total }}</li>
                </ul>
            </div>
            <div>
                <p><em>Ratio (A:B:C) => {{ round($levelAPercentage, 0) }}:{{ round($levelBPercentage, 0) }}:{{ round($levelCPercentage, 0) }}</em></p>
            </div>
        </div>
    </div>
</div>