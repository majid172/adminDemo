<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $pageTitle = "All Products";
        $products = Product::with('category')->paginate();
        return view('admin.category.products',compact('pageTitle','products'));
    }

    public function store(StoreProductRequest $request,ProductService $productService)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            try {
                $directory = date("Y") . "/" . date("m");
                $path = getFilePath('product') . '/' . $directory;
                $size = getFileSize('product');
                $image = fileUploader($request->image, $path, $size);
                $validated['image'] = $image;
                $validated['path'] = $directory;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $product = $productService->store($validated);

        return redirect()->route('admin.product.list')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $p_id)
    {
        $pageTitle = "Edit Product";
        $product = Product::find($p_id);
        dd($product);
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
