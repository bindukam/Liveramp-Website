import $ from 'jquery';
import whatInput from 'what-input';
import TweenMax from "gsap/TweenMax";

window.$ = $;
import "../../../node_modules/@fortawesome/fontawesome-pro/js/all.js";
import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';
import './lib/mobile_module_slider';

// un-comment to convert select menus to custom javascript menus
import './lib/dropdown_menu'; // converts slects into javascript selects

$(document).foundation();



$( document ).ready(function() {
    console.log( "ready!" );

    $(".search-btn").click(function () {
      $('#searchModal').foundation('open');
    });
    
    $('.mobile-module-slider').slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: false,
         autoplaySpeed: 2000,
         mobileFirst: true,
         arrows: false,
         dots: true,
         adaptiveHeight: true,
         responsive: [
            {
               breakpoint: 767,
               settings: "unslick"
            }
         ]
      });

      $('.full-module-slider').slick({
           slidesToShow: 1,
           slidesToScroll: 1,
           autoplay: false,
           autoplaySpeed: 2000,
           mobileFirst: true,
           arrows: false,
           dots: true,
           adaptiveHeight: true
        });

     $('.slider-1card').slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: false,
         autoplaySpeed: 2000,
         mobileFirst: true,
         arrows: false,
         dots: true,
         adaptiveHeight: true
      });

      $('.slider-1card-auto').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 4000,
          mobileFirst: true,
          arrows: false,
          dots: true
       });

    

   $('.slider-3cards').slick({
       slidesToShow: 1,
       slidesToScroll: 1,
       autoplay: false,
       autoplaySpeed: 2000,
       mobileFirst: true,
       arrows: false,
       dots: true,
       adaptiveHeight: true,
       responsive: [
          {
             breakpoint: 1025,
             settings: {
                slidesToShow: 3
             }
          }
       ]
    });

    $('.slider-2x2').slick({
      slidesToShow: 1, 
      slidesToScroll: 1,
      rows: 2,
      slidesPerRow: 2,
      autoplay: false,
      autoplaySpeed: 2000,
      mobileFirst: true,
      arrows: false,
      dots: true,
      fade: true,
      adaptiveHeight: true
   });


// Script to make a'card' clckable. makesure to add the url as a data-url="your_url_here.html" in the element.
// to have the card open in a new window add data-blank="true"

      // remove seo links
      $('.seo-link').hide();

      function clickCard() {
        $('.seo-link').hide();

   //fix to prevent click card from firing when clicking the meta tags of the resources hero module     
        var metaclick = 0;
        $('.resources_hero .meta').click(function() { 
           metaclick = 1;
           setTimeout(() => metaclick = 0, 100);
        } )
        if (metaclick === 1) {
           return;
        }

        $('.click-card').click(function() {


          var url = $(this).data('url');
          var blank = $(this).data('blank');
          if (blank) {
            window.open(url);
          }
          else {
            window.location.href = url;
          };

        });
      }

      clickCard();



      // ==============================
      //PAGE SCROLL ANIMATION
      $(document).ready(function() {
         $('section').each(function() {
            var _win     = $(window),
               _ths     = $(this),
               _pos    = _ths.offset().top,
               _scroll = _win.scrollTop(),
               _height = _win.height();
         
            // (_scroll > _pos - _height * 1) ? _ths.addClass('entrance-anim') : _ths.removeClass('entrance-anim');
            (_scroll > _pos - _height * 1) ? _ths.addClass('entrance-anim') : _ths.removeClass('entrance-anim');
         
         });
      });

      $(window).scroll(function() {
         $('section').each(function() {
           var _win     = $(window),
               _ths     = $(this),
               _pos    = _ths.offset().top,
               _scroll = _win.scrollTop(),
               _height = _win.height();
       
           (_scroll > _pos - _height * .9) ? _ths.addClass('entrance-anim') : _ths.removeClass('entrance-anim');
       
         });
      });

});

// make $ safe to use with jquery



// footer toggle for mobile
footerMenuToggle();

function footerMenuToggle() { // -------------------
   let toggles = document.querySelectorAll(".footer-nav.widget_nav_menu > h6"),
      containers = document.querySelectorAll(".footer-nav.widget_nav_menu");

   toggles.forEach((toggle, ind) => toggle.addEventListener("click", function(){
      containers[ind].classList.toggle("selected");
   }));

}// end footerMenuToggle function definition -------


// Reset styled menus to defaults 

// not yet built










