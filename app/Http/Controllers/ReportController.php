<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseType;

class ReportController extends Controller
{
    public function type(Request $request){
        $expenses = Expense::all();
        $types = ExpenseType::all();

        if($request -> ajax()){
            return response()->json([
                'expense'=>$expenses,
            ]);
        }
        
        //return view('member/memberlist', ['members' => $data]);
        return view('report/typewisereport', ['types' => $types, 'expenses' => $expenses]);
       
    }

    public function specificType($expenseType){
        //$data = Expense::find(2);

        $data = Expense::get()->where('type', '=', $expenseType);
        $totalexpense = Expense::get()->where('type', '=', $expenseType)->sum('amount');
       

        if($data){
            return response()->json([
                'status'=>200,
                'data'=>$data,
                'totalexpense'=>$totalexpense
            ]);
        }
    }

    public function date(Request $request){
        return view('report/datewisereport');

    }

    public function specificDate(Request $request){
        //$data = Expense::find(2);

        $from = date($request->startdatewise);
        $to = date($request->enddatewise);

        // $from = date('2021-10-14');
        // $to = date('2021-10-28');

        $data = Expense::get()->whereBetween('created_at', [$from, $to]);
        $totalexpense = Expense::get()->whereBetween('created_at', [$from, $to])->sum('amount');
        
        // $totalexpense = Expense::get()->where('type', '=', $expenseType)->sum('amount');

    //     $start_date = Expense::parse($request->startdatewise)
    //                          ->toDateTimeString();

    //    $end_date = Expense::parse($request->enddatewise)
    //                          ->toDateTimeString();

    //    $data = Expense::whereBetween('created_at',[$start_date,$end_date])->get();
       

        //return $data;

        if($data){
            return response()->json([
                'status'=>200,
                'data'=>$data,
                'totalexpense'=>$totalexpense
            ]);
        }
    }


}
