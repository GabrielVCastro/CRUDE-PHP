<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7b207225678bd7c4a73645c8e07242f
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'StellaMaris\\Clock\\' => 18,
        ),
        'L' => 
        array (
            'Lcobucci\\JWT\\' => 13,
            'Lcobucci\\Clock\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'StellaMaris\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/stella-maris/clock/src',
        ),
        'Lcobucci\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/jwt/src',
        ),
        'Lcobucci\\Clock\\' => 
        array (
            0 => __DIR__ . '/..' . '/lcobucci/clock/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7b207225678bd7c4a73645c8e07242f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7b207225678bd7c4a73645c8e07242f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd7b207225678bd7c4a73645c8e07242f::$classMap;

        }, null, ClassLoader::class);
    }
}