<?php

namespace app\lib\exception;
use think\Exception;
use think\Request;
use think\Log;
use think\exception\Handle;

class ExceptionHandler extends Handle{

	private $code;
	private $msg;
	private $errorCode;

	public function render(\Exception $e){
		if($e instanceof BaseException){
			$this->code = $e->code;
			$this->msg = $e->msg;
			$this->errorCode = $e->errorCode;
		}else{
			if(config('app_debug')){

				return parent::render($e);

			}else{
				$this->code =500;
				$this->msg ='内部错误,未知错误！';
				$this->errorCode =999;
				$this->recordErrorLog($e);
			}
		}
		$request = Request::instance();
		$result = [
			'msg'=> $this->msg,
			'errorCode'=> $this->errorCode,
			'request_url'=> $request->url()
		];
		return json($result,$this->code);
	}

	private function recordErrorLog(\Exception $e){
		Log::init([
			'type'  => 'File',
	        // 日志保存目录
	        'path'  => LOG_PATH,
	        // 日志记录级别
	        'level' => ['error'],
		]);
		Log::record($e->getMessage(),'error');
	}

}