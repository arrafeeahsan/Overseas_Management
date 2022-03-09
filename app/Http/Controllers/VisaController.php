<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visa;
use App\Models\Client;
use App\Models\Vendor;

class VisaController extends Controller
{
    // public function index(){
    //     return view('/visa/visaadd');
    // }

    public function index(){
        $clients = Client::all(); 
        $vendors = Vendor::all();
        return view('/visa/visaadd', compact('clients', 'vendors'));
    }

    public function store(Request $req){
        $data = new Visa;

        $data->client_id            = $req->clientid;
        $data->visa_number          = $req->visanumber;
        $data->company_name         = $req->companyname;
        $data->visa_type            = $req->visatype;
        $data->vendor_name          = $req->vendorname;
        $data->visa_status          = $req->visastatus;
        $data->ambassador_paid_date = $req->ambassadorpaiddate;
        $data->visa_expiry_date     = $req->visaexpirydate;
        $data->applied_person_name  = $req->appliedpersonname;
        $data->reference_supplier   = $req->referencesupplier;
        //$data->created_by           = $req->suppliername;
    
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Visa Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        // $data = Visa::all();
        $vendors = Vendor::all();

        $data = Client::join('visas', 'clients.id', '=', 'visas.client_id')
            ->get(['clients.*', 'visas.*']);

        if($request -> ajax()){
            return response()->json([
                'visa'=>$data,
            ]);
        }

        return view('visa/visalist', ['visas' => $data, 'vendors' => $vendors]);
    }

    public function edit($id){
        $data = Visa::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'visa'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Visa::find($id);

        // $data->client_id            = $req->clientid;
        $data->visa_number          = $req->visanumber;
        $data->company_name         = $req->companyname;
        $data->visa_type            = $req->visatype;
        $data->vendor_name          = $req->vendorname;
        $data->visa_status          = $req->visastatus;
        $data->ambassador_paid_date = $req->ambassadorpaiddate;
        $data->visa_expiry_date     = $req->visaexpirydate;
        $data->applied_person_name  = $req->appliedpersonname;
        $data->reference_supplier   = $req->referencesupplier;

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Visa Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Visa::find($id)->delete($id);
 
         return redirect('visa-list')->with('status', 'Deleted successfully!');
    }
}
