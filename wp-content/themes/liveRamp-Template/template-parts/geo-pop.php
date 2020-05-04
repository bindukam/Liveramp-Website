<style>

.liveRampPopupbtn { font-size: 22px; padding: 10px 20px; background-color: #fff; border: 1px solid #bbb; color: #333; text-decoration: none; border-radius: 4px; }


.liveRamp-modal-box { transform: scale(0); transition: all ease .3s; position: absolute; z-index: 9999; left: 0; width: 100%; max-width: 700px; right: 0; bottom: 0; min-height: 450px; top: 0; margin: auto; height: 50%; background: #FFFFFF 0% 0% no-repeat padding-box; border-radius: 25px; opacity: 0.92; }
.popupScale{transform: scale(1);  transition: all ease .3s;}
.liveRampOverlay { opacity: 0; overflow-x: hidden; position: fixed; top: 0; left: 0; z-index: 999; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7) !important; display: none; }
a.closeBtn { line-height: 1; position: absolute; top: 21px; right: 19px; text-decoration: none; height: 24px; width: 24px; }
a.closeBtn img{width:100%;}
img.logoImg { width: 155px; }
.liveRamp-modal-box .modal-body { padding: 32px; text-align: center; float: left; width:100%; }
.liveRamp-modal-box .modal-body h3{    font-family: 'Flexo Bold'; text-align: center; color: #73C063; font-weight: bold;font-size: 36px;line-height: 50px; margin: 25px 0px 10px; letter-spacing: 0px; color: #73C063; opacity: 1;} 
.liveRamp-modal-box .modal-body img.underlineImg{ max-width:370px;}
.liveRamp-modal-box .modal-body p{font-weight: 400; width:100%; min-width: 450px; margin: 20px auto 0px;font-size: 21px;line-height: 29px;color:#56565B;letter-spacing: 0px;text-align: center;}
.liveRamp-modal-box .modal-body .btnWrap { border-top: 1px solid #D0D0D0; margin-top: 40px; float: left; width: 100%; max-width: 640px; }
.liveRamp-modal-box .modal-body .btnWrap .leftBox {padding-top: 28px; border-right: 1px solid #D0D0D0; float: left; width: 100%; max-width: 49%; }
.liveRamp-modal-box .modal-body .btnWrap .leftBox:nth-child(2) {border-right: none;}
.liveRamp-modal-box .modal-body .btnWrap .leftBox a{  font-family: 'Flexo Demi'; max-width: 245px; width: 100%; padding: 14px 0px;  display: block; border-radius: 30px; margin: 0 auto; color: #fff; font-size: 24px; line-height: 34px; background-color: #73C063; text-decoration: none; text-align: center;}
.liveRamp-modal-box .modal-body .btnWrap .leftBox:nth-child(2) a{background-color: #7A99AC;}
.liveRamp-modal-box .modal-body .btnWrap .leftBox p{font-family: 'Flexo Demi';  font-size: 16px;line-height: 22px;color: #73C063;    margin: 15px 0px;    min-width: auto;
} 
.liveRamp-modal-box .modal-body .btnWrap .leftBox:nth-child(2) p{ font-size: 16px;line-height: 22px;color: #7A99AC;}

@media only screen   and (min-device-width : 320px)  and (max-device-width : 900px)  and (orientation : landscape) {
.liveRamp-modal-box { min-height: 330px; overflow-y: auto; }
}
@media (max-width:767px){
  .liveRamp-modal-box .modal-body .btnWrap .leftBox:first-child { border-right: none; max-width: 100%;border-bottom: 1px solid #D0D0D0; }
  .liveRamp-modal-box .modal-body .btnWrap .leftBox{ max-width: 100%; padding-bottom: 30px;}
  .liveRampOverlay{overflow-x: hidden; height: 100vh;}
  .liveRampOverlay .liveRamp-modal-box{height: 100vh; border-radius: 0px; opacity: .8; min-height: 100vh; overflow-y: auto; overflow-x: hidden;}
  .liveRamp-modal-box .modal-body { padding: 9% 32px 0px; }
  .liveRamp-modal-box .modal-body img.underlineImg { max-width: 100%; }
  .liveRamp-modal-box .modal-body h3{font-size: 26px;}
  img.logoImg{max-width:140px;}
  .liveRamp-modal-box .modal-body p{font-size: 18px;}
  .liveRamp-modal-box .modal-body .btnWrap{margin-top: 45px;}
  .liveRamp-modal-box .modal-body .btnWrap .leftBox{padding-top: 45px;}
  .liveRamp-modal-box .modal-body .btnWrap .leftBox a { max-width: 220px; font-size: 21px;}
  .liveRamp-modal-box .modal-body .btnWrap .leftBox p{font-size:14px;}
}
</style>
<?php 
// PHP code to extract IP 

function getVisIpAddr() { 
	
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
		return $_SERVER['HTTP_CLIENT_IP']; 
	} 
	else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
		return $_SERVER['HTTP_X_FORWARDED_FOR']; 
	} 
	else { 
		return $_SERVER['REMOTE_ADDR']; 
	} 
} 

// Store the IP address 
$ip = getVisIPAddr(); 


// Use JSON encoded string and converts 
// it into a PHP variable 
 $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip)); 

/*  echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
echo 'Country Code: ' . $ipdat->geoplugin_countryCode . "\n"; */

$countryCode = $ipdat->geoplugin_countryCode;
//$countryCode = 'AU'; //for testing only
$countryLabelList = [
	'FR'=>'France',
	'GB'=>'UK',
	'AU'=>'Australia',
	'JP'=>'Japan',
	'DE'=>'Germany',
	'ES'=>'Spain',
	'IT'=>'Italy',
	'CN'=>'China',
];

if(array_key_exists($countryCode,$countryLabelList)){ 
	$orgUrl = site_url(); 
	$expUrls = explode(".com", $orgUrl);
	$expUrls = $expUrls[0];

	switch ($countryCode) {
		case 'FR':
			$refer_to_site_url = $expUrls.'.fr/';
			break;
		case 'GB':
			$refer_to_site_url = $expUrls.'.uk/';
			break;
		case 'AU':
			$refer_to_site_url = $orgUrl.'.au/';
			break;
		case 'JP':
			$refer_to_site_url = $expUrls.'.co.jp/';
			break;
		case 'DE':
			$refer_to_site_url = $orgUrl.'/lr-de/';
			break;
		case 'ES':
			$refer_to_site_url = $orgUrl.'/lr-es/';
			break;
		case 'IT':
			$refer_to_site_url = $orgUrl.'/lr-it/';
			break;
		case 'CN':
			$refer_to_site_url = $orgUrl.'.cn/';
			break;
		default:
			$refer_to_site_url = $orgUrl;
	} 

	?>
	<!--<a class="btn" href="javascript:void(0)" id="liveRampPopup">Pop Up</a>-->
	<div class="liveRampOverlay v-center">
	  <div id="liveRamp" class="modal-box liveRamp-modal-box">
		<div class="modal-body">
		  <a href="#" class="closeBtn dismissGeoModel"><img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/popup-closeImg.png"></a>
		  <a href="#"><img class="logoImg" src="<?php echo get_template_directory_uri() ?>/dist/assets/images/popup-logo.png"></a>
		  <h3>Welcome to LiveRamp.com</h3>
		  <img class="underlineImg" src="<?php echo get_template_directory_uri() ?>/dist/assets/images/popup-underline.png">
		  <p>It looks as though you are visiting from the <?php echo $countryLabelList[$countryCode]; ?>.</br> Would you like to visit our <?php echo $countryLabelList[$countryCode]; ?> site?</p>
		  <div class="btnWrap">
			<div class="leftBox">
			  <a href="<?php echo $refer_to_site_url; ?>">Yes, please!</a>
			  <p>Take me to the <?php echo $countryLabelList[$countryCode]; ?> site</p>
			</div>
			<div class="leftBox">
			  <a href="javascript:void(0)" class="dismissGeoModel">No, thanks.</a>
			  <p>Continue to the US site</p>
			</div>
		  </div>
		</div>
	  </div>
	</div>

	<script type="text/javascript">
	$(function () {
		/** display geop-popup : code starts **/
		setTimeout(function(){ 
			$(".liveRampOverlay").fadeTo(500 , 1);
			$('#liveRamp').addClass('popupScale');
			$('body , html').css('overflow','hidden');
		 }, 2000);
		/** display geop-popup : code ends **/
	  $(document).on('click', '.dismissGeoModel', function () {
		closeGeoModel()
	  }); 
	});
	
	  function closeGeoModel(){ 
		$('.liveRampOverlay').fadeOut(500);
		$(".modal-box").removeClass('popupScale');
		$('body , html').css('overflow','auto');
	  }
	</script>
<?php } ?>
<script type="text/javascript">
	$(function () {
		var countryCode = '<?php echo $ipdat->geoplugin_countryCode; ?>';
		console.log(countryCode)
	})
</script>