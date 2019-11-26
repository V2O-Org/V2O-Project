<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\ActivityEvaluation;

class ActivityEvaluationController extends Controller
{

/*
	 public function __construct()
    {
        $this->middleware('auth:vol')->except(['index', 'show']);
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$activityevaluations = ActivityEvaluation::all();
		return view('activityevaluation/index')->with('activityevaluations', $activityevaluations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$activityevaluation = new ActivityEvaluation;
		return view('activityevaluation/create')->with('activityevaluation',$activityevaluation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		ActivityEvaluation::create([
		
		
		'activity_id' => $request ->activity_id,
            'volunteer_id' =>$request ->volunteer_id,
		  
            'rating' =>$request->input('rate'),
            'comment' =>$request->comment,
		]);
		
		 
		
		
		return redirect(url('actrate'));
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
		$activityevaluation = ActivityEvaluation::findOrFail($id);
		return view('activityevaluation/show')->with('activityevaluation',$activityevaluation);
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
		$activityevaluation = ActivityEvaluation::findOrFail($id);
		return view('activityevaluation/edit')->with('activityevaluation',$activityevaluation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$activityevaluation = ActivityEvaluation::findOrFail($id);
		$activityevaluation->rating = $request->input(rate);
		$activityevaluation->comment = $request->comment;
		$activityevaluation->save();
		
		return redirect(url('activityevaluation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$activityevaluation = ActivityEvaluation::findOrFail($id);
		$activityevaluation->delete();
		return redirect(url('activityevaluation'));
		
    }
}
