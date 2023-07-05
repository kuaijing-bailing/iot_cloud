<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 本节包含AI智能-人体属性识别及人形识别等相关接口
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class OcrHumanProvider extends AbstractProvider
	{
        /**
         * 人体属性识别
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function bodyProps(array $params)
        {
            return $this->post('/api/lapp/intelligence/vehicle/analysis/props',$params);
        }

        /**
         * 人形检测
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function detection(array $params)
        {
            return $this->post('/api/lapp/intelligence/human/analysis/detect',$params);
        }
	}