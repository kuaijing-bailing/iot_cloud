<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 本节包含子账户相关接口等。
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class AccountProvider extends AbstractProvider
	{
        /**
         * 创建子账户
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function create(array $params)
        {
            return $this->post('/api/lapp/ram/account/create',$params);
        }

        /**
         * 获取单个子账户信息
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getUser(array $params)
        {
            return $this->post('/api/lapp/ram/account/get',$params);
        }

        /**
         * 获取子账户信息列表
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function getUserList(array $params = [])
        {
            return $this->post('/api/lapp/ram/account/get',$params);
        }

        /**
         * 修改当前子账户密码
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function updatePassword(array $params)
        {
            return $this->post('/api/lapp/ram/account/updatePassword',$params);
        }

        /**
         * 设置子账户的授权策略
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function setPolicy(array $params)
        {
            return $this->post('/api/lapp/ram/policy/set',$params);
        }

        /**
         * 增加子账户权限
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function addStatement(array $params)
        {
            return $this->post('/api/lapp/ram/statement/add',$params);
        }

        /**
         * 删除子账户权限
         * @param array $params
         * @author cc
         */
        public function deleteAccount (array $params)
        {
            $this->post('/api/lapp/ram/statement/delete',$params);
        }

        /**
         * 获取B模式子账户accessToken
         * @param string $accountId
         *
         * @return mixed
         * @author cc
         */
        public function getBModelAccount(string $accountId)
        {
            $params = ['accountId'=>$accountId];
            return $this->post('/api/lapp/ram/token/get',$params);
        }

        /**
         * 删除子账户
         * @param string $accountId
         *
         * @return mixed
         * @author cc
         */
        public function deleteSubAccount(string $accountId)
        {
            $params = ['accountId'=>$accountId];
            return $this->post('/api/lapp/ram/account/delete',$params);
        }
    }