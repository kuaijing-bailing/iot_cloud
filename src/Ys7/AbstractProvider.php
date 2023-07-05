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
	use Bailing\BeComponentIotCloud\Kernel\HttpClient;
	use Bailing\BeComponentIotCloud\Ys7\Provider\AccessToken;
    use GuzzleHttp\Psr7\Utils;

    abstract class AbstractProvider
	{
		use HttpClient;
		use AccessToken;

		public function __construct(protected Application $app, protected Config $config)
		{
		}

		protected function httpClient()
		{
			return $this->setBaseUri($this->config->getYsCloudBaseUri());
		}

		public function get($endpoint ,$params =[] ,$header = [])
		{
            $params = $this->generateCommonParam($params);
			return $this->httpClient()->request('GET',$endpoint,[
				'headers'   => $header,
				'query'     => $params,
			]);
		}

		public function getJson($endpoint ,$params =[] ,$headers = [])
		{
			$header = $this->generateCommonParam();
			if (!empty($headers)){
				$header = array_merge($header,$headers);
			}
			return $this->httpClient()->request('GET',$endpoint,[
				'headers'   => $header,
				'json'      => $params,
				'query'     => $params,
			]);
		}

		public function postJson($endpoint, $params = [], $headers = [])
		{
			$header = $this->generateCommonParam();
			if (!empty($headers)){
				$header = array_merge($header,$headers);
			}
			return $this->httpClient()->request('POST', $endpoint, [
				'headers' => $header,
				'json'    => $params,
			]);
		}

		public function deleteJson($endpoint, $params = [], $headers = [])
		{

			$header = $this->generateCommonParam();
			if (!empty($headers)){
				$header = array_merge($header,$headers);
			}
			$options = [
				'form_params'=> $params,
				'headers' =>$header,
			];
			return $this->httpClient()->request('DELETE',$endpoint,$options);
		}

		public function post($endpoint, $params = [], $headers = [])
		{
            $params = $this->generateCommonParam($params);
            return $this->httpClient()->request('POST', $endpoint, [
				'headers' => $headers,
				'form_params' => $params,
				'debug'     => true
			]);
		}

        public function put($endpoint, $params = [], $headers = [])
        {
            $params = $this->generateCommonParam($params);
            $multipart = [];
            foreach ($params as $key=>$param){
                $tmp = [];
                if (in_array($key,['voiceUrl'])){
                    $tmp['name'] = $key;
                    $tmp['contents'] = Utils::tryFopen($param,'r');
                    $tmp['filename'] = $param;
                }else{
                    $tmp['name'] = $key;
                    $tmp['contents'] = $param;
                }
                $multipart[] = $tmp;
            }

            return   $this->httpClient()->request('PUT', $endpoint, [
                'headers'   => $headers,
                'multipart' => $multipart,
//                'debug'     => true
            ]);
        }

        public function multipart($endpoint, $params = [], $headers = [])
        {
            $params = $this->generateCommonParam($params);

            $multipart = [];
            foreach ($params as $key=>$param){
                $tmp = [];
                if (in_array($key,['voiceFile'])){
                    $tmp['name']     = $key;
                    $tmp['contents'] = Utils::tryFopen($param,'r');
                    $tmp['filename'] = $param;
                    $tmp['headers'] = ['Content-Type'=>'multipart/form-data'];
                }else{
                    $tmp['name']     = $key;
                    $tmp['contents'] = $param;
                }
                $multipart[] = $tmp;
            }
            return $this->httpClient()->request('POST', $endpoint, [
                'headers' => $headers,
                'multipart' => $multipart,
                'debug'=>true
            ]);
        }

        public function delete($endpoint, $params = [], $headers = [])
        {
            $params = $this->generateCommonParam($params);
            $options = [
                'query'  => $params,
                'headers' =>$headers,
            ];

            return $this->httpClient()->request('DELETE',$endpoint,$options);
        }

		public function generateCommonParam($params = []) : array
		{
			$accessToken = $this->getAccessToken();
            $param = ['accessToken'=>$accessToken];
            return $param + $params;
		}


	}