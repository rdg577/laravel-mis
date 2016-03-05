<?php

?>
<div class="col col-lg-6 col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 16 - No. of Companies Supported in Industry Extension</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <ul class="list-group">
                    <li class="list-group-item">Micro : {{ $industry_extension->ie_companies_supported()[0]->micro_companies }}</li>
                    <li class="list-group-item">Small : {{ $industry_extension->ie_companies_supported()[0]->small_companies }}</li>
                    <li class="list-group-item">Medium : {{ $industry_extension->ie_companies_supported()[0]->medium_companies }}</li>
                    <li class="list-group-item">Total : {{ $industry_extension->ie_companies_supported()[0]->micro_companies +
                                      $industry_extension->ie_companies_supported()[0]->small_companies +
                                      $industry_extension->ie_companies_supported()[0]->medium_companies}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>