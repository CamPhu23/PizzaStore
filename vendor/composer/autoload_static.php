<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit35ff1342b3850b65f499e057b4792c79
{
    public static $files = array (
        '7e9bd612cc444b3eed788ebbe46263a0' => __DIR__ . '/..' . '/laminas/laminas-zendframework-bridge/src/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Svg\\' => 4,
        ),
        'P' => 
        array (
            'PhpOffice\\PhpWord\\' => 18,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'L' => 
        array (
            'Laminas\\ZendFrameworkBridge\\' => 28,
            'Laminas\\Escaper\\' => 16,
        ),
        'F' => 
        array (
            'FontLib\\' => 8,
        ),
        'D' => 
        array (
            'Dompdf\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Svg\\' => 
        array (
            0 => __DIR__ . '/..' . '/phenx/php-svg-lib/src/Svg',
        ),
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpword/src/PhpWord',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Laminas\\ZendFrameworkBridge\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-zendframework-bridge/src',
        ),
        'Laminas\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-escaper/src',
        ),
        'FontLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phenx/php-font-lib/src/FontLib',
        ),
        'Dompdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/dompdf/dompdf/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Sabberworm\\CSS' => 
            array (
                0 => __DIR__ . '/..' . '/sabberworm/php-css-parser/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Dompdf\\Cpdf' => __DIR__ . '/..' . '/dompdf/dompdf/lib/Cpdf.php',
        'HTML5_Data' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Data.php',
        'HTML5_InputStream' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/InputStream.php',
        'HTML5_Parser' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Parser.php',
        'HTML5_Tokenizer' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Tokenizer.php',
        'HTML5_TreeBuilder' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/TreeBuilder.php',
        'SimpleXLSXGen' => __DIR__ . '/..' . '/shuchkin/simplexlsxgen/src/SimpleXLSXGen.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit35ff1342b3850b65f499e057b4792c79::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit35ff1342b3850b65f499e057b4792c79::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit35ff1342b3850b65f499e057b4792c79::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit35ff1342b3850b65f499e057b4792c79::$classMap;

        }, null, ClassLoader::class);
    }
}
