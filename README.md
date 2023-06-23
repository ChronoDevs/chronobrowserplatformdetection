<p align="center"><a href="https://github.com/ChronoDevs" target="_blank"><img src="https://avatars.githubusercontent.com/u/48752111?v=4" width="100"></a></p>

<p align="center">
<a href="https://github.com/ChronoDevs/chronobrowserplatformdetection"><img src="https://img.shields.io/badge/status-active-success.svg" alt=""></a>
<a href="https://packagist.org/packages/chronostep/chronobrowserplatform"><img src="https://img.shields.io/badge/version-dev_master-blue" alt="Latest Stable Version"></a>
<a href="https://github.com/ChronoDevs/chronobrowserplatformdetection/blob/main/LICENSE"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Chrono Browser Platform Detection

Intended to return an array containing the currents users platform and browser using

- Simple
- Easy to Install

## How to Install

```
composer require chronostep/chronobrowserplatform
```

## How to use

Just call the following command

```
$bpresult = BPDetect::detect();
```

Following command will return an array that looks like this.
```
array:3 [▼
  "browser" => "Google Chrome"
  "platform" => "Windows"
  "device" => "Not a Mobile"
]
```