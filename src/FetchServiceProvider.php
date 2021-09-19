<?php

namespace Nnjeim\Fetch;

use Illuminate\Support\ServiceProvider;

class FetchServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 */
	public function boot()
	{
		// Load translations
		$this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'fetch');

		// Load the configurations
		$this->mergeConfigFrom(__DIR__ . '/../config/fetch.php', 'fetch');

		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../config/fetch.php' => config_path('fetch.php'),
			]);
		}
	}

	/**
	 * Register the application services.
	 */
	public function register()
	{
		// Register the main class to use with the facade
		$this->app->singleton('fetch', function () {
			return new FetchHelper();
		});
	}
}
