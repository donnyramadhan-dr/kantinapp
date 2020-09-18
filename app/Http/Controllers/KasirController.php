<?php

namespace App\Http\Controllers;

use App\DetailOrder;
use App\Food;
use App\Transaksi;
use Illuminate\Http\Request;

class KasirController extends Controller
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

     public function dashboardkasir(){
         return view('admin.kasir.dashboardkasir');
     }

     public function orderview(){
         $foods = Food::all();
         return view('admin.kasir.orderview', compact('foods'));
     }

     public function store(Request $request){
        $transaksi = new Transaksi();
        $transaksi->id_user = "1"; 
        $transaksi->total_bayar = $request->totalprice;
        $transaksi->save();
        $idtransaksi = $transaksi->id_transaksi;

        $foods = $request->order;
        $data = array();
        foreach ($foods as $food ) {
            $data[] = [
                'id_makanan' => $food['id'],
                'qty' => $food['qty'],
                'id_transaksi' => $idtransaksi
            ];
            DetailOrder::insert($data);
        }
     }
}
