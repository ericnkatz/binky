<?php namespace BustedBinky\Providers;

use Illuminate\Support\ServiceProvider;

class AmazonServiceProvider extends ServiceProvider {
	

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('amazon', function($app)
		{
			return new \BustedBinky\Pricing\Amazon;
		});
		
	}

}
