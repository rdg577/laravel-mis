@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit job placement on graduates</h1></div>
                    <div class="panel-body">
                        {!! Form::model($job_placement_graduate,
                            [
                                'method' => 'PATCH',
                                'url'=>'/job-placement-graduates/' . $job_placement_graduate->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.job_placement_graduates.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $job_placement_graduate->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection