<?php

class CareerBlockUtility {

    static function get_button(){
        $btn = get_sub_field('button_exists');
        if($btn){
            $btn_color = get_sub_field("button_color");
            $btn_link = get_sub_field("button_link");
            $btn_text = get_sub_field("button_text");
            $btn_hover_color = get_sub_field( 'button_hover_color' ) ? get_sub_field( 'button_hover_color' ) . '-hover' : 'orange-hover';

            //building button html
            $button_html  = '';
            $button_html .= '<div class="btn-ctn btn-career-content margin-top-2rem wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">';
            $button_html .= '<a href="' . $btn_link . '" class="btn bg-' . $btn_color . ' ' . $btn_hover_color . '">';
            $button_html .= $btn_text;
            $button_html .= '<span class="icon-arrow-right"></span></a>';
            return $button_html;
        }
        return;
    }

    static function bg_color_class( $default_bg_color = 'grey-lt' ){
        return get_sub_field('background_color') ? 'bg-'. get_sub_field('background_color') : 'bg-' . $default_bg_color;
    }


}