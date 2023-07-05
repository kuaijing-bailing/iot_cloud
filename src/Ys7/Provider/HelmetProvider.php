<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 安全帽检测
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class HelmetProvider extends AbstractProvider
	{
        /**
         * 安全帽检测
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function analysis(array $params)
        {
            return $this->post('/api/lapp/intelligence/vehicle/analysis/props',$params);
        }
	}