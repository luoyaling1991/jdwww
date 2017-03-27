<?php
class Sms_model extends MY_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	/**
	 * 发送模板短信
	 * @param to 手机号码集合,用英文逗号分开
	 * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
	 * @param $tempId 模板Id,测试应用和未上线应用使用测试模板请填写1，正式应用上线后填写已申请审核通过的模板ID
	 */
	function sendSMS($to,$datas,$tempId)
	{
		include_once("SDK/CCPRestSDK.php");
		$AccountSid= 'aaf98f894f4fbec2014f533d8f0f0121';//主帐号,对应开官网发者主账号下的 ACCOUNT SID
		$AccountToken= 'fc41407ed6c5411e871d3f96b0555dff';//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN

		//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
		//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
		$AppId='8a48b5514fd49643014fee9bdd573e9a';
		
		//请求地址
		//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
		//生产环境（用户应用上线使用）：app.cloopen.com
		$ServerIP='sandboxapp.cloopen.com';
		
		//请求端口，生产环境和沙盒环境一致
		$ServerPort='8883';
		
		//REST版本号，在官网文档REST介绍中获得。
		$SoftVersion='2013-12-26';
		
		// 初始化REST SDK
		//global $AccountSid,$AccountToken,$AppId,$serverIP,$serverPort,$softVersion;
		$rest = new REST($ServerIP,$ServerPort,$SoftVersion);
		$rest->setAccount($AccountSid,$AccountToken);
		$rest->setAppId($AppId);
		
		// 发送模板短信
		$result = $rest->sendTemplateSMS($to,$datas,$tempId);
		if($result == NULL ) {
				echo "result error!";
				break;
    	 }
		if($result->statusCode=='000000') {
			return 1;//发送失败
		}else{
			return 0;//发送失败
		}
	}
	
	//随机验证码
	function random($length = 6 , $numeric = 0) {
		PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
		if($numeric) {
			$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
		}else{
			$hash = '';
			$chars = '0123456789';
			$max = strlen($chars) - 1;
			for($i = 0; $i < $length; $i++) {
				$hash .= $chars[mt_rand(0, $max)];
			}
		}
		return $hash;
	}
}

