<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create($category_id)
    {
        $pageTitle = "Create Episode";
        $category = Category::where('id',$category_id)->first();
        return view('admin.episode.create',compact('pageTitle','category_id','category'));
    }



    /**
     * Display the specified resource.
     */
    public function details($id)
    {
        
        $details = Episode::where('id',$id)->firstOrFail();
        $pageTitle = $details->title." "."details";
        return view('admin.episode.details',compact('pageTitle','details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
