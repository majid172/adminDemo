<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Episode;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $pageTitle = 'Category List';
        $lists = Category::with('course')->paginate();
        return view('admin.category.list',compact('pageTitle','lists'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string|min:3',
            'image' => ['required','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        if($request->hasFile('image')){
            try {
                $directory = date("Y")."/".date("m");
                $path       = getFilePath('category').'/'.$directory;
                $size = getFileSize('category');
                $image = fileUploader($request->image, $path,$size);
                $category->image = $image;
                $category->path = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $category->save();
        $notify[] = ['success', $category->name . ' has been created successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'image' =>  ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])],
        ]);
        $category =  Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;

        if($request->hasFile('image')){
            try {
                $directory = date("Y")."/".date("m");
                $path       = getFilePath('category').'/'.$directory;
                $size = getFileSize('category');
                $image = fileUploader($request->image, $path,$size);
                $category->image = $image;
                $category->path = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $category->save();
        $notify[] = ['success', $category->name . ' has been created successfully'];
        return redirect()->back()->withNotify($notify);
    }
    public function remove(Request $request)
    {
        $course = Category::find($request->id);
        $course->delete();
        return redirect()->back();
    }

    public function courseList($cat_id)
    {
        $courses = Course::where('category_id',$cat_id)->with('category','creator','episodes')->paginate(getPaginate());
        $pageTitle = "Course List";
        return view('admin.category.courses',compact('pageTitle','courses'));
    }
    public function episodeList($course_id)
    {
        $data['pageTitle'] = 'Episode List';
        $data['episodes'] = Episode::where('course_id',$course_id)->with('course')->paginate(getPaginate());
        return view('admin.episode.list',$data); 
    }
    public function episodeStatus(Request $request)
    {
        $episode = Episode::find($request->episode_id);
        $episode->status = ($request->status==1)?1:0;
        $episode->save();
        return response()->json($episode);
    }
}
