<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
function css_asset($asset_name)
{
	return '<link href="'.base_url().'assets/css/'.$asset_name.'" rel="stylesheet" type="text/css"/>';
}

function image_asset($asset_name)
{
	list($width, $height, $type, $attr) = getimagesize(base_url().'assets/images/'.$asset_name);
	return "<img src=\"".base_url()."assets/images/".$asset_name."\" ".$attr." />";
}

function js_asset($asset_name)
{
	return '<script type="text/javascript" src="'.base_url().'assets/js/'.$asset_name.'"></script>';
}

function data_image($asset_name)
{
	return '<img src="'.base_url().'assets/images/data/'.$asset_name.'"/>';
}

function path_asset($asset_name)
{
	return base_url().'assets/'.$asset_name;
}

function extjs_asset()
{
	return '
<link rel="stylesheet" type="text/css" href="'.base_url().'assets/extjs/resources/css/ext-all-gray.css" />
<script type="text/javascript" src="'.base_url().'assets/extjs/bootstrap.js"></script>
<script type="text/javascript" src="'.base_url().'extjs/store.js"></script>
<script type="text/javascript" src="'.base_url().'extjs/tree.js"></script>
<script type="text/javascript" src="'.base_url().'extjs/panel.js"></script>
<script type="text/javascript" src="'.base_url().'extjs/window.js"></script>
<script type="text/javascript" src="'.base_url().'extjs/main.js"></script>
	';
}

function quran_mp3($filenya) {
	return '
	<object width="480" height="24" id="audioplayer1" data="'.base_url().'assets/swf/player.swf" type="application/x-shockwave-flash"><param value="'.base_url().'assets/swf/player.swf" name="movie"><param value="playerID=1&amp;bg=0xEFEFEF&amp;leftbg=0xCCCCCC&amp;lefticon=0x666666&amp;rightbg=0xB6E1E1&amp;                 rightbghover=0x9BA948&amp;righticon=0x798732&amp;righticonhover=0xFFFFFF&amp;   text=0x666666&amp;slider=0x666666&amp;track=0xFFFFFF&amp;border=0x666666&amp;loader=0xEDF4CA&amp;soundFile='.base_url().'assets/quran_'.$filenya.'" name="FlashVars"><param value="high" name="quality"><param value="false" name="menu"><param value="transparent" name="wmode"></object>
	';
}

function quran_img($filenya) {
	list($width, $height, $type, $attr) = getimagesize(base_url().'assets/'.$filenya);
	return "<img src=\"".base_url()."assets/".$filenya."\" ".$attr." />";
}