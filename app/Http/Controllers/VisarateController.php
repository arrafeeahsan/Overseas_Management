<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visarate;
use App\Models\Visa;
use App\Models\Client;
use App\Models\Payment;



class VisarateController extends Controller
{
    public function index(){
        
        $clients = Client::join('visas', 'clients.id', '=', 'visas.client_id')
               ->get(['clients.*', 'visas.id']);

        return view('visa/visarateadd', [ 'clients' => $clients ]);
    }

    
    public function showDue($id){
        $data = Visa::find($id);
        

         if($data){
            return response()->json([
                'status'=>200,
                'data'=>$data,
            ]);
        }
    }

    public function store(Request $req){
        $data = new Visarate;
        $payment = new Payment;

        $data->visa_id              = $req->visaid;
        $data->visa_number          = $req->visanumber;
        $data->vendor_rate          = $req->vendorrate;
        $data->agent_rate           = $req->agentrate;
        $data->passenger_rate       = $req->passengerrate;
        $data->paid_amount          = $req->paidamount;
        $data->due_amount           = $req->passengerrate - $req->paidamount;
        $data->payment_date         = $req->paymentdate;
        $data->payment_status       = $req->paymentstatus;
        $data->save();

        $payment->visarate_id       = $data->id;
        $payment->visa_number       = $req->visanumber;
        $payment->amount            = $req->paidamount;
        $payment->payment_date      = $req->paymentdate;

        $payment->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Visarate Data Added Successfully'
        ]);
    }

    public function listview(Request $request){

        $data = Client::join('visas', 'visas.client_id', '=', 'clients.id')
              ->join('visarates', 'visarates.visa_id', '=', 'visas.id')
              ->get(['clients.*', 'visarates.*']);
        

        if($request -> ajax()){
            return response()->json([
                'visarate'=>$data,
               
            ]);
        }

        return view('visa/visaratelist', ['visarates' => $data]);
    }

    public function edit($id){
        $data = Visarate::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'visarate'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Visarate::find($id);

        // $data->visa_id              = $req->visaid;
        $data->visa_number          = $req->visanumber;
        $data->vendor_rate          = $req->vendorrate;
        $data->agent_rate           = $req->agentrate;
        $data->passenger_rate       = $req->passengerrate;
        $data->paid_amount          = $req->paidamount;
        // $data->due_amount           = $req->dueamount;
        $data->due_amount           = $req->passengerrate - $req->paidamount;
        $data->payment_date         = $req->paymentdate;
        $data->payment_status       = $req->paymentstatus;


        $stat = $req->passengerrate - $req->paidamount;

        if($stat == 0){
            $data->payment_status = 'Paid';
        }

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Visarate Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Visarate::find($id)->delete($id);
 
         return redirect('visarate-list')->with('status', 'Deleted successfully!');
    }
}
