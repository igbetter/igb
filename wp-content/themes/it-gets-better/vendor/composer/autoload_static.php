<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit20ef7b27d65faf9639a3dd15473b49b4
{
    public static $files = array (
        '3937806105cc8e221b8fa8db5b70d2f2' => __DIR__ . '/..' . '/wp-cli/mustangostang-spyc/includes/functions.php',
        'be01b9b16925dcb22165c40b46681ac6' => __DIR__ . '/..' . '/wp-cli/php-cli-tools/lib/cli/cli.php',
        '8b97cc0a160cb07a0e3651f05e5f68e4' => __DIR__ . '/..' . '/sirbrillig/phpcs-changed/PhpcsChanged/Cli.php',
        'cc7a23006750b4fc3f5d1503c66c1054' => __DIR__ . '/..' . '/sirbrillig/phpcs-changed/PhpcsChanged/functions.php',
        'ffb465a494c3101218c4417180c2c9a2' => __DIR__ . '/..' . '/wp-cli/i18n-command/i18n-command.php',
    );

    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eftec\\bladeone\\' => 15,
        ),
        'W' => 
        array (
            'WP_CLI\\I18n\\' => 12,
        ),
        'V' => 
        array (
            'VariableAnalysis\\' => 17,
        ),
        'S' => 
        array (
            'Symfony\\Component\\Finder\\' => 25,
        ),
        'P' => 
        array (
            'PhpcsChanged\\' => 13,
            'Peast\\' => 6,
        ),
        'M' => 
        array (
            'Mustangostang\\' => 14,
        ),
        'G' => 
        array (
            'Gettext\\Languages\\' => 18,
            'Gettext\\' => 8,
        ),
        'D' => 
        array (
            'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 55,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eftec\\bladeone\\' => 
        array (
            0 => __DIR__ . '/..' . '/eftec/bladeone/lib',
        ),
        'WP_CLI\\I18n\\' => 
        array (
            0 => __DIR__ . '/..' . '/wp-cli/i18n-command/src',
        ),
        'VariableAnalysis\\' => 
        array (
            0 => __DIR__ . '/..' . '/sirbrillig/phpcs-variable-analysis/VariableAnalysis',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'PhpcsChanged\\' => 
        array (
            0 => __DIR__ . '/..' . '/sirbrillig/phpcs-changed/PhpcsChanged',
        ),
        'Peast\\' => 
        array (
            0 => __DIR__ . '/..' . '/mck89/peast/lib/Peast',
        ),
        'Mustangostang\\' => 
        array (
            0 => __DIR__ . '/..' . '/wp-cli/mustangostang-spyc/src',
        ),
        'Gettext\\Languages\\' => 
        array (
            0 => __DIR__ . '/..' . '/gettext/languages/src',
        ),
        'Gettext\\' => 
        array (
            0 => __DIR__ . '/..' . '/gettext/gettext/src',
        ),
        'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 
        array (
            0 => __DIR__ . '/..' . '/dealerdirect/phpcodesniffer-composer-installer/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'cli' => 
            array (
                0 => __DIR__ . '/..' . '/wp-cli/php-cli-tools/lib',
            ),
        ),
        'W' => 
        array (
            'WP_CLI\\' => 
            array (
                0 => __DIR__ . '/..' . '/wp-cli/wp-cli/php',
            ),
        ),
        'M' => 
        array (
            'Mustache' => 
            array (
                0 => __DIR__ . '/..' . '/mustache/mustache/src',
            ),
        ),
    );

    public static $classMap = array (
        'CS_REST_Administrators' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_administrators.php',
        'CS_REST_Campaigns' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_campaigns.php',
        'CS_REST_Clients' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_clients.php',
        'CS_REST_Events' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_events.php',
        'CS_REST_General' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_general.php',
        'CS_REST_JourneyEmails' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_journey_emails.php',
        'CS_REST_Journeys' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_journeys.php',
        'CS_REST_Lists' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_lists.php',
        'CS_REST_People' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_people.php',
        'CS_REST_Segments' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_segments.php',
        'CS_REST_Subscribers' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_subscribers.php',
        'CS_REST_Templates' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_templates.php',
        'CS_REST_Transactional_ClassicEmail' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_transactional_classicemail.php',
        'CS_REST_Transactional_SmartEmail' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_transactional_smartemail.php',
        'CS_REST_Transactional_Timeline' => __DIR__ . '/..' . '/campaignmonitor/createsend-php/csrest_transactional_timeline.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'WP_CLI' => __DIR__ . '/..' . '/wp-cli/wp-cli/php/class-wp-cli.php',
        'WP_CLI_Command' => __DIR__ . '/..' . '/wp-cli/wp-cli/php/class-wp-cli-command.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit20ef7b27d65faf9639a3dd15473b49b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit20ef7b27d65faf9639a3dd15473b49b4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit20ef7b27d65faf9639a3dd15473b49b4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit20ef7b27d65faf9639a3dd15473b49b4::$classMap;

        }, null, ClassLoader::class);
    }
}
