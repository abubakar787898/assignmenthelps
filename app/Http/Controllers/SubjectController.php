<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\HelperMessage;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::get();

        return  $subjects
            ? Helper::sendResponse(['subjects' => $subjects], HelperMessage::fetch("Subject "))
            : Helper::sendError(HelperMessage::error("subject Index ")  . "", 400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject = new Subject();
        if (isset($request->name)) $subject->name = $request->name;
       
     
        return  ($subject->save())
            ? Helper::sendResponse(['subject' => $subject], HelperMessage::create("Subject "))
            : Helper::sendError(HelperMessage::error("subjectController Store ") . "", 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subject = Subject::find($id);

        return  $subject
            ? Helper::sendResponse(['subject' => $subject], HelperMessage::fetch("Subject "))
            : Helper::sendError(HelperMessage::error("SubjectController show ") . "", 400);
    
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $subject = Subject::find($id);
        if (isset($request->name)) $subject->name = $request->name;
       
     
        return  ($subject->save())
            ? Helper::sendResponse(['subject' => $subject], HelperMessage::update("Subject "))
            : Helper::sendError(HelperMessage::error("subjectController Store ") . "", 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::find($id)->delete();

        return  $subject
            ? Helper::sendResponse(['subject' => $subject], HelperMessage::delete("Subject "))
            : Helper::sendError(HelperMessage::error("SubjectController delete ") . "", 400);
    }
}
