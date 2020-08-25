<!-- //////////////////////////////////////////////////////// -->

   <!-- onclick Function to consent for  marketo only -->
    <script>
        function accept__mkto() {
            __tcfapi('accept', 2, (data, result) => {
            }, {
                vendorIds: [10069],
                purposeIds:[1,2,3,4,5,6,7,8,9,10,25,26,27,28,29,30]
            });
        }
    </script>

    <!-- loading the form from mkto_js -->
    <script>
        function mkto_F() {
            console.log('here: mkto_F');
            var mkto_S = document.createElement('script');
            mkto_S.type = 'text/javascript';
            mkto_S.src = '<?php echo get_stylesheet_directory_uri() ?>/library/mkto-forms/mkto_consent_<?php echo get_field('contact_form_id', 'option') ?>.js';
            document.getElementById('mkto_consent').appendChild(mkto_S);
        }
    </script>

    <!-- consent logic check for marketo -->
    <script>
       var consentForMarketoForm;
       console.log('consentForMarketoForm is ', consentForMarketoForm);

       function checkMktoConsent() {
           __tcfapi("checkConsent", 2, (data, success) => {
               var newConsentForMarketo = (data)
               if (consentForMarketoForm !== newConsentForMarketo) {
                   consentForMarketoForm = newConsentForMarketo;
                   if (consentForMarketoForm){
                        document.getElementById("consent_panel").style.display = "none";
                        mkto_F();
                   }
               }
           }, {

               data: [{
                   "vendorId": 10069
               }]
           });
       }
   </script>
    
    <!-- Button div -->
    <div id="consent_panel" class="consent_panel_css">
        <p>Contact form not showing? You may need to update your consent preferences. Click “Accept” to give consent and enable the form.</p> 
        <button id="mkto_btn" class="consent_Btn mktoButton button cta" onclick="accept__mkto();">Accept</button>
    </div>

    <!-- provided from mkto embedded script can call forms.min from marketo original link -->
    <script src="https://lp.liveramp.com/js/forms2/js/forms2.min.js"></script>
   

    <form id="mktoForm_<?php echo get_field('contact_form_id', 'option') ?>"></form>

    <!-- added this div with ID=mkto_consent to call the marketo form callback once the consent check is done-->
    <div id="mkto_consent"></div>

    <!-- If you have this logic implemented on the page then you only need to add checkMktoConsent() to checkConsentDataWithCallback()-->
    <script>
        window.__tcfapi('addEventListener', 'cmpReady', function () {
            checkConsentDataWithCallback();
        });

        function checkConsentDataWithCallback() {
            window.__tcfapi('consentDataExist', true, function (consentDataExist) {
                if (consentDataExist) {
                    console.log('exists')
                    checkMktoConsent();
                }
            });
        }
    </script>

<!-- //////////////////////////////////////////////////////// -->
