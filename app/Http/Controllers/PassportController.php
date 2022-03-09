<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passport;
use App\Models\Client;
class PassportController extends Controller
{

    public function index(){
        $clients = Client::all(); 
        return view('/passport/passportadd', compact('clients'));
    }


    // public function create($id){
    //     $data = Client::find($id);
        
    //     if($data){
    //         return response()->json([
    //             'status'=>200,
    //             'client'=>$data
    //         ]);
    //     }
    // }

    public function store(Request $req){

        // $req->validate([
        //     'clientid' => 'required',
        // ]);


        $data = new Passport;

        $data->client_id            = $req->clientid;
        $data->passport_number      = $req->passportnumber;
        $data->	submission_date     = $req->submissiondate;
        $data->	withdraw_date       = $req->withdrawdate;
    
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Passport Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        // $data = Passport::all();

        $data = Client::join('passports', 'clients.id', '=', 'passports.client_id')
               ->get(['clients.*', 'passports.*']);
        

        if($request -> ajax()){
            return response()->json([
                'passport'=>$data,
                
            ]);
        }

        return view('passport/passportlist', ['passports' => $data]);
    }

    public function edit($id){
        $data = Passport::find($id);
        //$clientPass = $data->passport->passport_number;
        //return view('client/clientedit', ['client' => $data]);
        if($data){
            return response()->json([
                'status'=>200,
                'passport'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Passport::find($id);
        // $clientPass = $data->passport->passport_number;
 
        $data->passport_number  = $req->passportnumber;
        $data->submission_date = $req->submissiondate;
        $data->withdraw_date   = $req->withdrawdate;
        // $data->created_by     = $req->clientid;
        //$data->client_pp      = $req->clientpp;

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Passport Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Passport::find($id)->delete($id);
 
         return redirect('passport-list')->with('status', 'Deleted successfully!');
    }

    // public function showPassport($id){
    //     $client = Client::find($id);
    //     $clientPassport = $client->passport->passport_number;
    //     // return $clientPassport;
    //     return response ()->json([
    //         'status'=>200,
    //         'success'=> $clientPassport
    //     ]);
    // }
}
