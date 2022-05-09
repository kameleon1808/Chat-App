<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\UsersRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChatRooms()
    {
        $chat = Auth::id();

        $users = DB::table('users_rooms')
            ->join('chat_rooms', 'users_rooms.room_id', '=', 'chat_rooms.id')
            ->join('users', 'users_rooms.user_id', '=', 'users.id')
            ->where('user_id', $chat)
            ->get();

        return view('chats', compact('users'));
    }

    public function showChat($id)
    {
        $chat = ChatRoom::where('id', $id)->orderBy('created_at')->firstOrFail();
        $user = Auth::id();
        $room_id = $chat->id;

        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.user_id')
            ->where('messages.room_id', $chat->id)
            ->get();

        return view('chat', compact('users', 'room_id'));
    }

    public function deleteMessage($id)
    {
        $data = Message::find($id);
        // dd($data->user_id == Auth::id());

        if ($data->user_id == Auth::id()) {
            $data->delete();
            return redirect()->back()->with('success', 'You are delete message');
        } else {
            return redirect()->back()->with('warrning', 'You cant delete this message');
        }
    }

    public function createChatRoom(Request $request)
    {
        DB::beginTransaction();

        $user_1 = Auth::id();
        $user_2 = $request->input('user_id');
        $chat_name = $user_1 . '-' . $user_2;

        $chat = ChatRoom::where('name', $chat_name)->first();

        $users = DB::table('users_rooms')
            ->join('chat_rooms', 'users_rooms.room_id', '=', 'chat_rooms.id')
            ->join('users', 'users_rooms.user_id', '=', 'users.id')
            ->where('user_id', Auth::id())
            ->get();

        if ($chat) {
            return view('chats', compact('users'));
        } else {

            $chat_room = ChatRoom::create([
                'name' => $chat_name
            ]);

            $users_rooms = UsersRoom::create([
                'room_id' => $chat_room->id,
                'user_id' => $user_1,
            ]);

            $users_rooms2 = UsersRoom::create([
                'room_id' => $chat_room->id,
                'user_id' => $user_2,
            ]);
            DB::commit();

            return redirect()->back()->with('success', 'You are created chat room');
        }
    }

    public function createMessage(Request $request)
    {
        $message_text = $request->input('message');
        $user_id = Auth::id();
        $room_id = $request->input('room_id');

        $mess = new Message();
        $mess->message_text = $message_text;
        $mess->user_id = $user_id;
        $mess->room_id = $room_id;
        $mess->save();

        return redirect()->back();
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
