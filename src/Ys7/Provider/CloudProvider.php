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

    class CloudProvider extends AbstractProvider
	{
        /**
         * 使用卡密给设备开通云存储
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function openStorage(array $params)
        {
            return $this->post('/api/lapp/cloud/storage/open',$params);
        }

        /**
         * 查询设备云存储信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function searchDeviceCloudInfo(array $params)
        {
            return $this->post('/api/lapp/cloud/v2/storage/device/info',$params);
        }

        /**
         * 开启或关闭设备云存储
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateCloudStorageStatus(array $params)
        {
            return $this->post('/api/lapp/cloud/storage/enable',$params);
        }

        /**
         * 使用账户余额给设备开通云存储服务
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function openStorageByCash(array $params)
        {
            return $this->post('/api/lapp/cloud/storage/service/open',$params);
        }

        /**
         * 获取设备可开通的云存储类型
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getDeviceSupportStorage(array $params)
        {
            return $this->post('/api/lapp/cloud/storage/device/support',$params);
        }

        /**
         * 试用云存储
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function tryUseStorage(array $params)
        {
            return $this->post('/api/lapp/cloud/storage/trail',$params);
        }

        /**
         * 同一个账号下设备间云存储转移
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function transStorageByAccount(array $params)
        {
            return $this->post('/api/lapp/cloud/storage/trans',$params);
        }

        /**
         * 获取设备云存储信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getDeviceCloudInfo(array $params)
        {
            return $this->post('/api/lapp/cloud/storage/device/info',$params);
        }

        /**
         * 获取设备云存储是否开通中
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getDeviceCloudServiceIsEnable(array $params)
        {
            return $this->post('/api/lapp/cloud/v2/storage/device/info',$params);
        }

	}