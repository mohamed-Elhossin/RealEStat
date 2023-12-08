<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::all();
        return view('sellers.index', compact("sellers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "salary" => "required|numeric",
            "phone" => "required|string|size:11",
        ]);
        $seller = new Seller();
        $seller->name = $request->name;
        $seller->salary = $request->salary;
        $seller->phone = $request->phone;
        $seller->save();
        return redirect()->back()->with("done", "Create Seller Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seller = Seller::find($id);
        return view('sellers.edit', compact("seller"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
            "salary" => "required|numeric",
            "phone" => "required|string|size:11",
        ]);
        $seller = Seller::find($id);
        $seller->name = $request->name;
        $seller->salary = $request->salary;
        $seller->phone = $request->phone;
        $seller->save();
        return redirect()->route("seller.index")->with("done", "Update Seller Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Seller = Seller::find($id);
        $Seller->delete();
        return redirect()->back()->with("done", "Delete Seller Successfully");
    }
}
