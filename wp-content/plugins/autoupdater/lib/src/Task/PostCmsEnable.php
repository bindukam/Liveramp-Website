<?php
defined('AUTOUPDATER_LIB') or die;

class AutoUpdater_Task_PostCmsEnable extends AutoUpdater_Task_Base
{
    protected $encrypt = false;

    /**
     * @return array
     */
    public function doTask()
    {
        $maintenance_disabled = true;
        $filemanager = AutoUpdater_Filemanager::getInstance();

        $path = AUTOUPDATER_SITE_PATH . 'autoupdater_maintenance_mode_enabled.tmp';
        if ($filemanager->exists($path)) {
            $maintenance_disabled = $filemanager->delete($path);
        }

        if ($maintenance_disabled) {
            AutoUpdater_Config::set('maintenance_started_at', null);
        }

        return array(
            'success' => $maintenance_disabled,
            'is_offline' => !$maintenance_disabled,
        );
    }
}