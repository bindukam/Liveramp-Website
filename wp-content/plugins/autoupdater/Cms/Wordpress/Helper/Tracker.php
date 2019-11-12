<?php
defined('AUTOUPDATER_LIB') or die;

class AutoUpdater_Cms_Wordpress_Helper_Tracker
{
    protected static $cached_requests  = array();

    public static function initDefaults($url)
    {
        if ( version_compare( get_bloginfo( 'version' ), '5.1.0', '>=' ) ) {
            return array(
                'method'              => 'GET',
                'timeout'             => apply_filters('http_request_timeout', 5, $url),
                'redirection'         => apply_filters('http_request_redirection_count', 5, $url),
                '_redirection'        => apply_filters('http_request_redirection_count', 5, $url),
                'httpversion'         => apply_filters('http_request_version', '1.0', $url),
                'user-agent'          => apply_filters('http_headers_useragent',
                    'WordPress/' . AUTOUPDATER_WP_VERSION . '; ' . get_bloginfo('url'), $url),
                'reject_unsafe_urls'  => apply_filters('http_request_reject_unsafe_urls', false, $url),
                'blocking'            => true,
                'compress'            => false,
                'decompress'          => true,
                'sslverify'           => true,
                'sslcertificates'     => ABSPATH . WPINC . '/certificates/ca-bundle.crt',
                'stream'              => false,
                'filename'            => null,
                'limit_response_size' => null,
            );
        }

        return array(
                'method'              => 'GET',
                'timeout'             => apply_filters('http_request_timeout', 5),
                'redirection'         => apply_filters('http_request_redirection_count', 5),
                '_redirection'        => apply_filters('http_request_redirection_count', 5),
                'httpversion'         => apply_filters('http_request_version', '1.0'),
                'user-agent'          => apply_filters('http_headers_useragent',
                    'WordPress/' . AUTOUPDATER_WP_VERSION . '; ' . get_bloginfo('url')),
                'reject_unsafe_urls'  => apply_filters('http_request_reject_unsafe_urls', false),
                'blocking'            => true,
                'compress'            => false,
                'decompress'          => true,
                'sslverify'           => true,
                'sslcertificates'     => ABSPATH . WPINC . '/certificates/ca-bundle.crt',
                'stream'              => false,
                'filename'            => null,
                'limit_response_size' => null,
            );
    }

    /**
     * @param bool   $preempt
     * @param array  $request
     * @param string $url
     *
     * @return bool
     */
    public static function trackRequest($preempt = false, $request = array(), $url = '')
    {
        $defaults = self::initDefaults($url);
        // Catch only commercial plugins and themes not present at the official WordPress repository
        if (empty($url) || strpos($url, '://api.wordpress.org/') !== false)
        {
            return $preempt;
        }

        $data      = array_merge(array('url' => $url), $request);
        $cache_key = md5(serialize($data));
        if (!isset(self::$cached_requests[$cache_key]))
        {
            // Remove defaults
            foreach ($data as $key => $item)
            {
                if (
                    // if defaults contains key
                    array_key_exists($key, $defaults) 
                    // and default key value is exactly the same
                    && $defaults[$key] === $item)
                {
                    unset($data[$key]);
                }
            }

            // Change the certificates path to relative
            if (!empty($data['sslcertificates']))
            {
                $data['sslcertificates'] = str_replace(ABSPATH, '', $data['sslcertificates']);
            }

            self::$cached_requests[$cache_key] = $data;
        }

        return $preempt;
    }

    /**
     * @return array
     */
    public static function getCachedRequests()
    {
        return self::$cached_requests;
    }
}