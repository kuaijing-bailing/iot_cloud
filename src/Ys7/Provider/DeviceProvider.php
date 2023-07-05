<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 萤石云设备管理
     * @see https://open.ys7.com/doc/zh/book/index/device_option.html
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class DeviceProvider extends AbstractProvider
	{
        /**
         * 添加设备
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addYsDevice(array $params)
        {
            return $this->post('/api/lapp/device/add',$params);
        }

        /**
         * 删除账号下设备（为保证该接口正常使用，请勿在萤石云APP开启终端绑定。
         * 如果该接口报错20031请手机登录萤石云视频客户端“我的”--“通用设置”--“账号安全”--“终端绑定”，关闭即可）
         *
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function deleteYsDevice(string $deviceSerial)
        {
            $params['deviceSerial'] = $deviceSerial;
            return $this->post('/api/lapp/device/delete',$params);
        }

        /**
         * 修改萤石设备
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDevice(array $params)
        {
            return $this->post('/api/lapp/device/name/update',$params);
        }

        /**
         * 萤石 设备抓拍图片.
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsCapture(array $params)
        {
            return $this->post('/api/lapp/device/capture',$params);
        }

        /**
         * 萤石云 NVR设备关联IPC
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addYsDeviceNvrAndIpc(array $params)
        {
            return $this->post('/api/lapp/device/ipc/add',$params);
        }

        /**
         * 萤石云 NVR设备删除IPC
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function deleteYsDeviceNvrAndIpc(array $params)
        {
            return $this->post('/api/lapp/device/ipc/delete',$params);
        }

        /**
         * 萤石云 该接口用于修改设备视频加密密码（设备重置后修改的密码失效）
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDevicePassword(array $params)
        {
            return $this->post('/api/lapp/device/password/update',$params);
        }

        /**
         * 萤石云 该接口用于生成设备扫描配网二维码二进制数据，需要自行转换成图片（300x300像素大小）。
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceNetworkQrCode(array $params)
        {
            return $this->post('/api/lapp/device/wifi/qrcode',$params);
        }

        /**
         * 萤石云 修改通道名称
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDeviceChannelName(array $params)
        {
            return $this->post('/api/lapp/camera/name/update',$params);
        }

        /**
         * 萤石云 获取设备列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceList(array $params =[])
        {
            return $this->post('/api/lapp/device/list',$params);
        }

        /**
         * 萤石云 获取单个设备信息
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceInfo(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/info',$params);
        }

        /**
         * 萤石云 获取摄像头列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsCameraList(array $params =[])
        {
            return $this->post('/api/lapp/camera/list',$params);
        }

        /**
         * 萤石云 获取设备状态信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceStatus(array $params)
        {
            return $this->post('/api/lapp/device/status/get',$params);
        }

        /**
         * 萤石云 获取指定设备的通道信息
         * @param $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceChannelInfo($deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/camera/list',$params);
        }

        /**
         * 萤石云 根据设备型号以及设备版本号查询设备是否支持萤石协议
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function checkYsDeviceSupport(array $params)
        {
            return $this->post('/api/lapp/device/support/ezviz',$params);
        }

        /**
         * 萤石云 根据设备序列号查询设备能力集
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceCapacity(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/device/capacity',$params);
        }

        /**
         * 萤石云 根据时间获取存储文件信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getYsDeviceFileInfo(array $params)
        {
            return $this->post('/api/lapp/video/by/time',$params);
        }

        /**
         * 萤石云 本节包含设备开关状态操作的相关接口等。
         */

        /**
         * 获取设备版本信息
         * 查询用户下指定设备的版本信息
         * @author cc
         */
        public function getYsDeviceVersionInfo(string $deviceSerial)
        {
            return $this->post('/api/lapp/device/version/info',['deviceSerial'=>strtoupper($deviceSerial)]);
        }

        /**
         * 设备升级固件(升级设备固件至最新版本)
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDeviceUpgrade(string $deviceSerial)
        {
            return $this->post('/api/lapp/device/upgrade',['deviceSerial'=>strtoupper($deviceSerial)]);
        }

        /**
         * 获取设备升级状态(查询用户下指定设备的升级状态，包括升级进度。)
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function updateYsDeviceUpgradeStatus(string $deviceSerial)
        {
            return $this->post('/api/lapp/device/upgrade/status',['deviceSerial'=>strtoupper($deviceSerial)]);
        }
	}