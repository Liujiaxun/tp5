<?php

namespace app\api\controller\v1;
header('Access-Control-Allow-Origin:*');
use think\Controller;
use think\Exception;
use app\api\model\Banner as Banners;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;
class Banner{

	public function getBanner($id){

		(new IDMustBePostiveInt())->goCheck();
		$info = Banners::getBannerInfo();
		if(!$info){
			throw new BannerMissException();
		}
	}

}