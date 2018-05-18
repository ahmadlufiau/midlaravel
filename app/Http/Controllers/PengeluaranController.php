<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use App\Category;
use App\User;
use DB;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('pengeluarans')
            ->leftJoin('categories', 'pengeluarans.category_id', '=', 'categories.id')
            ->leftJoin('users', 'pengeluarans.user_id', '=', 'users.id')
			->orderBy('pengeluarans.created_at', 'DESC')
			->select('pengeluarans.*','categories.nama as namacat','users.name as namauser')
			->get();
        return view('pengeluaran.index', ['data' => $data]);
        
        // $data = Pengeluaran::orderBy('created_at', 'DESC')->paginate(5);
		// return view('pengeluaran.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    return view('pengeluaran.create', ['edit' => false,'category' => $this->getCategory(), 'user' => $this->getUser()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = new Pengeluaran();
        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->category_id = $request->category_id;
        $data->user_id = $request->user_id;
		$data->save();
		return redirect('pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Pengeluaran::findOrFail($id);
		return view('pengeluaran.create', ['data' => $data, 'edit' => true, 'category' => $this->getCategory(), 'user' => $this->getUser()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Pengeluaran::where('id', $id)->first();
        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->category_id = $request->category_id;
        $data->user_id = $request->user_id;
		$data->save();
		return redirect('pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Pengeluaran::where('id', $id)->first();
		$data->delete();
		return redirect('pengeluaran');
    }

    private function getCategory() {
		$Categories = [];
		foreach (category::all() as $category) {
			$Categories[$category->id] = $category->nama;
		}
		return $Categories;
    }
    
    private function getUser() {
		$Users = [];
		foreach (user::all() as $user) {
			$Users[$user->id] = $user->name;
		}
		return $Users;
	}
}
