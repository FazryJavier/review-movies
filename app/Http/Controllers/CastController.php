<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cast = Cast::all();
        return view('cast.table', compact('cast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=>'required',
            'age'=>'required',
            'bio'=>'required',
        ]);
        
        $cast = new Cast;
        $cast->name = $request->name;
        $cast->age = $request->age;
        $cast->bio = $request->bio;
        $cast->save();

        return redirect('/cast') -> with('success','Data Cast created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $castShow = Cast::find($id);

        return view('cast.show', compact('castShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $castEdit=Cast::where('id', $id)->firstorfail();

        return view('cast.edit', compact('castEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $castEdit=Cast::where('id', $id)->update([
            'name'=>$request['name'],
            'age'=>$request['age'],
            'bio'=>$request['bio'],
        ]);
        
        return redirect('/cast')  -> with('success','Data Cast updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cast = Cast::find($id);

        $cast -> delete();

        return redirect('/cast');
    }
}
