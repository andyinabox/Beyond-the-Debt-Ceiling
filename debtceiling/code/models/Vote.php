<?php
class Vote extends DataObject {
	static $db = array(
		'Choice' => 'Int',
		'IP' => 'Text'
	);
	
	/**
	 * Takes a vote value, and calculates what percent of total votes voted
	 * for that value.
	 *
	 * @return Decimal percentage (80% = .8)
	 */
	public function percent($vote) {
		// $query = new SQLQuery(
		// 	"COUNT(Vote)");
		// $query->count()
		
	}
	
}

class Vote_Controller extends Controller {
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
			'add'
		);
		
		// below we work out if the page is called as AJAX or as a normal page
	 // the init function always runs.
	 // we have added the $_GET["ajaxDebug"] for testing purposes
	 // you can test the ajax output by loading the page as /mysite/?ajaxDebug=1
	 function init(){
	  //add a javascript library for easy interaction with the server
	  Requirements::javascript('mysite/javascript/jQuery.js');
	  if(Director::is_ajax() || $_GET["ajaxDebug"]) {
	   $this->isAjax = true;
	  } else {
	   $this->isAjax = false;
	  } 
	  parent::init();
	 }
		
		
		/**
		 * Adds vote to the db.
		 *
		 * @return Vote data.
		 */
		protected function add() {
			if($this->isAjax) {
				$args = array(
					'Choice' => Director::urlParam('Vote'),
					'IP' => Director::urlParam('IP')
				);
			
				$vote = new Vote($args);
			
				if($vote->write()) {
					$args['success'] = true;
				} else {
					$args['success'] = false;
				}
			
				$json = json_encode($args);
				return $json;
			} else {
				return Director::redirect('/');
			}
		}
}
	
?>