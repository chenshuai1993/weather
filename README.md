<h1 align="center"> weather </h1>

<p align="center"> 基于高德地图开发的 php 查询天气组件.</p>

[![Build Status](https://travis-ci.org/chenshuai1993/weather.svg?branch=master)](https://travis-ci.org/chenshuai1993/weather)
![StyleCI build status](https://github.styleci.io/repos/184015253/shield)

## 安装

```shell
$ composer require chenshuai1993/weather -vvv
```

## 配置
在使用本扩展之前，你需要去 高德开放平台 注册账号，然后创建应用，获取应用的 API Key。

## 使用
```php
use Chenshuai1993\Weather\Weather;
$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
$weather = new Weather($key);
```
## 获取实时天气
```php
// 获取实时天气
$response = $w->getLiveWeather('深圳');
```
示例:
```php
获取实时天气：
{
    "status": "1",
    "count": "1",
    "info": "OK",
    "infocode": "10000",
    "lives": [
        {
            "province": "广东",
            "city": "深圳市",
            "adcode": "440300",
            "weather": "阴",
            "temperature": "21",
            "winddirection": "东南",
            "windpower": "≤3",
            "humidity": "91",
            "reporttime": "2019-05-05 09:44:31"
        }
    ]
}
```

## 获取近期天气预报
```php
$response = $weather->getForecastsWeather('深圳');
```

示例：
```php
获取天气预报：
{
    "status": "1",
    "count": "1",
    "info": "OK",
    "infocode": "10000",
    "forecasts": [
        {
            "city": "深圳市",
            "adcode": "440300",
            "province": "广东",
            "reporttime": "2019-05-05 09:44:31",
            "casts": [
                {
                    "date": "2019-05-05",
                    "week": "7",
                    "dayweather": "大雨",
                    "nightweather": "中雨",
                    "daytemp": "22",
                    "nighttemp": "19",
                    "daywind": "东",
                    "nightwind": "东",
                    "daypower": "5",
                    "nightpower": "5"
                },
                {
                    "date": "2019-05-06",
                    "week": "1",
                    "dayweather": "雷阵雨",
                    "nightweather": "中雨",
                    "daytemp": "25",
                    "nighttemp": "19",
                    "daywind": "东",
                    "nightwind": "东",
                    "daypower": "4",
                    "nightpower": "4"
                },
                {
                    "date": "2019-05-07",
                    "week": "2",
                    "dayweather": "雷阵雨",
                    "nightweather": "雷阵雨",
                    "daytemp": "23",
                    "nighttemp": "20",
                    "daywind": "东",
                    "nightwind": "东",
                    "daypower": "4",
                    "nightpower": "4"
                },
                {
                    "date": "2019-05-08",
                    "week": "3",
                    "dayweather": "暴雨",
                    "nightweather": "暴雨",
                    "daytemp": "25",
                    "nighttemp": "21",
                    "daywind": "无风向",
                    "nightwind": "无风向",
                    "daypower": "≤3",
                    "nightpower": "≤3"
                }
            ]
        }
    ]
}

```

## 获取 xml 格式返回值
以上两个方法第二个参数为返回值类型，可选 `json` 与 `xml`，默认 `json`：
```php
$response = $weather->getLiveWeather('深圳', 'xml')
```
示例：
```xml
<?xml version="1.0" encoding="utf-8"?>

<response>
  <status>1</status>
  <count>1</count>
  <info>OK</info>
  <infocode>10000</infocode>
  <lives type="list">
    <live>
      <province>广东</province>
      <city>深圳市</city>
      <adcode>440300</adcode>
      <weather>阴</weather>  
      <temperature>21</temperature>
      <winddirection>东南</winddirection>
      <windpower>≤3</windpower>
      <humidity>91</humidity>
      <reporttime>2019-05-05 09:44:31</reporttime>
    </live>
  </lives>
</response>
```

## 参数说明
```$xslt
array | string   getLiveWeather(string $city, string $format = 'json')
array | string   getForecastsWeather(string $city, string $format = 'json')
```
> 1. `$city` - 城市名/高德地址位置 adcode，比如：“深圳” 或者（adcode：440300）；
> 2. `$format` - 输出的数据格式，默认为 json 格式，当 output 设置为 “xml” 时，输出的为 XML 格式的数据。

## 在 laravel 中使用
在 Laravel 中使用也是同样的安装方式，配置写在 `config/services.php` 中：
然后在 `.env`中配置 `WEATHER_API_KEY` ：
```$xslt
WEATHER_API_KEY=xxxxxxxxxxxxxxxxxxxxx
```
可以用两种方式来获取 Chenshuai1993\Weather\Weather 实例：
### 方法参数注入
```php
    .
    .
    .
    public function edit(Weather $weather) 
    {
        $response = $weather->getLiveWeather('深圳');
    }
    .
    .
    .
```

### 服务名访问
```php
    .
    .
    .
    public function edit() 
    {
        $response = app('weather')->getLiveWeather('深圳');
    }
    .
    .
    .
```

## 参考
. 高德开放平台天气接口

## License

MIT