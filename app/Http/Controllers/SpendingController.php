<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Spending;
use Illuminate\Http\Request;

class SpendingController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        //
        return view('spending.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('spending.create', ['edit' => false, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $category = Category::findOrFail($id);

        $data = new Spending();
        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->category_id = $category->id;
        $data->user_id = Auth::user()->id;
		$data->save();
        return redirect()->route ('category.spending.index', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function show(Spending $spending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryId, $spendingId)
    {
        //
        $category = Category::findOrFail($categoryId);
    
        $spending = $category->spendings()->findOrFail ($spendingId);
        return view('spending.create',['edit' => true])
                ->with('category', $category)
                ->with('spending', $spending);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId, $spendingId)
    {
        //
        $category = Category::findOrFail($categoryId);

        $data = $category->spendings()->findOrFail($spendingId);
        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->category_id = $category->id;
        $data->user_id = Auth::user()->id;
		$data->save();
        return redirect()->route ('category.spending.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spending  $spending
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId, $spendingId)
    {
        //
        $category = Category::findOrFail($categoryId);

        $category->spendings ()
                ->findOrFail ($spendingId)
                ->delete();
        return redirect()->route ('category.spending.index', $category);
    }
}
