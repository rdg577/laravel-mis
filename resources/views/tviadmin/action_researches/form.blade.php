<div class="col-md-10 col-md-offset-1">

@if($submitButtonText=='Update')

    <input type="hidden" name="institution_id" value="{{ $action_research->institution->id }}">

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('proposal', 'Number of Proposed Action Research : ') !!}
        {!! Form::input('number', 'proposal', null, ['class' => 'form-control']) !!}

        <h6>Proposed Action Research Titles</h6>
        <table class="table table-bordered">
            <tbody>
            @foreach($action_research->titles as $title_entry)
                @if($title_entry->type == 'proposal')
                    <tr>
                        <td width="90%">{{ $title_entry->title }}</td>
                        <td><a onclick="return confirm('This will be permanent...Continue to delete?');" href="/action-research-titles/{{ $title_entry->id }}/delete"><small style="color: red;">Remove</small></a></td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {!! Form::label('completed', 'Completed Action Research : ') !!}
        {!! Form::input('number', 'completed', null, ['class' => 'form-control']) !!}

        <h6>Completed Action Research Titles</h6>
        <table class="table table-bordered">
            <tbody>
            @foreach($action_research->titles as $title_entry)
                @if($title_entry->type == 'completed')
                    <tr>
                        <td width="90%">{{ $title_entry->title }}</td>
                        <td><a onclick="return confirm('This will be permanent...Continue to delete?');" href="/action-research-titles/{{ $title_entry->id }}/delete"><small style="color: red;">Remove</small></a></td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>


@elseif($submitButtonText=='Save')

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('proposal', 'Number of Proposed Action Research : ') !!}
        {!! Form::input('number', 'proposal', 0, ['class' => 'form-control',
                                                    'data-url' => url('load-proposal-fields'),
                                                    'id' => 'proposal']) !!}
    </div>

    <div class="form-group" id="proposed_titles">
        
    </div>

    <div class="form-group">
        {!! Form::label('completed', 'Completed Action Research : ') !!}
        {!! Form::input('number', 'completed', 0, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group" id="completed_titles">

    </div>

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>