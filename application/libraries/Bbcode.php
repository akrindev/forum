<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Bbcode
{
  
  /*function __construct()
  {
    parent::__construct();
  }
  */
  
//This function let convert BBcode to HTML
function bbcode_to_html($text)
{
	$text = stripslashes(nl2br(htmlentities($text, ENT_QUOTES, 'UTF-8')));
	$in = array(
			'#\[b\](.*)\[/b\]#Usi',
			'#\[i\](.*)\[/i\]#Usi',
			'#\[u\](.*)\[/u\]#Usi',
			'#\[s\](.*)\[/s\]#Usi',
			'#\[img\](.*)\[/img\]#Usi',
			'#\[url\]((ht|f)tps?\:\/\/(.*))\[/url\]#Usi',
			'#\[url=((ht|f)tps?\:\/\/(.*))\](.*)\[/url\]#Usi',
			'#\[left\](.*)\[/left\]#Usi',
			'#\[center\](.*)\[/center\]#Usi',
			'#\[right\](.*)\[/right\]#Usi',
			'#\[code\](.*)\[/code\]#Usi',
			'#\[reply=(.*)\]#Usi',
			'#\[youtube\](.*)\[\/youtube\]#Usi',
			'#\[url=(.*)\](.*)\[/url\]#Usi'
		);
	$out = array(
			'<strong>$1</strong>',
			'<em>$1</em>',
			'<span style="text-decoration:underline;">$1</span>',
			'<span style="text-decoration:line-through;">$1</span>',
			'<div class="text-center" itemprop="image" itemscope="itemscope" itemtype="https://schema.org/ImageObject" ><span content="$1" itemprop="url"></span>
<span content="250" itemprop="width"></span>
<span content="160" itemprop="height"></span><img class="img-responsive" src="$1" alt="Iruna online indonesia" /></div>',
			'<a href="$1">$1</a>',
			'<a href="$1">$4</a>',
			'<div style="text-align:left;">$1</div>',
			'<div style="text-align:center;">$1</div>',
			'<div style="text-align:right;">$1</div>',
			'<div style="line-height:15px;padding:10px;background:#FCEFD9;color:#A56901;border-radius:5px;font-family:courier new;font-size:12px;text-align:left;margin:0;">$1</div>',
			'<a class="tangkap" href="#$1">#$1</a>',
			'<div class="embed-responsive embed-responsive-16by9"> <iframe class="embed-responsive-item" width="400" height="315" src="https://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe></div>',
			'<a href="$1">$2</a>'
		);
    $count = count($in)-1;
    for($i=0;$i<=$count;$i++)
    {
        $text = preg_replace($in[$i],$out[$i],$text);
    }
	return $text;
}
//This function let convert HTML to BBcode
function html_to_bbcode($text)
{
	$text = str_replace('<br />','',$text);
	$in = array(
		'#<strong>(.*)</strong>#Usi',
		'#<b>(.*)</b>#Usi',
		'#<i>(.*)</i>#Usi',
		'#<em>(.*)</em>#Usi',
		'#<u>(.*)</u>#Usi',
		'#<strike>(.*)</strike>#Usi',
		'#<img src="(.*)"/>#Usi',
		'#<a href="(.*)">(.*)</a>#Usi',
		'#<div style="text-align:left;">(.*)</div>#Usi',
		'#<div style="text-align:center;">(.*)</div>#Usi',
		'#<div style="text-align:right;">(.*)</div>#Usi',
		'#<div style="padding:10px; background:black;color:green;border-radius:3px;font-family:courier-new;font-size:12px;auto;">(.*)</div>#Usi'
	);
	$out = array(
		'[b]$1[/b]',
		'[b]$1[/b]',
		'[i]$1[/i]',
		'[i]$1[/i]',
		'[u]$1[/u]',
		'[s]$1[/s]',
		'[img]$1[/img]',
		'[url=$1]$2[/url]',
		'[left]$1[/left]',
		'[center]$1[/center]',
		'[right]$1[/right]',
		'[code]$1[/code]'
	);
    $count = count($in)-1;
    for($i=0;$i<=$count;$i++)
    {
        $text = preg_replace($in[$i],$out[$i],$text);
    }
	return $text;
}

  
}