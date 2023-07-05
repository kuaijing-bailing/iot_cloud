<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 本节包含楼宇可视对讲透传相关接口，这些接口只支持楼宇相关设备。
     *
     *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class BuildingProvider extends AbstractProvider
	{
        /**
         * 获取通话状态
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getCallStatus(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/call/status',$params);
        }

        /**
         * 远程开锁
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function unlock(array $params)
        {
            return $this->post('/api/lapp/building/device/unlock',$params);
        }

        /**
         * 通话操作
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function doCall(array $params)
        {
            return $this->post('/api/lapp/building/device/call',$params);
        }

        /**
         * 获取主叫信息
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getDialing(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/dialing/get',$params);
        }

        /**
         * 获取门口机列表
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getDoorDeviceList(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/list',$params);
        }

        /**
         * 配置麦克风扬声器参数
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setAudioConfig(array $params)
        {
            return $this->post('/api/lapp/building/device/audio/config',$params);
        }

        /**
         * 获取麦克风扬声器参数
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getAudioConfig(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/audio/config/get',$params);
        }

        /**
         * 配置移动侦测开关和灵敏度
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setDefenceConfig(array $params)
        {
            return $this->post('/api/lapp/building/device/defence/config',$params);
        }

        /**
         * 获取移动侦测开关状态和灵敏度
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getDefenceConfig(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/defence/config/get',$params);
        }

        /**
         * 获取TF卡状态、总容量、剩余容量
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getTfCardInfo(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/storage/status',$params);
        }

        /**
         * TF卡格式化
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function formatTfCard(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/storage/format',$params);
        }

        /**
         * APP登录设备处理
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getAppLoginDeviceInfo(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/info/login',$params);
        }

        /**
         * 获取智能锁列表
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getSmartLockList(string $deviceSerial)
        {
            $params = ['deviceSerial' => $deviceSerial];
            return $this->post('/api/lapp/building/device/smartlock/list',$params);
        }

        /**
         * 智能锁开锁
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function openSmartLock(array $params)
        {
            return $this->post('/api/lapp/building/device/smartlock/unlock',$params);
        }
	}