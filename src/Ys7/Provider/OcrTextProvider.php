<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 本节包含AI智能-文字识别相关的接口
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class OcrTextProvider extends AbstractProvider
	{
        /**
         * 通用文字识别
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function img2Text(array $params)
        {
            return $this->post('/api/lapp/intelligence/ocr/generic',$params);
        }

        /**
         * 银行卡识别
         * @param array $params
         * @author cc
         */
        public function bankCard(array $params)
        {
            $this->post('/api/lapp/intelligence/ocr/bankCard',$params);
        }

        /**
         * 身份证识别
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function idCard(array $params)
        {
            return $this->post('/api/lapp/intelligence/ocr/idCard',$params);
        }

        /**
         * 驾驶证识别
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function driverLicense(array $params)
        {
            return $this->post('/api/lapp/intelligence/ocr/driverLicense',$params);
        }

        /**
         * 行驶证识别
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function vehicleLicense(array $params)
        {
            return $this->post('/api/lapp/intelligence/ocr/vehicleLicens',$params);
        }

        /**
         * 营业执照识别
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function businessLicense(array $params)
        {
            return $this->post('/api/lapp/intelligence/ocr/businessLicense',$params);
        }

        /**
         * 通用票据识别
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function receipt(array $params)
        {
            return $this->post('/api/lapp/intelligence/ocr/receipt',$params);
        }

        /**
         * 车牌识别
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function licensePlate(array $params)
        {
            return $this->post('/api/lapp/intelligence/ocr/licensePlate',$params);
        }
	}