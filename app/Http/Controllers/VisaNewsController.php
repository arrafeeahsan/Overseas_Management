<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisaNews;

class VisaNewsController extends Controller
{
    public function index(){
        return view('visanews/visanewsadd');
    }

    public function store(Request $req){
        $data = new VisaNews;

        $data->visa_company_name        = $req->visacompanyname;
        $data->visa_company_address     = $req->visacompanyaddress;
        $data->number_of_visa           = $req->numberofvisa;
        $data->country                  = $req->country;
        $data->city                     = $req->city;
        $data->working_hour             = $req->workinghour;
        $data->salary                   = $req->salary;
        $data->bonus                    = $req->bonus;
        $data->description              = $req->description;
        // $data->weekend_day              = $req->weekendday;
        
        $weekend = $req->weekendday;
        $weekendday = implode(', ', $weekend);
        $data->weekend_day = $weekendday;


        $data->job_name                 = $req->jobname;
        $data->news_status              = $req->newsstatus;
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Visa News Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        $data = VisaNews::all();
        // $vendors = Vendor::all();

        if($request -> ajax()){
            return response()->json([
                'visanews'=>$data,
            ]);
        }

        return view('visanews/visanewslist', ['visanews' => $data]);
    }

    public function edit($id){
        $data = VisaNews::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'visanews'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = VisaNews::find($id);

        $data->visa_company_name        = $req->visacompanyname;
        $data->visa_company_address     = $req->visacompanyaddress;
        $data->number_of_visa           = $req->numberofvisa;
        $data->country                  = $req->country;
        $data->city                     = $req->city;
        $data->working_hour             = $req->workinghour;
        $data->salary                   = $req->salary;
        $data->bonus                    = $req->bonus;
        $data->description              = $req->description;
        $data->weekend_day              = $req->weekendday;
        $data->job_name                 = $req->jobname;
        $data->news_status              = $req->newsstatus;


        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Visa News Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        VisaNews::find($id)->delete($id);
 
         return redirect('visa-news-list')->with('status', 'Deleted successfully!');
    }
}
