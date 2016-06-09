@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Viewing Competency Profile</div>
                    <div class="panel-body">
                        <table class="table table-stripe">
                            <tbody>
                                <tr>
                                    <th>Competency Name :</th>
                                    <td>{{ $competency->name }}</td>
                                </tr>
                                <tr>
                                    <th>Competency Code :</th>
                                    <td>{{ $competency->code }}</td>
                                </tr>
                                <tr>
                                    <th>Occupation Name :</th>
                                    <td>
                                        @if(!is_null($competency->occupation))
                                            {{ $competency->occupation->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sub-sector Name :</th>
                                    <td>
                                        @if(!is_null($competency->occupation) &&
                                            !is_null($competency->occupation->subsector))

                                            {{ $competency->occupation->subsector->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sector Name :</th>
                                    <td>
                                        @if((!is_null($competency->occupation)) &&
                                            (!is_null($competency->occupation->subsector)) &&
                                            (!is_null($competency->occupation->subsector->sector)))

                                            {{ $competency->occupation->subsector->sector->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Is Active? :</th>
                                    <td>
                                        @if($competency->active)
                                            {{ 'True' }}
                                        @else
                                            {{ 'False' }}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection