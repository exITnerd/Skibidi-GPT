<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbd418ab6a4e412261bd88e95d6d2a838
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitbd418ab6a4e412261bd88e95d6d2a838', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbd418ab6a4e412261bd88e95d6d2a838', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbd418ab6a4e412261bd88e95d6d2a838::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
