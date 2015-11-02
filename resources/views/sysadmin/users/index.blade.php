@extends('......sysadmin')

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
    <h1>Users</h1>
    <a href="/users/register" title="Add new"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Institution Name</th>
                <th>Region</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->user_type }}</td>
                    <td>{{ $user->institution->name }}</td>
                    <td>{{ $user->region->name }}</td>
                    <td>
                        <a href="users/{{ $user->id }}/edit" title="Edit user"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="users/{{ $user->id }}/delete" title="Delete user"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        <a href="users/{{ $user->id }}" title="View user profile"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Sorry, no records....</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    {!! $users->render() !!}
@stop