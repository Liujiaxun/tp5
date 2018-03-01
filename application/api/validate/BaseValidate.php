<?php
namespace app\api\validate;
use think\Validate;
use think\Exception;
use think\Request;
use app\lib\exception\ParameterException;
class BaseValidate extends Validate{

	public function goCheck(){

		$request = Request::instance();

		$params = $request->param();

		$result = $this->batch()->check($params);

		if(!$result){
			// $error = $this->error;
			// throw new Exception($error);
			$e = new ParameterException([
				'msg' => $this->error
				]);
			throw $e;

		}else{
			return $result;
		}

	}
}