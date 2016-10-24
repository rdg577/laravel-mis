<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $cooperative_training->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Schedule :') !!}
            {!! Form::select('report_date_id', $report_dates, $cooperative_training->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $cooperative_training->occupation->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('sector_id', $subsectors, $cooperative_training->occupation->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('occupation_id', 'Occupation : ') !!}
            {!! Form::select('occupation_id', $occupations, $cooperative_training->occupation->id,
                                                          ['class' => 'form-control',
                                                           'id' => 'occupation']) !!}
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Micro and Small Enterprises</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name of Company</td>
                        <td>
                        {!! Form::text('mse_list', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Signed MoU</td>
                        <td>
                        {!! Form::select('mse_mou', array('0' => 'No', '1' => 'Yes'), $cooperative_training->mse_mou,
                                                                                ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Joined Plan</td>
                        <td>
                        {!! Form::select('mse_joint_plan', array('0' => 'No', '1' => 'Yes'),
                                                                                $cooperative_training->mse_joint_plan,
                                                                                ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>MSEs provide training</td>
                        <td>
                        {!! Form::select('mse_training', array('0' => 'No', '1' => 'Yes'),
                                                                                $cooperative_training->mse_training,
                                                                                ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Provide trainers in the industry</td>
                        <td>
                            {!! Form::select('mse_trainers', array('0' => 'No', '1' => 'Yes'),
                                                                                $cooperative_training->mse_trainers,
                                                                                ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Medium and Large Enterprises</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Name of Company</td>
                    <td>
                        {!! Form::text('ml_list', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Signed MoU</td>
                    <td>
                        {!! Form::select('ml_mou', array('0' => 'No', '1' => 'Yes'), $cooperative_training->ml_mou,
                                                                                ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Formed Joint Plan</td>
                    <td>
                        {!! Form::select('ml_joint_plan', array('0' => 'No', '1' => 'Yes'),
                                                                                $cooperative_training->ml_joint_plan,
                                                                                ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>MLEs provide training</td>
                    <td>
                        {!! Form::select('ml_training', array('0' => 'No', '1' => 'Yes'),
                                                                                $cooperative_training->ml_training,
                                                                                ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Provide In-company trainers</td>
                    <td>
                        {!! Form::select('ml_trainers', array('0' => 'No', '1' => 'Yes'),
                                                                                $cooperative_training->ml_trainers,
                                                                                ['class' => 'form-control']) !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            {!! Form::label('remarks', 'Remarks : ') !!}
            {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
        </div>

    </div> {{--div class="update-form"--}}

@elseif($submitButtonText=='Save')

    <div class="create-form">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Schedule :') !!}
            {!! Form::select('report_date_id', $report_dates, $report_date_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, null, ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('sector_id', array('- select sector first -'), null, ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('occupation_id', 'Occupation : ') !!}
            {!! Form::select('occupation_id', array('- select sub-sector first -'), null, ['class' => 'form-control',
                                                           'id' => 'occupation']) !!}
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Micro and Small Enterprises</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Name of Company</td>
                    <td>
                        {!! Form::text('mse_list', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Signed MoU</td>
                    <td>
                        {!! Form::select('mse_mou', array('0' => 'No', '1' => 'Yes'), null,
                                                            ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Joined Plan</td>
                    <td>
                        {!! Form::select('mse_joint_plan', array('0' => 'No', '1' => 'Yes'),
                                                            null,
                                                            ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>MSEs provide training</td>
                    <td>
                        {!! Form::select('mse_training', array('0' => 'No', '1' => 'Yes'),
                                                            null,
                                                            ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Provide trainers in the industry</td>
                    <td>
                        {!! Form::select('mse_trainers', array('0' => 'No', '1' => 'Yes'),
                                                            null,
                                                            ['class' => 'form-control']) !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Medium and Large Enterprises</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Name of Company</td>
                    <td>
                        {!! Form::text('ml_list', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Signed MoU</td>
                    <td>
                        {!! Form::select('ml_mou', array('0' => 'No', '1' => 'Yes'), null,
                                                            ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Formed a Joint Plan</td>
                    <td>
                        {!! Form::select('ml_joint_plan', array('0' => 'No', '1' => 'Yes'),
                                                            null,
                                                            ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>MLEs provide training</td>
                    <td>
                        {!! Form::select('ml_training', array('0' => 'No', '1' => 'Yes'),
                                                            null,
                                                            ['class' => 'form-control']) !!}
                    </td>
                </tr>
                <tr>
                    <td>Provide In-company trainers</td>
                    <td>
                        {!! Form::select('ml_trainers', array('0' => 'No', '1' => 'Yes'),
                                                            null,
                                                            ['class' => 'form-control']) !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            {!! Form::label('remarks', 'Remarks : ') !!}
            {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
        </div>

    </div> {{--div class="create-form"--}}

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>