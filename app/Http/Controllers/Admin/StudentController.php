<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        //return "Halo, kami sedang belajar laravel"
        // $students = Student::paginate(10);
        $students = Student::all();
        $title = "Student Table";
        return view('admin.student', compact('title', 'students'));
    }

    public function simpan(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);
        Student::create($request->all());
        return redirect()->route('student')->with('success', 'Student created successfulyl');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('student')->with('success', 'Student updated successfully');
    }

    public function hapus($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student')->with('success', 'Student deleted successfully');
    }
}
