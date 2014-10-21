<?php namespace BustedBinky\Http\Filters;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class LowercaseUrlFilter {

	/**
	 * Run the request filter.
	 *
	 * @param  Route  $route
	 * @param  Request  $request
	 * @return mixed
	 */
	public function filter(Route $route, Request $request)
	{
		return $route;
	}

	public function isPartUppercase(String $string) 
	{
		return (bool) preg_match(‘/[A-Z]/’, $string);
	}

}
