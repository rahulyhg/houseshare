<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
		
		$siteValue 	 =  DB::table('settings')->select('settings.slug','settings.value')->get();
		foreach($siteValue as $val){
			Session::put('SiteValue.'. $val->slug, $val->value);
		}
		
	}

}
