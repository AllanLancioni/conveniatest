<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Sellers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ListController extends Controller
{
    public function listSellers(Request $request){
        $message = ($request->session()->get('success')) ?:$request->session()->get('error');
        return view('list', ['type'=>1, 'title'=>'Listar Vendedores', 'name'=>'vendedores', 'collection' => Sellers::all(), 'message'=>$message]);
    }
    public function listSales(Request $request){
        $message = ($request->session()->get('success')) ?:$request->session()->get('error');
        return view('list', ['type'=>2, 'title'=>'Listar Anúncios', 'name'=>'anúncios', 'collection' => Sales::all(), 'message'=>$message]);
    }

    public function delete($type, $id){
        $model = ($type == 'sale') ? Sales::find($id) : ($type == 'seller') ? Sellers::find($id) : false;
        if(!$model) {
            Session::flash('error', 'Tipo não encontrado');
            return Redirect::back();
        }
        $model->delete();
        Session::flash('success', 'Registro apagado com sucesso!');
        return Redirect::back();
    }

}
