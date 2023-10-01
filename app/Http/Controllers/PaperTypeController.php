<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\HelperMessage;
use App\Models\PaperType;
use Illuminate\Http\Request;

class PaperTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paper_types = PaperType::get();

        return  $paper_types
            ? Helper::sendResponse(['paper_types' => $paper_types], HelperMessage::fetch("Paper Type "))
            : Helper::sendError(HelperMessage::error("paper_type Index ")  . "", 400);
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
        $paper_type = new PaperType();
        if (isset($request->name)) $paper_type->name = $request->name;
       
     
        return  ($paper_type->save())
            ? Helper::sendResponse(['paper_type' => $paper_type], HelperMessage::create("PaperType "))
            : Helper::sendError(HelperMessage::error("paper_typeController Store ") . "", 400);
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        $paper_type = PaperType::find($id);

        return  $paper_type
            ? Helper::sendResponse(['paper_type' => $paper_type], HelperMessage::fetch("Paper Type "))
            : Helper::sendError(HelperMessage::error("PaperTypeController show ") . "", 400);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $paper_type = PaperType::find($id);
        if (isset($request->name)) $paper_type->name = $request->name;
       
     
        return  ($paper_type->save())
            ? Helper::sendResponse(['paper_type' => $paper_type], HelperMessage::update("PaperType "))
            : Helper::sendError(HelperMessage::error("paper_typeController Store ") . "", 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paper_type = PaperType::find($id)->delete();

        return  $paper_type
            ? Helper::sendResponse(['paper_type' => $paper_type], HelperMessage::delete("PaperType "))
            : Helper::sendError(HelperMessage::error("PaperTypeController delete ") . "", 400);
    }
}
