<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\Events\MessageSent;


class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chats');
    }

    public function fetchMessages()
    {
        // return Message::with('users')->get();
        return "hif";
    }

    public function sendMessages(Request $request)
    {
        return "hi";
        if(auth() -> user()) {
            $user = auth() -> user();
            return $user['id'];

           $message = new Message;
           $message->user_id = $user['id'];
           $message->message = $request->message;
           $message->save();
           return response()->json($message->getOriginal());
        } else {
            response()->status(422);
        }
        return $request->message;
        // $message = auth()-> user()-> messages() ->create([
        //     'message'=> $request->message
        // ]);

        // broadcast(new MessageSent($message->load('user')))->toOthers();

        // return ['status' => 'success'];
    }
}