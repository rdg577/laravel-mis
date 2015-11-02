<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $assessment->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Date :') !!}
            {!! Form::select('report_date_id', $report_dates, $assessment->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $assessment->occupation->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('sector_id', $subsectors, $assessment->occupation->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('occupation_id', 'Occupation : ') !!}
            {!! Form::select('occupation_id', $occupations, $assessment->occupation->id,
                                                          ['class' => 'form-control',
                                                           'id' => 'occupation']) !!}
        </div>

        <div class="form-group">
            <h4 class="well">Assessed :</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Regular</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'assessed_regular_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'assessed_regular_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Extension</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'assessed_extension_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'assessed_extension_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Short-Term</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'assessed_short_term_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'assessed_short_term_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <h4 class="well">Competent :</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Regular</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'competent_regular_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'competent_regular_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Extension</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'competent_extension_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'competent_extension_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Short-Term</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'competent_short_term_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'competent_short_term_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div> {{--div class="update-form"--}}

@elseif($submitButtonText=='Save')

    <div class="create-form">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Date :') !!}
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
            <h4 class="well">Assessed :</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Regular</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'assessed_regular_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'assessed_regular_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>            
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Extension</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'assessed_extension_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'assessed_extension_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Short-Term</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'assessed_short_term_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'assessed_short_term_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="form-group">
            <h4 class="well">Competent :</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Regular</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'competent_regular_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'competent_regular_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>            
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Extension</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'competent_extension_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'competent_extension_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Short-Term</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        {!! Form::input('number', 'competent_short_term_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'competent_short_term_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div> {{--div class="create-form"--}}

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>