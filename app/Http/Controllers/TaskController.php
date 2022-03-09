<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Client;

class TaskController extends Controller
{
    // public function index(){
    //     return view ('/task/taskadd');
    // }

    public function index(){
        $clients = Client::all(); 
        return view('/task/taskadd', compact('clients'));
    }

    public function store(Request $req){
        $data = new Task;

        $data->client_id                    = $req->clientid;
        $data->interview_date               = $req->interviewdate;
        $data->interview_status             = $req->interviewstatus;
        $data->medical_date                 = $req->medicaldate;
        $data->medical_status               = $req->medicalstatus;
        $data->medical_expire_date          = $req->medicalexpiredate;
        $data->training_start_date          = $req->trainingstartdate;
        $data->training_card_status         = $req->trainingcardstatus;
        $data->training_card_paid_status    = $req->trainingcardpaidstatus;
        $data->finger_date                  = $req->fingerdate;
        $data->finger_status                = $req->fingerstatus;
        $data->first_vaccine_status         = $req->firstvaccinestatus;
        $data->second_vaccine_status        = $req->secondvaccinestatus;
    
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Task Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        // $data = Task::all();

        $data = Client::join('tasks', 'clients.id', '=', 'tasks.client_id')
               ->get(['clients.*', 'tasks.*']);

        if($request -> ajax()){
            return response()->json([
                'task'=>$data,
            ]);
        }

        return view('task/tasklist', ['tasks' => $data]);
    }

    public function edit($id){
        $data = Task::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'task'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Task::find($id);

        // $data->client_id                    = $req->clientid;
        $data->interview_date               = $req->interviewdate;
        $data->interview_status             = $req->interviewstatus;
        $data->medical_date                 = $req->medicaldate;
        $data->medical_status               = $req->medicalstatus;
        $data->medical_expire_date          = $req->medicalexpiredate;
        $data->training_start_date          = $req->trainingstartdate;
        $data->training_card_status         = $req->trainingcardstatus;
        $data->training_card_paid_status    = $req->trainingcardpaidstatus;
        $data->finger_date                  = $req->fingerdate;
        $data->finger_status                = $req->fingerstatus;
        $data->first_vaccine_status         = $req->firstvaccinestatus;
        $data->second_vaccine_status        = $req->secondvaccinestatus;

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Task Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Task::find($id)->delete($id);
 
         return redirect('task-list')->with('status', 'Deleted successfully!');
    }
}
