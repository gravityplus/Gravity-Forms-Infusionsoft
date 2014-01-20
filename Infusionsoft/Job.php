<?php
class Infusionsoft_Job extends Infusionsoft_Generated_Job{
    var $customFieldFormId = -9;
    
    public function __construct($id = null, $app = null){
    	parent::__construct($id, $app);    	    	
    }

    public function addCustomFields($fields){
        foreach($fields as $name){
            self::addCustomField($name);
        }
	}
}

