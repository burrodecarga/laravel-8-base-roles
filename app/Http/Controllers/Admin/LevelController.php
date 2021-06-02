<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(['name'=>'required|unique:levels']);
       $request['slug']= Str::slug($request->name);
       $levels = Level::create($request->all());
       return redirect()->route('admin.levels.index')->with('info','Nivel creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        return view('admin.levels.show',compact('level'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit',compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name'=>'required|unique:levels,name,'.$level->id
            ]);
        $request['slug']= Str::slug($request->name);
        $level->update($request->all());
        return redirect()->route('admin.levels.index')->with('info','Nivel actualizada satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
       $level->delete();
       return redirect()->route('admin.levels.index')->with('info','Nivel eliminada satisfactoriamente');

    }
}
