<?php

namespace App\Http\Controllers;
use App\Providers\ValidationServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;



class StudentController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }
    


    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /*
     * Store a newly created resource in storage.
     */

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' =>'required',
            'mobile' => 'required|numeric|max:9999999999',

        ],
           ['mobile.numeric' => 'The mobile number must be numeric.',
            'mobile.digits_between' => 'The mobile number must be between 1 and 10 digits.',
           ]
        );
     
    
        Student::create($validated);


        // $input = $request->all();
        // Student::create($input);
        return redirect('students')->with('flash_message', 'Students Addedd!');
    }

    


    public function show(string $id): View
    {
        $students = Student::find($id);
        return view('students.show')->with('students', $students);
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $students = Student::find($id);
        return view('students.edit')->with('students', $students);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $students = Student::find($id);
        $input = $request->all();
        $students->update($input);
        return redirect('students')->with('flash_message', 'Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Student deleted!');
    }
}