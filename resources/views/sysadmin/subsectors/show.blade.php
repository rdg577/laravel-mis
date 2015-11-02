@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Viewing Sub-sector Profile</div>
                    <div class="panel-body">
                        <table class="table table-stripe">
                            <tbody>
                                <tr>
                                    <th>Sub-sector Name :</th>
                                    <td>{{ $subsector->name }}</td>
                                </tr>
                                <tr>
                                    <th>Sector :</th>
                                    <td>{{ $subsector->sector->name }}</td>
                                </tr>
                                <tr>
                                    <th>Is Active? :</th>
                                    <td>
                                        @if($subsector->active)
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