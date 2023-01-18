<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = Movie::all();
        return view('movie.table', compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'title'=>'required',
            'description'=>'required',
            'year'=>'required',
            'poster'=>'image|file|max:2048',
        ]);

        if($request->file('poster')) {
            $validatedData['poster'] = $request->file('poster')->store('film-image');
        }

        $genre_arr = explode(',', $request["genre"]);

        $genre_ids = [];
        foreach($genre_arr as $genre_name) {
            $genre = Genre::where('name', $genre_name)->first();
            if($genre) {
                $genre_ids[] = $genre -> id;
            } else {
                $new_genre = Genre::create(["name" => $genre_name]);
                $genre_ids[] = $new_genre->id;
            }
        }

        Movie::create($validatedData);
        $genre->genre()->sync($genre_ids);

        return redirect('/movie') -> with('success','Data Film created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movieShow = Movie::find($id);

        return view('movie.show', compact('movieShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movieEdit=Movie::where('id', $id)->firstorfail();

        return view('movie.edit', compact('movieEdit'));
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
        $image = [
            'title'=>'required',
            'description'=>'required',
            'year'=>'required',
            'poster'=>'image|file|max:2048',
        ];
        // $validatedData = $filmEdit=Film::where('id', $id)->update([
        //     'judul'=>'required',
        //     'ringkasan'=>'required',
        //     'tahun'=>'required',
        //     'poster'=>'image|file|max:2048',
        // ]);

        if($request->file('poster')) {
            $image['poster'] = $request->file('poster')->store('film-image');
        }

        $validatedData = $request->validate($image);
        
        Movie::where('id', $id)
            ->update($validatedData);

        return redirect('/movie')  -> with('success','Data Film updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        $movie -> delete();

        return redirect('/movie');
    }
}
