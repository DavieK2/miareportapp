<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use App\Upload;

class UploadController extends Controller
{
    public function index()
    {
        $uploads = Upload::all();
        return view('uploads.index', compact('uploads'));
    }

    public function create()
    {
        return view('uploads.create');
    }



    public function destroy($uuid)
    {
        try {
            $upload = Upload::where('uuid', $uuid)->firstOrFail();
            $upload->delete();

            return redirect()->route('uploads.index')
                ->with('success_message', 'File was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }




    public function store(Request $request)
    {
        $upload= $request->all();
        $upload['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('file')) {
            $upload['file'] = $request->file->getClientOriginalName();
            $request->file->storeAs('uploads', $upload['file']);
        }
        Upload::create($upload);
        return redirect()->route('uploads.index');
    }


public function download($uuid)
{
    $upload = Upload::where('uuid', $uuid)->firstOrFail();
    $pathToFile = storage_path('app/uploads/' . $upload->file);
    return response()->download($pathToFile);
    }
}

