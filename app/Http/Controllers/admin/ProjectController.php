<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects= Project::all();
        return view('project.index',compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects= Project::all();
        return view('project.create',compact("projects"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        // dd($request->all());



        //gestione slug
        $data['slug'] = Str::of($data['title'])->slug();
        //gestione immagine


        $img_path = $request->hasFile('img') ? Storage::put('uploads', $data['img']) : NULL;

        // $img_path = $request->hasFile('cover_image') ? $request->cover_image->store('uploads') : NULL;





        $Project = new Project();

        $Project->name = $data['name'];
        $Project->surname = $data['surname'];
        $Project->img = $img_path;
        $Project->skills = $data['skills'];
        //$Project->category_id = $request->input('category_id'); //99
        $Project->project_id = $data['project_id']; //99

        //$Project->fill($data);
        $Project->save();


        return redirect()->route('admin.posts.index')->with('message', 'Articolo creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
{
    $project = Project::where('slug', $slug)->first();
   
    return view('project.show', compact('project'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit',compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
