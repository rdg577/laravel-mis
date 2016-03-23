<?php
    $assessed = $industry_extension->ie_mse_operators()[0]->starter_enterprise +
                $industry_extension->ie_mse_operators()[0]->advanced_enterprise +
                $industry_extension->ie_mse_operators()[0]->competent_enterprise;

    $competent = $industry_extension->ie_mse_operators()[0]->competent_enterprise;

    $percentage = 0;

    if($assessed > 0)
        $percentage = ($competent / $assessed) * 100;
?>
<div class="col col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 18 - No. of MSE Operators</div>
        <div class="panel-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">MSEs Assessed and Competent Summary</div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">Assessed : {{ $assessed }}</li>
                                <li class="list-group-item">Competent : {{ $competent==0 ? 0 : $competent }} ({{ number_format($percentage, 2) }} %)</li>
                            </ul>
                        </div>
                    </div>
                    <p></p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Starter</div>
                        <div class="panel-body">
                                <p>No. of Enterprises : </p>
                                <ul class="list-group">
                                    <li class="list-group-item">Total : {{ $industry_extension->ie_mse_operators()[0]->starter_enterprise }}</li>
                                </ul>
                                <p>MSE Operators</p>
                                <ul class="list-group">
                                    <li class="list-group-item">Male : {{ $industry_extension->ie_mse_operators()[0]->starter_mse_operator_male }}</li>
                                    <li class="list-group-item">Female : {{ $industry_extension->ie_mse_operators()[0]->starter_mse_operator_female }}</li>
                                </ul>
                                <p>MSE Operators supported by Industry Extension</p>
                                <ul class="list-group">
                                    <li class="list-group-item">Male : {{ $industry_extension->ie_mse_operators()[0]->starter_mse_operator_supported_male }}</li>
                                    <li class="list-group-item">Female : {{ $industry_extension->ie_mse_operators()[0]->starter_mse_operator_supported_female }}</li>
                                </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Advance</div>
                        <div class="panel-body">
                                <p>No. of Enterprises : </p>
                                <ul class="list-group">
                                    <li class="list-group-item">Total : {{ $industry_extension->ie_mse_operators()[0]->advance_enterprise }}</li>
                                </ul>
                                <p>MSE Operators</p>
                                <ul class="list-group">
                                    <li class="list-group-item">Male : {{ $industry_extension->ie_mse_operators()[0]->advance_mse_operator_male }}</li>
                                    <li class="list-group-item">Female : {{ $industry_extension->ie_mse_operators()[0]->advance_mse_operator_female }}</li>
                                </ul>
                                <p>MSE Operators supported by Industry Extension</p>
                                <ul class="list-group">
                                    <li class="list-group-item">Male : {{ $industry_extension->ie_mse_operators()[0]->advance_mse_operator_supported_male }}</li>
                                    <li class="list-group-item">Female : {{ $industry_extension->ie_mse_operators()[0]->advance_mse_operator_supported_female }}</li>
                                </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Competent</div>
                        <div class="panel-body">
                                <p>No. of Enterprises : </p>
                                <ul class="list-group">
                                    <li class="list-group-item">Total : {{ $industry_extension->ie_mse_operators()[0]->competent_enterprise }}</li>
                                </ul>
                                <p>MSE Operators</p>
                                <ul class="list-group">
                                    <li class="list-group-item">Male : {{ $industry_extension->ie_mse_operators()[0]->competent_mse_operator_male }}</li>
                                    <li class="list-group-item">Female : {{ $industry_extension->ie_mse_operators()[0]->competent_mse_operator_female }}</li>
                                </ul>
                                <p>MSE Operators supported by Industry Extension</p>
                                <ul class="list-group">
                                    <li class="list-group-item">Male : {{ $industry_extension->ie_mse_operators()[0]->competent_mse_operator_supported_male }}</li>
                                    <li class="list-group-item">Female : {{ $industry_extension->ie_mse_operators()[0]->competent_mse_operator_supported_female }}</li>
                                </ul>
                        </div>
                    </div>
                </div>

            </div>
            
            
        </div>
    </div>
</div>