<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Industry Extension</div>
            <div class="panel-body">
                <?php
                $tmicro = $tsmall = $tmedium = 0;
                ?>

                @foreach($data_summary_industry_extension->subsectors() as $subsector)
                    <?php
                    $micro = $data_summary_industry_extension->micro($subsector->id);
                    $small = $data_summary_industry_extension->small($subsector->id);
                    $medium = $data_summary_industry_extension->medium($subsector->id);

                    $tmicro += $micro;
                    $tsmall += $small;
                    $tmedium += $medium;
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
                                        <th>Micro</th>
                                        <td>{{ $micro }}</td>
                                    </tr>
                                    <tr>
                                        <th>Small</th>
                                        <td>{{ $small }}</td>
                                    </tr>

                                    <tr>
                                        <th>Medium</th>
                                        <td>{{ $medium }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>{{ $micro + $small + $medium }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="summary col-lg-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Summary -> Industry Extension</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="micro col-lg-3 col-md-3">
                                    <p>MICRO</p>
                                    <p><em>{{ $tmicro }}</em></p>
                                </div>
                                <div class="micro col-lg-3 col-md-3">
                                    <p>SMALL</p>
                                    <p><em>{{ $tsmall }}</em></p>
                                </div>
                                <div class="micro col-lg-3 col-md-3">
                                    <p>MEDIUM</p>
                                    <p><em>{{ $tmedium }}</em></p>
                                </div>
                                <div class="micro col-lg-3 col-md-3">
                                    <p>GRAND TOTAL</p>
                                    <p><em>{{ $tmicro + $tsmall + $tmedium }}</em></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>