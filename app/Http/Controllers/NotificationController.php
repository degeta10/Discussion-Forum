<?php

namespace App\Http\Controllers;


use DB;
use Auth;

use Session;
use App\User;
use App\Comments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\NotifyUser;

class NotificationController extends Controller
{
    public function get()
    {
        $notifications = Auth::user()->unreadNotifications;
        return $notifications;
    }

    public function send()
    {
        $users = User::all();
        // $users = User::where('id','!=',auth()->user()->id)->get();
        $message = "Laravel sent you a message!";
        foreach ($users as $user) {
            $user->notify(new NotifyUser($message));
        }
        return redirect()->route('home')->with('success' , 'Notification Sent Successfully!');
    }

    public function getComments(Request $request)
    {
        $comments = Comments::with('user')->where('discussion_id',$request->discussion_id)->get();
        $comments->each(function ($item) { $item->setAppends(['comment_time']); });
        return $comments;
    }

    public function sendComment(Request $request)
    {
        if( isset($request->comment) )
        {
            $comment = Comments::create([
                'discussion_id' =>  $request->discussion_id,
                'message' => $request->comment,
                'user_id' => Auth::user()->id,
            ]);

            if($comment)
            {
                $users = User::all();
                $comment = Comments::where('id',$comment->id)->with('user')->first();
                $comment->setAppends(['comment_time']);
                foreach ($users as $user) {
                    $user->notify(new NotifyUser($comment));
                }

                $this->response['result'] = 1;            
                $this->response['status'] = "Success" ;            
                $this->response['message'] = "Message Sent successfully!" ;
                return response()->json($this->response);
            }
            $this->response['result'] = 0;            
            $this->response['status'] = "Error" ;            
            $this->response['message'] = "Message Failed To Send!" ;
            return response()->json($this->response);
        }
    }


}
