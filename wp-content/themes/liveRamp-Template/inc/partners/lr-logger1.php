<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}



/**
 * Allows log files to be written to for debugging purposes
 *
 */
class LR_Logger {

    /**
     * Stores open file _handles.
     *
     * @var array
     * @access private
     */
    private $_handles;

    /**
     * Constructor for the logger.
     */
    public function __construct() {
        $this->_handles = array();
    }


    /**
     * Destructor.
     */
    public function __destruct() {
        foreach ( $this->_handles as $handle ) {
            @fclose( $handle );
        }
    }


    /**
     * Open log file for writing.
     *
     * @access private
     * @param mixed $handle
     * @return bool success
     */
    private function open( $handle ) {
        if ( isset( $this->_handles[ $handle ] ) ) {
            return true;
        }

        if ( $this->_handles[ $handle ] = @fopen( $this->get_log_file_path( $handle ), 'a' ) ) {
            return true;
        }

        return false;
    }


    /**
     * Return log file path based on the $handel
     *
     * @param $handle
     * @return string
     */
    function get_log_file_path( $handle ){
        return plugin_dir_path(__FILE__) .'log/'. $handle . $this->log_date_time_string(). '.log';
    }


    /**
     * Return DateTime formatted string to append after log file name
     *
     * @return string
     */
    function log_date_time_string(){
        // central time zone
        $year = date('Y');
        $month = date('M');
        $day = date('d');
        return ' '. $month .'-'. $day . '-' . $year. ' ';
    }


    /**
     * Add a log entry to chosen file.
     *
     * @param string $handle
     * @param string $message
     */
    public function add( $handle, $message ) {
        if ( $this->open( $handle ) && is_resource( $this->_handles[ $handle ] ) ) {
            @fwrite( $this->_handles[ $handle ], $message . "\n" );
        }
    }


    /**
     * Clear entries from chosen file.
     *
     * @param mixed $handle
     */
    public function clear( $handle ) {
        if ( $this->open( $handle ) && is_resource( $this->_handles[ $handle ] ) ) {
            @ftruncate( $this->_handles[ $handle ], 0 );
        }
    }

}
