<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 客流统计
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class PassengerflowProvider extends AbstractProvider
	{
        /**
         * 获取客流统计开关状态
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getSwitchStatus(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/passengerflow/switch/status',$params);
        }

        /**
         * 设置客流统计开关
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setSwitch(array $params)
        {
            return $this->post('/api/lapp/passengerflow/switch/set',$params);
        }

        /**
         * 查询设备某一天的统计客流数据
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getDaily(array $params)
        {
            return $this->post('/api/lapp/passengerflow/daily',$params);
        }

        /**
         * 查询设备某一天每小时的客流数据
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getHourly(array $params)
        {
            return $this->post('/api/lapp/passengerflow/hourly',$params);
        }

        /**
         * 配置客流统计信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setConfig(array $params)
        {
            return $this->post('/api/lapp/passengerflow/config',$params);
        }

        /**
         * 获取客流统计配置信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getConfig(array $params)
        {
            return $this->post('/api/lapp/passengerflow/config/get',$params);
        }

	}