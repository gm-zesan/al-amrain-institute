<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $students = User::role('student')->get();
            return DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('phone_no', function($row){
                    return $row->phone_no ?? 'N / A';
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.students.index');
    }

    public function create(){
        return view('admin.students.create');
    }

    public function store(StudentRequest $request){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('all-users', 'public');
        }
        $validated['password'] = bcrypt($request->password);
        $user = User::create($validated);
        $user->assignRole('student');
        return redirect()->route('students.index')->with('success','Student created successfully');
    }

    public function edit(User $student){
        return view('admin.students.edit', compact('student'));
    }

    public function update(StudentRequest $request, User $student){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            $validated['image'] = $request->file('image')->store('all-users', 'public');
        }
        $student->update($validated);
        return redirect()->route('students.index')->with('success','Student updated successfully');
    }

    public function destroy(User $student){
        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }
        $student->delete();
        return redirect()->route('students.index')->with('success','Student deleted successfully');
    }
}
