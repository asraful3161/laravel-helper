<?php
namespace Helpers;
/**
* static class for x-editable plugins
*/
class Xedit{
	static protected $attr=[
		'field'=>'field',
		'type'=>'text',
		'tbl'=>'table',
		'id'=>0,
		'url'=>'/URL',
		'val'=>'Value',
		'title'=>'Title',
		'class'=>'xedit'
	];

	private function __construct(){}

	public static function attr(){
		return self::$attr;
	}

	public static function render($args=[]){
		$attr=self::$attr=array_merge(self::$attr,$args);
		return "<a href='#' class='$attr[class]' id='$attr[field]' data-type='$attr[type]' data-pk='$attr[tbl]:$attr[id]' data-url='$attr[url]' data-title='$attr[title]'>$attr[val]</a>\n";
	}
}