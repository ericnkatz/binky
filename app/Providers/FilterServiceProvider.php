<?php namespace BustedBinky\Providers;

use Illuminate\Foundation\Support\Providers\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'BustedBinky\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'BustedBinky\Http\Filters\AuthFilter',
		'auth.basic' => 'BustedBinky\Http\Filters\BasicAuthFilter',
		'csrf' => 'BustedBinky\Http\Filters\CsrfFilter',
		'guest' => 'BustedBinky\Http\Filters\GuestFilter',
	];

}
