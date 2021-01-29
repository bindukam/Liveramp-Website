<?php /* Template Name: Brand Campaign */ ?>

<?php get_header(); ?>
<style>	
html{
    margin-top: 0px !important;
}    

body {
  font-family: 'Flexo';
}

h2:focus{
    outline: none !important;
}

section.change-world-section{
    opacity: 100;
    -webkit-transform: translate(0,0);
    -ms-transform: translate(0,0);
    transform: translate(0,0);
}

.change-world-section .grid-container.relative.margin-top-2.bg-container {
    height: 1300px;
    position: relative;
	background-image: url("https://s3-alpha-sig.figma.com/img/eb56/0f7e/3f1a04cd6aee6489d845883e95ed0c8b?Expires=1612742400&Signature=FADySRrwCkDoge9O0nj3T~dbr8Zt2t1S5ZZKrHJDkgsWUO4bE0ewhibkSNrr7eVxKJ1wXy8rJ~~rXO9Ui-~~jcKuu2p4KZY2vOkD7do24hPDyO5NgIx~JRbcNEhDBWa8enO3z~fLpzsmx5uTaQ3qyVr2QHaJZRn~5Mh9~i5cHhh29o6dsYhgy3oFMWDUrRWd44DInnszYjpXCahSe37z-bB5GC4MbqB56bTcvx-IdVav1dom-tqtuNdBbQoHzFqpYVo2Z527FMzUcpOaCZGqtSp4B6O~SxS18-HrLrZ1uKUaFV1l3yqvd7o8NxTh~4Y8UwHegBwfX6Yhgf3DB82K4w__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA"); 
  	background-color: #cccccc; 
 	background-position: center; 
 	background-repeat: no-repeat; 
 	background-size: cover; 
    overflow: hidden;
}
.change-world-section .cell {
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    min-height: 0;
    min-width: 0;
    width: 100%;
    /* text-align: center; */
}

.change-world-section .cell .intro_headinng {
    text-align: center;
    margin-bottom: 21px;
}

.change-world-section .intro_headinng h2 {
    background-color: #CA4246;
    background-image: linear-gradient(
95.47deg
, #001365 -0.52%, #00A0D9 57%, #80C468 87.12%);
    background-size: 100%;`
    background-repeat: repeat;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 62px;
    line-height:1;
}
.change-world-section .icon-divider-item {
    width: 100%;
    padding-bottom: 0;
    font-weight: 500;
    text-align: center;
}
.change-world-section .card-intro .intro_divider .icon-divider-item {
    width: 50%;
    padding-bottom: 0;
    font-weight: 500;
    text-align: center;
}

.change-world-section .intro_divider {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: 3px;
    margin-right: auto;
    margin-bottom: 2em;
    margin-left: auto;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100px;
}
.change-world-section .card-intro .intro_divider {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: 3px;
    margin-right: auto;
    margin-bottom: 2em;
    margin-left: auto;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 60px;
}


.change-world-section .dark-blue {
    color: #0f3264;
} 
.change-world-section .intro_title {
    text-align: center;
    padding: 0 30px;
    font-size: 21px;
}

.change-world-section .blue-lines {
    background-color: #003865;
}

.change-world-section p {
    margin-bottom: 1rem;
    font-size: inherit;
    line-height: 1.6;
    text-rendering: optimizeLegibility;
}
   
.change-world-section .resource_3_card_image_and_text {
    background-repeat: no-repeat;
    background-position: center 140px;
    overflow: hidden;
}

.change-world-section{
    padding: 1.825rem 1rem 0rem;
    margin-bottom: 0rem!important;;
}

.change-world-section .grid-container {
    padding-right: .5rem;
    padding-left: .5rem;
    max-width: 72.5rem;
    margin-left: auto;
    margin-right: auto;
}

.change-world-section .grid-x {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-flow: row wrap;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
}

.change-world-section .text-center {
    text-align: center;
}

.change-world-section .cell {
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    min-height: 0;
    min-width: 0;
    width: 100%;
}

.change-world-section .title-cell h2,  .title-cell p {
    margin-bottom: .5rem;
}

.change-world-section .margin-bottom-2 {
    margin-bottom: 2rem;
}

.change-world-section .no-lineheight {
    line-height: 0;
}

.change-world-section .pad-ul {
    padding: 16px 0 20px;
}

.change-world-section .pad-ul .replaced-svg {
    width: 445px;
}

.change-world-section .relative {
    position: relative;
}

.change-world-section .margin-top-2 {
    margin-top: 2rem;
}

.change-world-section .z-5-r {
    z-index: 5;
    position: relative;
}

.change-world-section .grid-margin-y {
    margin-top: -.5rem;
    margin-bottom: -.5rem;
}

.change-world-section .grid-margin-x {
    margin-left: -.5rem;
    margin-right: -.5rem;
}

.change-world-section .grid-margin-y:not(.grid-y)>.cell {
    height: auto;
}

.change-world-section .resource_3_card_image_and_text .resource-card {
    cursor: pointer;
    transition: -webkit-transform .5s ease;
    transition: transform .5s ease;
    transition: transform .5s ease,-webkit-transform .5s ease;
}

.change-world-section .grid-margin-y>.cell {
    height: calc(100% - 1rem);
    margin-top: .5rem;
    margin-bottom: .5rem;
}

.change-world-section .grid-margin-x>.cell {
    width: calc(100% - 1rem);
    margin-left: .5rem;
    margin-right: .5rem;
}

.change-world-section .click-card {
    cursor: pointer;
}

.change-world-section .b-radius {
    border-radius: 16px;
}

.change-world-section .box-shadow-over-white {
    box-shadow: 0 0 12px 0 rgb(0 0 0 / 10%);
}

.change-world-section .white-bkg {
    background-color: #fefefe;
}

.change-world-section .resource_3_card_image_and_text .resource-card .image {
    min-height: 200px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 16px 16px 0 0;
}

.change-world-section .resource_3_card_image_and_text .resource-card .content {
    padding: 1.75rem;
    position: relative;
    margin-bottom: 2rem;
}

.change-world-section .resource_3_card_image_and_text .resource-card .content .term {
    margin-bottom: 1rem;
    min-height: 30px;
}

.change-world-section .resource_3_card_image_and_text .resource-card .content .term .icon {
    width: 22px;
    height: 22px;
    margin-right: 0;
}

.change-world-section .grid-x>.shrink {
    width: auto;
}

.change-world-section .cell.shrink {
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
}

.change-world-section .icon svg, svg.icon {
    max-width: 55px;
    max-height: 55px;
    width: 100%;
}

.change-world-section .grid-x>.auto {
    width: auto;
}

.change-world-section .cell.auto {
    -webkit-flex: 1 1 0px;
    -ms-flex: 1 1 0px;
    flex: 1 1 0px;
}

.change-world-section .resource_3_card_image_and_text .resource-card .content .title {
    line-height: 1.5;
    margin-bottom: 1rem;
}

.change-world-section h4 {
    line-height: 1.375em;
    font-weight: 700;
    font-family: 'Flexo Bold',sans-serif;
}

.change-world-section .resource_3_card_image_and_text .resource-card .content .topic {
    bottom: 1rem;
    padding-right: 1.75em;
    margin-bottom: 1rem;
}

.change-world-section .flexo-bold {
    font-family: 'Flexo Bold',sans-serif;
    font-weight: 700;
}

.change-world-section .dark-slate {
    color: #9cb6cb;
}

@media print, screen and (min-width: 40em){
    .change-world-section .resource_3_card_image_and_text .resource-card .content .topic {
    position: absolute;
    margin-bottom: 0;
}
}


@media print, screen and (min-width: 64.0625em){
    .change-world-section .resource_3_card_image_and_text .resource-card .content .title {
    padding-bottom: 1.75rem;
}
}


@media print, screen and (min-width: 40em){
    .change-world-section .grid-x>.medium-4 {
    width: 33.33333%;
}
}

@media print, screen and (min-width: 64.0625em){
    .change-world-section .large-up-3>.cell {
     width: 33.33333%;
}
}

@media print, screen and (min-width: 40em){
    .change-world-section .h2, .change-world-section h2 {
    font-size: 2.25rem;
}

}

@media print, screen and (min-width: 64.0625em){
    .change-world-section .grid-margin-x>.cell {
    width: calc(100% - 2rem);
    margin-left: 1rem;
    margin-right: 1rem;
}
}


@media print, screen and (min-width: 40em){
    .change-world-section .grid-margin-x>.cell {
    width: calc(100% - 1.5rem);
    margin-left: .75rem;
    margin-right: .75rem;
}
}

@media print, screen and (min-width: 40em){
    .change-world-section .grid-margin-x>.medium-4 {
    width: calc(33.33333% - 1.5rem);
}
} 

@media print, screen and (min-width: 64.0625em){
    .change-world-section .grid-margin-x>.medium-4 {
    width: calc(33.33333% - 2rem);
}
}
 
@media print, screen and (min-width: 64.0625em){
    .change-world-section .grid-margin-y>.medium-4 {
    height: calc(33.33333% - 2rem);
}
} 

@media print, screen and (min-width: 40em){
    .change-world-section .grid-margin-y>.medium-4 {
    height: calc(33.33333% - 1.5rem);
}
}

@media print, screen and (min-width: 64.0625em){
    .change-world-section .grid-margin-y>.cell {
    height: calc(100% - 2rem);
    margin-top: 1rem;
    margin-bottom: 1rem;
}
}

@media print, screen and (min-width: 40em){
    .change-world-section .grid-margin-y>.cell {
    height: calc(100% - 1.5rem);
    margin-top: .75rem;
    margin-bottom: .75rem;
}
}

@media print, screen and (min-width: 64.0625em){
    .change-world-section .grid-margin-x.large-up-3>.cell {
    width: calc(33.33333% - 2rem);
}
} 

@media print, screen and (min-width: 64.0625em){
    .change-world-section .grid-margin-y {
    margin-top: -1rem;
    margin-bottom: -1rem;
}
} 

@media print, screen and (min-width: 40em){
    .change-world-section.grid-margin-y {
    margin-top: -.75rem;
    margin-bottom: -.75rem;
}
}

@media print, screen and (min-width: 64.0625em){
    .change-world-section .grid-margin-x {
    margin-left: -1rem;
    margin-right: -1rem;
}
}

@media print, screen and (min-width: 40em){
    .change-world-section  .grid-margin-x {
    margin-left: -.75rem;
    margin-right: -.75rem;
}
} 

@media print, screen and (min-width: 64.0625em){
    .change-world-section .grid-container {
    padding-right: 1rem;
    padding-left: 1rem;
}
}

@media print, screen and (min-width: 40em){
    .change-world-section .grid-container {
    padding-right: .75rem;
    padding-left: .75rem;
}
}

@media print, screen and (min-width: 40em){
    .change-world-section .resource_3_card_image_and_text {
    margin-bottom: 7rem;
}
}
 
.flex-container {
  display: flex;
  flex-wrap: wrap;
  font-size: 30px;
  text-align: center;
  justify-content:center;
  margin-top: 438px;
  padding: 0px 100px;
}

.flex-container .live-discussion-desc p{
    font-family: Flexo;
    font-style: normal;
    font-size: 36px;
    color: #fff;
    line-height: 54px;
    letter-spacing: -1px;
}

.flex-container .live-discussion-heading h1 {
    font-family: Flexo;
    font-style: normal;
    font-weight: bold;
    font-size: 62px;
    line-height: 52px;
    color: #fff!important;
    letter-spacing: -1px;
}

.flex-container .button5 {
    /* border-radius: 21%;
    font-family: Flexo;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 35px;
    color: #003865;
    padding: 0px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px 358px 0;
    cursor: pointer;
    background: #FAE164;
    border-radius: 50px!important; */
	
	
	 vertical-align: middle;
	font-size: 16px;
	line-height: 1;
	text-align: center;
	cursor: pointer;
	font-family: 'Flexo Bold';
	transition: all 1s ease;
	background-color: #FAE164;
	color: #003865; 
	/* display: inline-flex; */
	align-items: center;
	width:221px;
	height: 41px;
	border-radius: 32px;
	border:0;
	margin: 4px 2px 358px 0;
    
}

.flex-container .button5:after {
            transition: all .75s ease;
            content: "";
            opacity: 0;
            background-image: url(https://24graj2x2dk813ys0w26mhu5-wpengine.netdna-ssl.com/wp-content/themes/liveRamp-Template/dist/assets/images/svg/arrow-white.svg);
            background-size: contain;
            background-repeat: no-repeat;
            height: .8rem;
            width: .8rem;
            margin-right: -.2em;
            margin-left: .2em;
            display: inline-block;
        }

	.flex-container .button5:hover {
		text-decoration: none;
		background-color: #FAE164;
		color: #003865;
	}


/*===== CSS End =====*/


/*===== HOME =====*/
.home {
    position: relative;
    min-height: 565px; 
    overflow: hidden;
    background-image: linear-gradient(45deg, #f9e547, #73c063, #00a9e0);
}

.home:before{
    position: absolute;
    width: 100%;
    height: 100vw;
    content: "";
    top: -15px;
    right: 0;
    bottom: 0;
    left: 0;
    background: linear-gradient(135deg, #f9e547, #73c063, #00a9e0);
    background-size: 100%;
    z-index: -1;
    transition: all .5s ease-in-out;
    animation: move 13s linear 0s normal infinite;
}

 @keyframes move {
        0% {
            opacity: 0;
            transform: rotate(0deg);
        }

        16% {
            opacity: 1;
            transform: rotate(0deg);
        }

        32% {
            opacity: 0;
            transform: rotate(0deg);
        }

        33% {
            opacity: 0;
            transform: rotate(90deg);
        }

        49% {
            opacity: 1;
            transform: rotate(90deg);
        }

        65% {
            opacity: 0;
            transform: rotate(90deg);
        }

        66% {
            opacity: 0;
            transform: rotate(180deg);
        }

        82% {
            opacity: 1;
            transform: rotate(180deg);
        }

        100% {
            opacity: 0;
            transform: rotate(180deg);
        }
    }


.home__container {
    min-height: 565px;
    row-gap: 5rem;
}

.home__title {
	/* display: flex;
    align-items: center; */
	padding: 171px 0 20px;
    align-self: center;
}
.home__title .heading{
	display: flex;
    align-items: center;
	color:#fff!important;
    line-height: 127.43px;
	font-weight: 900;
	font-size: 115px;
	letter-spacing: -6px;
}
  

.home__title .heading_dec{
	display: flex;
    align-items: center;
    color: #003865!important;
    font-style: normal;
    padding-bottom: 100px;
    font-weight: bold;
    font-size: 50px;
    line-height: 55px;
    letter-spacing: -1.6px;
}

.home__scroll {
    align-self: flex-end;
	padding: 50px 0 2rem;
}

.home__scroll i {
    border: 1px solid #000;
    font-style: italic;
    color: #fff;
    line-height: inherit;
    height: 27px;
    font-size: 23px;
    padding: 20px;
}

.home__scroll-link{
    /* writing-mode: vertical-lr;
    transform: rotate(-180deg); */
    color: #fff;
}

#home img.home_img {
position: absolute;
right: 0px;
bottom: -232px;
width: 400px;
}

.bd-grid {
    max-width: 1296px;
    display: grid;
    grid-template-columns: 100%;
    grid-column-gap: 2rem;
    width: calc(100% - 2rem);
    margin-left: 1rem;
    margin-right: 1rem;
}


.home__scroll-link svg{
	font-size: 50px;
    border-radius: 50%;
    padding: 8px;
    font-weight: 600;
    border: 2px solid #fff;
}

.home__scroll-link svg.svg-inline--fa.fa-arrow-down.fa-w-14 {
    width: 42px;
	height: 42px;
}
/*===== Media Query Home=====*/
@media screen and (min-width: 1024px){
.bd-grid {
    margin-left: auto;
    margin-right: auto;
}
}

@media screen and (max-width: 768px){
    .home__img{
    	right: -11px;
        bottom: -137px;
        width: 356px;
    }
	.home__title {
        padding: 50px 0 20px;
	}

    .home__title .heading{
    	line-height: 71px;
        font-size: 56px;
        width:344px;
        letter-spacing: -3px;
    }
  

    .home__title .heading_dec{
    	font-size: 32px;
        line-height: 41px;
    }

/*===== Addded by BK =====*/

.home__scroll {
	padding: 137px 0 1rem;
}

}


/*===== Home End =====*/

/*=====Vector-wave-section =====*/
.vector-wave-section {
    padding: 1.825rem 1rem 2rem;
    margin-bottom: 113px;
}

.vector-wave-section .grid-container {
    padding-right: .5rem;
    padding-left: .5rem;
    max-width: 72.5rem;
    margin-left: auto;
    margin-right: auto;
}

.vector-wave-section .card-intro {
    max-width: 100%;
    margin: auto;
    padding-bottom: 32px;
}

.vector-wave-section .grid-x {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-flow: row wrap;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    width: 100%;
}

.vector-wave-section .cell {
    -webkit-flex: 0 0 auto;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    min-height: 0;
    min-width: 0;
    width: 100%;
	/* text-align: center; */
}

.cell .intro_headinng{
	text-align: center;
    margin-bottom: 32px;
}

.vector-wave-section .card-intro .intro_heading {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 60px;
    height: 60px;
    margin-right: auto;
    margin-bottom: 2em;
    margin-left: auto;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    font-weight: 500;
    text-align: center;
}


.vector-wave-section .card-intro .intro_divider {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: 3px;
    margin-right: auto;
    margin-bottom: 2em;
    margin-left: auto;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100px;
}

.cell .intro_divider {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: 3px;
    margin-right: auto;
    margin-bottom: 2em;
    margin-left: auto;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100px;
}

.vector-wave-section .card-intro .intro_divider .icon-divider-item {
    width: 100%;
    padding-bottom: 0;
    font-weight: 500;
    text-align: center;
}

.cell .icon-divider-item {
    width: 100%;
    padding-bottom: 0;
    font-weight: 500;
    text-align: center;
}

.blue-lines{
	background-color: #003865;
}

.vector-wave-section .card-intro .intro_title {
    text-align: center;
    padding: 0 30px;
    max-width: 690px;
    margin: auto;
}

.vector-wave-section .card-intro .intro_title p{
    font-size: 21px;
    line-height: 28.8px;
}


.vector-wave-section .card-intro .dark-blue h3 {
    color: #003865!important;
    font-size: 36px!important;
    line-height: 40.8px!important;
}

.vector-wave-section .card-intro .intro_title h2 {
    font-size: 2.5rem;
    line-height: 44px;
    font-weight: 700;
    letter-spacing: -.04em;
    margin-bottom: 16px;
}


.vector-wave-section .icon_text_left_right .icon_text_row {
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    padding-top: 25px;
}

.vector-wave-section .icon_text_left_right .icon_text_row .cell.image-container {
    display: block;
    width: 466px;
    padding:0;
}

.vector-wave-section .icon_text_left_right .icon_text_row.even .image-container {
    -webkit-order: 1;
    -ms-flex-order: 1;
    order: 1;
}

.vector-wave-section .icon_text_left_right .icon_text_row .cell {
    padding-right: 1em;
    padding-left: 1em;
}

.vector-wave-section.icon_text_left_right .icon_text_row .cell.image-container img {
   width: 466px;
}

.vector-wave-section img {
    display: inline-block;
    vertical-align: middle;
    max-width: 100%;
    height: auto;
    -ms-interpolation-mode: bicubic;
}

.vector-wave-section img {
    border-style: none;
}


.vector-wave-section.icon_text_left_right .icon_text_row .cell.image-container {
    width: 466px;
    padding:0;
}

.vector-wave-section.icon_text_left_right .icon_text_row .cell.text-container {
    max-width: 647px;
    width: 50%;
}

.vector-wave-section.icon_text_left_right .icon_text_row.odd .cell.image-container{
    text-align: right;
    margin-left:100px;

} 

.vector-wave-section.icon_text_left_right .icon_text_row.even .cell.image-container{
    text-align: left;
    margin-right:100px;
} 

.vector-wave-section.icon_text_left_right .icon_text_row.odd .cell.text-container .text_box{
    max-width: 434px;
    margin-left: 100px;
    width: 100%;
}

.vector-wave-section.icon_text_left_right .icon_text_row{
    padding-top: 30px;
}

.vector-wave-section.icon_text_left_right .icon_text_row.even .cell.text-container .text_box{
    max-width: 434px;
}

.vector-wave-section .icon_text_left_right .icon_text_row .cell.text-container .title h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    font-size: 2.125em;
    line-height: 1.2;
    font-weight: 600;
    letter-spacing: -.03em;
}

.vector-wave-section .icon_text_left_right .icon_text_row .cell.text-container .txt-with-divider {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    width: 60px;
    height: 3px;
    margin-bottom: 1em;
    margin-left: 0;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
}

.vector-wave-section .icon_text_left_right .icon_text_row .cell.text-container .txt-with-divider .txt-with-divider--item.divider--orange {
    background-color: #fa8d28;
}

.vector-wave-section .icon_text_left_right .icon_text_row .cell.text-container .txt-with-divider .txt-with-divider--item {
    width: 100%;
    padding-bottom: 0;
}

.vector-wave-section .icon_text_left_right .icon_text_row .cell.text-container .text p {
    margin-bottom: 1rem;
    font-size: 1rem;
    line-height: 1.6;
    color: #7a97ab;
}

.vector-wave-section .icon_text_left_right .icon_text_row .cell.text-container .text p a {
    line-height: inherit;
    color: #73c06b!important;
    text-decoration: underline;
    cursor: pointer; 
}

.vector-wave-section.icon_text_left_right .icon_text_row .cell.text-container .text p {
    font-size: 18px;
    line-height: 28.8px;
}

.vector-wave-section p {
    margin-bottom: 1rem;
    font-size: inherit;
    line-height: 1.6;
    text-rendering: optimizeLegibility;
}

.intro_headinng h2{
    background-color: #CA4246;
    background-image: linear-gradient(95.47deg, #001365 -0.52%, #00A0D9 57%, #80C468 87.12%);
    background-size: 100%;
    background-repeat: repeat;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; 
    font-size: 62px;
    letter-spacing: -4px;
    line-height: 65px;
}

.vector-wave-section .icon_text_left_right .icon_text_row.odd .image-container {
    -webkit-order: 2;
    -ms-flex-order: 2;
    order: 2;
}

.vector-wave-section .icon_text_left_right .icon_text_row.odd .text-container {
    -webkit-order: 1;
    -ms-flex-order: 1;
    order: 1;
}

@media (max-width: 1199px){
    .vector-wave-section.icon_text_left_right .icon_text_row.odd .cell.text-container .text_box{
        margin-left: 0;
    }

    .vector-wave-section.icon_text_left_right .icon_text_row .cell.image-container img{
        width: auto;
    }

    #home .home__title{
        padding-left: 40px !important;
    }
}


@media print, screen and (min-width: 64.0625em)
.vector-wave-section .grid-container {
    padding-right: 1rem;
    padding-left: 1rem;
}

@media print, screen and (min-width: 40em){
    .vector-wave-section .grid-container {
    padding-right: .75rem;
    padding-left: .75rem;
}
}

@media print, screen and (min-width: 40em){
    .h2, h2 {
    font-size: 2.25rem;
}
}

#feeling_section{
    display:block;
    padding: 1.825rem 1rem 2rem;
    margin-top: 120px ;
    margin-bottom:140px; 
}

#feeling_section .container{
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.felling-intro .intro_headinng{
	text-align: center;
    margin-bottom: 21px;
}

.felling-intro .intro_headinng h2 {
    background-color: #CA4246;
    background-image: linear-gradient(95.47deg, #001365 -0.52%, #00A0D9 57%, #80C468 87.12%);
    background-size: 100%;
    background-repeat: repeat;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 62px;
    line-height:1;
    letter-spacing: -4px;
}

.felling-intro   .intro_divider {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: 3px;
    margin-right: auto;
    margin-bottom: 2em;
    margin-left: auto;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100px;
}

.felling-intro .intro_divider .icon-divider-item {
    width: 100%;
    padding-bottom: 0;
    font-weight: 500;
    text-align: center;
}

.felling-intro .intro_title{
    text-align: center;
    padding: 0 30px;
}


.felling-intro .intro_title p{
    font-size: 21px; 
    line-height: 31px;  
}

 
.felling-intro.text-center {
    padding: 0px 18%;
}

.play-section {
    width: 950px;
    height: 520px;
    padding: 20px;
    box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.2);
    margin: 70px auto;
    border:3px solid #C4C4C4;
    background-image:url("https://s3-alpha-sig.figma.com/img/e181/3932/665642176a45139d2693d0d8120aefb9?Expires=1612742400&Signature=A0J8XDAPNHhH5EuDfxTt4BbeDPArogGuhs5TLPNDk99y6TN4XGPQRNb1QXedWcpmI3EINKfWx1j-l2GLdqBRau3jgWXkOacR2~wiQVeTTNHpMyFvbbMlw-cRHF4gIPBJzA2F1OFwc9iwLh-m0PNNg6SRHCts18vihHrL3gNj7qhTkm~C0dr5vmteHHhS5U~wC8TsvxXpmoCMMHK6gX8XHwQPRvMt4CN3WDyv-bmO4KDjJBmngl-6qQEP2MjbIMmXuzesOh~q384FiDguJlu5rCPxzGNS9Tbesfj~s6uaQ32Lw5nD-FFleFa60PPkGSJpd1gfEbwUODqTSBjwEDi2tg__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA");
    background-size:cover;
    text-align:center;
    position: relative;
}

.play-section h2.play-icon{
    position: absolute;
    top: 50%;
    left: 50%;
    color:#000;
    transform: translate(-50%, -50%);
}

#the_moment{
    display:block;
    padding: 90px 1rem 283px;
    background-color: #EAF4F9;
}

.moment-container{
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.moment-container .card-container {
  overflow: hidden;
}

.moment-container .float-layout {
  padding: 5px 50px;
  float: left;
  width: 100%;
  height: auto;
  box-sizing: border-box;
  margin: 0;
}

.moment-container .card {
  color: black;
  height: 100%;
  width: 50%;
  float: right;
  background-color: #EAF4F9;
}

.moment-container .card-desc {
  padding: 10px;
  text-align: left;
  font-size: 18px;
}

.moment-container div.card-image {
  width: 100%;
  float: left;
  height: auto;
}

.moment-container div.card-image.mb-200 {
margin-bottom: 200px;
}

.moment-container .card-main .card-main-heading {
    font-family: Flexo;
    font-style: normal;
    font-weight: 900;
    font-size: 72px;
    line-height: 86px;
    text-align: center;
    letter-spacing: -2.2px;
    color: #003865!important;
}

.moment-container .card-main .card-main-desc{
    font-family: Flexo;
    font-style: normal;
    font-weight: 900;
    font-size: 38px;
    line-height: 20px;
    text-align: center;
    letter-spacing: -2.2px;
    color: #73C06B;
}

.moment-container .card-main {
    margin-bottom: 80px;
}

.moment-container .card-desc p.first{
    font-family: Flexo;
    font-style: normal;
    font-weight: 500;
    font-size: 44px;
    line-height: 50px;
    letter-spacing: -2px;
    background-color: #CA4246;
    background-image: linear-gradient(96.07deg, #003865 2.23%, #00A0D9 101.51%);
    background-size: 100%;
    background-repeat: repeat;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom:40px;
}

.moment-container .card-desc p.second{
    font-family: Flexo;
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 29px;
    color: #73C06B;
    margin-bottom:16px;
}

.moment-container .card-desc img {
    width: 168px!important;
    height: 50px!important;
}

.image-cropper {
    width: 50%;
    height: 500px;
    position: relative;
    float: left;
    display: flex;
    margin: 0 auto;
    overflow: hidden;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.profile-pic {
    display: block;
    margin: 0 auto;
    width: 40%;
    height: 250px;
    border-radius: 50%; 
    box-shadow: 0px 0px 50px rgb(0 0 0 / 20%);
}

.card-image.mb-200.flex-order .image-cropper {
    order: 1;
}
.moment-container .flex-order .card  { 
    order: 0;
    float:left;  
 } 
.home__img {
    position: absolute;
    right: -2%;
    bottom: -232px;
    width: 400px;
}

   
/****** New css ********/

.feelingSec#feeling_section{margin-top: 90px;margin-bottom: 130px;}
.feelingSec#feeling_section .v_play_wrap {margin:64px auto 0px}

/* Phone Devices Query */
@media only screen and (max-width: 37.5em) {
    .moment-container  div.card-image img {
    width: 100%;
    height: auto;
  }

  .moment-container  .card {
    width: 100%;
    margin-top: -4px;
  }
}

</style>

<!-- HTML work goes here -->


<!--Home -->
<section class="home" id="home">
    <div class="home__container bd-grid">
    <div class="home__title">
    <h1 class="heading" style="font-family: flexo-black">The moment</h1>
    <h3 class="heading_dec">you unlocked the real value of connected data.</h3>
        <div class="home__scroll">
            <a href="#about" class="home__scroll-link"><i class="fal fa-arrow-down"></i></a>
        </div>
    </div>
    <img src="/wp-content/themes/liveRamp-Template/dist/assets/images/brand-campaign/Re-invent-Portrait.png" class="home_img"  alt=""> 
    </div>
</section> 


 <!--amazing feeling -->
 <section id="feeling_section"  class="feelingSec">
    <div class="grid-container">
        <div class="felling-intro text-center" >
            <div class="intro_headinng">
                <h2 style="font-size:62px">It’s an amazing feeling.</h2>
            </div>
    
            <div class="intro_divider">
                <div class="icon-divider-item blue-lines"></div>
            </div>
    
            <div class="intro_title dark-blue">
                <p>When all your customer data comes together safely and you can finally create great data-driven customer experiences everywhere. LiveRamp can help you do hard and wonderful things.</p>
            </div>
        </div>

        <div class="v_play_wrap">
            <script src="https://fast.wistia.com/embed/medias/n01lnzd5bw.jsonp" async></script>
            <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
            <div class="wistia_embed wistia_async_n01lnzd5bw seo=false" style="height:541px;position:relative;width:962px">
                <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;">
                    <img src="https://fast.wistia.com/embed/medias/n01lnzd5bw/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" />
                </div>
            </div>        
        </div>

    </div>
 </section>

 <style>
 .v_play_wrap{position:relative; max-width:962px; box-shadow: 0px 0px 50px 24px rgba(0, 0, 0, 0.15); border-radius: 15px; margin:64px auto;overflow:hidden;}
 .v_play_wrap .v_thumb{max-width:100%;}
 .v_play-icon{width:135px; height:135px; position:absolute; left:0; right:0; top:0; bottom:0; margin:auto;position:absolute;}
 .v_play-icon svg{width:100%; height:100%;}
 @media (max-width:767px){
	 .v_play-icon{width:90px; height:90px;}
 }
 
 </style>


 <!-- The moment section -->
<section id="the_moment" class="blue_gradient">
	<div class="grid-container">
		<div class="section_row">
			<div class="section_title_wrap">
				<h2 class="section_title" style="font-size: 72px; font-family: flexo-black">The moment</h2>
				<p class="section_intro" style="font-size:36px">you discover the power of customer intelligence.</p>
			</div>
			<div class="section_col_wrap">
				<div class="section_col_thumb profile_thumb" style="background-image:url(https://nvish.wpengine.com/wp-content/uploads/brand-campaign/digonal_lines.svg) ;"><img src="/wp-content/themes/liveRamp-Template/dist/assets/images/brand-campaign/danone-quote-image.jpg"></div>
				<div class="section_col_description">
					<blockquote class="lead_paragraph" style="line-height: 58px; font-family: flexo-medium">For Danone, we don’t want to be telling people what to eat. We learn what people like to eat and how they like to cook on a local level. By using [LiveRamp], addressability and data collaboration make our marketing more relevant and personalized.</blockquote>
					<p class="post_designation">Domitille Doat, Chief Digital Officer, Danone</p>
					<div class='section_logo'><img src="https://s3-alpha-sig.figma.com/img/6b78/dc20/7b3de13cbb926223fe23e9f8eeadf8c2?Expires=1612742400&Signature=Y56uVsnh1N25TLIDTrhVlbml8emh-aFafwED0W6QLtxZLKlVQWTd0hYAvjxybeUkfZKtqYkygWhLlduOesiHdpeHw5soLDpfD5Vya1FzqE27zd1qO25eqDwLxAb2mp75yuo06EMcV5RYqHj9weXpLHriKQe8US6m8ujKyO1yU5RNrJqHfQdLBoMqryByzKTBSo6lOXfoWSZDJPZdSnHrJDLhflCjgd5kduPhUerrjV-hNbIGWdF5lUkbaTo4mQGr~qQ4gzVOHQUyx0AXEKV9Wf1i~sa9acCCibnx4DbC3J-wCo6UX-3FUDQQPBizl-jJabb3j-w7hp8oPEzsaQCbZA__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA"></div>
				</div>
			</div>
		</div>
		<div class="section_row">
			<div class="section_title_wrap">
				<h2 class="section_title" style="font-size: 72px; font-family: flexo-black">The moment</h2>
				<p class="section_intro" style="font-size:36px"> you reinvent customer experiences everywhere.</p>
			</div>
			<div class="section_col_wrap">
				<div class="section_col_thumb profile_thumb order1" style="background-image:url(https://nvish.wpengine.com/wp-content/uploads/brand-campaign/circle_lines.svg) ;"><img src="/wp-content/themes/liveRamp-Template/dist/assets/images/brand-campaign/fitbit-quote-image.jpg"></div>
				<div class="section_col_description">
					<blockquote class="lead_paragraph" style="line-height: 58px; font-family: flexo-medium">LiveRamp’s technology allowed us to effectively expand reach against target audiences and drive significant ROI without relying on traditional digital user IDs.</blockquote>
					<p class="post_designation">Jay Newell, Senior Director, Media & Customer Acquisition, Fitbit </p>
					<div class='section_logo'><img src="https://nvish.wpengine.com/wp-content/uploads/brand-campaign/fitbit-logo.png"></div>
				</div>
			</div>
		</div>
        <div class="section_row">
			<div class="section_title_wrap">
				<h2 class="section_title" tabindex="0" style="font-size: 72px; font-family: flexo-black">The moment</h2>
				<p class="section_intro" style="font-size:36px"> you see the real impact of your marketing.</p>
			</div>
			<div class="section_col_wrap">
				<div class="section_col_thumb profile_thumb" style="background-image:url(https://nvish.wpengine.com/wp-content/uploads/brand-campaign/digonal_lines.svg) ;"><img src="/wp-content/themes/liveRamp-Template/dist/assets/images/brand-campaign/bayer-quote-image.jpg"></div>
				<div class="section_col_description">
					<blockquote class="lead_paragraph" style="line-height: 58px; font-family: flexo-medium">It’s been an exciting journey working with LiveRamp and understanding how it truly works. Not just on the data activation side, but with measurement and stitching data across platforms.</blockquote>
					<p class="post_designation">Jeff Jarrette, CMO, Bayer Consumer Health, N.A.</p>
					<div class="section_logo"><img src="https://nvish.wpengine.com/wp-content/uploads/brand-campaign/bayer-logo.png" style="width:85px; height: auto; max-height: 100%"></div>
				</div>
			</div>
        </div>

    <style>
        .section_title_wrap{
            margin-bottom:80px;
        }
        .section_title_wrap .section_title{
            font-family: Flexo;
            font-style: normal;
            font-weight: 900; 
            font-size: 72px;
            line-height: 1;
            text-align: center;
            letter-spacing: -2.2px;
            color: #003865!important;
            background-color: #CA4246;
        }

        .section_title_wrap .section_intro{
            font-family: Flexo;
            font-size: 44px;
            line-height: 1;
            text-align: center;
            letter-spacing: -1px;
            color: #73C06B;
            font-weight: 400;
        }

        .section_col_wrap{
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .section_col_wrap .section_col_thumb{
            width:28%;
            background-size:cover;
            background-repeat:no-repeat;
            background-position:center;
        }

        .section_col_wrap .section_col_thumb.order1{
            order:1;
        }

        .section_col_wrap .section_col_thumb img{
            width:calc(100% - 15%); 
            border-radius:50%;
            border:2px solid #fff;
            box-shadow:0px 0px 50px rgba(0, 0, 0, 0.2);
            border-radius: 176px;margin:7.5%;
        }

        .section_col_wrap .section_col_description{
            width:58%;
        }

        .section_col_wrap .section_col_description .lead_paragraph{
            font-family: Flexo; 
            font-style: normal;
            font-weight: 500; 
            font-size: 44px; 
            line-height: 50px; 
            letter-spacing: -2px;
            background-color: #CA4246;
            background-image: linear-gradient(96.07deg, #003865 2.23%, #00A0D9 101.51%);
            background-size: 100%;
            background-repeat: repeat; 
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 40px;
        }

        .section_col_wrap .section_col_description .post_designation{
            font-family: Flexo; 
            font-style: normal;
            font-weight: 500; 
            font-size: 24px; 
            line-height: 28px; 
            color: #73C06B; 
            margin-bottom: 16px;
        }

        .section_col_wrap .section_col_description .section_logo{
            width:168px;
        }

        .section_col_wrap .section_col_description .section_logo img{
            max-width:168px;
            max-height:60px;
        }

        .section_row + .section_row{
            margin-top: 244px;
        }

        @media print,screen and (max-width:39.99em){
            .section_col_wrap{
                flex-direction:column;
                align-items:center;
            }
            .section_col_wrap .section_col_description .lead_paragraph{
                font-size: 33px; 
                line-height:1;
            }
            .section_col_wrap .section_col_thumb{
                width:100%;
                max-width:320px;
                margin-bottom: 66px;
                order:1;
            }
            .section_col_wrap .section_col_description{
                width:100%;
            }
        }
    </style>

    </div>
</section>




<!-- There’s nothing you can’t do. -->
<section class="icon_text_left_right vector-wave-section pad-section entrance-anim">
	<div class="grid-container">
        <div class="grid-x card-intro">
			<div class="cell">
		
		<div class="intro_headinng">
			<h2 style="font-size: 62px">There’s nothing you can’t do.</h2>
		</div>
		
		<div class="intro_divider">
			<div class="icon-divider-item blue-lines"></div>
		</div>
		
		<div class="intro_title dark-blue">
			<p>When you connect all your customer data, you have the control you need to transform data into a competitive advantage. </p>
		</div>
	
			
	</div>

    <div class="grid-x icon_text_row even" style="padding-top:66px">
					
        <div class="cell image-container">
            <img src="https://nvish.wpengine.com/wp-content/uploads/brand-campaign/ultraHD.png" class="lsh-features_image">
        </div>
        
        <div class="cell text-container">
            <div class="text_box">
                <div class="title dark-blue">
                    <h3>See your customers in ultra-HD </h3>
                </div>
                
                <div class="txt-with-divider">
                    <div class="txt-with-divider--item divider--orange green-lines"></div>
                </div>
                
                <div class="text">
                    <p style="color:#003865">Our neutral safe haven allows you to connect data across more data sources, and partners to build deeper customer intelligence. <a href="" data-wpel-link="internal" style="color:#73C06B; text-decoration: underline;">Check this out.</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-x icon_text_row odd">
					
        <div class="cell image-container">
            <img src="https://nvish.wpengine.com/wp-content/uploads/brand-campaign/activate.png" class="lsh-features_image">
        </div>
        
        <div class="cell text-container">
            <div class="text_box"> 
                <div class="title dark-blue">
                    <h3>Activate your audiences </h3>
                </div>

                <div class="txt-with-divider">
                    <div class="txt-with-divider--item divider--orange green-lines"></div>
                </div>

                <div class="text">
                    <p style="color:#003865">Our market-leading identity infrastructure integrated with the largest partner network lets you create data-driven customer experiences—without relying on traditional digital user IDs. <a href="" data-wpel-link="internal" style="color:#73C06B; text-decoration: underline;">Here’s what we mean.</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-x icon_text_row even">
					
        <div class="cell image-container">
            <img src="https://nvish.wpengine.com/wp-content/uploads/brand-campaign/budget.png" class="lsh-features_image">
        </div>
        
        <div class="cell text-container">
            <div class="text_box"> 
                <div class="title dark-blue">
                    <h3>Accurately measure ROI</h3>
                </div>

                <div class="txt-with-divider">
                    <div class="txt-with-divider--item divider--orange green-lines"></div>
                </div>

                <div class="text">
                    <p style="color:#003865">Understand the business impact of every marketing activity with holistic data connectivity. <a href="" data-wpel-link="internal" style="color:#73C06B; text-decoration: underline;">Only LiveRamp does this.</a> </p>
                </div>
            </div>
        </div>
    </div>
            				
            		
                    	
	</div>

</section>

<!--Added by BINDU KAMBOJ -->

<style>
.blue_gradient{
	/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#ffffff+0,eaf4f9+25,eaf4f9+78,ffffff+99 */
background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top,  #ffffff 0%, #eaf4f9 25%, #eaf4f9 78%, #ffffff 99%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  #ffffff 0%,#eaf4f9 25%,#eaf4f9 78%,#ffffff 99%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  #ffffff 0%,#eaf4f9 25%,#eaf4f9 78%,#ffffff 99%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
}
.bg-container_btm {
    height: 1300px;
    position: relative;
	background-image: url("https://nvish.wpengine.com/wp-content/uploads/brand-campaign/bottom_bg.jpg"); 
  	background-color: #cccccc; 
 	background-position:top -150px center; 
    background-repeat: no-repeat; 
    background-size: cover; 
    overflow: hidden;
    margin-top: 39px
}
.no_spacer{margin:0;}
@media screen (min-width:40em) and (max-width:64.0625em){
	
}
@media print,screen and (max-width:39.99em){
/*.bg-container_btm{background-image:none; background-color:#fff;}*/
}

</style>

<section class="vector_resource_3_card_image_and_text resource_3_card_image_and_text entrance-anim no_spacer">
	<!-- check and show if title or description are present  -->
    <div class="grid-container add-padding">
    <div class="grid-x">
        <div class="cell text-center title-cell px">    
            <div class="intro_headinng">
                <h2>The moment you decide to change your world.</h2>
            </div>
            
            <div class="intro_divider">
                <div class="icon-divider-item blue-lines"></div>
            </div>
            
            <div class="intro_title dark-blue">
                <p style="line-height: 31px">The future of transforming customer data has never been so exciting. We can’t wait to show you the possibilities. Dive in:</p>
            </div>

        </div>
    </div>
    </div>
		<!--  END -->
	<div class="bg-container_btm">
	<div class="grid-container  relative margin-top-2  ">
		<!-- Check for layout type -->
        <div class="grid-x grid-margin-x grid-margin-y z-5-r large-up-3" data-equalizer="content" data-resize="content" data-mutate="content" data-l="tf5pmk-l">

								<!-- three row  -->
					<div class="cell resource-card click-card b-radius box-shadow-over-white white-bkg hover large-4 short " data-url="https://liveramp.com/saying-the-quiet-part-out-loud-podcast/" data-blank="false">
						<div class="image " style="background-image:url('https://nvish.wpengine.com/wp-content/uploads/brand-campaign/Thumbnail-PodcastSayingtheQuietPartOutLoud.jpg')"></div>
							<div class="content" data-equalizer-watch="foo" style="height: 227px;">

							<div class="term">
								<div class="grid-x">
									<div class="cell shrink icon orange" style="margin-right: 0">
                                        <img src="/wp-content/themes/liveRamp-Template/dist/assets/images/brand-campaign/icon-paper.png" alt="">
									</div>
									<div class="cell auto orange" style="color:#73C06B; font-size:15px; padding-top:1px">Podcast</div>
								</div>

							</div>


							<div style="margin-bottom: 35px">
								<h4 class="title primary" style="color: #003865">Podcast: Saying the Quiet Part Out Loud	</h4>
							</div>
							<div class="dark-slate flexo-bold topic" style="color: #003865; font-size:15px">Learn More</div>
														
							</div>
						
					</div>
					
					
					<!-- three row  -->
					<div class="cell resource-card click-card b-radius box-shadow-over-white white-bkg hover large-4 short " data-url="https://lp.liveramp.com/2021-guide-advertising-without-cookies-eb-registration.html" data-blank="false">
						<div class="image " style="background-image:url('https://nvish.wpengine.com/wp-content/uploads/brand-campaign/Thumbnail-E-book2021GuidetoAdvertisingwithoutCookies.jpg')"></div>
							<div class="content" data-equalizer-watch="foo" style="height: 227px;">

							<div class="term">
								<div class="grid-x">
									<div class="cell shrink icon orange" style="margin-right: 0">
                                        <img src="/wp-content/themes/liveRamp-Template/dist/assets/images/brand-campaign/icon-paper.png" alt="">
                                    </div>
									<div class="cell auto orange" style="color:#73C06B;; font-size:15px; padding-top:1px">Ebook</div>
								</div>

							</div>


							<div style="margin-bottom: 35px">
								<h4 class="title primary" style="color: #003865">2021 Guide to Advertising without Cookies</h4>
							</div>
							<div class="dark-slate flexo-bold topic" style="color: #003865">Learn More</div>
														
							</div>
					</div>
					
					<!-- three row  -->
					<div class="cell resource-card click-card b-radius box-shadow-over-white white-bkg hover large-4 short " data-url="https://liveramp.com/blog/" data-blank="false">
						<div class="image " style="background-image:url('https://nvish.wpengine.com/wp-content/uploads/brand-campaign/BLG-Generic_652x400.jpg')"></div>
							<div class="content" data-equalizer-watch="foo" style="height: 227px;">

							<div class="term">
								<div class="grid-x">
									<div class="cell shrink icon orange" style="margin-right: 0">
                                        <img src="/wp-content/themes/liveRamp-Template/dist/assets/images/brand-campaign/icon-paper.png" alt="">
                                    </div>
									<div class="cell auto orange" style="color:#73C06B; font-size:15px; padding-top:1px">Blog</div>
								</div>
							</div>

							<div style="margin-bottom: 35px">
								<h4 class="title primary" style="color: #003865">Marketing Innovation Blog </h4>
							</div>
							
                            <div class="dark-slate flexo-bold topic" style="color: #003865">Learn More</div>
														
						</div>
					</div>
 <style>
        .button {
            vertical-align: middle;
            font-size: 16px;
            line-height: 1;
            text-align: center;
            cursor: pointer;
            font-family: 'Flexo Bold';
            transition: all 1s ease;
            background-color: #FAE164;
            color: #003865; 
            display: inline-flex;
            align-items: center;
            width:221;
            height: 41px;
            border-radius: 32px;
            border:0;
        }
        .button:after {
            transition: all .75s ease;
            content: "";
            opacity: 0;
            background-image: url(https://24graj2x2dk813ys0w26mhu5-wpengine.netdna-ssl.com/wp-content/themes/liveRamp-Template/dist/assets/images/svg/arrow-white.svg);
            background-size: contain;
            background-repeat: no-repeat;
            height: .8rem;
            width: .8rem;
            margin-right: -.2em;
            margin-left: .2em;
            display: inline-block;
        }

        a.button:hover {
            text-decoration: none;
            background-color: #FAE164;
            color: #003865;
        }
    </style>
			
					<div class="flex-container startTheDiscussion" style="padding-bottom:256px">
						<div class="live-discussion-heading">
							<h1>Start the discussion.</h1>
						</div>
						<div class="live-discussion-desc">
						  <p style="margin-bottom: 39px;"> Talk to a LiveRamp customer data strategist now.</p>
						  <a class="button" target="" href="http://liveramp.com/data-connectivity/" data-wpel-link="internal">Seize the moment</a>
						</div>
					</div>	    			
		</div>
	    </div>
    </div>
</section>

<!---section END -->
<style>
@media print, screen and (min-width: 40em){
.grid-margin-x>.cell {
    width: calc(33.33333% - 2rem);
    margin-left: .75rem;
    margin-right: .75rem;
}

.vector_resource_3_card_image_and_text .intro_headinng h2{
		width: 66%;
		margin: 0 auto;
	}

    .vector_resource_3_card_image_and_text .intro_title p{
		font-size: 21px;
		width: 60%;
		margin: auto;
	}

}

#home img.home_img {
    position: absolute;
    right: 54px;
    bottom: 0px;
    max-width: 598px;
    width: 100%;
}

#home .home__title {
    flex-direction: column;
    justify-content: center;
    height: 565px;
    align-items: flex-start;
}

#home .home__scroll {
    align-self: flex-start;
    padding: 50px 0 2rem 15px;
    position: absolute;
    bottom: 6px;
}
#home .home__title .heading_dec{
	padding-bottom: 0px;
}
@media screen and (min-width: 40em){
	#home .home__title .heading_dec{
		width:55%
	}
}

#home .home__container{
    row-gap:0px;
    position: relative;
}

.bg-container_btm {
    height: auto;
    position: relative;
    background-image: url("https://nvish.wpengine.com/wp-content/uploads/brand-campaign/bottom_bg.jpg"); 
    background-color: #cccccc; 
    background-position:top 0px center; 
    background-repeat: no-repeat; 
    background-size: cover; 
    overflow: hidden;
}
@media (max-width:1024px){
    #home img.home_img {
        max-width: 400px;
        right: 25px;
    }
    .grid-margin-x.large-up-3>.cell {
        width: calc(33.33333% - 2rem);
    }
}


@media (max-width:991px){
    .felling-intro .intro_headinng h2, .section_title_wrap .section_title, .intro_headinng h2,
    .flex-container .live-discussion-heading h1 {
        font-size: 48px;
        line-height: 1;
    }

    .section_col_wrap .section_col_description{
         width: 68%;
    }

    .flex-container .live-discussion-desc p{
        font-size: 30px;
    }

    .section_col_wrap .section_col_description .lead_paragraph{
        font-size: 33px;
        line-height: 44.6px;
    }

    #home img.home_img {
        max-width: 380px;
    }
    #home .home__title {
        display: block;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }
    #home .home__title .heading{
        font-size: 90px;
    }
    #home .home__title .heading_dec{
        font-size: 35px;line-height: 40px;
    }
}

@media (max-width:767px){

    .vector-wave-section.icon_text_left_right .icon_text_row .cell.text-container {
        -webkit-order: 1;
        -ms-flex-order: 1;
        order: 1;
    }

    .vector-wave-section.icon_text_left_right .icon_text_row .cell.image-container {
        -webkit-order: 2;
        -ms-flex-order: 2;
        order: 2;
    }

    .section_col_wrap .section_col_thumb {
        width: 375px;
    }

    .section_col_wrap .section_col_thumb img{
        width: 250px;
    }

    .flex-container .button5{
        margin-bottom: 75px; 
    }

    .vector-wave-section.icon_text_left_right .icon_text_row .cell.image-container img {
        width: 75%;
        margin-bottom: 23px;
    }


    .vector-wave-section.icon_text_left_right .icon_text_row{
        margin-top: 20px;
    }

    #home .home__title {
        display: flex;
        padding-top: 51px;
        flex-direction: column;
        justify-content: flex-start;
        min-height: 545px;
        align-items: flex-start;
    }
    #home .home__title .heading{font-size: 62px;}
    #home .home__title .heading_dec{font-size: 38px;line-height: 40px;}
    .felling-intro.text-center {
        padding: 0px;
    }

    .resource_3_card_image_and_text .resource-card .content .term {
        margin-bottom: 0px;
        min-height: 30px;
    }
    .grid-margin-x.large-up-3>.cell {
        width: calc(33.33333% - 4%);
    }
    .flex-container.startTheDiscussion {
        display: flex;
        flex-wrap: wrap;
        font-size: 30px;
        text-align: center;
        justify-content: center;
        padding: 100px 15px;
        margin-top: 0px;
    }
    .flex-container.startTheDiscussion .live-discussion-desc p {
        font-size: 28px;
        line-height: 32px;
    }
    .flex-container.startTheDiscussion .live-discussion-heading h1 {
        font-size: 40px;
        line-height: 52px;
    }


    .felling-intro .intro_headinng {
        padding: 0px;
        text-align: left;
    }

    .felling-intro .intro_headinng h2
     .section_title_wrap .section_title,
      .intro_headinng h2,
       .flex-container .live-discussion-heading h1{
        font-size: 47px !important;
        line-height: 1 !important;
        letter-spacing: -2.8px !important;
    }

    .felling-intro .intro_divider {
        margin-left: 0;
    }

    .felling-intro .intro_title {
        text-align: left;
        padding: 0 ;
        font-size: 21px;
    }

    .section_title_wrap .section_intro {
        font-weight: 500;
        font-size: 36px;
        line-height: 32px;
        text-align: left;
        letter-spacing: -1px;
    }

    .section_title_wrap .section_title {
        font-size: 54px;
        text-align: left;
    }

    .section_title_wrap {
        margin-bottom: 40px;
    }
    .section_col_wrap .section_col_description .lead_paragraph {
        font-size: 33px;
        text-align: left;
        margin-bottom: 24px;
        line-height: 44.6px;
    }

    .flex-container{
        margin-top: 160px;
        padding: 0px 40px;
    }

    .section_col_wrap .section_col_description .post_designation {
        font-size: 21px;
    }

    .section_col_wrap .section_col_description .section_logo img {
        max-width: 154px;
        max-height: 52px;
        margin-bottom: 64px;
    }

    .section_row + .section_row {
        margin-top: 0;
    }

    .vector-wave-section .intro_headinng {
        text-align: left;
    }
    .vector-wave-section .intro_headinng h2 {
        font-size: 44px;
    }

    .vector-wave-section .card-intro .intro_divider {
        margin-left: 0;
    }

    .vector-wave-section .card-intro .intro_title {
        text-align: left;
        padding: 0 ;
        font-size: 21px;
    }

    #the_moment {
        padding: 0 1rem 0;
    }

    .feelingSec#feeling_section {
        margin-top: 43px;
        margin-bottom: 50px; 
    }

    .cell .intro_headinng{
        text-align: left;
    }

    .vector_resource_3_card_image_and_text .intro_headinng h2,
    .vector_resource_3_card_image_and_text .intro_title p{
        width: 100%;
    }

    .cell .intro_headinng h2 {
        font-size: 44px;
        line-height: 1;
    }

    .cell .intro_title p{
        text-align: left;
        padding: 0 ;
        font-size: 21px;
    }

    .cell .intro_divider {
        margin-left: 0;
    }

    .grid-container.add-padding{
        padding: 0 1rem 0;
    }
}

@media (max-width: 640px){
    .grid-margin-x.large-up-3>.cell{
        width: 96%;
        margin-bottom: 42px;
    }

    #home img.home_img{
        right: 0;
        max-width: 339px;
    }

    .home:before{
        position: absolute;
        width: 100%;
        height: 100vh;
        content: "";
        background: linear-gradient(353deg, #f9e547, #73c063, #00a9e0);
    }

    .vector-wave-section.icon_text_left_right .icon_text_row .cell.image-container,
    .vector-wave-section.icon_text_left_right .icon_text_row .cell.text-container,
    .vector-wave-section.icon_text_left_right .icon_text_row.even .cell.text-container .text_box,
    .section_col_wrap .section_col_description{
        width: 100%;
        padding: 0;
    }

}



@media (max-width:480px){
    #home img.home_img {
        max-width: 300px;
    }
    #home .home__title .heading{width: auto;}
}

/* media Query play section  */


.section_title_wrap .section_title {
background-image:linear-gradient(95.47deg
, #001365 -0.52%, #00A0D9 57%, #80C468 87.12%);
    background-size: 100%;
    background-repeat: repeat;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
blockquote {
  text-indent: -0.45em;
  border-left: none;
}

blockquote {
    margin: 0 0 1rem;
    padding: 5px 15px 0 15px;
}

@supports ( hanging-punctuation: first) {
  blockquote {
    text-indent: 0;
    hanging-punctuation: first;
  }
}

blockquote::before {
    content: open-quote;
    padding-right: 11px;
}
blockquote::after {
    content: close-quote;
}
blockquote {
    quotes: "“" "”" "‘" "’";
}




</style>
<?php get_footer();?>