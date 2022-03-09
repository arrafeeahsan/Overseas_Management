<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index(){
        return view('/vendor/vendoradd');
    }

    public function store(Request $req){
        $data = new Vendor;

        $data->vendor_name        = $req->vendorname;
        $data->vendor_address     = $req->vendoraddress;
        $data->vendor_contact     = $req->vendorcontact;
        //$data->created_by         = $req->vendorname;
    
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Vendor Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        $data = Vendor::all();

        if($request -> ajax()){
            return response()->json([
                'vendor'=>$data,
            ]);
        }

        return view('vendor/vendorlist', ['vendors' => $data]);
    }

    public function edit($id){
        $data = Vendor::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'vendor'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Vendor::find($id);

        $data->vendor_name    = $req->vendorname;
        $data->vendor_address  = $req->vendoraddress;
        $data->vendor_contact = $req->vendorcontact;

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Vendor Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Vendor::find($id)->delete($id);
 
         return redirect('vendor-list')->with('status', 'Deleted successfully!');
    }
}
