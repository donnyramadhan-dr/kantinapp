<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return\Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Menu::all();
        return view('foods/index', compact('foods'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foods/create');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'desciption' => 'required',
            'status_menu' => 'required'
        ]);

        Menu::create($request->all());
        return redirect('/foods')->with('status', 'Data ' . $request->nama_menu . ' Berhasil Ditambahkan!');
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $food)
    {
        return view('foods/edit', compact('foods'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $food)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'desciption' => 'required',
            'status_menu' => 'required'
        ]);

        Menu::where('id_makanan', $food->id_makanan)
            ->update([
                'nama_menu' => $request->nama_menu,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'desciption' => $request->desciption,
                'status_menu' => $request->status_makanan
            ]);
        return redirect('/foods')->with('status', 'Data ' . $request->nama_menu . ' Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $food)
    {
        Menu::destroy($food->id_menu);
        return redirect('/foods')->with('status', 'Data Berhasil Dihapus!');
    }
}
