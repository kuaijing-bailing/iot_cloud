<?php
	declare(strict_types=1);

	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc:
	 *  ======================================================
	 */
	namespace Bailing\BeComponentIotCloud\HikCloud\Provider;


	use Bailing\BeComponentIotCloud\Exception\InvalidArgumentException;
	use Bailing\BeComponentIotCloud\HikCloud\AbstractProvider;

	class AuthProvider extends AbstractProvider
	{
		/**
		 * 第三方跳转登录云眸社区对接规范
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function thirdJummpLogin(array $params)
		{
			if (!\array_key_exists('appId',$params)){
				throw new InvalidArgumentException("缺少必要参数 appId");
			}

			$ns     = strtoupper(self::randString(32));
			[$msec ,$sec] = explode(' ',microtime());
			$ts     =  (float) sprintf('%.0f',(floatval($msec) + floatval($sec)) * 1000);
			$secret = $params['secret'];
			$params['ns']           = $ns;
			$params['ts']           = $ts;
			unset($params['secret']);
			ksort($params);
			$queryStr = http_build_query($params);
			$string = $queryStr . '&secret='.$secret;
			$signature = strtoupper(hash_hmac('sha256', $string, $secret));

			return "https://sq.hik-cloud.com/?{$queryStr}&signature={$signature}";
		}

		/**
		 * 生成随机字符串
		 *
		 * @access public
		 * @param integer $length 字符串长度
		 * @param string $specialChars 是否有特殊字符
		 * @return string
		 */
		private static function randString($length, $specialChars = false) {
			$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			if ($specialChars) {
				$chars .= '!@#$%^&*()';
			}

			$result = '';
			$max = strlen($chars) - 1;
			for ($i = 0; $i < $length; $i++) {
				$result .= $chars[rand(0, $max)];
			}
			return $result;
		}

	}