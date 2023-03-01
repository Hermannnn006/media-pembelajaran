<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chalengge;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardChalenggeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.chalengge.index', [
            'chalengges' => Chalengge::with('category_chalengge')->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.chalengge.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'answer' => 'required',
            'point' => 'required|numeric|min:1',
            'link' => 'required'
            
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::of($request->name)->slug('-');

        Chalengge::create($validatedData);
        return redirect('/dashboard/chalengge')->with('success', 'new chalengge has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chalengge  $chalengge
     * @return \Illuminate\Http\Response
     */
    public function show(Chalengge $chalengge)
    {
        return view('dashboard.chalengge.show', [
            'chalengge' => $chalengge
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chalengge  $chalengge
     * @return \Illuminate\Http\Response
     */
    public function edit(Chalengge $chalengge)
    {
        return view('dashboard.chalengge.edit', [
            'chalengge' => $chalengge,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chalengge  $chalengge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chalengge $chalengge)
    {
        $rules = [
            'name' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'answer' => 'required',
            'point' => 'required|numeric|min:1',
            'link' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Chalengge::where('id', $chalengge->id)->update($validatedData);

        return redirect('/dashboard/chalengge')->with('success', 'chalengge has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chalengge  $chalengge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chalengge $chalengge)
    {
        Chalengge::destroy($chalengge->id);
        return redirect('/dashboard/chalengge')->with('success', 'file has been deleted');
    }
}
