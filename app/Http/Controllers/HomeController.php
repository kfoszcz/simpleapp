<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
	}
	
	public function save(Request $request) {
		$validated = $this->validate($request, [
			'firstname' => 'required',
			'file' => 'mimes:jpeg,png'
		], [
			'firstname.required' => 'Pole imię jest wymagane.',
			'file.mimes' => 'Plik musi być w formacie JPG lub PNG.'
		]);

		// code below is executed only if validation was successful
		
		$response = [
			'firstname' => $request->input('firstname'),
			'lastname' => $request->input('lastname'),
			'file' => $request->hasFile('file')
		];
		return $response;
	}
}
