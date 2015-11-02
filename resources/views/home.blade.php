@if($user->user_type == 'System Administrator')
    <?php $page = 'sysadmin' ?>
@elseif($user->user_type == 'TVI Administrator')
    <?php $page = 'tviadmin' ?>
@endif

@extends($page)

@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="col-lg-offset-1">
                <img src="{{ URL::asset('img/tvetbanner.png') }}" alt="Management Information System" class="img-responsive" width="100%">
            </div>
        </div>
    </div>
@stop