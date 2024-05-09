<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Episode;
use App\Models\Product;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function list()
    {
        $pageTitle = 'Category List';
        $lists = Category::withCount('products')->paginate();
        return view('admin.category.list',compact('pageTitle','lists'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'cat_name' => 'required|string|min:3',
            'image' => ['required','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $category = new Category();
        $category->cat_name = $request->cat_name;
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
            'cat_name' => 'required|string|min:3',
            'image' =>  ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])],
        ]);
        $category =  Category::find($request->id);
        $category->cat_name = $request->cat_name;
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
        $category = Category::find($request->id);
        $category->delete();
        $notify[] = ['success', $category->name . ' has been removed successfully'];
        return redirect()->back()->withNotify($notify);
    }

    public function productList($cat_id)
    {
        $products = Product::where('cat_id',$cat_id)->with('category')->paginate(getPaginate());
        $pageTitle = "Product Lists";
        return view('admin.category.products',compact('pageTitle','products'));
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
