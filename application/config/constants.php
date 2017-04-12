<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 系统常量定义
 * 1.js引用
 * 2.css引用
 * 3.文件上传路径
 * */
define('SYS_NAME','"简点"点餐');//系统名称
define('COPYRIGHT','2015-2016 © “成都创世天成科技有限公司”');//版权所属
define('GG',"欢迎使用'简点•点餐'系统，联系电话18501376808！");//广告语

define('BASE_URL','http://www.zyf.com/');//项目路径
define('ADMIN_SRC',constant("BASE_URL")."/data/");//后台引用js/css/img路径

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);


define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
