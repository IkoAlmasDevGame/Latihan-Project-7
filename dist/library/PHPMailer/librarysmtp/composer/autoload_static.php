<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit86697c7ba57ff3cef83114ea0d775d0d
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit86697c7ba57ff3cef83114ea0d775d0d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit86697c7ba57ff3cef83114ea0d775d0d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit86697c7ba57ff3cef83114ea0d775d0d::$classMap;

        }, null, ClassLoader::class);
    }
}