<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Time;
use App\User;
use Carbon\Carbon;


class TimeController extends Controller
{
    
    public function start()
    {
        $user = Auth::user();
        $date = Auth::user();
        /**
         * 打刻は1日一回まで
         */
        $oldTime = Time::where('user_id', $user->id)->latest()->first();
        if ($oldTime) {
            $oldTimeStart = new Carbon($oldTime->start_time);
            $oldTimeDay = $oldTimeStart->startOfDay();
        } else {
            $time = Time::create([
                'user_id' => $user->id,
                'date' => Carbon::now()->format('Y-m-d'),
                'start_time' => Carbon::now()->format('H:i:s')
            ]);
            return redirect()->back()->with('my_status', '出勤しました');
        }
        
        
        $newTimeDay = Carbon::today();
        /**
         * 同日に出勤打刻してる場合、かつ直前の退勤打刻がされていない場合エラー
         */
        if (($oldTimeDay == $newTimeDay)&&(empty($oldTime->end_time))){
            return redirect()->back()->with('error', '既に出勤されています');
        }

        $time =Time::create([
            'user_id' => $user->id,
            'date' => Carbon::now()->format('Y-m-d'),
            'start_time' => Carbon::now()->format('H:i:s')
        ]);
        return redirect()->back()->with('my_status','出勤しました');
    }
    
    public function end()
    {
        $user = Auth::user();
        $date = Auth::user();
        $time = Time::where('user_id', $user->id)->latest()->first();
        
        if( !empty($time->end_time)){
            return redirect()->back()->with('error', '本日は既に退勤されているか、出勤打刻がされていません');
        }
        $time->update([
            'date' => Carbon::now()->format('Y-m-d'),
            'end_time' => Carbon::now()->format('H:i:s')
        ]);
        
        return redirect()->back()->with('my_status', '退勤しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
