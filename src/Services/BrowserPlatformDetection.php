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
            } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Windows Phone') !== false) {
                $deviceType .= ' (Windows Phone)';
            } else {
                $deviceType .= ' (Unknown Phone)';
            }
        } else {
            $deviceType = 'Not a Mobile';
        }

        // Detect IP address (handles proxy and fallback)
        $ip = self::getClientIp();

        return [
            'browser' => $browser,
            'platform' => $platform,
            'device' => $deviceType,
            'ip' => $ip
        ];
    }

    private static function getClientIp(): string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        }

        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) { // for Cloudflare
            return $_SERVER['HTTP_CF_CONNECTING_IP'];
        }

        return $_SERVER['REMOTE_ADDR'] ?? 'Unknown IP';
    }
}