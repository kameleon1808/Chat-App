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
