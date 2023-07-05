<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 代码功能描述
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;


	trait AccessToken
	{
		private ?string $accessToken = null;
		private int     $expireTime  = 0;

		public function getAccessToken()
		{
			$params = [
				'appKey'     => trim($this->config->getYs7Config()['appKey']),
				'appSecret'  => trim($this->config->getYs7Config()['appSecret'])
			];

			if (empty($params['appKey']) || empty($params['appSecret']))
			{
				return null;
			}

			if (! $this->isExpired()) {
				return $this->accessToken;
			}
			$options = [
				'headers' => [],
				'form_params' => $params,
			];
			$result =	$this->setBaseUri('https://open.ys7.com')->request('POST','/api/lapp/token/get',$options);

            if ((int)$result['code'] === 10002){
                $this->getAccessToken();
            }

//		    file_put_contents('Application2.log',print_r(["尝试获取 AccessToken trait "=>$options,
//		                                                  '生成授权凭证（access_token）'=>$result] ,true).PHP_EOL , 8);
			$this->accessToken  = $result['data']['accessToken'];
			$this->expireTime   = $result['data']['expireTime'] + time();

//            file_put_contents('Application2.log',print_r(["this->accessToken "=>$this->accessToken] ,true).PHP_EOL , 8);
			return $this->accessToken;
		}

		public function isExpired() : bool
		{
			if ( isset($this->accessToken) && $this->expireTime > time() + 60){
				return  false;
			}
			return  true;
		}
	}