@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Viewing Occupation Profile</div>
                    <div class="panel-body">
                        <table class="table table-stripe">
                            <tbody>
                                <tr>
                                    <th>Occupation Name :</th>
                                    <td>{{ $occupation->name }}</td>
                                </tr>
                                <tr>
                                    <th>Level :</th>
                                    <td>{{ $occupation->level }}</td>
                                </tr>
                                <tr>
                                    <th>Sub-sector Name :</th>
                                    <td>
                                        @if(!is_null($occupation->subsector))
                                            {{ $occupation->subsector->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sector Name :</th>
                                    <td>
                                        @if(!is_null($occupation->subsector) &&
                                            !is_null($occupation->subsector->sector))

                                            {{ $occupation->subsector->sector->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Is Active? :</th>
                                    <td>
                                        @if($occupation->active)
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