<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb3679f2ffb093fdcc0d482af2edc8df9
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitb3679f2ffb093fdcc0d482af2edc8df9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb3679f2ffb093fdcc0d482af2edc8df9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
