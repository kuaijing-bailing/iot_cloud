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
	namespace Bailing\BeComponentIotCloud;

	class Config
	{
		protected $appConfig;

		protected array $guzzleConfig = [
			'headers' => [
				'charset' => 'UTF-8',
			],
			'http_errors' => false,
		];

		public function __construct( array $config )
		{
			$this->appConfig = $config;
		}

		public function getAppConfig()
		{
			return $this->appConfig;
		}

		public function getHikConfig() : array
		{
            if (isset($this->getAppConfig()['hikcloud'])){
                return $this->getAppConfig()['hikcloud'];
            }else{
                return $this->getAppConfig();
            }

		}

		public function getYunRuiConfig() : array
		{
			if (isset($this->getAppConfig()['yunrui'])){
                return $this->getAppConfig()['yunrui'];
            }else{
                return $this->getAppConfig();
            }
		}

        public function getYs7Config() : array
        {
            if (isset($this->getAppConfig()['ys7'])){
                return $this->getAppConfig()['ys7'];
            }else{
                return $this->getAppConfig();
            }
        }

        public function getImouConfig() : array
        {
            if (isset($this->getAppConfig()['imou'])){
                return $this->getAppConfig()['imou'];
            }else{
                return $this->getAppConfig();
            }
        }

		/**
		 * 海康云眸
		 * @return string
		 * @author cc
		 */
		public function getHikCloudBaseUri() : string
		{
			return  'https://api2.hik-cloud.com';
		}

		/**
		 * 萤石云
		 * @return string
		 * @author cc
		 */
		public function getYsCloudBaseUri(): string
		{
			return 'https://open.ys7.com';
		}

		/**
		 * 大华云睿
		 * @return string
		 * @author cc
		 */
		public function getDaHuaYunRuiBaseUri() :string
		{
			return 'https://www.cloud-dahua.com';
		}

		/**
		 * 乐橙
		 * @return string
		 * @author cc
		 */
		public function getLeChengeBaseUri():string
		{
			return 'https://openapi.lechange.cn';
		}

		public function getGuzzleConfig() : array
		{
			return $this->guzzleConfig;
		}
	}