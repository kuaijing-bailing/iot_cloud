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

    class OcrCarProvider extends AbstractProvider
	{
        /**
         * 车辆属性检测
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function props(array $params)
        {
            return $this->post('/api/lapp/intelligence/vehicle/analysis/props',$params);
        }

        /**
         * 车辆交通属性检测
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function traffic(array $params)
        {
            return $this->post('/api/lapp/intelligence/vehicle/analysis/props',$params);
        }
	}