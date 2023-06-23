<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit695392d32aab322d54770f269dd68523
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Chronostep\\Chronobrowserplatform\\' => 33,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Chronostep\\Chronobrowserplatform\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit695392d32aab322d54770f269dd68523::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit695392d32aab322d54770f269dd68523::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit695392d32aab322d54770f269dd68523::$classMap;

        }, null, ClassLoader::class);
    }
}
