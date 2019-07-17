<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use App\User;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user() == true && \Auth::user()-> admin_flag == false){
            return redirect()->route('users.show',['id'=>\Auth::user()->id ]);
        } else if(\Auth::user() == true && \Auth::user()-> admin_flag == true){
            return view('index.index');
        } else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(\Auth::user()->id != $id){
            return redirect()->route('users.show',['id'=>\Auth::user()->id ]);  
        };
        
        $user = \Auth::user();
        $time = $user->attendance()->orderBy('created_at', 'desc')->paginate(20);
        
          
          return view('users.show',[
              'user'=>$user,
              'times'=>$time
              ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    public function users()
    {
        $users= User::all();
        return view('users.user',[
            'users'=>$users,
            ]);
    }
    
    public function attendance()
    {
        $users= User::all();
        return view('users.attendance',[
            'users'=>$users,
            ]);
    }


}
