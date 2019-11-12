<?php
/**
 * Admin View: Page - Partners cron Logs
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<?php if ( $logs ) : ?>

    <div class="wrap liveramp-log" style="margin-top: 30px;">
        <h1 class="">Partner cron logs</h1>
        <div id="log-viewer-select">
            <div class="alignleft">
                <h3><?php printf( __( 'Log file: %s (%s)'), esc_html( $viewed_log ), date_i18n( get_option( 'date_format') . ' ' . get_option( 'time_format'), filemtime( $partners_log_dir . $viewed_log ) ) ); ?></h3>
            </div>
            <div class="alignright">
                <form action="<?php echo admin_url( 'admin.php?page=liveramp-cron-logs' ); ?>" method="post">
                    <select name="log_file">
                    <?php foreach ( $logs as $log_key => $log_file ) : ?>
                        <option value="<?php echo esc_attr( $log_key ); ?>" <?php selected( sanitize_title( $viewed_log ), $log_key ); ?>><?php echo esc_html( $log_file ); ?> (<?php echo date_i18n( get_option( 'date_format') . ' ' . get_option( 'time_format'), filemtime( $partners_log_dir . $log_file ) ); ?>)</option>
                    <?php endforeach; ?>
                    </select>
                    <input type="submit" class="button" value="<?php esc_attr_e( 'View'); ?>" />
                </form>
            </div>
            <div class="clear"></div>
        </div>
        <div id="log-viewer">
            <textarea cols="70" rows="25" autocomplete="off"
                      style="z-index: auto;
                      width: 100%;
                      margin-top: 30px;
                      position: relative;
                      line-height: 1.6;
                      padding: 30px;
                      font-size: 14px;
                      transition: none;
                      background: #ffffff !important;">
                <?php
                echo esc_textarea( file_get_contents( $partners_log_dir . $viewed_log ) );
                ?>
            </textarea>

        </div>
    </div>

<?php else : ?>
    <div class="updated below-h2"><p><?php _e( 'There are currently no logs to view.' ); ?></p></div>
<?php endif; ?>


