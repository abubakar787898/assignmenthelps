<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\HelperMessage;
use App\Models\NoWords;
use Illuminate\Http\Request;

class NoWordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no_words = NoWords::get();

        return  $no_words
            ? Helper::sendResponse(['no_words' => $no_words], HelperMessage::fetch("Education Level "))
            : Helper::sendError(HelperMessage::error("no_word Index ")  . "", 400);
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
        $no_word = new NoWords();
        if (isset($request->name)) $no_word->name = $request->name;
       
     
        return  ($no_word->save())
            ? Helper::sendResponse(['no_word' => $no_word], HelperMessage::create("NoWords "))
            : Helper::sendError(HelperMessage::error("no_wordController Store ") . "", 400);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $no_word = NoWords::find($id);

        return  $no_word
            ? Helper::sendResponse(['no_word' => $no_word], HelperMessage::fetch("NoWords "))
            : Helper::sendError(HelperMessage::error("NoWordsController show ") . "", 400);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NoWords $noWords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $no_word = NoWords::find($id);
        if (isset($request->name)) $no_word->name = $request->name;
       
     
        return  ($no_word->save())
            ? Helper::sendResponse(['no_word' => $no_word], HelperMessage::update("NoWords "))
            : Helper::sendError(HelperMessage::error("no_wordController Store ") . "", 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $no_word = NoWords::find($id)->delete();

        return  $no_word
            ? Helper::sendResponse(['no_word' => $no_word], HelperMessage::delete("NoWords "))
            : Helper::sendError(HelperMessage::error("NoWordsController delete ") . "", 400);
    }
}
