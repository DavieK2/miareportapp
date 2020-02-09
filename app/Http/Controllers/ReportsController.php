<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Exception;

class ReportsController extends Controller
{

    /**
     * Display a listing of the reports.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $reports = Report::paginate(25);

        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new report.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('reports.create');
    }

    /**
     * Store a new report in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Report::create($data);

            return redirect()->route('reports.report.index')
                ->with('success_message', 'Report was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified report.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);

        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified report.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        

        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified report in the storage.
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
            
            $report = Report::findOrFail($id);
            $report->update($data);

            return redirect()->route('reports.report.index')
                ->with('success_message', 'Report was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified report from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $report = Report::findOrFail($id);
            $report->delete();

            return redirect()->route('reports.report.index')
                ->with('success_message', 'Report was successfully deleted.');
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
            'mia_centre_name' => 'string|min:1|max:255|nullable',
            'date' => 'string|min:1|nullable|date_format:d-m-Y',
            'attendace' => 'string|min:1|nullable|numeric|max:2147483647',
            'class_total' => 'string|min:1|nullable|numeric|max:2147483647',
            'mia_course' => 'nullable',
            'lesson_note' => 'string|min:1|nullable',
            'subject' => 'string|min:1|max:255|nullable',
            'report_statement' => 'string|min:1|nullable',
            'challenges' => 'string|min:1|nullable',
            'suggestions' => 'string|min:1|nullable',
            'file' => ['file','nullable'], 
        ];

        
        $data = $request->validate($rules);

        if ($request->has('custom_delete_file')) {
            $data['file'] = null;
        }
        if ($request->hasFile('file')) {
            $data['file'] = $this->moveFile($request->file('file'));
        }



        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
        
        $path = config('codegenerator.files_upload_path', 'uploads');
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
