<?php namespace BustedBinky\Providers;

use Illuminate\Support\ServiceProvider;

class EtsyServiceProvider extends ServiceProvider {
	

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('etsy', function($app)
		{
			return new \BustedBinky\Pricing\Etsy;
		});
		
	}

}
