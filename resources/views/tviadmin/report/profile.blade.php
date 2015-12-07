<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Profile</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Institution Name:</p>
                            <p><em>{{ $institution->name }}</em></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Office Phone Number:</p>
                            <p><em>{{ $institution->office_telno }}</em></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Year of Establishment:</p>
                            <p><em>{{ $institution->year_establish }}</em></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Ownership:</p>
                            <p><em>{{ $institution->ownership }}</em></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Lead Cluster Institution:</p>
                            <p><em>{{ $institution->c_leader->name }}</em></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>Region:</p>
                            <p><em>{{ $institution->region->name }}</em></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p>City / Town:</p>
                            <p><em>{{ $institution->city }}</em></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>