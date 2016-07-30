<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <input type="hidden" name="institution_id" value="{{ $formal_training->institution->id }}">

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, $formal_training->report_date->id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector_id', 'Sector : ') !!}
        {!! Form::select('sector_id', $sectors, $formal_training->occupation->subsector->sector->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-sub-sectors'),
                                                       'id' => 'sector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('subsector_id', 'Sub-sector : ') !!}
        {!! Form::select('sector_id', $subsectors, $formal_training->occupation->subsector->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-occupations'),
                                                       'id' => 'subsector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('occupation_id', 'Occupation : ') !!}
        {!! Form::select('occupation_id', $occupations, $formal_training->occupation->id,
                                                      ['class' => 'form-control',
                                                       'id' => 'occupation']) !!}
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
        {!! Form::label('regular_male', 'Regulars : ') !!}
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
                    {!! Form::input('number', 'regular_male', null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'regular_female', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('extension_male', 'Extensions : ') !!}
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
                    {!! Form::input('number', 'extension_male', null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'extension_female', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('from_grade10_male', 'From Grade 10 : ') !!}
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
                    {!! Form::input('number', 'from_grade10_male', null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'from_grade10_female', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('from_grade11_male', 'From Grade 11 : ') !!}
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
                    {!! Form::input('number', 'from_grade11_male', null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'from_grade11_female', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('from_grade12_male', 'From Grade 12 : ') !!}
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
                    {!! Form::input('number', 'from_grade12_male', null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'from_grade12_female', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('beyond_grade12_male', 'Beyond Grade 12 : ') !!}
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
                    {!! Form::input('number', 'beyond_grade12_male', null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'beyond_grade12_female', null, ['class' => 'form-control']) !!}
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
        {!! Form::label('cooperative_male', 'Cooperative training : ') !!}
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
                    {!! Form::input('number', 'cooperative_male', null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'cooperative_female', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('noncooperative_male', 'Non-cooperative training : ') !!}
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
                    {!! Form::input('number', 'noncooperative_male', null, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'noncooperative_female', null, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('remarks', 'Remarks : ') !!}
        {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
    </div>

@elseif($submitButtonText=='Save')

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
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
                    {!! Form::input('number', 'below17_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'below17_female', 0, ['class' => 'form-control']) !!}
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
                    {!! Form::input('number', 'from17to19_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'from17to19_female', 0, ['class' => 'form-control']) !!}
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
                    {!! Form::input('number', 'above19_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'above19_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('regular_male', 'Regulars : ') !!}
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
                    {!! Form::input('number', 'regular_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'regular_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('extension_male', 'Extensions : ') !!}
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
                    {!! Form::input('number', 'extension_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'extension_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('from_grade10_male', 'From Grade 10 : ') !!}
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
                    {!! Form::input('number', 'from_grade10_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'from_grade10_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('from_grade11_male', 'From Grade 11 : ') !!}
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
                    {!! Form::input('number', 'from_grade11_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'from_grade11_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('from_grade12_male', 'From Grade 12 : ') !!}
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
                    {!! Form::input('number', 'from_grade12_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'from_grade12_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('beyond_grade12_male', 'Beyond Grade 12 : ') !!}
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
                    {!! Form::input('number', 'beyond_grade12_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'beyond_grade12_female', 0, ['class' => 'form-control']) !!}
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
                    {!! Form::input('number', 'mental_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'mental_female', 0, ['class' => 'form-control']) !!}
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
                    {!! Form::input('number', 'visual_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'visual_female', 0, ['class' => 'form-control']) !!}
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
                    {!! Form::input('number', 'hearing_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'hearing_female', 0, ['class' => 'form-control']) !!}
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
                    {!! Form::input('number', 'physical_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'physical_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('cooperative_male', 'Cooperative training : ') !!}
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
                    {!! Form::input('number', 'cooperative_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'cooperative_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('noncooperative_male', 'Non-cooperative training : ') !!}
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
                    {!! Form::input('number', 'noncooperative_male', 0, ['class' => 'form-control']) !!}
                    </td>
                    <td>
                    {!! Form::input('number', 'noncooperative_female', 0, ['class' => 'form-control']) !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('remarks', 'Remarks : ') !!}
        {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
    </div>
@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>