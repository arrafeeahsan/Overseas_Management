<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Visa;
use App\Models\Visarate;
use App\Models\Payment;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $clients = Client::all();
        // $visainprogress = Visa::get()->where('visa_status', '=', 'Visa in progress');
        $visainprogress = Client::join('visas', 'clients.id', '=', 'visas.client_id')
                ->get(['clients.*', 'visas.*'])->where('visa_status', '=', 'Visa in progress');

        // $hasgone = Visa::get()->where('visa_status', '=', 'Has gone');
        $hasgone = Client::join('visas', 'clients.id', '=', 'visas.client_id')
                ->get(['clients.*', 'visas.*'])->where('visa_status', '=', 'Has gone');

        // $return = Visa::get()->where('visa_status', '=', 'Return');
        $return = Client::join('visas', 'clients.id', '=', 'visas.client_id')
                ->get(['clients.*', 'visas.*'])->where('visa_status', '=', 'Return');

        // $stamplingdone = Visa::get()->where('visa_status', '=', 'Visa stampling done');
        $stamplingdone = Client::join('visas', 'clients.id', '=', 'visas.client_id')
                ->get(['clients.*', 'visas.*'])->where('visa_status', '=', 'Visa stampling done');

        $clientstatus = Client::leftJoin('visas', 'visas.client_id', '=', 'clients.id')
            ->leftJoin('visarates', 'visarates.visa_id', '=', 'visas.id')
            ->get(['clients.*', 'visarates.payment_status']);

        return view('home', ['clients' => $clients, 'visainprogress' => $visainprogress, 'hasgone' => $hasgone, 'return' => $return, 'stamplingdone' => $stamplingdone, 'clientstatus' => $clientstatus]);

        //  return $dum;
    }

    public function visaStatusMoreInfo($visa_status){

        // $visa = Visa::get()->where('visa_status', '=', $visa_status);
        $visa = Client::join('visas', 'clients.id', '=', 'visas.client_id')
                ->get(['clients.*', 'visas.*'])->where('visa_status', '=', $visa_status);

        return view('/home/visa-status-more-info', ['visas'=>$visa]);
        // return $visa;
    }

    public function clientDetails($id){

        $passports = [];
        if(Client::find($id)->passport){
            $passports = Client::find($id)->passport;
        }else{
            // $passports = "No passprot";
            // return $passports;
        }

        $visas = [];
        if(Client::find($id)->visa){
            $visas = Client::find($id)->visa;
        }else{
            // $visas = "No Visa"; 
        }

        $tasks = [];
        if(Client::find($id)->task){
            $tasks = Client::find($id)->task;
        }else{
            // $tasks = "No Task"; 
        }

        $visarates = [];
        $payments = []; 
        if(Client::find($id)->visa){
            $visa = Client::find($id)->visa;
            // return $w;
            if(Client::find($id)->visa->visarate){
                $visarates = Client::find($id)->visa->visarate;
                // return $q;
                if(Client::find($id)->visa->visarate->payments){
                    $payments = Client::find($id)->visa->visarate->payments;
                    //
                }else{
                    //
                }   
            }else{
                //
            }            
        }else{
                //
        }

        return view('clientdetails/clientdetails', ['passports' => $passports, 'visas'=> $visas, 'tasks' => $tasks, 'payments' => $payments, 'visarates' => $visarates]);

    }
}

