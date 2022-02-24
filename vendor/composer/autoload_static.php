<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb29001732473ad3f5c327511cc34606
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'Ysheng\\Meituan\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ysheng\\Meituan\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitcb29001732473ad3f5c327511cc34606::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcb29001732473ad3f5c327511cc34606::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcb29001732473ad3f5c327511cc34606::$classMap;

        }, null, ClassLoader::class);
    }
}
