<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5QZ89C6');</script>
    <!-- End Google Tag Manager -->

    <title>Tech Stack Integration & Identity Resolution | LiveRamp</title>
     <link rel="shortcut icon" href="https://40huuk1e5l5qxr2m59m9x88c-wpengine.netdna-ssl.com/wp-content/uploads/fbrfg/favicon.ico">
 `` <meta name="keywords" content="tech stack integration, tech stack">
    <meta name="description" content="Learn about the importance of tech stack integration, whether you’re head of digital marketing, a martech strategist, analytics lead, or ecommerce lead, and how LiveRamp’s platform makes it easier.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

</head>

<?php $panel = $_GET['panel']; ?>

<?php if (isset($panel)){ ?>
	<body style="margin:0;">
<?php } else { ?>
	<body>	
<?php } ?>
	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QZ89C6"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

<?php 
	include ('panels/panel-00-header.php');
	include ('panels/panel-00-signup.php');
	include ('panels/panel-01-hero.php');
	include ('panels/panel-02-thatswhy.php');
	include ('panels/panel-03-strategic-value.php');
	include ('panels/panel-04-img-pic.php');
	include ('panels/panel-05-integrate-techstack.php');
	include ('panels/panel-06-using-identity-resolution.php');
	include ('panels/panel-07-blue-strip-light.php');
	include ('panels/panel-08-identity-resolution-matters.php');
	include ('panels/panel-09-rocket-fuel.php');
	include ('panels/panel-10-five-important-outcomes.php');
	include ('panels/panel-11-people-based-marketing.php');
	include ('panels/panel-12-blue-people-based-marketing.php');
	//include ('panels/panel-14-signup.php');
	include ('panels/panel-13-footer.php');
?>
<script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/email_validation.js"></script>

<script type='text/javascript'>
(function (d, t) {
  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
  bh.type = 'text/javascript';
  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=wf3j3rabgjxdcdgpecd4lg';
  s.parentNode.insertBefore(bh, s);
  })(document, 'script');
</script>


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




