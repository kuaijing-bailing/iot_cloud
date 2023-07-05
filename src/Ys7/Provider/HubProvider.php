<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 本节包含HUB设备关联的子设备的相关接口等。
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class HubProvider extends AbstractProvider
	{
        /**
         * 获取子设备列表
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getHubDeviceList(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/hub/device/sub/list',$params);
        }

        /**
         * 获取子设备信息
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getHubDeviceSubList(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/hub/device/sub/info',$params);
        }

        /**
         * 获取子设备通道信息
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getHubDeviceCameraInfo(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/hub/device/camera/list',$params);
        }
	}