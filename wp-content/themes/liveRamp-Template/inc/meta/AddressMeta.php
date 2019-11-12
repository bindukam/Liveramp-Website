<?php


class AddressMeta {

    function __construct(){
        add_action('cmb2_init', array($this, 'address_meta'));
    }

    function address_meta() {

        // Start with an underscore to hide fields from custom fields list
        $prefix = '_address_';

        /**
         * Repeatable Field Groups
         */
        $cmb_group = new_cmb2_box( array(
            'id'           => $prefix . 'meta',
            'title'        => __( 'Address Field Group', 'cmb2' ),
            'object_types' => array( 'page', ),
            'show_on'      => array( 'id' => array( 159, ) ), // Specific post IDs to display this metabox

        ) );

        // $group_field_id is the field id string, so in this case: $prefix . 'demo'
        $group_field_id = $cmb_group->add_field( array(
            'id'          => $prefix . 'liveramp',
            'type'        => 'group',
            //'description' => __( 'Generates reusable form Addresses', 'cmb2' ),
            'options'     => array(
                'group_title'   => __( 'Address {#}', 'cmb2' ), // {#} gets replaced by row number
                'add_button'    => __( 'Add Another Address', 'cmb2' ),
                'remove_button' => __( 'Remove Address', 'cmb2' ),
                'sortable'      => true, // beta
            ),
        ) );

        /**
         * Group fields works the same, except ids only need
         * to be unique to the group. Prefix is not needed.
         *
         * The parent field's id needs to be passed as the first argument.
         */
        $cmb_group->add_group_field( $group_field_id, array(
            'name'       => __( 'Address', 'cmb2' ),
            'description' => __( 'Arrange your address texts perfectly how you want to see it on front end.', 'cmb2' ),
            'id'         => 'address',
            'type'       => 'textarea',
        ) );


        $cmb_group->add_group_field( $group_field_id, array(
            'name'        => __( 'Map Link', 'cmb2' ),
            'description' => __( 'Ex: https://goo.gl/maps/kZHgC ', 'cmb2' ),
            'id'          => 'map',
            'type'        => 'text'

        ) );

        $cmb_group->add_group_field( $group_field_id, array(
            'name' => __( 'Image', 'cmb2' ),
            'id'   => 'image',
            'type' => 'file',
        ) );


    }



}

new AddressMeta();

