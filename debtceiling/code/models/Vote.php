<?php
class Vote extends DataObject {
	static $db = array(
		'Choice' => 'Int',
		'IP' => 'Text'
	);
}

class Vote_Controller extends Controller {
	
}
	
?>