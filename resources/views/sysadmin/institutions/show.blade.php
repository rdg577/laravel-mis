@extends('sysadmin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Viewing Institution Profile</div>
                    <div class="panel-body">
                        <table class="table table-stripe">
                            <tbody>
                                    <tr>
                                        <th>Name :</th>
                                        <td>{{ $institution->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dean :</th>
                                        <td>
                                            {{ $institution->dean_name }}<br>
                                            {{ $institution->dean_phone }}<br>
                                            {{ $institution->dean_email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Year Established :</th>
                                        <td>{{ $institution->year_establish }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ownership :</th>
                                        <td>{{ $institution->ownership }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status :</th>
                                        <td>{{ $institution->status }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact details :</th>
                                        <td>
                                            Office/Fax : {{ $institution->office_telno }} / {{ $institution->fax }}<br>
                                            P.O. Box No : {{ $institution->po_box }}<br>
                                            Email : {{ $institution->office_email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>City :</th>
                                        <td>{{ $institution->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>Region :</th>
                                        <td>{{ $institution->region->name }}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection