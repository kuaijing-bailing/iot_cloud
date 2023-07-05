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

	namespace Bailing\BeComponentIotCloud\HikCloud;

	use Hyperf\Contract\ConfigInterface;
	use Bailing\BeComponentIotCloud\Config;
	use Psr\Container\ContainerInterface;

	class ApplicationFactory
	{
		public function __invoke (ContainerInterface $container)
		{
			$config = $container->get(ConfigInterface::class)->get('hikcloud');
			return new Application(new Config($config));
		}
	}