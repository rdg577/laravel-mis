<input type="hidden" name="institution_id" value="{{ $short_term_training->institution->id }}">

<div class="form-group">
    {!! Form::label('report_date_id', 'Report Schedule :') !!}
    {!! Form::select('report_date_id', $report_dates, $short_term_training->report_date->id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('sector_id', 'Sector : ') !!}
    {!! Form::select('sector_id', $sectors, $short_term_training->occupation->subsector->sector->id,
                                                  ['class' => 'form-control',
                                                   'data-url' => url('load-sub-sectors'),
                                                   'id' => 'sector']) !!}
</div>

<div class="form-group">
    {!! Form::label('subsector_id', 'Sub-sector : ') !!}
    {!! Form::select('sector_id', $subsectors, $short_term_training->occupation->subsector->id,
                                                  ['class' => 'form-control',
                                                   'data-url' => url('load-occupations'),
                                                   'id' => 'subsector']) !!}
</div>

<div class="form-group">
    {!! Form::label('occupation_id', 'Occupation : ') !!}
    {!! Form::select('occupation_id', $occupations, $short_term_training->occupation->id,
                                                  ['class' => 'form-control',
                                                   'data-url' => url('load-competencies'),
                                                   'id' => 'occupation']) !!}
</div>

<div class="form-group">
    {!! Form::label('competency_id', 'Unit of Competency : ') !!}
    {!! Form::select('competency_id', $competencies, $short_term_training->competency_id,
                                                  ['class' => 'form-control',
                                                   'id' => 'competency']) !!}
</div>

<div class="form-group">
    {!! Form::label('course_started', 'Course started : ') !!}
    {!! Form::input('date', 'course_started', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('course_ended', 'Course ended : ') !!}
    {!! Form::input('date', 'course_ended', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('below17_male', 'Age below 17 years old : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'below17_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'below17_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('from17to19_male', 'Age between 17 and 19 years old : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'from17to19_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'from17to19_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('above19_male', 'Age above 19 years old : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'above19_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'above19_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('no_education_male', 'No Education : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'no_education_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'no_education_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('elementary_male', 'Elementary : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'elementary_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'elementary_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('high_school_male', 'High School : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'high_school_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'high_school_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('preparatory_male', 'Preparatory : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'preparatory_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'preparatory_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('higher_education_male', 'Higher Education : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'higher_education_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'higher_education_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('mental_male', 'Mental disabilities : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'mental_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'mental_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('visual_male', 'Visual disabilities : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'visual_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'visual_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('hearing_male', 'Hearing disabilities : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'hearing_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'hearing_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('physical_male', 'Physical disabilities : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Male</td>
                <td>Female</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'physical_male', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'physical_female', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('cooperative', 'Modalities : ') !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Cooperative Training</td>
                <td>Non-Cooperative Training</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                {!! Form::input('number', 'cooperative', null, ['class' => 'form-control']) !!}
                </td>
                <td>
                {!! Form::input('number', 'non_cooperative', null, ['class' => 'form-control']) !!}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="form-group">
    {!! Form::label('remarks', 'Remarks : ') !!}
    {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
</div>