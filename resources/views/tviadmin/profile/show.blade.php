@extends('tviadmin')

@section('content')
    <div class="flash-message">
        @foreach(['danger', 'warning', 'success', 'info'] as $msg)
            @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">
                    {{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Viewing Institution Profile
                    </div>
                    <div class="panel-body">
                        <a href="/tvi/{{ $institution->id }}/profile-edit" title="Edit institution">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                    </div>
                    <table class="table table-bordered">
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
@endsection