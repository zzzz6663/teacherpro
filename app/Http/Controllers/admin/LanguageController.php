<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages=Language::orderBy('id', 'DESC')->get() ;

        return  view('admin.languages',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        return  view('admin.language.create_new_language');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data=  $request->validate([
            'name'=>'required|min:2',
            'en'=>'required',
            'img'=>'required',
        ]);

        $language= Language::create($data);
        if ($request->file('img')){
            $file=$request->file('img');
            $name_img= $language->id.'_lan'.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/src/img/lang'),$name_img);
            $language->update(['img'=>$name_img]);
        }
        alert()->success('زبان جدید اضافه شد ','پیام جدید');
        return redirect(route('languages.index'));
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
    public function edit(Language $language)
    {
        return  view('admin.language.edit_language',compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $data=  $request->validate([
            'name'=>'required|min:2',
            'en'=>'required|min:2',
            'active'=>'required',
        ]);
        $language->update($data);
        if ($request->file('img')){
            $file=$request->file('img');
            $name_img= $language->id.'_lan'.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/src/img/lang'),$name_img);
            $language=  $language->update(['img'=>$name_img]);
        }
        alert()->success('  زبان ویرایش   شد ','پیام جدید');
        return redirect(route('languages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
