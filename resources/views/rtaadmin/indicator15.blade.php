<?php
$kaizen_total_levelA = $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelA_male +
                        $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelA_female;
$kaizen_total_levelB = $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelB_male +
                        $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelB_female;
$kaizen_total_levelC = $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelC_male +
                        $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelC_female;

$entrep_total_levelA = $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelA_male +
                        $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelA_female;
$entrep_total_levelB = $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelB_male +
                        $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelB_female;
$entrep_total_levelC = $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelC_male +
                        $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelC_female;
                
$techskill_total_levelA = $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelA_male +
                        $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelA_female;
$techskill_total_levelB = $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelB_male +
                        $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelB_female;
$techskill_total_levelC = $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelC_male +
                        $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelC_female;
                                
$techtrans_total_levelA = $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelA_male +
                        $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelA_female;
$techtrans_total_levelB = $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelB_male +
                        $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelB_female;
$techtrans_total_levelC = $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelC_male +
                        $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelC_female;
?>
<div class="col col-lg-12 col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 15 - No. of Trainers Capacitated</div>
        <div class="panel-body">
            {{-- Kaizen --}}
            <div class="col col-lg-6 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Kaizen</div>
                    <div class="panel-body">

                        <div class="col-lg-4 col-md-4">
                            <p>Level A</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelA_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelA_female }}</li>
                                <li class="list-group-item">Total : {{ $kaizen_total_levelA }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <p>Level B</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelB_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelB_female }}</li>
                                <li class="list-group-item">Total : {{ $kaizen_total_levelB }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <p>Level C</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelC_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_kaizen()[0]->levelC_female }}</li>
                                <li class="list-group-item">Total : {{ $kaizen_total_levelC }}</li>
                            </ul>
                        </div>

                        <div>
                            <p><em>Total Trainers Capacitated => {{ $kaizen_total_levelA + $kaizen_total_levelB + $kaizen_total_levelC }} </em></p>
                        </div>

                    </div>
                </div>
            </div>
            {{-- END Kaizen --}}

            {{-- Entrepreneurship --}}
            <div class="col col-lg-6 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Entrepreneurship</div>
                    <div class="panel-body">

                        <div class="col-lg-4 col-md-4">
                            <p>Level A</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelA_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelA_female }}</li>
                                <li class="list-group-item">Total : {{ $entrep_total_levelA }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <p>Level B</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelB_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelB_female }}</li>
                                <li class="list-group-item">Total : {{ $entrep_total_levelB }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <p>Level C</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelC_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_entrepreneurship()[0]->levelC_female }}</li>
                                <li class="list-group-item">Total : {{ $entrep_total_levelC }}</li>
                            </ul>
                        </div>

                        <div>
                            <p><em>Total Trainers Capacitated => {{ $entrep_total_levelA + $entrep_total_levelB + $entrep_total_levelC }} </em></p>
                        </div>

                    </div>
                </div>
            </div>
            {{-- END Entrepreneurship --}}

            {{-- Technical Skill --}}
            <div class="col col-lg-6 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Technical Skill</div>
                    <div class="panel-body">

                        <div class="col-lg-4 col-md-4">
                            <p>Level A</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelA_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelA_female }}</li>
                                <li class="list-group-item">Total : {{ $techskill_total_levelA }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <p>Level B</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelB_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelB_female }}</li>
                                <li class="list-group-item">Total : {{ $techskill_total_levelB }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <p>Level C</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelC_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_technical_skill()[0]->levelC_female }}</li>
                                <li class="list-group-item">Total : {{ $techskill_total_levelC }}</li>
                            </ul>
                        </div>

                        <div>
                            <p><em>Total Trainers Capacitated => {{ $techskill_total_levelA + $techskill_total_levelB + $techskill_total_levelC }} </em></p>
                        </div>

                    </div>
                </div>
            </div>
            {{-- END Technical Skill --}}

            {{-- Technology Transfer --}}
            <div class="col col-lg-6 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Technology Transfer</div>
                    <div class="panel-body">

                        <div class="col-lg-4 col-md-4">
                            <p>Level A</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelA_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelA_female }}</li>
                                <li class="list-group-item">Total : {{ $techtrans_total_levelA }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <p>Level B</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelB_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelB_female }}</li>
                                <li class="list-group-item">Total : {{ $techtrans_total_levelB }}</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <p>Level C</p>
                            <ul class="list-group">
                                <li class="list-group-item">Male : {{ $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelC_male }}</li>
                                <li class="list-group-item">Female : {{ $industry_extension->ie_capacitated_trainers_technology_transfer()[0]->levelC_female }}</li>
                                <li class="list-group-item">Total : {{ $techtrans_total_levelC }}</li>
                            </ul>
                        </div>

                        <div>
                            <p><em>Total Trainers Capacitated => {{ $techtrans_total_levelA + $techtrans_total_levelB + $techtrans_total_levelC }} </em></p>
                        </div>

                    </div>
                </div>
            </div>
            {{-- END Technology Transfer --}}


        </div>

    </div>
</div>