<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 探测器
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class DetectorProvider extends AbstractProvider
	{
        /**
         * 获取探测器列表
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getDetectorList(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/detector/list',$params);
        }

        /**
         * 设置探测器状态
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setDetetorStatus(array $params)
        {
            return $this->post('/api/lapp/detector/status/set',$params);
        }

        /**
         * 删除探测器
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function deleteDetetor(array $params)
        {
            return $this->post('/api/lapp/detector/delete',$params);
        }

        /**
         * 获取可关联的IPC列表
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getDetectorCanBindIpc(string $deviceSerial)
        {
            $params = ['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/detector/ipc/list/bindable',$params);
        }

        /**
         * 获取已关联的IPC列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getDetectorAndIpcBindable(array $params)
        {
            return $this->post('/api/lapp/detector/ipc/list/bind',$params);
        }

        /**
         * 设置探测器与IPC的关联关系
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setIpcRelationDetector(array $params)
        {
            return $this->post('/api/lapp/detector/ipc/relation/set',$params);
        }

        /**
         * 修改探测器名称
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updateDetectorName(array $params)
        {
            return $this->post('/api/lapp/detector/name/change',$params);
        }

        /**
         * 设备一键消警
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function cancelAlarm(string $deviceSerial)
        {
            $params =['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/detector/cancelAlarm',$params);
        }
	}