<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseType;


class ExpenseController extends Controller
{
    public function index(){
        //$clients = Client::all(); 
        //return view('/visa/visaadd', compact('clients'));
        //return view('/expense/expenseadd');
        
        $expensetypes = ExpenseType::all(); 
        return view('/expense/expenseadd', compact('expensetypes'));

    }

    public function store(Request $req){
        $data = new Expense;

        $data->type           = $req->type;
        $data->amount          = $req->amount;
        
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Expense Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        $data = Expense::all();
        $expensetypes = ExpenseType::all(); 

        if($request -> ajax()){
            return response()->json([
                'expense'=>$data,
            ]);
        }

        return view('expense/expenselist', ['expenses' => $data, 'expensetypes'=>$expensetypes]);
    }

    public function edit($id){
        $data = Expense::find($id);
        

        if($data){
            return response()->json([
                'status'=>200,
                'expense'=>$data,
                
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Expense::find($id);

        $data->type           = $req->type;
        $data->amount          = $req->amount;

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Expense Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Expense::find($id)->delete($id);
 
         return redirect('expense-list')->with('status', 'Deleted successfully!');
    }
}
