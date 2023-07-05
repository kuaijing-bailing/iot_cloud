<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Bailing\BeComponentIotCloud;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
	        // 合并到  config/autoload/dependencies.php 文件
            'dependencies' => [
				\Bailing\BeComponentIotCloud\HikCloud\Application::class      => \Bailing\BeComponentIotCloud\HikCloud\ApplicationFactory::class,
				\Bailing\BeComponentIotCloud\YunRui\Application::class        => \Bailing\BeComponentIotCloud\YunRui\ApplicationFactory::class,
                \Bailing\BeComponentIotCloud\Ys7\Application::class           => \Bailing\BeComponentIotCloud\Ys7\ApplicationFactory::class
            ],
	        // 默认 Command 的定义，合并到 Hyperf\Contract\ConfigInterface 内，换个方式理解也就是与 config/autoload/commands.php 对应
            'commands' => [
            ],
	        // 合并到  config/autoload/annotations.php 文件
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'listeners' => [],
            'publish' => [
	            [
		            'id' => 'hikcloud',
		            'description' => '海康云眸配置项.',
		            'source' => __DIR__ . '/../publish/hikcloud.php',
		            'destination' => BASE_PATH . '/config/autoload/hikcloud.php',
	            ],
                [
                    'id' => 'imou',
                    'description' => '乐橙配置项.',
                    'source' => __DIR__ . '/../publish/imou.php',
                    'destination' => BASE_PATH . '/config/autoload/imou.php',
                ],
                [
                    'id' => 'yunrui',
                    'description' => '萤石云配置.',
                    'source' => __DIR__ . '/../publish/yunrui.php',
                    'destination' => BASE_PATH . '/config/autoload/yunrui.php',
                ],
                [
                    'id' => 'ys7',
                    'description' => '萤石云配置.',
                    'source' => __DIR__ . '/../publish/ys7.php',
                    'destination' => BASE_PATH . '/config/autoload/ys7.php',
                ],
            ],
        ];
    }
}
