<?php

namespace App\Http\Controllers;

use App\DetailOrder;
use App\Food;
use App\Transaksi;
use PDF;
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
        $data = [];
        foreach ($foods as $food ) {
            $data[] = [
                'id_makanan' => $food['id'],
                'qty' => $food['qty'],
                'id_transaksi' => $idtransaksi
            ];
        }
        DetailOrder::insert($data);
     }

     public function transaction()
     {
         $transaksi = Transaksi::with('detailorder')->get();
        //  return response()->json(['order' =>$transaksi]);
        return view('admin.kasir.invoiceview',compact('foods'), ['transaksi' => $transaksi]);
     }

     public function pdf(Request $request)
     {
         $transaksi = Transaksi::with('detailorder')->get();
         $pdf = PDF::loadView('admin.kasir.report_pdf', ['transaksi' => $transaksi]);
         $pdf->save(storage_path() . '_invoicefood.pdf');
         return $pdf->download('invoicefood.pdf');
     }
}
