<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 指纹锁
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class KeyLockProvider extends AbstractProvider
	{
        /**
         * 启动指纹锁验证
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function verifyKeyLock(string $deviceSerial)
        {
            $params =['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/keylock/local/verify',$params);
        }

        /**
         * 获取指纹锁用户列表
         * @param string $deviceSerial
         *
         * @return mixed
         * @author cc
         */
        public function getKeyLockUserList(string $deviceSerial)
        {
            $params =['deviceSerial'=>$deviceSerial];
            return $this->post('/api/lapp/keylock/user/list',$params);
        }

        /**
         * 分页获取开门记录
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getKeyLockOpenRecord(array $params)
        {
            return $this->post('/api/lapp/keylock/open/list',$params);
        }
	}