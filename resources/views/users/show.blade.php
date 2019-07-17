@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="user-content">
        <div class="text-center" id ="title">{{ \Carbon\Carbon::now()->format("Y年m月d日 H:i:s") }}</div>
        <div class="button-form">
            <ul>
                <li>
                    <form action="{{ route('time.start_time') }}" method="POST">
                        {{ csrf_field() }}
                    <button type="submit" class ="btn btn-primary btn-lg">出勤</button>
                    </form>
                </li>
                <li>
                    <form action="{{ route('time.end_time') }}" method="POST">
                        {{ csrf_field() }}
                    <button type="submit" class ="btn btn-success btn-lg">退勤</button>
                    </form>
                </li>
            </ul>
        </div>
        @if (session('my_status'))
            <div class="alert alert-success">
                {{ session('my_status') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table bordered">
                <thead>
                    <tr>
                        <th>勤務日</th>
                        <th>開始時刻</th>
                        <th>終了時刻</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($times as $time)
                    <tr>
                        <td>{{ $time->date }}</td>
                        <td>{{ $time->start_time }}</td>
                        <td>{{ $time->end_time }}</td>
                    </tr>
                     @endforeach
                </tbody>
            </table>
         </div>
    </div>
</div>
@endsection