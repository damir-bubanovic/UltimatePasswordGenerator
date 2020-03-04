<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneratePassController extends Controller
{
    /**
     * [Generate Password]
     * @param  Request 	$request 	[data]
     * @return [string] $password   [random characters]
     */
    public function create(Request $request) {   	

        $uppercase_option = $request->{'uppercase'};
    	$lowercase_option = $request->{'lowercase'};
    	$numbers_option = $request->{'numbers'};
    	$symbols_option = $request->{'symbols'};

    	$special_characters = '!@#$%^&*()_-=+;:,.?';
    	$length = rand(16, 20); 
    	$characters = [];
    	$password = '';

    	$uppercase = range('A', 'Z');
    	$lowercase = range('a', 'z');
    	$numbers = range(0, 9);
    	$symbols = str_split($special_characters);


    	if ($uppercase_option == 1) {
    		$characters = array_merge($characters, $uppercase);
    	};
    	if ($lowercase_option == 1) {
    		$characters = array_merge($characters, $lowercase);
    	};
    	if ($numbers_option == 1) {
    		$characters = array_merge($characters, $numbers);
    	};
    	if ($symbols_option == 1) {
    		$characters = array_merge($characters, $symbols);
    	};

    	// Generate password
    	for ($i=0; $i < $length; $i++) { 
    		$password .= $characters[array_rand($characters)];
    	}

    	return $password;
    	
    }

}
