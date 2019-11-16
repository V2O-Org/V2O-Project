<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instruction;
use App\Http\Requests\InstructionCreateRequest;
    
class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $instruction = new Instruction;
        return view('Instruction/create')->with('instruction', $instruction);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructionCreateRequest $request)
    {
        //
        Instruction::create([
            'activity_name' => $request->activity_name,
            'required_item' => $request->required_item,
            'meeting_point' => $request->meeting_point,
            'date' => $request->date,
            'time' => $request->time,
            'attire' => $request->attire,
            'document' => $request->document
        ]);
        return redirect(url('instruction/create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $instruction = Instruction::findOrFail($id);
        return view('Instruction/edit')->with('instruction', $instruction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstructionCreateRequest $request, $id)
    {
        $instruction = Instruction::findOrFail($id);
        $instruction->activity_name = $request->activity_name;
        $instruction->required_item = $request->required_item;
        $instruction->meeting_point = $request->meeting_point;
        $instruction->date = $request->date;
        $instruction->time = $request->time;
        $instruction->attire = $request->attire;
        $instruction->document = $request->document;
        $instruction->save();
        return redirect(url('instruction'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instruction = Instruction::findOrFail($id);
        $instruction->delete();
        return redirect(url('instruction'));
    }
}
