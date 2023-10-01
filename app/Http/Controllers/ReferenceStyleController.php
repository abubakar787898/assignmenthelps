<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\HelperMessage;
use App\Models\ReferenceStyle;
use Illuminate\Http\Request;

class ReferenceStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reference_styles = ReferenceStyle::get();

        return  $reference_styles
            ? Helper::sendResponse(['reference_styles' => $reference_styles], HelperMessage::fetch("Reference Style "))
            : Helper::sendError(HelperMessage::error("reference_style Index ")  . "", 400);
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
        $reference_style = new ReferenceStyle();
        if (isset($request->name)) $reference_style->name = $request->name;
       
     
        return  ($reference_style->save())
            ? Helper::sendResponse(['reference_style' => $reference_style], HelperMessage::create("ReferenceStyle "))
            : Helper::sendError(HelperMessage::error("reference_styleController Store ") . "", 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reference_style = ReferenceStyle::find($id);

        return  $reference_style
            ? Helper::sendResponse(['reference_style' => $reference_style], HelperMessage::fetch("ReferenceStyle "))
            : Helper::sendError(HelperMessage::error("ReferenceStyleController show ") . "", 400);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReferenceStyle $referenceStyle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $reference_style = ReferenceStyle::find($id);
        if (isset($request->name)) $reference_style->name = $request->name;
       
     
        return  ($reference_style->save())
            ? Helper::sendResponse(['reference_style' => $reference_style], HelperMessage::update("ReferenceStyle "))
            : Helper::sendError(HelperMessage::error("reference_styleController Store ") . "", 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reference_style = ReferenceStyle::find($id)->delete();

        return  $reference_style
            ? Helper::sendResponse(['reference_style' => $reference_style], HelperMessage::delete("ReferenceStyle "))
            : Helper::sendError(HelperMessage::error("ReferenceStyleController delete ") . "", 400);
    }
}
