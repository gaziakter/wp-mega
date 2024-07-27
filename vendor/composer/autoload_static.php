<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9e5b9b746a8ffbbfba3e26b4aca60e1
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WpMega\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WpMega\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9e5b9b746a8ffbbfba3e26b4aca60e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9e5b9b746a8ffbbfba3e26b4aca60e1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb9e5b9b746a8ffbbfba3e26b4aca60e1::$classMap;

        }, null, ClassLoader::class);
    }
}
