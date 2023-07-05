<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 本节包含AI智能-人脸识别、人脸对比、人脸搜索等相关接口
     * 以下接口，返回数据中 msg、 data 不是一定会返回的，但 requestId、 code 是必定会返回
	 *  ======================================================
	 */

	namespace Bailing\BeComponentIotCloud\Ys7\Provider;

	use Bailing\BeComponentIotCloud\Ys7\AbstractProvider;

    class AiFaceProvider extends AbstractProvider
	{
        /**
         * 创建人脸集合
         * @param string $setName
         *
         * @return mixed
         * @author cc
         */
        public function createSet(string $setName)
        {
            $params = ['setName' => $setName];
            return $this->post('/api/lapp/intelligence/face/set/create',$params);
        }

        /**
         * 删除人脸集合
         * @param string $setTokens 人脸集合的唯一标识，多个以英文逗号分割,一次最多支持 10 个
         *
         * @return mixed
         * @author cc
         */
        public function deleteSet(string $setTokens)
        {
            $params = ['setTokens'=>$setTokens];
            return $this->post('/api/services/face/set/delete',$params);
        }

        /**
         * 人脸检测
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function detection(array $params)
        {
            return $this->post('/api/lapp/intelligence/face/analysis/detect',$params);
        }

        /**
         * 人脸注册
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function register(array $params)
        {
            return $this->post('/api/lapp/intelligence/face/set/register',$params);
        }

        /**
         * 人脸注销
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function remove(array $params)
        {
            return $this->post('/api/lapp/intelligence/face/set/remove',$params);
        }

        /**
         * 人脸比对
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function compare(array $params)
        {
            return $this->post('/api/lapp/intelligence/face/analysis/compare',$params);
        }

        /**
         * 人脸搜索
         * @param array $params
         *
         * @return mixed
         * @author cc
         */
        public function search(array $params)
        {
            return $this->post('/api/lapp/intelligence/face/analysis/search',$params);
        }
	}