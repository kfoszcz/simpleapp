<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Contracts\Filesystem\FileNotFoundException;

class HomeController extends Controller
{
    /**
     * Show homepage form
     *
     * @return \Illuminate\Http\Response
     */
    public function form() {
        return view('form');
	}

	/**
	 * Show table with uploaded data
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function table() {
		$people = Person::all();
		return view('table', compact('people'));
	}

	/**
	 * Show uploaded image
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function image($name) {
		$path = 'images/' . $name;
		try {
			$image = Storage::get($path);
		}
		catch (FileNotFoundException $e) {
			abort(404);
		}
		$mimetype = Storage::mimeType($path);
		return response()->make($image, 200, ['content-type' => $mimetype]);
	}

	/**
	 * Save data from homepage form
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function save(Request $request) {
		$validated = $this->validate($request, [
			'firstname' => 'required',
			'file' => 'required|mimes:jpeg,png'
		], [
			'firstname.required' => 'Pole imię jest wymagane.',
			'file.required' => 'Plik jest wymagany.',
			'file.mimes' => 'Plik musi być w formacie JPG lub PNG.'
		]);

		// code below is executed only if validation was successful

		$person = new Person;
		$person->firstname = $request->firstname;
		$person->lastname = $request->lastname;
		$person->image = basename($request->file->store('images'));
		$person->save();
		
		return response()->json(['status' => 'ok'], 200);
	}
}
