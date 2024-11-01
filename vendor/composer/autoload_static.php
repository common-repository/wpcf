<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1ecd08b8f0c1fe22a8cfef4540c6062d
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Haruncpi\\WpCf\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Haruncpi\\WpCf\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1ecd08b8f0c1fe22a8cfef4540c6062d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1ecd08b8f0c1fe22a8cfef4540c6062d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1ecd08b8f0c1fe22a8cfef4540c6062d::$classMap;

        }, null, ClassLoader::class);
    }
}