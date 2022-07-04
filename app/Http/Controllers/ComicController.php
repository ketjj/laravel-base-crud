<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics= Comic::orderBy('id', 'desc')->get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
         'title' => 'required|max:50|min:3',
         'image' => 'required|max:255|min:10',
         'type' => 'required|max:50|min:3'
        ]);
        
        $data = $request->all();
        // dd($data);
        //  $new_comic->slug = Str::slug($data['title'], '-');
        $new_comic = new Comic();
        $data['slug'] = $this->createSlug($data['title']);
        // dd($new_comic);
        $new_comic->fill($data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        return view( 'comics.show', compact('comic') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        return view('comics.edit', compact('comic'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        if($comic->title != $data['title']){
            $data['slug'] = $this->createSlug($data['title']);
        }
       $data['slug'] = $comic->slug;


       $comic->update($data);
       return redirect()->route('comics.show', $comic);
    }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('deleted_product', 'Il comix $comic->title è stato eliminato con successo');
    }
    

    // CREARE LA FUNZIONE PER LO SLUG
    private function createSlug($str){
        $slug = Str::slug($str, '-');
        $cont_slug = Comic::where('slug', $slug)->first();
        if($cont_slug){
            $slug = $cont_slug->slug. "-" . rand(2000, 20000);
        }
        return $slug;
    }
}
