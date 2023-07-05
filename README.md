# iot-cloud
## 集成海康云眸、萤石云、大华云睿、乐橙、海康ISC 、大华ICC 集于一体的 Hyperf 组件包

```
composer require bailing/be_component_iot_cloud  -vvv
```

## 使用
>
> 在执行 `composer require require bailing/be_component_iot_cloud -vvv` 安装之后，您可通过执行 `php bin/hyperf.php vendor:publish  bailing/be_component_iot_cloud` 来将组件预设的配置文件，发布到骨架项目的 config/autoload 文件夹内。然后按需配置即可
> 
> 使用本SDK之前请先熟悉对应平台的技术文档

### 配置
> 执行   php bin/hyperf.php vendor:publish bailing/be_component_iot_cloud 之后，目录下应该会有这几个文件
> 
> 
```apacheconf
config
├── autoload
│   ├── hikcloud.php  海康云眸
│   ├── imou.php      乐橙  TODO
│   ├── ys7.php       萤石云
│   └── yunrui.php    云睿 
└──────
```

### 海康云眸
```php

require __DIR__ .'/vendor/autoload.php';

use Bailing\BeComponentIotCloud\Config as MyConfig;
use Bailing\BeComponentIotCloud\HikCloud\Application;

$config = \config('hikcloud');
$application = new Application(new MyConfig($config));
$params = [
'communityName' => 'xxx',
'provinceCode'  => 'xxf',
'addressDetail' => 'rgg'
];
$application->communit->communities($params);
```

### 大华云睿

```php

require __DIR__ .'/vendor/autoload.php';

use Bailing\BeComponentIotCloud\Config as MyConfig;
use Bailing\BeComponentIotCloud\YunRui\Application;

$config = \config('yunrui');
$application = new Application(new MyConfig($config));
$application->account->addUser();

```

### 萤石云

```php

require __DIR__ .'/vendor/autoload.php';

use Bailing\BeComponentIotCloud\Config as MyConfig;
use Bailing\BeComponentIotCloud\Ys7\Application;

$config = \config('ys7');
$application = new Application(new MyConfig($config));
$params = [
    
];
$application->device->addYsDevice($params);

```


## TODO 

- [ ] 乐橙
- [ ] 海康ISC
- [ ] 大华ICC


### 相关文档
- [海康云眸 企业内部应用开发-社区](https://pic.hik-cloud.com/opencustom/apidoc/online/neptune/4cb4c4f2147e4624bc29408ac70e92c4.html?timestamp=1653966047558)
- [大华云睿开放平台的文档](https://www.cloud-dahua.com/wiki)
- [乐橙开放平台开发文档 ](https://open.imou.com/book/start.html)
- [萤石开放平台介绍文档](https://open.ys7.com/doc/zh/book/index/user.html)
- [海康综合安防管理平台（iSecure Center）](https://open.hikvision.com/docs/docId?productId=5c67f1e2f05948198c909700&version=%2F9e6b1870e25348608d01b5669a7f3595&curNodeId=a23956fcc1c64d6ab5cf9b79d4e0d3be)
- [大华 智能物联综合管理平台 ICC](https://open-icc.dahuatech.com/#/)