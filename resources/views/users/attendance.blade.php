@extends('layouts.app')

@section('content')

<div class='user-content'>
    <div class="row justify-content-center">
        <div class="table-responsive">
            <div class="text-center" id = "title">本日の打刻</div>
            <a>{{ \Carbon\Carbon::now()->format("Y年m月d日") }}</a>
            <table class='table bordered'>
                <thead>
                    <tr>
                        <th>ユーザー名</th>
                        <th>勤務開始</th>
                        <th>勤務終了</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->start_time}}</td>
                        <td>{{ $user->end_time}}</td>
                    </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection