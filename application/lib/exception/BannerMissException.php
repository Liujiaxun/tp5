<?php 


namespace app\lib\exception;

class BannerMissException extends BaseException
{
	//状态

	public $code = 400;

	public $msg = 'banner 信息错误！';

	public $errorCode = 4000;

}