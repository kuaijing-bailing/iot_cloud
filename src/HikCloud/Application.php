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
	namespace Bailing\BeComponentIotCloud\HikCloud;

	use Bailing\BeComponentIotCloud\Config;
	use Bailing\BeComponentIotCloud\Exception\InvalidArgumentException;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\AdProvider;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\AuthProvider;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\BuildingProvider;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\CommunitProvider;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\DeviceProvider;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\FaceDBProvider;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\MsgProvider;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\PersonProvider;
	use Bailing\BeComponentIotCloud\HikCloud\Provider\PropertyProvider;

	/**
	 * Class Application
	 * @property AuthProvider       $auth
	 * @property DeviceProvider     $device
	 * @property CommunitProvider   $communit
	 * @property BuildingProvider   $building
	 * @property PersonProvider     $person
	 * @property PropertyProvider   $property
	 * @property AdProvider         $ad
	 * @property FaceDBProvider     $facedb
	 * @property MsgProvider        $msg
	 *
	 * @package Bailing\BeComponentIotCloud\HikCloud
	 * @version 1.0.0
	 */
	class Application
	{
		protected array $alias = [
			'auth'      => AuthProvider::class,
			'device'    => DeviceProvider::class,
			'communit'  => CommunitProvider::class,
			'building'  => BuildingProvider::class,
			'person'    => PersonProvider::class,
			'property'  => PropertyProvider::class,
			'ad'        => AdProvider::class,
			'facedb'    => FaceDBProvider::class,
			'msg'       => MsgProvider::class,
		];

		protected array $providers = [];

		public function __construct (protected Config $config)
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