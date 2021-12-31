<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;

class ResumeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
               $data=$request->validate([
           'type'=>"required",
           'title'=>"required|min:5",
           'info'=>"required|min:5",
           'place'=>"required|min:3",
           'from'=>"required",
           'till'=>"required|gte:from",
       ]);
        $user->deactive();
        $user=auth()->user();
               $user->resumes()->create($data);
               alert()->success('رزومه شما با موفقیت ثبت شد ');
               return back();


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
    public function edit(Resume $Resume)
    {
       return view('home.teacher.profile.edit_resume',compact('Resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $Resume)
    {
        $data=$request->validate([
            'type'=>"required",
            'title'=>"required|min:5",
            'info'=>"required|min:5",
            'place'=>"required|min:3",
            'from'=>"required",
            'till'=>"required|gte:from",
        ]);
        $Resume->update($data);
        $user=auth()->user();
        // $user->deactive();
        alert()->success('رزومه با موفقیت به روز شد ');
        return redirect(route('teacher.profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $Resume)
    {
        $Resume->delete();
        alert('رزومه شما با موفقیت حذف ');
        return back();
    }
}
