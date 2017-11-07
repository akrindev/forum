<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','session','form_validation','email','bbcode','gravatar');

$autoload['drivers'] = array();

$autoload['helper'] = array('url','form','time_ago','text');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array(
  'user_model' => 'user',
  'forum_model'=> 'forum'
);