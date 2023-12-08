<?php

namespace App\Http\Controllers;

use App\Models\Profit;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Developer;
use Illuminate\Support\Facades\DB;

class ProfitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Profits = Profit::all();
        return view('profit.index', compact("Profits"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seller = Seller::all();
        $developer = Developer::all();
        return view('profit.create', compact("seller", 'developer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "developer_id" => "required",
            "cost" => "required",
            "commission" => "required",
            "seller_id" => "required",
            "tax" => "required",
            "netprofit" => "required",
        ]);
        $devid = explode(',', $request->developer_id[1]);

        $div = $devid[0];


        $Profit = new Profit();
        $Profit->developer_id = $div;
        $Profit->cost = $request->cost;
        $Profit->commission = $request->commission;
        $Profit->seller_id = $request->seller_id;
        $Profit->tax = $request->tax;
        $Profit->netprofit = $request->netprofit;
        $Profit->taxCost = $request->taxCost;
        // dd($request);
        $Profit->save();
        return redirect()->back()->with("done", "Create Profit Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profit =  DB::table("joindataprofits")->where("profId", '=', $id)->first();
        return view('profit.show', compact("profit"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Profit = Profit::find($id);
        return view('profit.edit', compact("Profit"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "rate" => "required|numeric",
        ]);
        $Profit = Profit::find($id);
        $Profit->name = $request->name;
        $Profit->description = $request->description;
        $Profit->rate = $request->rate;
        $Profit->save();
        return redirect()->route("profit.index")->with("done", "Update Profit Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Profits = Profit::find($id);
        $Profits->delete();
        return redirect()->back()->with("done", "Delete Profit Successfully");
    }

    // public function   printPage()
    // {
    //     $html = view('profit.show')->render();

    //     return response($html)->header('Content-Type', 'text/html');
    // }
}
