<?php
$total = $trainer_ratio->levelA()[0]->total + $trainer_ratio->levelB()[0]->total + $trainer_ratio->levelC()[0]->total;
$levelAPercentage = ($trainer_ratio->levelA()[0]->total / $total) * 100;
$levelBPercentage = ($trainer_ratio->levelB()[0]->total / $total) * 100;
$levelCPercentage = ($trainer_ratio->levelC()[0]->total / $total) * 100;
?>
<div class="row">
    <div class="col col-lg-4 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Indicator No. 1 - Trainers Ratio</div>
            <div class="panel-body">
                <div>Level A : {{ $trainer_ratio->levelA()[0]->total }} [ {{ round($levelAPercentage, 1) }} % ]</div>
                <div>Level B : {{ $trainer_ratio->levelB()[0]->total }} [ {{ round($levelBPercentage, 1) }} % ]</div>
                <div>Level C : {{ $trainer_ratio->levelC()[0]->total }} [ {{ round($levelCPercentage, 1) }} % ]</div>
                <div>Total : {{ $total }}</div>
            </div>
        </div>
    </div>
</div>