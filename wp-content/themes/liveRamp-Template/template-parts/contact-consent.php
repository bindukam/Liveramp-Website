<!-- //////////////////////////////////////////////////////// -->

    <!-- onclick Function to consent for  marketo only -->
    <script>
        function accept__mkto() {
            __cmp('acceptAll', {
                purposeIds: [1, 2, 3, 4, 5],
                vendorIds: [0]
            }, function (data) {});
            __cmp('acceptAllAdditional', {
                vendorIds: [90]
            }, function (data) {});
        }
    </script>

    <!-- loading the form from mkto_js -->
    <script>
        function mkto_F() {
            console.log('here: mkto_F');
            var mkto_S = document.createElement('script');
            mkto_S.type = 'text/javascript';
            mkto_S.src = 'wp-content/themes/liveRamp-Template/mkto-forms/mkto_consent_<?php echo get_field('contact_form_id', 'option') ?>.js';
            document.getElementById('mkto_consent').appendChild(mkto_S);
        }
    </script>

    <!--  consent logic check for marketo -->
    <script>
        var consentForMarketoForm;
        console.log('consentForMarketoForm is ', consentForMarketoForm);

        function checkMktoConsent() {
            window.__cmp('getAdditionalVendorConsents', undefined, function (data) {
                var newConsentForMarketo = (data.purposeConsents[1] && data.vendorConsents[90] && data.purposeConsents[2] && data.purposeConsents[3] && data.purposeConsents[4] && data.purposeConsents[5]);
                console.log('newConsentForMarketo is ', newConsentForMarketo);
                if (consentForMarketoForm !== newConsentForMarketo) {
                    consentForMarketoForm = newConsentForMarketo;
                    if (consentForMarketoForm) {
                        document.getElementById("consent_panel").style.display = "none";
                        mkto_F();
                    }
                }
            });
        }
    </script>
    <!-- end of consent logic check for marketo -->

    <!-- Button div -->
    <div id="consent_panel" class="consent_panel_css">
        <p>Contact form not showing? You may need to update your consent preferences. Click Accept to give consent for Marketo</p>
        <button id="mkto_btn" class="consent_Btn mktoButton button cta" onclick="accept__mkto();">Accept</button>
    </div>

    <!-- provided from mkto embedded script can call forms.min from marketo original link -->
    <script src="https://lp.liveramp.com/js/forms2/js/forms2.min.js"></script>
    <form id="mktoForm_<?php echo get_field('contact_form_id', 'option') ?>"></form>

    <!-- added this div with ID=mkto_consent to call the marketo form callback once the consent check is done-->
    <div id="mkto_consent"></div>

    <!-- If you have this logic implemented on the page then you only need to add checkMktoConsent() to checkConsentDataWithCallback()-->
    <script>
        window.__cmp('addEventListener', 'cmpReady', function () {
            checkConsentDataWithCallback();
        });
        window.__cmp('addEventListener', 'consentChanged', function () {
            checkConsentDataWithCallback();
        });
        // If false it means that the visitor is new and didnt give an action for consent 
        // If true it means that the consent data object exist and we fire the check for the facebook consent  -->

        function checkConsentDataWithCallback() {
            window.__cmp('consentDataExist', true, function (consentDataExist) {
                if (consentDataExist) {
                    checkMktoConsent();
                }
            });
        }
    </script>


<!-- //////////////////////////////////////////////////////// -->
