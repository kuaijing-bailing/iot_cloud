<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc:  萤石云 本节包含设备告警消息查询相关接口等
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class MsgProvider extends AbstractProvider
	{
        /**
         * 获取所有告警信息列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsAlarmList(array $params=[])
        {
            return $this->post('/api/lapp/alarm/list',$params);
        }

        /**
         * 按照设备获取告警消息列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsAlarmDeviceList(array $params)
        {
            return $this->post('/api/lapp/alarm/device/list',$params);
        }
	}