<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseType;

class ExpenseTypeController extends Controller
{
    public function index(){
        //$clients = Client::all(); 
        //return view('/visa/visaadd', compact('clients'));
        return view('/expensetype/expensetypeadd');

    }

    public function store(Request $req){
        $data = new ExpenseType;

        $data->expense_type_name           = $req->expensetypename;
        
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'ExpenseType Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        $data = ExpenseType::all();

        if($request -> ajax()){
            return response()->json([
                'expensetype'=>$data,
            ]);
        }

        return view('expensetype/expensetypelist', ['expensetypes' => $data]);
    }

    public function edit($id){
        $data = ExpenseType::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'expensetype'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = ExpenseType::find($id);

        $data->expense_type_name           = $req->expensetypename;

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'ExpenseType Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        ExpenseType::find($id)->delete($id);
 
         return redirect('expensetype-list')->with('status', 'Deleted successfully!');
    }
}
