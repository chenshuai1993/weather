<?php

/*
 * This file is part of the chenshuai1993/weather.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Chenshuai1993\Weather;

use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testGetLiveWeather()
    {
        // 将 getWeather 接口模拟为返回固定内容，以测试参数传递是否正确
        $w = \Mockery::mock(Weather::class, ['mock-key'])->makePartial();
        $w->expects()->getWeather('深圳', 'base', 'json')->andReturn(['success' => true]);

        // 断言正确传参并返回
        $this->assertSame(['success' => true], $w->getLiveWeather('深圳'));
    }

    public function testGetForecastsWeather()
    {
        // 将 getWeather 接口模拟为返回固定内容，以测试参数传递是否正确
        $w = \Mockery::mock(Weather::class, ['mock-key'])->makePartial();
        $w->expects()->getWeather('深圳', 'all', 'json')->andReturn(['success' => true]);

        // 断言正确传参并返回
        $this->assertSame(['success' => true], $w->getForecastsWeather('深圳'));
    }
}
