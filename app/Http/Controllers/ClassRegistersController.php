<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassRegister;
use App\Models\School;
use Illuminate\Http\Request;
use Exception;

class ClassRegistersController extends Controller
{

    /**
     * Display a listing of the class registers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $classRegisters = ClassRegister::with('school')->paginate(25);

        return view('class_registers.index', compact('classRegisters'));
    }

    /**
     * Show the form for creating a new class register.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $schools = School::pluck('name','id')->all();
        
        return view('class_registers.create', compact('schools'));
    }

    /**
     * Store a new class register in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ClassRegister::create($data);

            return redirect()->route('class_registers.class_register.index')
                ->with('success_message', 'Class Register was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified class register.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $classRegister = ClassRegister::with('school')->findOrFail($id);

        return view('class_registers.show', compact('classRegister'));
    }

    /**
     * Show the form for editing the specified class register.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $classRegister = ClassRegister::findOrFail($id);
        $schools = School::pluck('name','id')->all();

        return view('class_registers.edit', compact('classRegister','schools'));
    }

    /**
     * Update the specified class register in the storage.
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
            
            $classRegister = ClassRegister::findOrFail($id);
            $classRegister->update($data);

            return redirect()->route('class_registers.class_register.index')
                ->with('success_message', 'Class Register was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified class register from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $classRegister = ClassRegister::findOrFail($id);
            $classRegister->delete();

            return redirect()->route('class_registers.class_register.index')
                ->with('success_message', 'Class Register was successfully deleted.');
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
            'gender' => 'nullable',
            'class' => 'string|min:1|nullable',
            'school_id' => 'nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
