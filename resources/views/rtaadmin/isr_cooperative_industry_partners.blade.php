@extends("rtaadmin.summary_rpt2")

@section("content")

<h1>Cooperative Training on Short-Term Trainees</h1>
<p>Institution: {{ $institution->name }}</p>
<p>Report Schedule : {{ $report_date->petsa }}</p>

<ul class="nav nav-tabs">
<?php
$active = "class=active";
$sectors = $isr->getSectorsFromCooperativeTrainingIndustryPartners();
?>
@foreach($sectors as $sector)
    <li {{ $active }}><a data-toggle="tab" href="#sector-{{ $sector->id }}">{{ $sector->name }}</a> </li>
    <?php $active = ""; ?>
@endforeach
</ul>

<div class="tab-content">
    <?php $active = "in active"; ?>
    @forelse($sectors as $sector)

        <div id="sector-{{ $sector->id }}" class="tab-pane fade {{ $active }}">

        <?php $subsectors = $isr->getSubsectorsFromCooperativeTrainingIndustryPartners($sector->id); ?>
        @foreach($subsectors as $subsector)

            <?php
                $cooperative_trainings = $isr->getOccupationsFromCooperativeTrainingIndustryPartners($subsector->id);
            ?>

            <div class="panel panel-info new_enrollees" style="margin-top: 0.5em;">
                <div class="panel-heading">{{ $subsector->name }}</div>
                <div class="panel-body">

                    @foreach($cooperative_trainings as $cooperative_training)
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $cooperative_training->occupation->name }}</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Micro and Small Enterprises</div>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Name of Company</td>
                                                    <td>{{ $cooperative_training->mse_list }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Signed MoU</td>
                                                    <td>{{ $cooperative_training->mse_mou ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Joined Plan</td>
                                                    <td>{{ $cooperative_training->mse_joint_plan ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>MSE's providing training</td>
                                                    <td>{{ $cooperative_training->mse_training ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Provide trainers in the industry</td>
                                                    <td>{{ $cooperative_training->mse_trainers ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- div class="col-md-4" -->

                                    <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Medium and Large Companies</div>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Name of Company</td>
                                                    <td>{{ $cooperative_training->ml_list }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Signed MoU</td>
                                                    <td>{{ $cooperative_training->ml_mou ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Formed a Joint Plan</td>
                                                    <td>{{ $cooperative_training->ml_joint_plan ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Medium and Large companies providing training</td>
                                                    <td>{{ $cooperative_training->ml_training ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Provide In-Company Trainers</td>
                                                    <td>{{ $cooperative_training->ml_trainers ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- div class="col-md-4" -->

                                    <div class="col-md-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Remarks</div>
                                            <div class="panel-body">
                                                {{ $cooperative_training->remarks }}
                                            </div> <!-- div class="panel-body" -->
                                        </div> <!-- div class="panel panel-default" -->
                                    </div> <!-- div class="col-md-4" -->

                                </div> <!-- div class="row" -->
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>

        @endforeach
        </div>
        <?php $active = ""; ?>
    @empty
        <p class="alert-info">...No records found...</p>
    @endforelse
</div>

@endsection
