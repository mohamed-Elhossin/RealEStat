<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::all();
        return view('developers.index', compact("developers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('developers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "rate" => "required|numeric",
        ]);
        $developer = new Developer();
        $developer->name = $request->name;
        $developer->description = $request->description;
        $developer->rate = $request->rate;
        $developer->save();
        return redirect()->back()->with("done", "Create Developer Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $developer = Developer::find($id);
        return view('developers.edit', compact("developer"));
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
        $developer = Developer::find($id);
        $developer->name = $request->name;
        $developer->description = $request->description;
        $developer->rate = $request->rate;
        $developer->save();
        return redirect()->route("developer.index")->with("done", "Update Developer Successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $developers = Developer::find($id);
        $developers->delete();
        return redirect()->back()->with("done", "Delete Developer Successfully");
    }
}
