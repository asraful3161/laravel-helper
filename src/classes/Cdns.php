<?php
namespace Helpers;

use Illuminate\Support\Facades\Storage;

class Cdns{

	static protected $css=[], $js=[];

	protected function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    static protected function initiate_css(){

    	if(!self::$css && Storage::exists('css.json')){

    		self::$css=json_decode(Storage::get('css.json'), TRUE);

    	}

    }

    static protected function initiate_js(){

    	if(!self::$js && Storage::exists('js.json')){

    		self::$js=json_decode(Storage::get('js.json'), TRUE);
    		
    	}

    }

    static public function css($args=[]){

    	self::initiate_css();

    	$html='';

    	foreach($args as $cdn){

    		if(isset(self::$css[$cdn])){
    			$html.="<link rel='stylesheet' type='text/css' href='".self::$css[$cdn]."'>";
    		}

    	}

    	return $html;

    }

    static public function js($args=[]){

    	self::initiate_js();

    	$html='';

    	foreach($args as $cdn){

    		if(isset(self::$js[$cdn])) $html.="<script src='".self::$js[$cdn]."'></script>";

    	}

    	return $html;

    }
	
}