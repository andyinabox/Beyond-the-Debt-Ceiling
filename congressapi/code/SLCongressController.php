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
		'loc',
		'ip'
	);
	
	/**
	 * Return a query-able SunlightLegislator object
	 * 
	 * @return SunlightLegislator
	 */
	protected function _connectSL() {
		$api = SiteConfig::current_site_config()->SLApiKey;
		$sl = new SunlightLegislator();
		$sl->api_key = $api;
		return $sl;
	}
	
	/**
	 * Return a query-able IPInfo object
	 * 
	 * @return ip2location_lite
	 */
	protected function _connectIP() {
		$api = SiteConfig::current_site_config()->IPInfoKey;
		$ipLite = new ip2location_lite();
		$ipLite->setKey($api);
		return $ipLite;
	}
	
	/**
	 * Return the current user's IP address
	 *
	 * @return ip address
	 */
	public function ip() {
		return json_encode(array('ip' => $this->_ip())); 
	}
	
	
	/**
	 * Return the current user's IP address
	 *
	 * @return unknown
	 */
	protected function _ip() {
		return $_SERVER['REMOTE_ADDR'];
	}
	
	/**
	 * Return location php object.
	 *
	 * @return Location
	 */
	public function loc() {
		$ipInfo = $this->_connectIP();
		if(Director::urlParam('Query')) {
			$ip = Director::urlParam('Query');
		} else {
			$ip = $this->_ip();
		}
		$location = $ipInfo->getCity($ip);
		if($location['countryCode'] != "US") {
			$location['success'] = 0;

			// FOR TESTING ONLY!!
//			$location['zipCode'] = 53703;
		} else {
			$location['success'] = 1;
		}
		$json = json_encode($location);
		return $json;
	}
	
	protected function getZipCode() {
		
	}
	
	/**
	 * Query for all legislator data by zipcode
	 *
	 * @return JSON
	 */
	public function zip() {
		$sl = $this->_connectSL();
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