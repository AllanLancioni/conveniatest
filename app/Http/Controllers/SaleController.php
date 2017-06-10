<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sellers;
use App\Models\Sales;
use App\Logic\CalcCommission;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SaleController extends Controller
{

    public function sale($sale=null)
    {
        return view('sale', ['sellers' => Sellers::all(), 'title'=>'Anunciar Venda', 'sale'=>$sale]);
    }
    public function update($type, $id){
        if($type!='sale') {
            Session::flash('error', 'Operação não suportada a esse tipo!');
            return Redirect::back();
        }
        return $this->sale(Sales::find($id));
    }

    public function calculateCommission($price)
    {
        $commission = new CalcCommission($price);
        return response()->json($commission->getAll());
    }

    public function save(Request $request, $id=false)
    {
        $sale = (!$id) ? new Sales(): Sales::find($id);
        $sale->title     = $request['title'];
        $sale->seller_id = $request['seller_id'];
        $sale->describe  = $request['describe'];
        $sale->price     = $request['price'];
        $sale->save();

        return redirect()->to(url('/list/sales'));
    }

}
