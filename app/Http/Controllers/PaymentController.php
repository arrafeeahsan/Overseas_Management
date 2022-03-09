<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Visarate;
use App\Models\Client;
use App\Models\Visa;

class PaymentController extends Controller
{
    public function index(){
        $visarates = Visarate::all();

        $clients = Client::join('visas', 'visas.client_id', '=', 'clients.id')
              ->join('visarates', 'visarates.visa_id', '=', 'visas.id')
              ->get(['clients.*', 'visarates.id']);

        return view('/payment/payment-historyadd', compact('clients'));
    }

    public function showDue($id){
        $data = Visarate::find($id);
        

         if($data){
            return response()->json([
                'status'=>200,
                'data'=>$data,
            ]);
        }
    }

    public function store(Request $req, $id){
        $data = new Payment;

        $data->visarate_id     = $req->visarateid;
        $data->visa_number     = $req->visanumber;
        $data->amount          = $req->amount;
        $data->payment_date    = $req->paymentdate;

        $data->save();

        $visarate = Visarate::find($id);
        
        $stat = $visarate->due_amount - $req->amount;

        if($stat == 0){
            $visarate->payment_status = 'Paid';
        }

        $prev_payment = Visarate::find($id)->paid_amount;
        $visarate->paid_amount = $prev_payment + $req->amount;
        $visarate->due_amount =  $stat;
        $visarate->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Payment Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        $data = Payment::all();

        $data = Client::join('visas', 'visas.client_id', '=', 'clients.id')
              ->join('visarates', 'visarates.visa_id', '=', 'visas.id')
              ->join('payments', 'payments.visarate_id', '=', 'visarates.id')
              ->get(['clients.*', 'payments.*']);

        if($request -> ajax()){
            return response()->json([
                'payment'=>$data,
            ]);
        }

        return view('payment/payment-historylist', ['payments' => $data]);
    }

    public function edit($id){
        $data = Payment::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'payment'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Payment::find($id);

        $data->visarate_id     = $req->visarateid;
        $data->visa_number     = $req->visanumber;
        $data->amount          = $req->amount;
        $data->payment_date    = $req->paymentdate;

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Payment Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Payment::find($id)->delete($id);
 
         return redirect('payment-list')->with('status', 'Deleted successfully!');
    }
}
