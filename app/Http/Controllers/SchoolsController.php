<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Exception;

class SchoolsController extends Controller
{

    /**
     * Display a listing of the schools.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $schools = School::paginate(25);

        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new school.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('schools.create');
    }

    /**
     * Store a new school in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            School::create($data);

            return redirect()->route('schools.school.index')
                ->with('success_message', 'School was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified school.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $school = School::findOrFail($id);

        return view('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified school.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);
        

        return view('schools.edit', compact('school'));
    }

    /**
     * Update the specified school in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $school = School::findOrFail($id);
            $school->update($data);

            return redirect()->route('schools.school.index')
                ->with('success_message', 'School was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified school from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $school = School::where('id', $id)->firstOrFail();
            $school->delete();

            return redirect()->route('schools.school.index')
                ->with('success_message', 'School was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'string|min:1|max:255|nullable',
                'location' => 'string|min:1|max:255|nullable', 
                'phone_no' => 'string|min:1|max:255|nullable', 


        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}

