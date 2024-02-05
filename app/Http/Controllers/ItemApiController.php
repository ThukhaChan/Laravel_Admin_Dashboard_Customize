<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemApiRequest;
use App\Http\Requests\UpdateItemApiRequest;

class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=Item::all();
         return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemApiRequest $request)
    {
        $category_id=Category::Find($request->category_id);
        if($category_id){
        $image=$request->image;
        $newName="gallery_".uniqid().".".$image->extension();
        $image->storeAs("public/gallery",$newName);
        // $imageUrl = asset("storage/gallery/{$newName}");
        $item=new Item();
        $item->image=$newName;
        $item->name=$request->name;
        $item->price=$request->price;
        $item->category_id=$request->category_id;
        $item->expired_date=$request->expired_date;
        $item->save();
       
        return response()->json('Item saved successfully');
        }
        return  response()->json('Category Not Found');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::Find($id);
        if($item){
            return response()->json($item);
        }
        return response()->json('Item Not Found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Item::Find($id);
        if($item){
            return response()->json($item);
        }
        return response()->json('Item Not Found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemApiRequest $request, $id)
    {
       $item=Item::Find($id);
       if($item){
        $category_id=Category::Find($request->category_id);
        if($category_id){
        if($request->image){
            $image=$request->image;
            $newName="gallery_".uniqid().".".$image->extension();
            $image->storeAs("public/gallery",$newName);
            // $imageUrl = asset("storage/gallery/{$newName}");
            $item->image=$newName;
            $item->name=$request->name;
            $item->price=$request->price;
            $item->category_id=$request->category_id;
            $item->expired_date=$request->expired_date;
            $item->save();
            return response()->json('Item is Updating Successful');
        }
        $item->name=$request->name;
        $item->price=$request->price;
        $item->category_id=$request->category_id;
        $item->expired_date=$request->expired_date;
        $item->update();
        return response()->json('Item is Updating Successful');
       }
      return response()->json('Category ID Not Found');
       }
       return response()->json('Item Not Found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::Find($id);
        if($item){
            $item->delete();
            return response()->json('Deleting Item Successfully');
        }
        return response()->json('Item Not Found');
    }
}
