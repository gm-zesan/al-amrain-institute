<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $auth_user = Auth::user();
            if ($auth_user->hasRole('superadmin')) {
                $users = User::withoutRole('student')->get();
            } else {
                $users = User::whereHas('roles', function ($query) {
                    return $query->where('name','!=', 'superadmin');
                })->where('id','!=',$auth_user->id)->withoutRole('student')->get();
            }
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    return $row->name;
                })
                ->addColumn('email', function($row){
                    return $row->email;
                })
                ->addColumn('phone_no', function($row){
                    return $row->phone_no ?? 'N / A';
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.users.index');
    }


    public function create(){
        return view('admin.users.create');
    }


    public function store(StudentRequest $request){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('all-user', 'public');
        }
        $validated['password'] = bcrypt($request->password);
        $user = User::create($validated);
        $user->assignRole('admin');
        return redirect()->route('users')->with('success','User created successfully');
    }


    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit',[
            'user'=>$user,
        ]);
    }


    public function update(StudentRequest $request, $id){
        $validated = $request->validated();
        $old_data = User::find($id);
        if ($request->hasFile('image')) {
            if ($old_data->image) {
                Storage::disk('public')->delete($old_data->image);
            }
            $validated['image'] = $request->file('image')->store('all-user', 'public');
        }
        $old_data->update($validated);
        return redirect()->route('users')->with('success','User updated successfully');
    }

    public function delete($id){
        $old_data = User::find($id);
        if ($old_data->image) {
            Storage::disk('public')->delete($old_data->image);
        }
        $old_data->delete();
        return redirect()->route('users')->with('success','User deleted successfully');
    }
}
