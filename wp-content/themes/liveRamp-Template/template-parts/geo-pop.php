
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



$countryCode = $ipdat->geoplugin_countryCode;
$countryLabelList = [
	'FR'=>'France',
	'GB'=>'UK',
	'AU'=>'Australia',
	'JP'=>'Japan',
	'CN'=>'China',
];

if(array_key_exists($countryCode,$countryLabelList)){ 
	$orgUrl = network_home_url(); 
	$choporgUrl = chop($orgUrl,"/");

	$curPageURL = get_page_link(); 
	if(chop($orgUrl,"/") == chop($curPageURL,"/")){
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
				$refer_to_site_url = $choporgUrl.'.au/';
				break;
			case 'JP':
				$refer_to_site_url = $expUrls.'.co.jp/';
				break;
			case 'CN':
				$refer_to_site_url = $choporgUrl.'.cn/';
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
<?php } } ?>
<script type="text/javascript">
	$(function () {
		var countryCode = '<?php echo $countryCode; ?>';
		var curPageURL = '<?php echo $curPageURL; ?>';
		var orgUrl = '<?php echo $orgUrl; ?>';
		var choporgUrl = '<?php echo $choporgUrl; ?>';
		console.log(countryCode);
		console.log('main_site: '+orgUrl+' curPageURL: '+curPageURL+ '   choporgUrl: '+choporgUrl);
	})
</script>