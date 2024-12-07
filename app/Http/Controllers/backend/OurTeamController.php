<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $ourTeams = OurTeam::all();
            return DataTables::of($ourTeams)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);

        }
        return view('admin.our_team.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our_team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ]);
        $data = $request->all();
        if($data['cover_image_data'] != "" && $request->hasFile('image')) {
            $imagePath = $request->file('image')->store('our-teams', 'public');
            $data['image'] = $imagePath;
        }

        OurTeam::create($data);
        return redirect()->route('our-teams')->with('success', 'Our Team created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ourTeam = OurTeam::find($id);
        return view('admin.our_team.edit', ['ourTeam' => $ourTeam]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ]);
        $data = $request->all();
        $old_data = OurTeam::find($id);
        if($request->hasFile('image') && $data['cover_image_data'] != ""){
            if($old_data->image != "" && Storage::disk('public')->exists($old_data->image)){
                Storage::disk('public')->delete($old_data->image);
            }
            $imagePath = $request->file('image')->store('our-teams', 'public');
            $data['image'] = $imagePath;
        }
        OurTeam::find($id)->update($data);
        return redirect()->route('our-teams')->with('success', 'Our Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $ourTeam = OurTeam::find($id);
        if($ourTeam->image != "" && Storage::disk('public')->exists($ourTeam->image)){
            Storage::disk('public')->delete($ourTeam->image);
        }
        $ourTeam->delete();
        return redirect()->route('our-teams')->with('success', 'Our Team deleted successfully');
    }
}
