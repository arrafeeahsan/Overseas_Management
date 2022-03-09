<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use App\Mail\TestMail;


class MailController extends Controller
{
    public function store(Request $req){
        $data = new Mail;

        $data->name     = $req->name;
        $data->email   = $req->email;
        $data->subject  = $req->subject;
        $data->message    = $req->message;

        

        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Client Data Added Successfully'
        ]);
    }

    public function messageList(Request $request){
        $data = Mail::all();
        

        if($request -> ajax()){
            return response()->json([
                'mails'=>$data,
            ]);
        }

        return view('support/supportlist', );
    }

    public function destroy($id){
        Mail::find($id)->delete($id);

        return redirect('support-list')->with('status', 'Deleted successfully!');
    }
    

    public function sendMail(){
        
        $details = [
            'title' => "Mail from Overseas",
            'body' => 'Test Mail'
        ];
        
        Mail::to("arrafeeahsan@gmail.com")->send(new TestMail($details));

        return response() -> json([
            'status'=>200,
            'message' => 'Email Sent'
        ]);

    }
}
