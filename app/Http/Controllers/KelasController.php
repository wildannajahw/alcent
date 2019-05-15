<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelass = \App\Kelas::paginate(10);
        $filterKeyword = $request->get('name');
        if($filterKeyword){
            $kelass = \App\Kelas::where("name", "LIKE", "%$filterKeyword%")->paginate(10);
        }
        return view('kelass.index', ['kelass' => $kelass]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelass.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_kelas = new \App\Kelas;
        $new_kelas->name = $request->get('name');
        $new_kelas->thnajar = $request->get('thnajar');
        $new_kelas->tingkat = $request->get('tingkat');
        $new_kelas->created_by = \Auth::user()->id;
        $new_kelas->save();
        return redirect()->route('kelass.create')->with('status', 'Category successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = \App\Kelas::findOrFail($id);
        return view('kelass.show', ['kelas' => $kelas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas_to_edit = \App\Kelas::findOrFail($id);
        return view('kelass.edit', ['kelas' => $kelas_to_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $kelas = \App\Kelas::findOrFail($id);
        $name = $request->get('name');
        $thnajar = $request->get('thnajar');
        $tingkat = $request->get('tingkat');

        $kelas->name = $name;
        $kelas->thnajar = $thnajar;
        $kelas->tingkat = $tingkat;
        $kelas->updated_by = \Auth::user()->id;

        $kelas->save();
        return redirect()->route('kelass.edit', ['id' => $id])->with('status', 'Category successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = \App\Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelass.index')
        ->with('status', 'Category successfully moved to trash');
    }

    public function trash(){
        $deleted_kelas = \App\Kelas::onlyTrashed()->paginate(10);
        return view('kelass.trash', ['kelass' => $deleted_kelas]);
    }
    public function restore($id){
        $kelas = \App\Kelas::withTrashed()->findOrFail($id);
        if($kelas->trashed()){
          $kelas->restore();
        } else {
          return redirect()->route('kelass.index')
          ->with('status', 'Kelas is not in trash');
        }

        return redirect()->route('kelass.index')
        ->with('status', 'Kelas successfully restored');
    }
    public function deletePermanent($id){
        $kelas = \App\Kelas::withTrashed()->findOrFail($id);
        if(!$kelas->trashed()){
          return redirect()->route('kelass.index')
          ->with('status', 'Can not delete permanent active category');
        } else {
          $kelas->forceDelete();

          return redirect()->route('kelass.index')
          ->with('status', 'Kelas permanently deleted');
        }
    }
}
