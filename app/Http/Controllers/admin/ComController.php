<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Com;
use App\Models\Comment;
use Illuminate\Http\Request;

class ComController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $com=Com::latest()->get() ;

        return  view('admin.com.all',compact('com'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.com.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=  $request->validate([
            'name'=>'required|min:2',
            'com'=>'required',
            'info'=>'required',
        ]);

        $language= Com::create($data);

        alert()->success('نظر جدید اضافه شد ','پیام جدید');
        return redirect(route('com.index'));
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
    public function edit(Com $com)
    {
        return  view('admin.com.edit',compact('com'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Com $com)
    {
        $data=  $request->validate([
            'name'=>'required|min:2',
            'com'=>'required',
            'info'=>'required',
        ]);

        $com= $com->update($data);

        alert()->success('نظر جدید به روز رسانی شد ','پیام جدید');
        return redirect(route('com.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Com $com)
    {
        $com->delete();
        alert()->success('نظر جدید حذف شد  ','پیام جدید');
        return redirect(route('com.index'));
    }
}
