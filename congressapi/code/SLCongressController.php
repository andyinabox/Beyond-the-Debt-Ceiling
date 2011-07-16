<?php

class SLCongressController extends ContentController {
	 
/* An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	public static $allowed_actions = array (
		'zip',
		'getLocation'
	);
	
	/**
	 * Return a query-able SunlightLegislator object
	 * 
	 * @return SunlightLegislator
	 */
	protected function _connect() {
		$api = SiteConfig::current_site_config()->SLApiKey;
		$sl = new SunlightLegislator();
		$sl->api_key = $api;
		return $sl;
	}
	
	/**
	 * Return the current user's IP address
	 *
	 * @return unknown
	 */
	protected function ip() {
		return $_SERVER['REMOTE_ADDR'];
	}
	
	/**
	 * Return location php object.
	 *
	 * @return Location
	 */
	public function getLocation() {
		 $locator = new Locator();
//		 $ip = $this->ip();
		 $ip = Director::urlParam('Query');
		 $location = $locator->getGeoLocation($ip);
		 Debug::dump($location);
//		 return $location;
	}
	
	protected function getZipCode() {
		
	}
	
	/**
	 * Query for all legislator data by zipcode
	 *
	 * @return JSON
	 */
	public function zip() {
		$sl = $this->_connect();
		if($zip = Director::urlParam('Query')) {
			$leg = $sl->legislatorZipCode($zip);
			if(count((array)$leg)) {
				$leg->success = 1;
			} else {
				$leg->success = 0;
			}
			$json = json_encode($leg);
			return $json;
		}
		return json_encode(array());
	}
}