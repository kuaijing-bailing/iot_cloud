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

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class AuthProvider extends AbstractProvider
	{
        public function accessToken()
        {
            $params = [
                'appKey'    => $this->config->getYs7Config()['appKey'],
                'appSecret' => $this->config->getYs7Config()['appSecret'],
            ];
            $options = [
                'headers' => [],
                'form_params' => $params,
            ];
            return $this->setBaseUri($this->config->getYsCloudBaseUri())->request('POST','/api/lapp/token/get',$options);
        }
	}