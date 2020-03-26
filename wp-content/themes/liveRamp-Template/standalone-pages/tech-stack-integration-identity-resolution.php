<?php /* Template Name: Tech Stack Long Page */ ?>

<?php $asset_link = get_stylesheet_directory_uri().'/standalone-pages/tech-stack-integration-identity-resolution-assets'; ?>
<?php //echo home_url() ?>
<?php //echo $asset_link; ?>
<?php $basepath =$_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/liveRamp-Template/standalone-pages/tech-stack-integration-identity-resolution-assets/'; ?>
<?php //include ($asset_link.'/inc/colorbar.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
  <!-- Privacy Manager CCPA -->
  <script src="https://ccpa-wrapper.privacymanager.io/ccpa/3558357f-205f-47db-ac66-c4312817054e/ccpa-liveramp.js"></script>
  <!-- Faktor CMP script -->
  <script src="https://config-prod.choice.faktor.io/b4826de8-0c24-44f4-a1b5-194cd70a93fb/faktor.js"></script>
  
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WVJNW76');</script>
  <!-- End Google Tag Manager -->

  <!-- No GDPR conditional trigger -->
<script>__cmp('gdprApplies', undefined, function (result){if (!result){window.dataLayer.push({'event': 'NoGDPR_apply'});}}); </script>
<meta name="google-site-verification" content="OE9AE4FvJh8Psx8iIhF_ytCyHA-j_J3IiKrrXdTLd3w" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5QZ89C6');</script>
    <!-- End Google Tag Manager -->

    <title>Tech Stack Integration & Identity Resolution | LiveRamp</title>
    <link rel="shortcut icon" href="https://40huuk1e5l5qxr2m59m9x88c-wpengine.netdna-ssl.com/wp-content/uploads/fbrfg/favicon.ico">
    <meta name="keywords" content="tech stack integration, tech stack">
    <meta name="description" content="Learn about the importance of tech stack integration, whether you’re head of digital marketing, a martech strategist, analytics lead, or ecommerce lead, and how LiveRamp’s platform makes it easier.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo $asset_link; ?>/assets/css/styles.css">

</head>

	<body>	
	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QZ89C6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

<!-- start panels here -->
<?php 

	include ($basepath.'panels/panel-00-header.php');
	include ($basepath.'panels/panel-00-signup.php');
	include ($basepath.'panels/panel-01-hero.php');
	include ($basepath.'panels/panel-02-thatswhy.php');
	include ($basepath.'panels/panel-03-strategic-value.php');
	include ($basepath.'panels/panel-04-img-pic.php');
	include ($basepath.'panels/panel-05-integrate-techstack.php');
	include ($basepath.'panels/panel-06-using-identity-resolution.php');
	include ($basepath.'panels/panel-07-blue-strip-light.php');
	include ($basepath.'panels/panel-08-identity-resolution-matters.php');
	include ($basepath.'panels/panel-09-rocket-fuel.php');
	include ($basepath.'panels/panel-10-five-important-outcomes.php');
	include ($basepath.'panels/panel-11-people-based-marketing.php');
	include ($basepath.'panels/panel-12-blue-people-based-marketing.php');
	//include ('panels/panel-14-signup.php');
	include ($basepath.'panels/panel-13-footer.php');

?>
<!-- end panels here -->

<script src="<?php echo $asset_link; ?>/assets/js/jquery-1.7.1.min.js"></script>
<script src="<?php echo $asset_link; ?>/assets/js/scripts.js"></script>
<script src="<?php echo $asset_link; ?>/assets/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo $asset_link; ?>/assets/js/email_validation.js"></script>

<script src="//app-sj25.marketo.com/js/forms2/js/forms2.min.js"></script>
<form id="mktoForm_1149" style="display: none;"></form>
<script>MktoForms2.loadForm("//app-sj25.marketo.com", "320-CHP-056", 1149);</script>

<?php if (isset($_GET['aliId'])) { ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.signup').hide();
			$('.thankyou').show().css('display','flex');
		});
	</script>
<?php } ?>

<script>
$(document).ready(function(){
  $(".click-submit").submit(function(){
    var my_email = $('.my-email', this).val();
	$('.my-email', this).css ({'background-color':'#fff'});
		
	if (my_email=='') {
		$('#valid-email').show().effect("pulsate", { times:3 }, 2000);
		return false;
	} else if ((my_email!='') && (!validateEmail (my_email))) {
		$('#valid-email').show().effect("pulsate", { times:3 }, 2000);
		return false;
	} else {
	    $('input[name="Email"]').val(my_email);
	    $('.mktoButton').trigger('click');
	    return false;
	}	
  });
});
</script>
</body>

</html>




