<?php
function fa($icon){
	return "<i class='fa $icon' aria-hidden='true'></i> ";
}

function setFlash($key,$value){
	request()->session()->put($key,$value);
}

function getFlash($key){
 	return request()->session()->pull($key);
}

function readFlash($key){
	return request()->session()->get($key);
}

function hasFlash($key){
	return request()->session()->has($key);
}

function btnEdit($args=[]){

	$attr=[
		'url'=>'#',
		'icon'=>'fa-pencil',
		'class'=>'text-primary',
		'btnClass'=>'btn btn-default btn-xs'
	];

	$attr=array_merge($attr,$args);
	return "<a class='$attr[btnClass]' href='$attr[url]' title='Edit' onclick='return action_confirm()'><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true'></i></a>";
}

function btnDelete($args=[]){
	$attr=[
		'url'=>'#',
		'icon'=>'fa-trash-o',
		'class'=>'text-danger',
		'btnClass'=>'btn btn-default btn-xs'
	];
	$attr=array_merge($attr, $args);
	return "<form method='POST' action='$attr[url]'>".csrf_field().method_field('DELETE')."<button type='submit' class='$attr[btnClass]' title='Delete' onclick='return action_confirm()'><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true' title='Delete'></i></button></form>";
}

function btnCustome($args=[]){
	$attr=[
		'url'=>'#',
		'icon'=>'fa-exclamation-circle',
		'class'=>'text-primary',
		'title'=>'',
		'btnClass'=>'btn btn-default btn-xs'
	];
	$attr=array_merge($attr,$args);
	return "<a class='$attr[btnClass]' href='$attr[url]' title='$attr[title]' onclick='return action_confirm()'><i class='$attr[class] fa $attr[icon] fa-lg' aria-hidden='true'></i> $attr[title]</a>";
}

function in($urls=[]){
	$currentUrl=url()->current();
	foreach($urls as $url) if($currentUrl==url($url)) return 'in';
}

function active($url=''){
	$currentUrl=url()->current();
	if($currentUrl==url($url)) return 'active';
	return '';
}

function goBack($args=[]){
	$attr=[
		'class'=>'btn btn-default',
		'icon'=>'text-info fa-reply',
		'title'=>'Go back'
	];	
	$attr=array_merge($attr,$args);
	return "<buton type='button' class='$attr[class]' onclick='window.history.back();'/><i class='fa $attr[icon]'></i> $attr[title]</buton>";
}

function btnAddNew($args=[]){
	$attr=[
		'class'=>'pull-right btn btn-default btn-xs',
		'icon'=>'text-info fa-plus-circle fa-lg',
		'title'=>'Add New',
		'url'=>'#'
	];	
	$attr=array_merge($attr,$args);
	return "<a href='$attr[url]' class='$attr[class]'><i class='fa $attr[icon]'></i> $attr[title]</a>";
}

function Xedit($args=[]){
	return \App\Helpers\Xedit::render($args);
}

function label($get_string){
	return ucwords(str_replace(['_','-'], ' ', trim($get_string)));
}

function css($args=[]){
	return \App\Helpers\Cdns::css($args);
}

function js($args=[]){
	return \App\Helpers\Cdns::js($args);
}

function unpkg($pkg=NULL){
	$url="https://unpkg.com";
	if(is_string($pkg)){
		if(preg_match("/\.css$/", $pkg)) return "<link rel='stylesheet' type='text/css' href='{$url}/{$pkg}'>";
		elseif(preg_match("/\.js$/", $pkg)) return "<script src='{$url}/{$pkg}'></script>";
	}elseif(is_array($pkg)){
		$html='';
		foreach($pkg as $row){
			if(preg_match("/\.css$/", $row)) $html.="<link rel='stylesheet' type='text/css' href='{$url}/{$row}'>";
			elseif(preg_match("/\.js$/", $row)) $html.="<script src='{$url}/{$row}'></script>";
		}
		return $html;
	}
}