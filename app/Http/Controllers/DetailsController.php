<?php
/**
 * Created by PhpStorm.
 * User: Allan
 * Date: 09/06/2017
 * Time: 22:30
 */

namespace App\Http\Controllers;


use App\Models\Sellers;
use App\Models\Sales;
use App\Logic\CalcCommission;

class DetailsController extends Controller
{

    public function load($saleId)
    {
        $sale = Sales::find($saleId);
        $seller = Sellers::find($sale->seller_id);
        $commission = new CalcCommission($sale->price);
        return view('details', ['sale'=>$sale, 'seller'=>$seller, 'commission'=>$commission->getAll(), 'title'=>$sale->title]);
    }

}