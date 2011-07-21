<?php
class Vote extends DataObject {
	static $db = array(
		'Choice' => 'Int',
		'IP' => 'Text'
	);
	
	/**
	 * Returns the total times given value was voted on.
	 *
	 * @return Number of votes
	 */
	static function vote_count($vote) {
		$query = new SQLQuery(
			"COUNT(Choice)",
			"Vote",
			"Choice=$vote"
		);
		return $query->execute()->value();
	}
	
	static function all_votes_count() {
		$query = new SQLQuery(
			"COUNT(Choice)",
			"Vote",
			"Choice BETWEEN 1 AND 5");
		return $query->execute()->value();
	}
	
	static function vote_percentage($vote) {
		return self::vote_count($vote)/self::all_votes_count();
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
			'add',
			'stats'
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
		
		/**
		 * Adds vote to the db.
		 *
		 * @return Vote data.
		 */
		protected function stats() {
			// if($this->isAjax) {
				$args = array();
				$vote = Director::urlParam('Vote');
				if($vote) {
					$args = array(
						'Choice' => Director::urlParam('Vote'),
						'AllVotesCount' => Vote::all_votes_count(),
						'VoteCount' => Vote::vote_count($vote),
						'VotePercentage' => Vote::vote_percentage($vote)
					);
				}	
				$json = json_encode($args);
				return $json;
			// }
		}	
}
	
?>