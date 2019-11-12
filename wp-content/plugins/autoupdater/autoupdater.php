<?php
/**
 * Plugin Name: WP Engine Smart Plugin Manager
 * Plugin URI:
 * Description:
 * Version: 1.23.12
 * Text Domain: autoupdater
 * Author: WP Engine
 * Author URI:
 * License: GNU/GPL http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
function_exists('add_action') or die;

require_once ABSPATH . 'wp-admin/includes/plugin.php';

if (!defined('AUTOUPDATER_WP_VERSION'))
{
    define('AUTOUPDATER_WP_VERSION', $GLOBALS['wp_version']);
}
if (defined('CMSDETECTOR') && !defined('CMSDETECTOR_VERSION') && php_sapi_name() === 'cli')
{
    // Do not load the plugin while CMS Detector is being initialized
}
elseif (version_compare(AUTOUPDATER_WP_VERSION, '3.0', '>=') &&
    version_compare(PHP_VERSION, '5.3', '>='))
{
    $data = get_file_data(__FILE__, array('Version' => 'Version'));

    define('AUTOUPDATER_WP_PLUGIN_NAME', 'WP Engine Smart Plugin Manager');
    define('AUTOUPDATER_WP_PLUGIN_FILE', __FILE__);
    define('AUTOUPDATER_WP_PLUGIN_PATH', dirname(__FILE__) . '/');
    define('AUTOUPDATER_WP_PLUGIN_SLUG', plugin_basename(__FILE__));
    define('AUTOUPDATER_WP_PLUGIN_BASENAME', basename(__FILE__, '.php'));

    define('AUTOUPDATER_LIB', true);
    define('AUTOUPDATER_CMS', 'wordpress');
    define('AUTOUPDATER_SITE_PATH', rtrim(ABSPATH, '/\\') . '/');
    define('AUTOUPDATER_VERSION', $data['Version']);
    define('AUTOUPDATER_STAGE', 'app');

    if (!function_exists('AutoUpdater_getRootPath')) {
        function AutoUpdater_getRootPath()
        {
            if (!empty($_SERVER['SCRIPT_FILENAME'])) {
                $path = dirname(realpath($_SERVER['SCRIPT_FILENAME'])) . '/';
                if (defined('CMSDETECTOR')) {
                    // Core files in subdirectory
                    if (!file_exists($path . 'index.php') && file_exists($path . '../index.php')) {
                        return dirname($path) . '/';
                    }
                } elseif (basename($path) == 'wp-admin') {
                    return dirname($path) . '/';
                }

                return $path;
            }

            $files = get_included_files();
            if (isset($files[0]) && substr($files[0], -9) == 'index.php') {
                return dirname(realpath($files[0])) . '/';
            }

            return AUTOUPDATER_SITE_PATH;
        }
    }

    if (!defined('AUTOUPDATER_ROOT_PATH')) {
        define('AUTOUPDATER_ROOT_PATH', AutoUpdater_getRootPath());
    }

    require_once AUTOUPDATER_WP_PLUGIN_PATH . 'lib/src/Init.php';

    $api = AutoUpdater_Api::getInstance();

    if (is_admin() || $api->isInitialized() || defined('WP_CLI'))
    {
        require_once AUTOUPDATER_LIB_PATH . 'Installer.php';
        AutoUpdater_Installer::getInstance();
    }

    require_once AUTOUPDATER_WP_PLUGIN_PATH . 'app/Application.php';

    AutoUpdater_WP_Application::getInstance();
    if (!AutoUpdater_Config::get('configured', 0)) {
        AutoUpdater_Config::set('configured', 1);
        AutoUpdater_Config::set('debug', 1);
        AutoUpdater_Config::set('autoupdater_available', 1);
        AutoUpdater_Config::set('autoupdater_enabled', 1);
        AutoUpdater_Config::set('encryption', 1);
        AutoUpdater_Config::set('ssl_verify', 1);
        AutoUpdater_Config::set('protect_child', 1);
        AutoUpdater_Config::set('whitelabel_child_page', "WP Engine Smart Plugin Manager simplifies plugin management by automatically updating your plugins every day and ensuring your site continues to work as expected.");
        AutoUpdater_Config::set('page_enabled_template', "<div> Welcome to Smart Plugin Manager <br> <br> According to research 86% of websites get hacked because of outdated WordPress
        core, themes & plugins. WP Engine truly cares about website security and your piece of mind. That is why we have
        provided this plugin for you to ease the pain for keeping websites up-to-date.
        <br>
        <br>
        <a target='_blank' href='https://wpengine.com/support/smart-plugin-manager-faq/'>Learn more here</a></div>");
        AutoUpdater_Config::set('page_unavailable_template', "<div>" .
                            "Welcome to Smart Plugin Manager" .
                            "<br>" .
                            "<br>" .
                            "According to research 86% of websites get hacked because of outdated WordPress core, themes & plugins. WP Engine truly cares about website security and your peace of mind. That is why we have provided this plugin for you to ease the pain for keeping websites up-to-date." .
                            "<br>" .
                            "<br>" .
                            "Smart Plugin Manager settings will be available shortly." .
                            "</div>");
    }

    if (AutoUpdater_Config::get('configured', 0) && !AutoUpdater_Config::get('encryption', 0)) {
        AutoUpdater_Config::set('encryption', 1);
    }
}
elseif (!function_exists('autoUpdaterRequirementsNotice'))
{
    function autoUpdaterRequirementsNotice()
    {
        ?>
        <div class="error">
            <p><?php printf(__('This plugin requires WordPress %s and PHP %s', 'autoupdater'), '3.0+', '5.3+'); ?></p>
        </div>
        <?php
    }

    add_action('admin_notices', 'autoUpdaterRequirementsNotice');
}
