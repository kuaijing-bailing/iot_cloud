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

	namespace Bailing\BeComponentIotCloud\Ys7;

	use Hyperf\Contract\ConfigInterface;
	use Bailing\BeComponentIotCloud\Config;
	use Psr\Container\ContainerInterface;

	class ApplicationFactory
	{
		public function __invoke (ContainerInterface $container)
		{
			$config = $container->get(ConfigInterface::class)->get('ys7');
            file_put_contents('ApplicationFactory.log',print_r(['$config'=>$config],true). PHP_EOL, 8);
			return new Application(new Config($config));
		}
	}