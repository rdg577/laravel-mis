<div class="col-md-8 col-md-offset-2">

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
                        <td>List of MSE's</td>
                        <td>
                        {!! Form::input('number', 'mse_list', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Signed MoU</td>
                        <td>
                        {!! Form::input('number', 'mse_mou', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Joint Plan</td>
                        <td>
                        {!! Form::input('number', 'mse_joint_plan', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No. of MSE's providing training</td>
                        <td>
                        {!! Form::input('number', 'mse_training', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No. of trainers in the industry</td>
                        <td>
                        {!! Form::input('number', 'mse_trainers', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Medium and Large Companies</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>List of Medium and Large Companies</td>
                        <td>
                        {!! Form::input('number', 'ml_list', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Signed MoU</td>
                        <td>
                        {!! Form::input('number', 'ml_mou', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Form a Joint Plan</td>
                        <td>
                        {!! Form::input('number', 'ml_joint_plan', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No. of Medium and Large companies providing training</td>
                        <td>
                        {!! Form::input('number', 'ml_training', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No. of In-Company Trainers</td>
                        <td>
                        {!! Form::input('number', 'ml_trainers', null, ['class' => 'form-control']) !!}
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
                        <td>List of MSE's</td>
                        <td>
                        {!! Form::input('number', 'mse_list', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Signed MoU</td>
                        <td>
                        {!! Form::input('number', 'mse_mou', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Joint Plan</td>
                        <td>
                        {!! Form::input('number', 'mse_joint_plan', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No. of MSE's providing training</td>
                        <td>
                        {!! Form::input('number', 'mse_training', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No. of trainers in the industry</td>
                        <td>
                        {!! Form::input('number', 'mse_trainers', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Medium and Large Companies</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>List of Medium and Large Companies</td>
                        <td>
                        {!! Form::input('number', 'ml_list', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Signed MoU</td>
                        <td>
                        {!! Form::input('number', 'ml_mou', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Form a Joint Plan</td>
                        <td>
                        {!! Form::input('number', 'ml_joint_plan', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No. of Medium and Large companies providing training</td>
                        <td>
                        {!! Form::input('number', 'ml_training', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>No. of In-Company Trainers</td>
                        <td>
                        {!! Form::input('number', 'ml_trainers', 0, ['class' => 'form-control']) !!}
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