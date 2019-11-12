<?php
defined('AUTOUPDATER_LIB') or die;

class AutoUpdater_Task_PostFileDownload extends AutoUpdater_Task_Base
{
    /**
     * @throws AutoUpdater_Exception_Response
     * @throws Exception
     *
     * @return array
     */
    public function doTask()
    {
        $url = $this->input('file_url');
        if (!$url)
        {
            throw new AutoUpdater_Exception_Response('Nothing to download', 400);
        }

        // Be sure we can use multiple web servers (for more info ask @andrew.kawula-c)
        $filemanager = AutoUpdater_Filemanager::getInstance();
        // Exit if WP_TEMP_DIR is defined but doesn't point to website directory
        if (defined('WP_TEMP_DIR') && strpos(realpath(WP_TEMP_DIR), realpath(ABSPATH)) === false) {
            AutoUpdater_Log::error('WP_TEMP_DIR is defined and it points to bad location ' . WP_TEMP_DIR);
            return array(
                'success' => false,
                'message' => 'WP_TEMP_DIR is defined and it points to bad location ' . WP_TEMP_DIR
            );
        }

        // if it is not defined, define it, uper statement checks for defined and broken temp dir.
        if (!defined('WP_TEMP_DIR')) {
            define('WP_TEMP_DIR', WP_CONTENT_DIR . '/upgrade');
        }
        
        if(!$filemanager->exists(WP_TEMP_DIR)) {
            $filemanager->mkdir(WP_TEMP_DIR, 0700);
        }

        $path = $filemanager->download($url);

        return array(
            'success' => $path ? true : false,
            'return'  => array(
                'file_path' => $filemanager->trimPath($path),
            ),
        );
    }
}
