<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\HelperMessage;
use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $education_levels = EducationLevel::get();

        return  $education_levels
            ? Helper::sendResponse(['education_levels' => $education_levels], HelperMessage::fetch("Education Level "))
            : Helper::sendError(HelperMessage::error("education_level Index ")  . "", 400);
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
        //
        $education_level = new EducationLevel();
        if (isset($request->name)) $education_level->name = $request->name;
       
     
        return  ($education_level->save())
            ? Helper::sendResponse(['education_level' => $education_level], HelperMessage::create("EducationLevel "))
            : Helper::sendError(HelperMessage::error("education_levelController Store ") . "", 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $education_level = EducationLevel::find($id);

        return  $education_level
            ? Helper::sendResponse(['education_level' => $education_level], HelperMessage::fetch("EducationLevel "))
            : Helper::sendError(HelperMessage::error("EducationLevelController show ") . "", 400);
    
    }
    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $education_level = EducationLevel::find($id);
        if (isset($request->name)) $education_level->name = $request->name;
       
     
        return  ($education_level->save())
            ? Helper::sendResponse(['education_level' => $education_level], HelperMessage::update("EducationLevel "))
            : Helper::sendError(HelperMessage::error("education_levelController Store ") . "", 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $education_level = EducationLevel::find($id)->delete();

        return  $education_level
            ? Helper::sendResponse(['education_level' => $education_level], HelperMessage::delete("EducationLevel "))
            : Helper::sendError(HelperMessage::error("EducationLevelController delete ") . "", 400);
    }
}
