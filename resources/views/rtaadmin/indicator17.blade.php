<?php

?>
<div class="col col-lg-6 col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">Indicator No. 17 - No. of Technologies Identified / Transferred</div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12">
                <ul class="list-group">
                    <li class="list-group-item">Technologies Identified : {{ $industry_extension->ie_technologies_identified()[0]->identified_technologies }}</li>
                    <li class="list-group-item">Technologies Transferred : {{ $industry_extension->ie_technologies_identified()[0]->transferred_technologies }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>