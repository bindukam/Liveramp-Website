<?php

/**
 * Insert pages into wp for each indevidual partner
 */
class InsertPartnersPages
{

    private $api_partners = array();
    private $current_partner_posts = array();
    private $json_api_destination_url;


    function __construct( $json_api_destination_url = 'https://connect.liveramp-live.dev.cc/public/destinations.json' )
    {
        $this->json_api_destination_url = $json_api_destination_url;
        $this->api_partners = $this->set_api_partners_data();
        $this->current_partner_posts = $this->get_current_partner_posts();

        add_action('wp', array($this, 'register_insert_partners_pages_cron'));
        add_action('init', array($this, 'register_partner'));
        add_action('insert_partners_pages', array($this, 'run'));

        $this->run();

        add_action('admin_notices', array($this, 'partner_admin_notice_and_hide_submit_box'));
    }

    function partner_admin_notice_and_hide_submit_box(){
        $screen = get_current_screen();
        //If not on the screen with ID 'edit-post' abort.
        if( $screen->id !='partner' )
            return;
        ?>
        <div class="error">
            <p style="font-size: 16px">
                We have intentionally disabled edit/update/delete options for the partners, and API dashboard is the place where you make changes.
            </p>
        </div>

        <SCRIPT TYPE="text/javascript">
            jQuery(document).ready(function(){
                jQuery("#submitdiv").hide();
            });
        </SCRIPT>
        <?php
    }

    function register_insert_partners_pages_cron(){
        if( !wp_next_scheduled( 'insert_partners_pages' ) ) {
            wp_schedule_event( time(), 'daily', 'insert_partners_pages' );
        }
    }

    /**
     * Return all partners from wp
     **/
    function get_current_partner_posts()
    {
        $args = array(
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'post_type' => 'partner'
        );
        $partners = get_posts($args);
        return $this->add_api_partners_meta($partners);
    }

    /**
     *
     * @param type $partners
     * @return type
     */
    function add_api_partners_meta($partners)
    {
        foreach ($partners as $partner) {
            $partner->partner_api_id = get_post_meta($partner->ID, 'partner_id', true);
        }
        return $partners;
    }

    /**
     * Main function to run on cron - THIS ADDS THE PARTNERS TO WP
     */
    function run(){
        $log = new LR_Logger();
        $log->add("insert-partners-pages-cron", "Cron Started at @ " . date('d/m/Y g:i:s A', time()) . "\n\n");

        $remain_partenr_posts = $this->current_partner_posts;

        // foreach ($this->api_partners as $post) {

        //     if( $post->name === 'iSpot' ) {

        //         die('ISPOT REMAINS!!!');
        //     }
        // }

        if( !empty( $this->api_partners ) ) {

            foreach( $this->api_partners as $api_partner) {
            $partner_post_id = $this->is_partner_already_exist_in_wp($api_partner->id);

                if (!empty($partner_post_id)) {
                    $log->add("insert-partners-pages-cron", "Partner with id ". $partner_post_id ." already exist.");
                    $this->update_partner($partner_post_id, $api_partner);
                    $remain_partenr_posts = $this->unset_the_partner($remain_partenr_posts , $partner_post_id);
                } else {
                    $this->insert_partner($api_partner);
                }
            }

            if(!empty($remain_partenr_posts)){
                $this->delete_partner_posts($remain_partenr_posts);
            }
            $log->add("insert-partners-pages-cron", "\n\nCron Finished at @ " . date('d/m/Y g:i:s A', time()));
            $log->add("insert-partners-pages-cron", "Next 'insert_partners_pages' cron schedule at @ "
                . date('d/m/Y g:i:s A', wp_next_scheduled( 'insert_partners_pages' ))
                . "::". date('d/m/Y g:i:s A', time())."\n\n");

        } else {

            // echo '<script>console.log("$this->api_partners is empty and shouldnt be. Please check insert-partners-pages.php or the connect service");<script>';
        }
    }

    function update_partner($partner_post_id, $api_partner){
        $partner_post = get_post($partner_post_id);
        if($partner_post->post_name != self::clean_title_for_url($api_partner->name) ){
            $this->reconstruct_partner($partner_post->ID, $api_partner);
            return;
        }
        $this->update_partner_metas($partner_post_id, $api_partner);
    }

    function reconstruct_partner($current_partner_post_id, $api_partner){
        wp_delete_post( $current_partner_post_id, true );
        $this->insert_partner($api_partner);
    }

    function delete_partner_posts($partenr_posts){
        $log = new LR_Logger();
        foreach($partenr_posts as $partenr){
            wp_delete_post( $partenr->ID, true );

            if(!empty($partenr->post_title)){
                $log->add("insert-partners-pages-cron", "Partner named " . $partenr->post_title . " deleted (because recently it got deleted from API server too).");
            }
        }
    }


    function unset_the_partner($remain_partenr_posts , $partner_post_id){
        foreach($remain_partenr_posts  as  $key => $partner){
            if($partner->ID == $partner_post_id){
                unset($remain_partenr_posts[$key]);
                break;
            }
        }
       return $remain_partenr_posts;
    }

    function is_partner_already_exist_in_wp($partner_api_id)
    {
        foreach ($this->current_partner_posts as $partner_in_wp) {
            if ($partner_in_wp->partner_api_id == $partner_api_id) {
                return $partner_in_wp->ID;
            }
        }
        return false;
    }


    /**
     *
     * @param type $string
     * @return type
     */
    public static function clean_title_for_url($string)
    {
        $string =  trim($string);
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
        return strtolower($string);
    }


    /**
     * Insert partner into wordpress db
     * @param type $api_partner
     */
    function insert_partner($api_partner)
    {
        // Create post object
        $partner_attr = array(
            'post_title' => self::clean_title_for_url($api_partner->name),
            'post_content' => $api_partner->description,
            'post_status' => 'publish',
            'post_type' => 'partner',
            'post_author' => 1
        );

        if( !empty( $api_partner->description ) ) {

            // Insert the post into the database
            $partner_post_id = wp_insert_post($partner_attr);
            if ($partner_post_id) {
                $this->update_partner_metas($partner_post_id, $api_partner);
                $log = new LR_Logger();
                $log->add("insert-partners-pages-cron", "New partner created. Partner url " . get_permalink($partner_post_id));
            }

        } else {
            // echo '<script>console.log("$api_partner->description is missing and should not be");</script>';
        }
    }


    function update_partner_metas($partner_post_id, $api_partner)
    {

        update_post_meta($partner_post_id, 'partner_id', $api_partner->id);
        update_post_meta($partner_post_id, 'partner_name', $api_partner->name);
        update_post_meta($partner_post_id, 'partner_description', $api_partner->description);
        update_post_meta($partner_post_id, 'partner_url', $api_partner->url);
        update_post_meta($partner_post_id, 'partner_logo_url', $api_partner->logo_url);
        update_post_meta($partner_post_id, 'partner_categories', $api_partner->categories);

        if( property_exists($api_partner, 'badges')) {
            update_post_meta($partner_post_id, 'partner_badges', $api_partner->badges);
        }
        update_post_meta($partner_post_id, 'partner_use_cases', $api_partner->use_cases);
        update_post_meta($partner_post_id, 'partner_level', $api_partner->level);
        update_post_meta($partner_post_id, 'partner_availabilities', $api_partner->availabilities);

        $log = new LR_Logger();
        $log->add("insert-partners-pages-cron", "Partner named  " . $api_partner->name . " meta information's have been updated.");
    }


    function set_api_partners_data()
    {
        $partners_json_str = @file_get_contents($this->json_api_destination_url);

        $partners = json_decode($partners_json_str);

        return $partners;
    }

    function register_partner()
    {

    }
}

new InsertPartnersPages();

// For testing only
//new InsertPartnersPages(
//    get_stylesheet_directory_uri() . '/inc/partners/demo-partners-data/partners.json'
//);
