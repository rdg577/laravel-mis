<?php
    $regions = \App\Region::lists('name', 'id')->sortBy('name');
    $institutions = \App\Institution::lists('name', 'id')->sortBy('name');
?>

<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="form-group">
        {!! Form::label('name', 'School Name : ') !!}
        {!! Form::text('name', null, ['placeholder' => 'School Name',
                                      'class' => 'form-control',
                                      'value' => '{{ old("name") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('year_establish', 'Year Establish : ') !!}
        {!! Form::input('date', 'year_establish', null, ['placeholder' => '', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status : ') !!}
        {!! Form::select('status', array('Cluster Head' => 'Cluster Head',
                                        'Polytechnic College' => 'Polytechnic College',
                                        'College' => 'College',
                                        'Institute' => 'Institute'
                                      ), $status,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('ownership', 'Ownership : ') !!}
        {!! Form::select('ownership', array('Public' => 'Public',
                                        'Private' => 'Private',
                                        'Local NGO' => 'Local NGO',
                                        'International NGO' => 'International NGO'
                                      ), $ownership,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('urban_rural', 'Urban / Rural : ') !!}
        {!! Form::select('urban_rural', array('Urban' => 'Urban',
                                        'Rural' => 'Rural'
                                      ), $urban_rural,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cluster_leader', 'Cluster Head:') !!}
        {!! Form::select('cluster_leader', $institutions, $cluster_leader, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dean_name', 'Dean Name : ') !!}
        {!! Form::text('dean_name', null, ['placeholder' => 'Dean Name',
                                       'class' => 'form-control',
                                       'value' => '{{ old("dean_name") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dean_phone', 'Dean Mobile No. : ') !!}
        {!! Form::text('dean_phone', null, ['placeholder' => 'Dean Mobile No.',
                                       'class' => 'form-control',
                                       'value' => '{{ old("dean_phone") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dean_email', 'Dean Email Address : ') !!}
        {!! Form::input('email', 'dean_email', null, ['placeholder' => 'Dean Email Address',
                                       'class' => 'form-control',
                                       'value' => '{{ old("dean_email") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('po_box', 'P.O. Box Number : ') !!}
        {!! Form::text('po_box', null, ['placeholder' => 'P.O. Box Number',
                                       'class' => 'form-control',
                                       'value' => '{{ old("po_box") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('office_telno', 'Office Telephone Number : ') !!}
        {!! Form::text('office_telno', null, ['placeholder' => 'Office Telephone Number',
                                       'class' => 'form-control',
                                       'value' => '{{ old("office_telno") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('fax', 'Office Fax Number : ') !!}
        {!! Form::text('fax', null, ['placeholder' => 'Office Fax Number',
                                       'class' => 'form-control',
                                       'value' => '{{ old("fax") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('office_email', 'Office Email Address : ') !!}
        {!! Form::input('email', 'office_email', null, ['placeholder' => 'Office Email Address',
                                       'class' => 'form-control',
                                       'value' => '{{ old("office_email") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('website_url', 'Website URL : ') !!}
        {!! Form::text('website_url', null, ['placeholder' => 'Website URL',
                                       'class' => 'form-control',
                                       'value' => '{{ old("website_url") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City : ') !!}
        {!! Form::text('city', null, ['placeholder' => 'City',
                                       'class' => 'form-control',
                                       'value' => '{{ old("city") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sub_city', 'Sub-City : ') !!}
        {!! Form::text('sub_city', null, ['placeholder' => 'Sub-City',
                                       'class' => 'form-control',
                                       'value' => '{{ old("sub_city") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('woreda_zone', 'Woreda / Zone : ') !!}
        {!! Form::text('woreda_zone', null, ['placeholder' => 'Woreda / Zone',
                                       'class' => 'form-control',
                                       'value' => '{{ old("woreda_zone") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('region_id', 'Region:') !!}
        {!! Form::select('region_id', $regions, $region_id, ['class' => 'form-control']) !!}
    </div>

@elseif($submitButtonText=='Save')

    <div class="form-group">
        {!! Form::label('name', 'School Name : ') !!}
        {!! Form::text('name', null, ['placeholder' => 'School Name',
                                      'class' => 'form-control',
                                      'value' => '{{ old("name") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('year_establish', 'Year Establish : ') !!}
        {!! Form::input('date', 'year_establish', null, ['placeholder' => '', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status : ') !!}
        {!! Form::select('status', array('Cluster Head' => 'Cluster Head',
                                        'Polytechnic College' => 'Polytechnic College',
                                        'College' => 'College',
                                        'Institute' => 'Institute'
                                      ), null,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('ownership', 'Ownership : ') !!}
        {!! Form::select('ownership', array('Public' => 'Public',
                                        'Private' => 'Private',
                                        'Local NGO' => 'Local NGO',
                                        'International NGO' => 'International NGO'
                                      ), null,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('urban_rural', 'Urban / Rural : ') !!}
        {!! Form::select('urban_rural', array('Urban' => 'Urban',
                                        'Rural' => 'Rural'
                                      ), null,
                                      ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cluster_leader', 'Cluster Head:') !!}
        {!! Form::select('cluster_leader', $institutions, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dean_name', 'Dean Name : ') !!}
        {!! Form::text('dean_name', null, ['placeholder' => 'Dean Name',
                                       'class' => 'form-control',
                                       'value' => '{{ old("dean_name") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dean_phone', 'Dean Mobile No. : ') !!}
        {!! Form::text('dean_phone', null, ['placeholder' => 'Dean Mobile No.',
                                       'class' => 'form-control',
                                       'value' => '{{ old("dean_phone") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dean_email', 'Dean Email Address : ') !!}
        {!! Form::input('email', 'dean_email', null, ['placeholder' => 'Dean Email Address',
                                       'class' => 'form-control',
                                       'value' => '{{ old("dean_email") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('po_box', 'P.O. Box Number : ') !!}
        {!! Form::text('po_box', null, ['placeholder' => 'P.O. Box Number',
                                       'class' => 'form-control',
                                       'value' => '{{ old("po_box") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('office_telno', 'Office Telephone Number : ') !!}
        {!! Form::text('office_telno', null, ['placeholder' => 'Office Telephone Number',
                                       'class' => 'form-control',
                                       'value' => '{{ old("office_telno") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('fax', 'Office Fax Number : ') !!}
        {!! Form::text('fax', null, ['placeholder' => 'Office Fax Number',
                                       'class' => 'form-control',
                                       'value' => '{{ old("fax") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('office_email', 'Office Email Address : ') !!}
        {!! Form::input('email', 'office_email', null, ['placeholder' => 'Office Email Address',
                                       'class' => 'form-control',
                                       'value' => '{{ old("office_email") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('website_url', 'Website URL : ') !!}
        {!! Form::text('website_url', null, ['placeholder' => 'Website URL',
                                       'class' => 'form-control',
                                       'value' => '{{ old("website_url") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City : ') !!}
        {!! Form::text('city', null, ['placeholder' => 'City',
                                       'class' => 'form-control',
                                       'value' => '{{ old("city") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sub_city', 'Sub-City : ') !!}
        {!! Form::text('sub_city', null, ['placeholder' => 'Sub-City',
                                       'class' => 'form-control',
                                       'value' => '{{ old("sub_city") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('woreda_zone', 'Woreda / Zone : ') !!}
        {!! Form::text('woreda_zone', null, ['placeholder' => 'Woreda / Zone',
                                       'class' => 'form-control',
                                       'value' => '{{ old("woreda_zone") }}']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('region_id', 'Region:') !!}
        {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}
    </div>

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>