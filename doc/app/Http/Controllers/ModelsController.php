<?php

namespace App\Http\Controllers;

use App\Model\Model;
use Illuminate\Http\Request;

class ModelsController extends Controller
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
    public function create(Request $request)
    {
        $file = $request->file('image');
        $model = new \App\Model\Model();
        if (!is_null($file)){
            $fileName = time() .' '.$file->getClientOriginalName();
            $file->move(public_path() . '/img', $fileName);
            $model->image = '/img/'. $fileName;
        }

        $model->name = $request->get('name');
        $model->brand_id = $request->get('brand_id');
        $model->power = $request->get('power');
        $model->discription = $request->get('discription');
        $model->save();
        return redirect('/tables/models');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        $file = $request->file('image');
        if (!is_null($file)){
            $fileName = time() .' '.$file->getClientOriginalName();
            $file->move(public_path() . '/img', $fileName);
            $model->image = '/img/'. $fileName;
        }

        $model->name = $request->get('name');
        $model->brand_id = $request->get('brand_id');
        $model->power = $request->get('power');
        $model->discription = $request->get('discription');
        $model->save();
        return redirect('/tables/models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        $model->delete();
    }
}
