<?php
 
class SLSiteConfig extends DataObjectDecorator {
     
    function extraStatics() {
        return array(
            'db' => array(
                'SLApiKey' => 'Varchar(255)',
        		'IPInfoKey' => 'Varchar(255)'
            )
        );
    }
 
    public function updateCMSFields(FieldSet $fields) {
    	$fields->addFieldToTab("Root.CongressAPI", new LiteralField("Instructions", "<p>The Congress API uses the Sunlight Congress API, and requires an API key.
    	You can register to get an API key here: <a href='http://services.sunlightlabs.com/accounts/register/' target='_blank'>http://services.sunlightlabs.com/accounts/register/</a>"));
        $fields->addFieldToTab("Root.CongressAPI", new TextField("SLApiKey", "Sunlight API Key"));
        
        $fields->addFieldToTab("Root.CongressAPI", new LiteralField("Instructions", "<p>The Congress API uses the IPInfoDB's API for gathering location
        info from IP address, and it requires an API key as well.
    	You can register to get an API key here: <a href='http://www.ipinfodb.com/register.php' target='_blank'>http://www.ipinfodb.com/register.php</a>"));
        $fields->addFieldToTab("Root.CongressAPI", new TextField("IPInfoKey", "IPInfoDB API Key"));
    }
}