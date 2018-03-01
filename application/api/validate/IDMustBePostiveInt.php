<?php
namespace app\api\validate;
use think\Validate;
use think\Exception;

class IDMustBePostiveInt extends BaseValidate{
	protected $rule=[
		'id' => 'require|isPositiveInteger',
		'num' => 'require|in:1,2,3'
	];

	protected function isPositiveInteger($value,$rule='',$data='',$field=''){
		
		if(is_numeric($value) && is_int($value + 0) && ($value+0) > 0){
			return true;
		}else{
			return $field . "必须是正整数！";
		}
	}
}