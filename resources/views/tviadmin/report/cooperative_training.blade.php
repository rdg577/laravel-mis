<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Number of Companies Participating in Cooperative Training</div>
            <div class="panel-body">
                <?php
                $tmses = $tmls = 0;
                ?>
                @foreach($data_summary_cooperative_trainings->subsectors() as $subsector_id)
                    <?php
                    // get subsector
                    $subsector = \App\Subsector::findOrFail($subsector_id[0]);

                    $mses = $data_summary_cooperative_trainings->mses($subsector->id);
                    $mls = $data_summary_cooperative_trainings->mls($subsector->id);
                    ?>

                    <div class="subsector col-lg-3 col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $subsector->name }}</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <th>&nbsp;</th><th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>MSEs</th>
                                        <td>{{ $mses }}</td>
                                    </tr>
                                    <tr>
                                        <th>Medium / Large</th>
                                        <td>{{ $mls }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>{{ $mses + $mls }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="summary col-lg-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Summary -> Number of Companies Participating in Cooperative Training</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="micro col-lg-4 col-md-4">
                                    <p>MSEs</p>
                                    <p><em>{{ $tmses }}</em></p>
                                </div>
                                <div class="micro col-lg-4 col-md-4">
                                    <p>MEDIUM / LARGE</p>
                                    <p><em>{{ $tmls}}</em></p>
                                </div>
                                <div class="micro col-lg-4 col-md-4">
                                    <p>GRAND TOTAL</p>
                                    <p><em>{{ $tmses + $tmls }}</em></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>