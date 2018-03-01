<?php

namespace app\lib\exception;
use think\Exception;
class BaseException extends Exception{
	//http 状态码 200 400 404
	public $code = 400;
	//具体错误信息
	public $msg  = "参数错误！";
	public $errorCode = 10000;

	public function __construct($param = []){

		if(!is_array($param)){
			return ;
		}
		if(array_key_exists('code',$param)){
			$this->code = $param['code'];
		}
		if(array_key_exists('msg',$param)){
			$this->msg = $param['msg'];
		}
		if(array_key_exists('errorCode',$param)){
			$this->errorCode = $param['errorCode'];
		}

	}
}