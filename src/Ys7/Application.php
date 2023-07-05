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

	use Bailing\BeComponentIotCloud\Config;
    use Bailing\BeComponentIotCloud\Exception\InvalidArgumentException;
    use Bailing\BeComponentIotCloud\Ys7\Provider\AccountProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\AiFaceProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\AuthProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\BuildingProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\CloudProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\DetectorProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\DeviceProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\HelmetProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\HubProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\KeyLockProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\LiveProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\OcrCarProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\OcrHumanProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\OcrTextProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\PassengerflowProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\PtzProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\SettingProvider;
    use Bailing\BeComponentIotCloud\Ys7\Provider\VoiceProvider;

    /**
     * Class Application
     *
     * @property AuthProvider       $auth
     * @property DeviceProvider     $device
     * @property LiveProvider       $live
     * @property SettingProvider    $setting
     * @property VoiceProvider      $voice
     * @property PtzProvider        $ptz
     * @property DetectorProvider   $detector
     * @property PassengerflowProvider $passengerflow
     * @property CloudProvider      $cloud
     * @property BuildingProvider   $building
     * @property KeyLockProvider    $keylock
     * @property HubProvider        $hub
     * @property AccountProvider    $account
     * @property OcrTextProvider    $ocrText
     * @property OcrHumanProvider   $ocrHuman
     * @property AiFaceProvider     $aiFace
     * @property OcrCarProvider     $ocrCar
     * @property HelmetProvider     $helmet
     *
     * @package Bailing\BeComponentIotCloud\Ys7
     * @version 1.0.0
     */
    class Application
	{
        protected array $alias = [
            'auth'      => AuthProvider::class,
            'device'    => DeviceProvider::class,
            'live'      => LiveProvider::class,
            'setting'   => SettingProvider::class,
            'voice'     => VoiceProvider::class,
            'ptz'       => PtzProvider::class,
            'detector'  => DetectorProvider::class,
            'passengerflow'=> PassengerflowProvider::class,
            'cloud'     => CloudProvider::class,
            'building'  => BuildingProvider::class,
            'keylock'   => KeyLockProvider::class,
            'hub'       => HubProvider::class,
            'account'   => AccountProvider::class,
            'ocrText'   => OcrTextProvider::class,
            'ocrHuman'  => OcrHumanProvider::class,
            'aiFace'    => AiFaceProvider::class,
            'ocrCar'    => OcrCarProvider::class,
            'helmet'    => HelmetProvider::class,

        ];

        protected array $providers = [];

        public function __construct(protected Config $config)
        {

        }

        public function __get($name)
        {
            if ( !isset($name) || !isset($this->alias[$name])){
                throw new InvalidArgumentException("{$name} is invalid.");
            }

            if (isset($this->providers[$name])){
                return $this->providers[$name];
            }

            $class = $this->alias[$name];

            return  $this->providers[$name] = new $class($this,$this->config);
        }
	}