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
	namespace Bailing\BeComponentIotCloud\YunRui;

	use Bailing\BeComponentIotCloud\Config;
	use Bailing\BeComponentIotCloud\Exception\InvalidArgumentException;
	use Bailing\BeComponentIotCloud\YunRui\Provider\AccountProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\AscProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\AuthProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\BuildingProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\DeviceProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\LiveProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\MixedProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\MixProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\MsgProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\OrgProvider;
	use Bailing\BeComponentIotCloud\YunRui\Provider\PersonProvider;

	/**
	 * Class Application
	 *
	 * @property AuthProvider   $auth
	 * @property DeviceProvider $device
	 * @property PersonProvider $person
	 * @property LiveProvider   $live
	 * @property MixedProvider  $mixed
	 * @property MixProvider    $mix
	 * @property AscProvider    $asc
	 * @property OrgProvider    $org
	 * @property MsgProvider    $msg
	 * @property BuildingProvider $building
	 * @property AccountProvider $account
	 *
	 * @package Bailing\BeComponentIotCloud\YunRui
	 * @version 1.0.0
	 */
	class Application
	{

		protected array $alias = [
			'auth'      => AuthProvider::class,
			'device'    => DeviceProvider::class,
			'person'    => PersonProvider::class,
			'live'      => LiveProvider::class,
			'mixed'     => MixedProvider::class,
			'mix'       => MixedProvider::class,
			'asc'       => AscProvider::class,
			'org'       => OrgProvider::class,
			'msg'       => MsgProvider::class,
			'building'  => BuildingProvider::class,
			'account'   => AccountProvider::class
		];

		protected array $providers = [];

		public function __construct(protected Config $config)
		{
		}

		public function __get($name)
		{
			if ( ! isset($name) || ! $this->alias[$name]){
				throw new InvalidArgumentException("{$name} is invalid.");
			}

			if (isset($this->providers[$name])){
				return $this->providers[$name];
			}

			$class = $this->alias[$name];

			return $this->providers[$name] = new $class($this,$this->config);
		}

	}