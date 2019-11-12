<?php
defined('AUTOUPDATER_LIB') or die;

class AutoUpdater_Task_PostCmsDisable extends AutoUpdater_Task_Base
{
    protected $encrypt = false;

    /**
     * @return array
     */
    public function doTask()
    {
        $date = current_time(DATE_ATOM);
	
        $maintenance_enabled = AutoUpdater_Filemanager::getInstance()->put_contents(
            AUTOUPDATER_SITE_PATH . 'autoupdater_maintenance_mode_enabled.tmp', 
            sprintf('The maintenance mode started at %s.'
                . ' Remove this file to disable the maintenance mode manually,'
                . ' but only if it is running for longer than 15 minutes!', $date)
        );

        if ($maintenance_enabled) {
            AutoUpdater_Config::set('maintenance_started_at', $date);
        }

        return array(
            'success' => $maintenance_enabled,
            'is_offline' => $maintenance_enabled,
        );
    }
}