<?php

namespace App\Http\Controllers;

use App\Models\MC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MCController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('microcontrollers.userCommands');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function lastcommand($robot)
	{
		// 'robot_commands' => DB::table('robot_commands')->findOrFail($robot)->last()
		//Actions::where('robot', input('robot'())->last();
		$robot = 'robot';
		return view('microcontrollers.lastCommand', compact('robot'));

		// return view('microcontrollers.lastCommand')->with('robot', $robot);

		// return view('microcontrollers.lastCommand',[
		// 	'robot' => $robot
		// ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		DB::table('robot_commands')->insertOrIgnore([
			"action" => $request->move
		]);
		// INSERT INTO `robot_commands`(`action`) VALUES ("attack")
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\MC  $mC
	 * @return \Illuminate\Http\Response
	 */
	public function show(MC $mC)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\MC  $mC
	 * @return \Illuminate\Http\Response
	 */
	public function edit(MC $mC)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\MC  $mC
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, MC $mC)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\MC  $mC
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(MC $mC)
	{
		//
	}
}
