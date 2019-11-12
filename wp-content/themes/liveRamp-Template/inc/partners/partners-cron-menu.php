<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

if (!class_exists('liverampCronLogMenu')):

    /**
     * Main Class
     * @class LiverampCronLog
     * @version    1.0.0
     */

    class liverampCronLogMenu
    {
        /**
         * @var string
         */
        public $version = '1.0.0';

        public function __construct()
        {
            add_action('admin_menu', array($this, 'lr_cron_log_menu'));
        }

        /**
         * Scan the log files.
         * @return array
         */
        public function scan_log_files()
        {
            $files = @scandir(dirname(__FILE__) . '/log/');
            $result = array();

            if ($files) {

                foreach ($files as $key => $value) {

                    if (!in_array($value, array('.', '..'))) {
                        if (!is_dir($value) && strstr($value, '.log')) {
                            $result[sanitize_title($value)] = $value;
                        }
                    }
                }

            }

            return $result;
        }


        public function lr_cron_log_menu()
        {
            add_menu_page(
                'LR Crons Logs',
                'LR Crons Logs',
                'manage_options',
                'liveramp-cron-logs',
                array(
                    $this,
                    'lr_cron_log_menu_page'
                ),
                'dashicons-controls-repeat',
                '70'
            );
        }


        function lr_cron_log_menu_page()
        {
            $partners_log_dir = dirname(__FILE__) . '/log/';
            $logs = $this->scan_log_files();
            if (!empty($_REQUEST['log_file']) && isset($logs[sanitize_title($_REQUEST['log_file'])])) {
                $viewed_log = $logs[sanitize_title($_REQUEST['log_file'])];
            } elseif (!empty($logs)) {
                $viewed_log = current($logs);
            }

            include_once plugin_dir_path(__FILE__) . 'log-views/html-partners-log.php';
        }


    }

endif;

new liverampCronLogMenu();

