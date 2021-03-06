<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08ba2542bc21392efa1142f68ed18140
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08ba2542bc21392efa1142f68ed18140::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08ba2542bc21392efa1142f68ed18140::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
