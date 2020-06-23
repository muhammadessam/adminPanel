<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_id' => ['required', 'exists:groups,id'],
            'sub_group_id' => ['required', 'exists:groups,id'],
            'name' => 'required',
            'quantity' => ['required', 'numeric'],
            'quantity_type' => 'required',
            'buying_price' => ['required', 'numeric'],
            'selling_price' => ['required', 'numeric'],
            'lower_price' => 'nullable|numeric',
            'img_temp' => 'image',
            'bar_code' => 'required',
            'branch_id' => ['required', 'exists:brenches,id'],
        ], [], [
            'group_id' => __('groups.main_group'),
            'sub_group_id' => __('groups.sub_group'),
            'name' => __('Name'),
            'quantity' => __('products.quantity'),
            'quantity_type' => __('products.quantity_type'),
            'buying_price' => __('products.buying_price'),
            'selling_price' => __('products.selling_price'),
            'lower_price' => __('products.lower_price'),
            'img_temp' => __('Image'),
            'bar_code' => __('products.bar_code'),
            'branch_id' => __('branch.name'),
        ]);

        if ($request->hasFile('img_temp'))
            $request['img'] = $this->storeFile('products', 'img_temp');

        Product::create($request->except('img_temp'));
        toast(trans('Saved successfully'), 'success')->position(session('locale') == 'ar' ? 'bottom-start' : 'bottom-end');
        return redirect()->route('admin.brenchs.show', $request['branch_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'group_id' => ['required', 'exists:groups,id'],
            'sub_group_id' => ['required', 'exists:groups,id'],
            'name' => 'required',
            'quantity' => ['required', 'numeric'],
            'quantity_type' => 'required',
            'buying_price' => ['required', 'numeric'],
            'selling_price' => ['required', 'numeric'],
            'lower_price' => 'nullable|numeric',
            'img_temp' => 'image',
            'bar_code' => 'required',
            'branch_id' => ['required', 'exists:brenches,id'],
        ], [], [
            'group_id' => __('groups.main_group'),
            'sub_group_id' => __('groups.sub_group'),
            'name' => __('Name'),
            'quantity' => __('products.quantity'),
            'quantity_type' => __('products.quantity_type'),
            'buying_price' => __('products.buying_price'),
            'selling_price' => __('products.selling_price'),
            'lower_price' => __('products.lower_price'),
            'img_temp' => __('Image'),
            'bar_code' => __('products.bar_code'),
            'branch_id' => __('branch.name'),
        ]);

        if ($request->hasFile('img_temp'))
            $request['img'] = $this->storeFile('products', 'img_temp');

        $product->update($request->except('img_temp'));
        toast(trans('Saved successfully'), 'success')->position(session('locale') == 'ar' ? 'bottom-start' : 'bottom-end');
        return redirect()->route('admin.brenchs.show', $request['branch_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        toast(trans('Saved successfully'), 'success')->position(session('locale') == 'ar' ? 'bottom-start' : 'bottom-end');
        return redirect()->back();
    }
}
