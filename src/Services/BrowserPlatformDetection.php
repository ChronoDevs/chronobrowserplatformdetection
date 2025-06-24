<?php

namespace Chronostep\Chronobrowserplatform\Services;

class BrowserPlatformDetection
{
    public static function detect()
    {
        $browser = '';
        $platform = '';
        $deviceType = '';

        // Detect browser
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) {
            $browser = 'Google Chrome';
        } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false) {
            $browser = 'Mozilla Firefox';
        } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false) {
            $browser = 'Apple Safari';
        } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false) {
            $browser = 'Opera';
        } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Edge') !== false) {
            $browser = 'Microsoft Edge';
        } else {
            $browser = 'Unknown Browser';
        }

        // Detect platform
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Windows') !== false) {
            $platform = 'Windows';
        } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Linux') !== false) {
            $platform = 'Linux';
        } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mac') !== false) {
            $platform = 'macOS';
        } else {
            $platform = 'Unknown Platform';
        }

        // Detect mobile device
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false) {
            $deviceType = 'Mobile';

            if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false) {
                $deviceType .= ' (iPhone)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false) {
                $deviceType .= ' (Android)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Windows Phone') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'IEMobile') !== false) {
                $deviceType .= ' (Windows Phone)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
                $deviceType .= ' (iPad)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false) {
                $deviceType .= ' (Opera Mobile)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'KaiOS') !== false) {
                $deviceType .= ' (KaiOS)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'BB10') !== false) {
                $deviceType .= ' (BlackBerry)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'webOS') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Palm') !== false) {
                $deviceType .= ' (Palm/webOS)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Symbian') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Series60') !== false) {
                $deviceType .= ' (Symbian)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'MeeGo') !== false) {
                $deviceType .= ' (MeeGo)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Tizen') !== false) {
                $deviceType .= ' (Tizen)';
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Ubuntu Touch') !== false) {
                $deviceType .= ' (Ubuntu Touch)';
            } else {
                $deviceType .= ' (Unknown Phone)';
            }
        } else {
            $deviceType = '';
        }

        $public_ip = self::getPublicIpViaApi();

        return [
            'browser' => $browser,
            'platform' => $platform,
            'device' => $deviceType,
            'public_ip' => $public_ip
        ];
    }

    private static function getPublicIpViaApi(): string
    {
        // Fastest option
        $ip = @file_get_contents('https://api.ipify.org');

        if ($ip && filter_var($ip, FILTER_VALIDATE_IP)) {
            return $ip;
        }

        // Backup method using cURL
        $ch = curl_init('https://api.ipify.org');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ip = curl_exec($ch);
        curl_close($ch);

        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : 'Unknown IP';
    }
}