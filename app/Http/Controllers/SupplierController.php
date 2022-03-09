<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(){
        return view('/supplier/supplieradd');
    }

    public function store(Request $req){
        $data = new Supplier;

        $data->supplier_name        = $req->suppliername;
        $data->supplier_address     = $req->supplieraddress;
        $data->supplier_contact     = $req->suppliercontact;
        $data->supplier_nid         = $req->suppliernid;
        //$data->created_by           = $req->suppliername;
    
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Supplier Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        $data = Supplier::all();

        if($request -> ajax()){
            return response()->json([
                'supplier'=>$data,
            ]);
        }

        return view('supplier/supplierlist', ['suppliers' => $data]);
    }

    public function edit($id){
        $data = Supplier::find($id);

        if($data){
            return response()->json([
                'status'=>200,
                'supplier'=>$data
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = Supplier::find($id);

        $data->supplier_name        = $req->suppliername;
        $data->supplier_address     = $req->supplieraddress;
        $data->supplier_contact     = $req->suppliercontact;
        $data->supplier_nid         = $req->suppliernid;

        $data->save();
        
        return response() -> json([
            'status'=>200,
            'message' => 'Supplier Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        Supplier::find($id)->delete($id);
 
         return redirect('supplier-list')->with('status', 'Deleted successfully!');
    }
}
