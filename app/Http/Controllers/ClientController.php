<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Supplier;


use Illuminate\Support\Facades\File;


class ClientController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view('/client/clientadd', compact('suppliers'));
        
    }


    public function store(Request $req){
        $data = new Client;

        $data->client_name     = $req->clientname;
        $data->client_father   = $req->clientfather;
        $data->client_address  = $req->clientaddress;
        $data->client_phone    = $req->clientphone;
        $data->client_nid      = $req->clientnid;
        $data->client_dob      = $req->clientdob;
        $data->client_supplier =$req->suppliername;
        $data->created_by      = $req->clientname;
        //$data->client_pp      = $req->clientpp;

        if ($req -> hasFile('clientpp')) {
            $file = $req -> file ('clientpp');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/client/', $filename);
            $data->client_pp = $filename;
        } 
        
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Client Data Added Successfully'
        ]);
    }


    public function listview(Request $request){
        $data = Client::all();
        $suppliers = Supplier::all();

        if($request -> ajax()){
            return response()->json([
                'client'=>$data,
            ]);
        }

        return view('client/clientlist', ['clients' => $data, 'suppliers' => $suppliers]);
    }


    // public function details($id){
    //     $data = Client::find($id);
    //     return $data;
    //     //return view('client/clientdetails', ['client' => $data]);
    //    // return view('client.clientdetails')->with('clients', $data);
    // }

    public function edit($id){
        $data = Client::find($id);
        //$clientPass = $data->passport->passport_number;
        //return view('client/clientedit', ['client' => $data]);
        if($data){
            return response()->json([
                'status'=>200,
                'client'=>$data,
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Client::find($id);
        // $clientPass = $data->passport->passport_number;

        $data->client_name    = $req->clientname;
        $data->client_father  = $req->clientfather;
        $data->client_address = $req->clientaddress;
        $data->client_phone   = $req->clientphone;
        $data->client_nid     = $req->clientnid;
        
        $data->client_dob     = $req->clientdob;
        $data->client_supplier =$req->suppliername;

        $data->created_by     = $req->clientname;
        //$data->client_pp      = $req->clientpp;

        if ($req -> hasFile('clientpp')) {

            $path = 'uploads/client/'.$data->client_pp;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $req -> file ('clientpp');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/client/', $filename);
            $data->client_pp = $filename;
        } 
        
        $data->save();
        

        return response() -> json([
            'status'=>200,
            'message' => 'Client Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Client::find($id)->delete($id);

        return redirect('client-list')->with('status', 'Deleted successfully!');
    }

}
