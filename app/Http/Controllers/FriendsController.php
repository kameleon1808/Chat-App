<?php

namespace App\Http\Controllers;

use App\Models\FriendRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRequests(Request $request)
    {
        $curent_user = Auth::id();

        $users = DB::table('users')
            ->join('friend_requests', 'users.id', '=', 'friend_requests.sender')
            ->where('receiver', $curent_user)
            ->where('is_accepted', null)
            ->get();

        return view('requests', compact('users'));
    }

    public function delete($id)
    {
        $data = FriendRequests::find($id);
        // dd($data);
        dd($data);
        $data->delete();
        return redirect()->back()->with('success', 'You are delete request');
    }

    public function deleteFriend($id)
    {
        $data = FriendRequests::find($id);
        dd($data);
        $data->delete();
        return redirect()->back()->with('success', 'You are delete friend');
    }

    public function showFriends(Request $request)
    {
        $chat = Auth::id();

        $friends = array();
        $f1 = FriendRequests::where('is_accepted', 1)->where('sender', $chat)->get();
        $f1 = FriendRequests::where('sender', $chat)->get();
        foreach ($f1 as $friendship) :
            array_push($friends, User::find($friendship->receiver));
        endforeach;

        $friends2 = array();
        $f2 = FriendRequests::where('is_accepted', 1)->where('receiver', $chat)->get();
        $f2 = FriendRequests::where('receiver', $chat)->get();
        foreach ($f2 as $friendship) :
            array_push($friends, User::find($friendship->sender));
        endforeach;

        $users = array_merge($friends, $friends2);


        return view('friends', compact('users'));
    }



    public function comfirm(Request $request, $id)
    {
        $data = FriendRequests::find($id);
        $data->acted_user = Auth::id();
        $data->is_accepted = 1;
        $data->update();

        return redirect()->back()->with('success', 'You are comfirm request');
    }

    public function sendRequest(Request $request)
    {
        $user_id = $request->input('id');
        $current_user = Auth::id();

        $friend_request = new FriendRequests();
        $friend_request->sender = $current_user;
        $friend_request->receiver = $user_id;
        $friend_request->save();

        return redirect()->back()->with('success', 'You are send request');
    }

    public function index()
    {
        //
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
        //
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
