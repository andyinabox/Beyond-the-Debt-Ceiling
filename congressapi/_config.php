<?php

Object::add_extension('SiteConfig', 'SLSiteConfig');

Director::addRules(100,
	array(
		'leg//$Action/$Query' => 'SLCongressController'
	)
);