@extends('layouts.app')

@section('content')
<div class='user-content'>
    <div class="row justify-content-center">
        <div class="text-center" id = "title">ユーザー一覧</div>
        <div class="table-responsive">
            <table class='table bordered'>
                <thead>
                    <tr>
                        <th>ユーザー名</th>
                        <th>メールアドレス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <!--<td>{{link_to_route('users.show','＞＞',['id' => $user->id])}}{{$user->name}}</a></td>--!-->
                        <td>{{$user->name}}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection