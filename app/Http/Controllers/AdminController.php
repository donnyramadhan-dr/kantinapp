<?php

namespace App\Http\Controllers;

use App\Food;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function dashboard(){
        return view('admin.dashboardadmin');
    }

    //for user
    public function userview(){
        $users = User::all();
        return view('admin.usersmenu',['user' => $users]);
    }

    public function registerEmploye(Request $request){
        $users = new User();
        $users->name= $request->name;
        $users->email= $request->email;
        $users->password= $request->password;
        $users->role= $request->role;
        $users->save();

        return redirect()->route('userview')->with('success', 'Employe created successfully!');
    }

    public function showModalUpdate($id){
        $users = User::find($id);
        return view('admin.crudUsers.updateUsers',['u' => $users]);
    }

    public function editEmploye(Request $request, $id){
        
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->role = $request->role;
        $users->save();

        return redirect()->route('userview')->with('info', 'Employe Updated Successfuly!');
    }

    public function deleteEmploye($id){
        $users = User::find($id);
        $users->delete();

        return redirect('')->route('userview')->with('error', 'Delete Employe Successfuly!');
    }

    //for menu
    public function menuview(){
        $foods = Food::all();
        return view('admin.menusview', compact('foods'));
    }

    public function addFood(Request $request){
        $imageName = $request->foto->getClientOriginalName();
        $request->foto->move(public_path('img'), $imageName);

        $foods = new Food();
        $foods->nama_makanan = $request->nama_makanan;
        $foods->harga = $request->harga;
        $foods->stok_makanan = $request->stok_makanan;
        $foods->foto_makanan = $imageName;
        $foods->save();

        return redirect()->route('menuview')->with('succes', 'Created Food Successfuly!');
    }

    public function modalUpdatedFood($id){
        $foods= Food::find($id);
        return view('admin.crudFoods.updateFoods',['f' => $foods]);
    }

    public function editFood(Request $request, $id){
        $imageName = $request->foto->getClientOriginalName();
        $request->foto->move(public_path('img'), $imageName);

        $foods = Food::find($id);
        $foods->nama_makanan = $request->nama_makanan;
        $foods->harga = $request->harga;
        $foods->stok_makanan = $request->stok_makanan;
        $foods->foto_makanan = $imageName;
        $foods->save();

        return redirect()->route('menuview')->with('info', 'Update Food Successfuly!');
    }

    public function deleteFood(){
        $foods= Food::all();
        $foods->delete();

        return redirect()->route('menuview')->with('eror', 'Delete Food Successfuly!');
    }
}
