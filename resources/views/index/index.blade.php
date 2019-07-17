@extends('layouts.app')

@section('content')
<div class='user-content'>
    <div class="row justify-content-center">
        <div class="text-center" id = "title">
            {!! link_to_route('users.attendance', '本日の打刻', [], ['class' => 'btn btn-lg btn-primary']) !!}
            {!! link_to_route('users.users', 'ユーザー一覧', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
</div>

@endsection