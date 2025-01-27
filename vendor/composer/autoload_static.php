<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb46a936fe4f4fc45d20399984efc575
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb46a936fe4f4fc45d20399984efc575::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb46a936fe4f4fc45d20399984efc575::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb46a936fe4f4fc45d20399984efc575::$classMap;

        }, null, ClassLoader::class);
    }
}
