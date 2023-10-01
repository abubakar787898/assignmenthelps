<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\HelperMessage;
use App\Models\DeadLine;
use Illuminate\Http\Request;

class DeadLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deadlines = DeadLine::get();

        return  $deadlines
            ? Helper::sendResponse(['deadlines' => $deadlines], HelperMessage::fetch("Dead Lines "))
            : Helper::sendError(HelperMessage::error("deadline Index ")  . "", 400);
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
        $deadline = new DeadLine();
        if (isset($request->name)) $deadline->name = $request->name;
       
     
        return  ($deadline->save())
            ? Helper::sendResponse(['dead_line' => $deadline], HelperMessage::create("DeadLine "))
            : Helper::sendError(HelperMessage::error("deadlineController Store ") . "", 400);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $deadline = DeadLine::find($id);

        return  $deadline
            ? Helper::sendResponse(['dead_line' => $deadline], HelperMessage::fetch("Deadline "))
            : Helper::sendError(HelperMessage::error("deadlineController show ") . "", 400);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeadLine $deadLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $deadline = DeadLine::find($id);
        if (isset($request->name)) $deadline->name = $request->name;
       
     
        return  ($deadline->save())
            ? Helper::sendResponse(['dead_line' => $deadline], HelperMessage::update("DeadLine "))
            : Helper::sendError(HelperMessage::error("deadlineController Store ") . "", 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dead_line = DeadLine::find($id)->delete();

        return  $dead_line
            ? Helper::sendResponse(['dead_line' => $dead_line], HelperMessage::delete("DeadLLine "))
            : Helper::sendError(HelperMessage::error("DeadLLineController delete ") . "", 400);
    }
}
