<?php
 
namespace Zent\Lienquanrank\Providers;
 
use Illuminate\Support\ServiceProvider;
 
class LienquanrankServiceProvider extends ServiceProvider
{
    /**
     * Function boot.
     *
     * @return here
     * @author ThanhTung
     */
    public function  boot() {

    }

	/*
	 * Funtion register
	 */
	
	public function register()
	{	
		/*
		 * Call routes in this modules
		 */
	    $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

	    /*
	     * When call return view use: return view('lienquanrank: view-name');
	     */
	    $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'lienquanrank');

	    /*
	     * Call migrations in this modules
	     */
	    $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

	    /*
	     * Call translation
	     */
	}
}
