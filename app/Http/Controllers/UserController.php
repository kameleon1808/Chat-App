<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\FriendRequests;
use App\Models\Friends;
use App\Models\Message;
use App\Models\User;
use App\Models\UsersRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // =============================================================================
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return redirect()->back()->with('success', 'You are now registered successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists on users table'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::attempt($creds)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    // =============================================================================

    public function search(Request $request)
    {
        $user = $request->input('search');

        $users = User::where('email', 'LIKE', "%{$user}%")->get();

        if (count($users) > 0) {
            return view('search-res', compact('users'));
        } else {
            return view('search-res')->with('fail', 'users does not exists');
        }
    }

    public function showProfile($id)
    {

        $data = User::find($id);
        return view('user-info', compact('data'));
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
        $data->delete();
        return redirect()->back()->with('success', 'You are delete request');
    }

    public function comfirm(Request $request, $id)
    {
        $data = FriendRequests::find($id);
        $data->acted_user = Auth::id();
        $data->is_accepted = 1;
        $data->update();

        return redirect()->back()->with('success', 'You are comfirm request');
    }

    public function showFriends(Request $request)
    {
        $chat = Auth::id();

        $users = DB::table('user_friends')
            ->join('users', 'user_friends.user_id', '=', 'users.id')
            ->join('friends', 'user_friends.friend_id', '=', 'friends.id')

            ->where('user_id', '!=', $chat)
            ->get();

        // dd($users);

        return view('chats', compact('users'));
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
        $chat = ChatRoom::where('id', $id)->firstOrFail();
        $user = Auth::id();

        $users = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.user_id')
            ->where('room_id', $chat->id)
            ->get();
        // dd($users);

        return view('chat', compact('users'));
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
        // dd($mess);
        $mess->save();

        return redirect()->back();
    }



    public function deleteFriend($id)
    {
        $data = FriendRequests::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'You are delete friend');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
