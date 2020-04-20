var cmp = document.createElement('script');
cmp.async = true;
cmp.defer = true;

if (!window.__cmp || typeof window.__cmp !== 'function') {
    var faktorCmpStart = window.__cmp ? window.__cmp.start : {};

    window.__cmp = function () {
        var listen = window.attachEvent || window.addEventListener;
        listen('message', function(event) {
            window.__cmp.receiveMessage(event);
        });

        function addLocatorFrame() {
            if (!window.frames['__cmpLocator']) {
                if (document.body) {
                    var frame = document.createElement('iframe');
                    frame.style.display = 'none';
                    frame.name = '__cmpLocator';
                    document.body.appendChild(frame);
                }
                else {
                    setTimeout(addLocatorFrame, 5);
                }
            }
        }
    
        addLocatorFrame();

        var commandQueue = [];
        var cmp = function (command, parameter, callback) {
            if (command === 'ping') {
                if (callback) {
                    callback({
                        gdprAppliesGlobally: !!(window.__cmp && window.__cmp.config && window.__cmp.config.storeConsentGlobally),
                        cmpLoaded: false
                    }); 
                }
            } else {
                commandQueue.push({
                    command: command,
                    parameter: parameter,
                    callback: callback
                });
            }
        }
        cmp.commandQueue = commandQueue;
        cmp.receiveMessage = function (event) {
            var data = event && event.data && event.data.__cmpCall;
            if (data) {
                commandQueue.push({
                    callId: data.callId,
                    command: data.command,
                    parameter: data.parameter,
                    event: event
                });
            }
        };

        return cmp;
    }();

    window.__cmp.start = faktorCmpStart;
}

cmp.onload = function () {
    window.__cmp.start({"localization":{"en":{"introTitle":"We use cookies","introDescription":"<p>LiveRamp and our partners use cookies and similar technologies on our website. Some cookies are essential for our website to function properly, whilst others help us improve and personalize your user experience, or provide more tailored advertising and content for you across devices.</p><p>By clicking “I accept all cookies” below, you consent to the use of this technology across the web. You can always change your mind and alter your consent choices by clicking on the fingerprint at the bottom right of your screen.</p><p>To find out more, please visit our <a href=\"https://liveramp.com/privacy/web-privacy-policy/\" target=\"_blank\" style=\"color: rgb(9, 78, 192); background-color: rgb(255, 255, 255);\">Privacy Policy</a>. You can also click on <strong><em>\"${openTab(1, Settings )}\" </em></strong>to manage which types of cookies you want to opt in to, and the <strong><em>\"${openTab(0, Further Cookie Information )}\" </em></strong>tab to find further information about the cookies on our site.</p>","auditText":"<p>Audit Id is a random unique number that is generated for you when you visit this website. The purpose of the Audit ID is to keep a record of your consent history on which cookies you accepted and when. The information kept in relation to your Audit ID includes: timestamp, version of cookie vendor list and a list of vendors that are allowed to process your data.</p><p>You can contact the website's privacy contact if you would like to request your consent history.</p>","privacySettings":"Settings","privacySettingsMobile":"Settings","NGPrivacySettings":"Privacy Settings","acceptAll":"Accept all","rejectAll":"Accept None","rejectAllTitle":"Are you sure?","rejectAllMessage":"Without your consent we are unable to work with third- parties that help us improve our services.","rejectYesButton":"Yes, proceed","rejectNoButton":"No, take me back","moreLink":" ","showVendors":"Show Details","hideVendors":"Hide Details","active":"Active","inactive":"Inactive","exit":"Exit & save","manageByCompany":"Manage by Company","back":"Back","allWebsites":"All websites","all":"All","auditId":"Audit ID","copyToClipboard":"Copy to clipboard","on":"On","off":"Off","privacyManager":"Privacy Manager","settings":"Settings","allVendors":"All Vendors","viewPrivacy":"View Privacy Policy","requiredPurposes":"Required Purposes","explanationForNonTCF":"This vendor does not participate in the IAB Transparency and Consent Framework.","explanationForConsentUsage":"Consent for this vendor is stored and processed in accordance with the IAB Transparency and Consent Framework.","purposes":"Purposes","explanationForPurposeConsentUsage":"Consent for this purpose is stored and processed in compliance with the IAB Transparency and Consent Framework.","vendorList":"Vendor List","manageByVendor":"Manage by Vendor","id":"ID","idSettings":"ID Settings","showDetails":"Show Details","vendors":"Vendors","myAuditId":"My Audit ID","resetMyAuditId":"Reset my Audit ID","resetMyAuditIdDescription":"Resetting your Audit ID will make it impossible for the website owner to verify your consent history prior to the reset.","reset":"Reset","cancel":"Cancel","purpose":"Purpose","legitimateInterestPurposes":"Legitimate Interest Purposes","features":"Features","manageVendorsGlobally":"Manage Vendors Globally","explanationForManageVendorsGlobally":"Consent for these vendors is stored and processed in compliance with the IAB Transparency & Consent Framework. Your consent for these vendors is applicable on ALL participating sites.","supportUs":"Support Us","showMoreFacebookApp":"Click here for more information."},"de":{"introTitle":"Wir verwenden Cookies!","introDescription":"… und Sie sollten dabei die Kontrolle über ihre persönlichen Daten behalten. Deshalb wollen wir Ihnen ermöglichen Ihre persönlichen Daten selbst zu verwalten und Ihnen dadurch ein besseres Interneterlebnis ermöglichen.<br>Wenn Sie auf <i>alles akzeptieren</i> klicken, dann geben Sie uns und allen in unseren Datenschutz- und Cookie-Richtlinien aufgelisteten Drittanbietern Ihre Einwilligung Cookies zu setzen und personenbezogenen Daten für Analyse- und Werbezwecke zu verarbeiten.","auditText":"<p>Die Audit-ID ist eine zufällige, eindeutige Nummer, die beim Besuch dieser Website für Sie generiert wird. Der Zweck der Audit-ID besteht darin, Ihre Einverständniserklärung darüber aufzuzeichnen, welche Cookies Sie wann akzeptiert haben. Die in Bezug auf Ihre Audit-ID gespeicherten Informationen umfassen: Zeitstempel, Version der Cookie-Anbieterliste und eine Liste der Anbieter, die Ihre Daten verarbeiten dürfen.</p><p>Sie können den Datenschutzkontakt der Website kontaktieren, wenn Sie die Aufzeichnung Ihrer Einverständniserklärung anfordern möchten.</p>","privacySettings":"Datenschutzeinstellung","privacySettingsMobile":"Einstellungen","NGPrivacySettings":"Datenschutzeinstellung","acceptAll":"Alles aktezptieren","rejectAll":"Nichts akzeptieren","rejectAllTitle":"Sind Sie sich sicher?","rejectAllMessage":"Ohne Ihre Einwilligung ist es für uns leider nicht möglich mit Drittanbietern, die wir für die ständige Verbesserung unserer Dienste benötigen, zu arbeiten.","rejectYesButton":"Ja, ich bin mir sicher!","rejectNoButton":"Nein, bitte nicht!","moreLink":"Warum ist Ihre Einwilligung notwendig?","showVendors":"Details einblenden","hideVendors":"Details ausblenden","active":"Aktiv","inactive":"Inaktiv","exit":"schließen","manageByCompany":"Pro Unternehmen verwalten","back":"Zurück","allWebsites":"Alle Webseiten","all":"Alle","auditId":"Audit ID","copyToClipboard":"In die Ablage kopieren","on":"An","off":"Aus","privacyManager":"Privacy Manager","settings":"Einstellungen","allVendors":"Alle Drittanbieter","viewPrivacy":"Datenschutzrichtlinien anzeigen","requiredPurposes":"Erforderliche Zwecke","explanationForNonTCF":"Dieser Drittanbieter ist nicht Teil des IAB Transparency & Consent Frameworks.","explanationForConsentUsage":"Die Zustimmung für diesen Drittanbieter wird in Übereinstimmung mit dem IAB Trasnparency & Consent Framework gespeichert und verarbeitet.","purposes":"Zwecke","explanationForPurposeConsentUsage":"Die Zustimmung für diesen Drittanbieter wird in Übereinstimmung mit dem IAB Trasnparency & Consent Framework gespeichert und verarbeitet.","vendorList":"Drittanbieter","manageByVendor":"Pro Unternehmen verwalten","id":"ID","idSettings":"ID Einstellungen","showDetails":"Details anzeigen","vendors":"Drittanbieter","myAuditId":"Meine Audit ID","resetMyAuditId":"Meine Audit ID zurücksetzen","resetMyAuditIdDescription":"Durch das Zurücksetzen Ihrer Audit-ID wird es für den Webseitenbetreiber unmöglich Ihre vorherigen Einwilligungen im Nachhinein zu prüfen.","reset":"Zurücksetzen","cancel":"Abbrechen","purpose":"Zweck","legitimateInterestPurposes":"Rechtsschutzinteresse","features":"Anwendungen","manageVendorsGlobally":"Anbieter Global Verwalten","explanationForManageVendorsGlobally":"Die Zustimmung für diese Anbieter wird gemäß dem IAB Transparency & Consent Framework gespeichert und verarbeitet. Ihre Zustimmung für diese Anbieter gilt für ALLE teilnehmenden Websites.","supportUs":"Unterstützen Sie uns","showMoreFacebookApp":"Klicken Sie hier für mehr Informationen."},"nl":{"introTitle":"Wij gebruiken cookies!","introDescription":"En u moet <b>controle krijgen over uw persoonsgegevens</b>. Daarom bieden wij u een nieuwe omgeving aan, de Privacy Manager, voor een betere internetervaring, waar u uw instellingen en gegevens kunt beheren.","auditText":"<p>Audit ID is een willekeurig uniek nummer dat voor u wordt gegenereerd wanneer u deze website bezoekt. Het doel van de audit-ID is om uw toestemmingsgeschiedenis bij te houden waarop cookies zijn geaccepteerd die u hebt geaccepteerd en wanneer.De informatie die wordt bijgehouden met betrekking tot uw controle ID omvat: tijdstempel, versie van de lijst met cookieverkopers en een lijst met leveranciers die uw gegevens mogen verwerken.</p><p>U kunt contact opnemen met het privacy-contactpersoon van de website als u uw toestemmingsgeschiedenis wilt aanvragen. </p>","privacySettings":"Privacy Instellingen","privacySettingsMobile":"Instellingen","NGPrivacySettings":"Privacy Instellingen","acceptAll":"Accepteer alles","rejectAll":"Geen toestemming","rejectAllTitle":"Weet u het zeker?","rejectAllMessage":"Zonder uw toestemming kunnen wij niet met derden werken om onze dienst te verbeteren.","rejectYesButton":"Ja, ik weet het zeker","rejectNoButton":"Nee, ga terug","moreLink":"Waarom hebben jullie mijn toestemming nodig?","showVendors":"Laat details zien","hideVendors":"Verberg details","active":"Actief","inactive":"Inactief","exit":"Afsluiten","manageByCompany":"Beheer per bedrijf","back":"Terug","allWebsites":"Alle websites","all":"Alles","auditId":"Audit ID","copyToClipboard":"Kopieer naar clipboard","on":"Aan","off":"Uit","privacyManager":"Privacy Manager","settings":"Instellingen","allVendors":"Alle Bedrijven","viewPrivacy":"Bekijk Privacy Beleid","requiredPurposes":"Benodigde Doeleinden","explanationForNonTCF":"Dit bedrijf participeert niet in het IAB Transparency and Consent Framework.","explanationForConsentUsage":"De toestemming voor dit bedrijf wordt opgeslagen en verwerkt volgens het beleid van het IAB Transparency and Consent Framework.","purposes":"Doeleinden","explanationForPurposeConsentUsage":"De toestemming voor dit bedrijf wordt opgeslagen en verwerkt volgens het beleid van het IAB Transparency and Consent Framework.","vendorList":"Bedrijven","manageByVendor":"Beheer per bedrijf","id":"ID","idSettings":"ID instellingen","showDetails":"Toon details","vendors":"Bedrijven","myAuditId":"Mijn Audit ID","resetMyAuditId":"Ververs mijn Audit ID","resetMyAuditIdDescription":"Het verversen van uw Audit ID maakt het onmogelijk voor deze website eigenaar om uw voorafgaande toestemming te verifiëren.","reset":"Ververs","cancel":"Annuleren","purpose":"Doel","legitimateInterestPurposes":"Rechtmatig Belang","features":"Toepassingen","manageVendorsGlobally":"Beheer Bedrijven Globaal","explanationForManageVendorsGlobally":"Toestemming voor deze bedrijven wordt opgeslagen en verwerkt volgens het beleid van het IAB Transparency and Consent Framework. Uw toestemming voor deze bedrijven is van toepassing op ALLE participerende websites.","supportUs":"Steun ons","showMoreFacebookApp":"Klik hier voor meer informatie."},"bg":{"introTitle":"Ние използваме бисквитки!","introDescription":"Ако изберете Приемам всички, ще дадете на нас и на нашите партньори, детайлно изброени в Privacy and Cookie settings Вашето съгласие да събираме, обработваме, съхраняваме и споделяме Вашите лични данни, за описаните в документа цели и по описаните начини.","auditText":"<p>Одитният идентификатор е уникален случаен номер, който се генерира от нас когато посетите наш web сайт. Целта на идентификатора е да съхраним запис за Вашите настройки. Информацията, която записваме за целта е: timestamp, версия на списъка с трети страни опериращи с бисквитки и списък на разрешените от вас за обработка на личните Ви данни трети страни. Свържете се с нас з да получите историята на Вашите съгласия</p>","privacySettings":"Настройки за поверителност","privacySettingsMobile":"Настройки","NGPrivacySettings":"Настройки за поверителност","acceptAll":"Приемам всички","rejectAll":"Не приемай нито едно","rejectAllTitle":"Сигурни ли сте?","rejectAllMessage":"Без Вашето съгласие, ние няма да имаме възможност да работим с трети страни, които да ни помогнат да подобрим услугите си.","rejectYesButton":"Да, продължи","rejectNoButton":"Не, върни ме обратно","moreLink":"За какво давам съгласието си ?","showVendors":"Виж детайли","hideVendors":"Скрий детайлите","active":"Aктивно","inactive":"Неактивно","exit":"Запази","manageByCompany":"Управлявани от компания","back":"Назад","allWebsites":"Всички сайтове","all":"Всички","auditId":"Одитен идентификатор","copyToClipboard":"Копирай в Clipboard","on":"On","off":"Off","privacyManager":"Мениджър за защита на личните данни","settings":"Настройки","allVendors":"Всички доставчици","viewPrivacy":"Виж лична неприкосновеност","requiredPurposes":"Необходими цели","explanationForNonTCF":"Този доставчик не участва в инициативата на IAB за прозрачност и съгласие.","explanationForConsentUsage":"Съгласието за този доставчик се съхранява и обработва в съответствие с инициативата на IAB за прозрачност и съгласие.","purposes":"Цели","explanationForPurposeConsentUsage":"Съгласието за тази цел се съхранява и обработва в съответствие с инициативата на IAB за прозрачност и съгласие.","vendorList":"Списък с доставчици","manageByVendor":"Управлявани от компания","id":"Уникален идентификатор","idSettings":"Настройки на уникалния идентификатор","showDetails":"Виж детайли","vendors":"Доставчици","myAuditId":"Моят одитен идентификатор","resetMyAuditId":"Върни фабричните настройки на одитен идентификатор","resetMyAuditIdDescription":"Връщане на фабричните настройки на Вашия одитен идентификатор ще направи невъзможно за собственика на сайта да провери Вашата история на съгласия преди връщане на фабричните настройки.","reset":"Върни фабричните настройки","cancel":"Отмени","purpose":"Цел","legitimateInterestPurposes":"легитимен интерес","features":"функционалност","manageVendorsGlobally":"Управляване на Доставчици на Глобално Ниво","explanationForManageVendorsGlobally":"Съгласие за тези доставчици се съхранява и обработва в съответствие с IAB Transparency & Consent Framework. Вашето съгласие за тези доставчици е приложимо за ВСИЧКИ участващи уебсайтове.","supportUs":"Support Us","showMoreFacebookApp":"Натиснете тук за повече информация."},"fr":{"introTitle":"Nous utilisons des cookies!","introDescription":"Et vous devez être en mesure de maîtriser vos données à caractère personnel. Par conséquent, nous vous proposons de nouveaux moyens de contrôle pour gérer vos données, et profiter d’une expérience Internet optimale. Si vous cliquez sur Tout accepter ci-dessous, vous consentez que nous et toutes les tierces parties mentionnées dans notre « Avis relatif à la confidentialité et à l’usage des cookies » placions des cookies et traitions vos données à caractère personnel à des fins d’analytique et de publicité.","auditText":"<p>L’identité d’audit est un numéro aléatoire unique généré pour vous lorsque vous consultez ce site Web. L’objectif de l’identité d’audit est de garder un enregistrement de votre historique de consentement concernant les cookies que vous avez acceptés et à quel moment vous les avez acceptés. Les informations conservées en relation avec votre identité d’audit comprennent : horodatage, version de la liste des cookies des vendeurs et une liste des vendeurs qui ont le droit de traiter vos données. L’identité d’audit est un numéro aléatoire unique généré pour vous lorsque vous consultez ce site Web. L’objectif de l’identité d’audit est de garder un enregistrement de votre historique de consentement desquels vous avez accepté les cookies. Les informations conservées en relation avec votre identité d’audit comprennent: horodatage, version de la liste des cookies des vendeurs et une liste des vendeurs qui ont le droit de traiter vos données.</p><p>Vous pouvez contacter la personne responsable de la politique de confidentialité du site Web si vous souhaitez demander votre historique de consentement.</p></p>","privacySettings":"Paramètres de confidentialité","privacySettingsMobile'":"Paramètres","NGPrivacySettings":"Paramètres de confidentialité","acceptAll":"Tout accepter","rejectAll":"Ne rien accepter","rejectAllTitle":"Êtes-vous sûr(e)?","rejectAllMessage":"Sans votre consentement, nous ne pouvons pas utiliser nos services.","rejectYesButton":"Oui, continuer","rejectNoButton":"Non, revenir en arrière","moreLink":"Pourquoi vous faut-il mon consentement?","showVendors":"Afficher les détails","hideVendors":"Masquer les détails","active":"Actif","inactive":"Inactif","exit":"Sortie","manageByCompany":"Gérer par la société","back":"Retour","allWebsites":"Tous les sites Web","auditId":"Audit ID","copyToClipboard":"Copie","on":"Activé","off":"Désactivé","privacyManager":"Gestionnaire protection vie privée","settings":"Réglages","allVendors":"Tous les vendeurs","viewPrivacy":"Consulter la politique de confidentialité","requiredPurposes":"Objectifs requis","explanationForNonTCF":"Le vendeur ne participe ni à la Transparence IAB ni au cadre de consentement.","explanationForVendorConsentUsage":"Le consentement pour ce vendeur est stocké et traité conformément à la transparence IAB et le cadre de consentement.","purposes":"Objectifs","explanationForPurposeConsentUsage":"Le consentement pour cet objectif est stocké et traité conformément à la transparence IAB et le cadre de consentement.","vendorList":"Liste des vendeurs","manageByVendor":"Géré par vendeur","id":"Identité","idSettings":"Réglages d'identité","showDetails":"Afficher les détails","vendors":"Vendeurs","myAuditId":"Identité de l'audit","resetMyAuditId":"Réinitialiser mon identité d'audit","resetMyAuditIdDescription":"La reconfiguration de votre identité d'audit permettra au propriétaire du site Web de vérifier l'historique de consentement avant la réinitialisation.","reset":"Réinitialiser","cancel":"Annuler","purpose":"Objectif","legitimateInterestPurposes":"Objectifs d'intérêt légitime","features":"Caractéristiques","manageVendorsGlobally":"Manage Vendors Globally","explanationForManageVendorsGlobally":"Le consentement pour ce vendeur est stocké et traité conformément à la transparence IAB et le cadre de consentement.","supportUs":"Nous aider","showMoreFacebookApp":"Cliquer ici pour plus d'informations"},"it":{"introTitle":"Utilizziamo i cookie!","introDescription":"Ogni utente deve avere la possibilità di controllare i dati personali che lo riguardano. A tale scopo, desideriamo fornirti nuove funzionalità per gestire i tuoi dati e migliorare l'esperienza di navigazione in Internet. Facendo clic sul pulsante Accetta tutto autorizzi a noi e a tutte le terze parti citate nella nostra \"Informativa sulla privacy e sull'utilizzo dei cookie\" a impostare i cookie e a trattare i tuoi dati personali per scopi analitici e pubblicitari.","auditText":"<p>L'ID Audit è un numero unico casuale, generato appositamente per te nel momento in cui visiti questo sito Internet. Lo scopo dell'ID Audit è quello di tenere nota della tua cronologia dei consensi, in riferimento a quali cookie hai accettato e quando. Le informazioni conservate in relazione al tuo ID Audit includono: marcatura temporale, la versione dell'elenco dei fornitori di cookie e l'elenco di fornitori che possono elaborare i tuoi dati. L'Audit ID è un numero unico casuale, generato appositamente per te nel momento in cui visiti questo sito Internet. Lo scopo dell'ID Audit è quello di tenere nota della tua cronologia dei consensi su quali cookie hai accettato e quando. Le informazioni conservate in relazione al tuo ID Audit includono: marcatura temporale, la versione dell'elenco dei fornitori di cookie e l'elenco di fornitori che possono elaborare i tuoi dati.</p><p>Se vuoi richiedere la tua cronologia dei consensi, puoi contattare il referente della privacy del sito Internet.</p></p>","privacySettings":"Impostazioni di privacy","privacySettingsMobile":"Impostazioni","NGPrivacySettings":"Impostazioni di privacy","acceptAll":"Accetta tutto","rejectAll":"Non accetto nulla","rejectAllTitle":"Sei sicuro?","rejectAllMessage":"Senza il tuo consenso, saremo impossibilitati a lavorare con le nostre terze parti, che ci aiutano a migliorare i nostri servizi.","rejectYesButton":"Sì, procedi","rejectNoButton":"No, torna indietro","moreLink":"Perché avete bisogno del mio consenso?","showVendors":"Mostra i dettagli","hideVendors":"Nascondi dettagli","active":"Attivato","inactive":"Disattivato","exit":"Esci","manageByCompany":"Gestisci per azienda","back":"Indietro","allWebsites":"Tutti i siti web","auditId":"Audit ID","copyToClipboard":"Copia","on":"Acceso","off":"Spento","privacyManager":"Gestione della privacy","settings":"Impostazioni","allVendors":"Tutti i fornitori","viewPrivacy":"Visualizza la Politica sulla privacy","requiredPurposes":"Fini richiesti","explanationForNonTCF":"Questo fornitore non partecipa al IAB Transparency and Consent Framework.","explanationForVendorConsentUsage":"Il consenso per questo fornitore è stato conservato ed elaborato in conformità al IAB Transparency and Consent Framework.","purposes":"Fini","explanationForPurposeConsentUsage":"Il consenso per questo fine è stato conservato ed elaborato in conformità al IAB Transparency and Consent Framework.","vendorList":"Elenco del fornitore","manageByVendor":"Gestisci per fornitore","id":"ID","idSettings":"Impostazioni dell 'ID'","showDetails":"Mostra i dettagli","vendors":"Fornitori","myAuditId":"ID Audit","resetMyAuditId":"Resetta il mio ID Audit","resetMyAuditIdDescription":"Resettando il tuo ID Audit, per il proprietario del sito Internet sarà impossibile verificare la tua cronologia dei consensi fornita prima del reset.","reset":"Reset","cancel":"Annulla","purpose":"Fine","legitimateInterestPurposes":"Fini di interesse legittimo","features":"Caratteristiche","manageVendorsGlobally":"Manage Vendors Globally","explanationForManageVendorsGlobally":"Il consenso per questo fornitore è stato conservato ed elaborato in conformità al IAB Transparency and Consent Framework.","supportUs":"Supportaci","showMoreFacebookApp":"Clicca qui per ottenere ulteriori informazioni."}},"displayConsentTool":true,"displayFingerprint":true,"enableAcceptAll":true,"suppressUI":false,"groupId":null,"storePublisherData":false,"loggingConsentURL":"https://logs.choice.faktor.io/dev/streams/faktor-data-stream/records","customPurposeListLocation":null,"restrictForEU":true,"displayFingerprintOnMobile":true,"configurationVersion":44,"useSecondLevelDomain":false,"vendorIds":[130,156,128,32,69,97,164,25,10,76,42,52],"consentToolConfig":{"managerPosition":"modal","preselectAll":false,"showExitButton":true,"autoSave":false,"wallPosition":"modal","publisherInfoPages":[],"logo":"https://config-prod.choice.faktor.io/8b9cbfd6-70f8-4415-8d8f-58e3f2c3c012/8b9cbfd6-70f8-4415-8d8f-58e3f2c3c012.png?time=1554716247827","showCloseButton":false,"theme":"liveramp","fixedPosition":true,"id":"cmp-faktor-io","redisplayAfter":2592000,"focusedTabIndex":0,"supportedLocales":[{"name":"English","code":"en"}],"backdrop":"rgba(0,0,0,0.5)","essentialPurposes":{"1":{"additionalVendorIds":[],"vendorIds":[]},"2":{"additionalVendorIds":[],"vendorIds":[]}},"showPrivacySettingsButton":true,"backdropClass":"mat-black-500-bg","defaultLocale":{"name":"English","code":"en"},"showPrivacySettings":true,"showBackdropForTopAndBottom":true,"showRejectAllButton":"both","name":"faktor.io","faktorInfoPages":[{"show":true,"title":"Why do you need my consent?","titleMobile":"Why?","content":"<p>In order to run a successful online business, We and third parties are storing and accessing information on your device with cookies and other technologies. Several third parties are also processing personal data to show you personalized content and ads. This can also be on websites that are not ours.</p><p>Your consent is needed for both setting cookies and processing your personal data.</p><p>If you want to allow only certain uses or third-parties but not others, you can do so under Privacy Settings tab. You can also always come back here and review your choices later.</p><h1>What do you need it for?</h1><p>We and third-parties use cookies and process personal data for the following purposes:</p><h3>Storage and access of information</h3><p>The storage of information, or access to information that is already stored, on your device such as accessing advertising identifiers and/or other device identifiers, and/or using cookies or similar technologies.</p><h3>Personalisation</h3><p>The collection and processing of information about your use of this site to subsequently personalize advertising for you in other contexts, i.e. on other sites or apps, over time. Typically, the content of the site or app is used to make inferences about your interests which inform future selections.</p><h3>Ad selection, delivery, reporting</h3><p>The collection of information, and combination with previously collected information, to select and deliver advertisements for you, and to measure the delivery and effectiveness of such advertisements. This includes using previously collected information about your interests to select ads, processing data about what advertisements were shown, how often they were shown, when and where they were shown, and whether you took any action related to the advertisement, including for example clicking an ad or making a purchase.</p><h3>Content selection, delivery, reporting</h3><p>The collection of information, and combination with previously collected information, to select and deliver content for you, and to measure the delivery and effectiveness of such content. This includes using previously collected information about your interests to select content, processing data about what content was shown, how often or how long it was shown, when and where it was shown, and whether the you took any action related to the content, including for example clicking on content. This does not include personalisation, which is the collection and processing of information about your use of this service to subsequently personalise content and/or advertising for you in other contexts, such as websites or apps, over time.</p><h3>Measurement</h3><p>The collection of information about your use of the content, and combination with previously collected information, used to measure, understand, and report on your usage of the content.</p><p>Check out the Privacy Settings tab to manage your data.</p>","translations":{"en":{"title":"Further Cookie Information","titleMobile":"Further Cookie Information","content":"<p>We and our partners use technology such as cookies, on our site. We do this to improve and personalize your user experience, deliver content and ads across devices, provide social media features and analyze our traffic in order to improve the user experience on this site.&nbsp;</p><p>Marketing cookies are cookies that track visitors across websites. This is intended to help publishers and third parties provide visitors with relevant and engaging ads based on their activity. If you were to consent for us to place cookies on your browser, then the cookies will stay active until you opt-out. You can change your mind and alter your consent choices by clicking on the fingerprint at the bottom right of your screen at any time.</p><p>Our site uses the following partners’ cookies:&nbsp;</p><ul><li><strong>Google Adwords</strong> (Information storage and access, Personalization, Ad selection, delivery, reporting, and Measurement)&nbsp;</li><li><strong>Marketo</strong> (Information storage and access, Personalization, Ad selection, delivery, reporting, Content selection, delivery, reporting, and Measurement)&nbsp;</li><li><strong>LinkedIn</strong> (Ad selection, delivery, reporting)&nbsp;</li><li><strong>Hotjar</strong> (Measurement)&nbsp;</li><li><strong>Google</strong> <strong>ADX</strong> (Information storage and access, Personalization, Ad selection, delivery, reporting, and Measurement)&nbsp;</li><li><strong>Centro</strong> (Information storage and access)&nbsp;</li><li><strong>LiveRamp </strong>(Information storage and access, Personalization, Ad selection, delivery, reporting, Content selection, delivery, reporting, and Measurement)</li><li><strong>Vimeo</strong> (Information storage and access)&nbsp;</li><li><strong>Wistia</strong> (Information storage and access, Measurement)</li><li><strong>Double</strong> <strong>click</strong> (Information storage and access, Personalization, Ad selection, delivery, reporting, Content selection, delivery, reporting, and Measurement)</li><li><strong>Engagio</strong> (Information storage and access, Personalization, and Measurement)&nbsp;</li><li><strong>Google</strong> <strong>Analytics</strong> (Measurement)&nbsp;</li><li><strong>Bizible</strong> (Information storage and access, Personalization, Ad selection, delivery, reporting, Content selection, delivery, reporting, and Measurement)&nbsp;</li><li><strong>Google</strong> <strong>Tag</strong> <strong>Manager</strong> (Necessary, Information storage and access)</li><li><strong>Bing</strong> <strong>Ads</strong> (Information storage and access, Personalization, Ad selection, delivery, reporting, Content selection, delivery, reporting, and Measurement)</li><li><strong>Capterra</strong> (Information storage and access, Personalization, and Measurement)&nbsp;</li><li><strong>Facebook</strong> (Information storage and access, Ad selection, delivery, reporting, and Measurement)</li><li><strong>Twitter</strong> (Information storage and access, Ad selection, delivery, reporting, and Measurement)</li><li><strong>Terminus</strong> (Information storage and access, Personalization, Ad selection, delivery, reporting, Content selection, delivery, reporting, and Measurement)&nbsp;</li><li><strong>Visual</strong> <strong>Website</strong> <strong>Optimizer</strong> (Personalization, and Measurement)&nbsp;</li><li><strong>AirPR</strong> (Information storage and access, and Measurement)&nbsp;</li><li><strong>Pippio</strong> (Ad selection, delivery, reporting, and Measurement)&nbsp;</li><li><strong>Drift</strong> (Information storage and access, Measurement)</li></ul><p>The Cookies used on our site may gather the following information:&nbsp;</p><ul><li>Browser settings</li><li>Your device’s operating system</li><li>IP address</li><li>Cookie information</li><li>Identifiers assigned to your device</li><li>Location of a device when accessing our site</li><li>Device activity, including webpages and mobile apps visited or used</li><li>Actions performed on this site</li></ul><p>For more information about LiveRamp’s processing activities, please visit our <a href=\"https://liveramp.com/privacy/web-privacy-policy/\" target=\"_blank\" style=\"color: rgb(9, 78, 192);\">Privacy Policy</a></p>"},"de":{"title":"Warum sollten Sie zustimmen?","titleMobile":"Warum?","content":"<p>Um ein erfolgreiches Online-Geschäft zu betreiben, speichern wir und Drittanbieter Informationen auf Ihrem Endgerät in Form von Cookies und anderen Technologien. Einige Drittanbieter verarbeiten auch personenbezogene Daten um Ihnen personalisierte Inhalte und Werbeanzeigen zu zeigen. Dies kann auch auf Webseiten geschehen, die nicht unsere sind.</p><p>Ihre Einwilligung ist sowohl für die Verwendung von Cookies als auch für die Verarbeitung Ihrer persönlichen Daten erforderlich.</p><p>Unter dem Reiter Datenschutzeinstellungen können Sie selbst entscheiden, wer Cookies setzen darf und wer auf Ihre Daten zugreifen darf. Sie können jederzeit die Einstellungen einsehen, anpassen und ändern.</p><h1>Wofür wird Ihre Einwilligung benötigt?</h1><p>Wir und Drittanbieter nutzen Cookies und verarbeiten personenbezogene Daten aus den folgenden Gründen:</p><h3>Speicherung und Zugriff auf Informationen</h3><p>Die Speicherung von Informationen oder der Zugriff auf Informationen, die bereits gespeichert wurden, auf Anwendergeräten, wie beispielsweise der Zugriff auf Werbeidentifikatoren und/oder sonstige Geräteidentifikatoren, und/oder die Verwendung von Cookies oder ähnlichen Technologien.</p><h3>Personalisierung</h3><p>Die Erhebung und Verarbeitung von Informationen über Benutzer einer Site, um nachfolgend Werbung in anderen Zusammenhängen, d. h. auf anderen Sites oder Apps, im Laufe der Zeit nutzerspezifisch anzupassen. Normalerweise wird der Inhalt der Site oder App herangezogen, um Rückschlüsse auf die Interessen der Benutzer zu ermöglichen, an denen sich die zukünftige Auswahl orientiert.</p><h3>Auswahl, Schaltung und Auswertung von Anzeigen</h3><p>Die Erhebung von Informationen und die Verknüpfung mit zuvor erhobenen Informationen, die Auswahl und Schaltung von Werbungen und die Bewertung der Schaltung und der Wirksamkeit dieser Werbungen. Dies umfasst die Nutzung bereits erhobener Informationen über die Interessen der Benutzer, um Werbeanzeigen auszuwählen, Daten darüber zu verarbeiten, welche Werbungen angezeigt wurden, wie oft diese angezeigt wurden, wann und wo sie angezeigt wurden und ob auf die Werbung eine Handlung gefolgt ist, wie zum Beispiel das Klicken auf eine Anzeige oder ein Einkauf.</p><h3>Auswahl, Schaltung und Auswertung von Inhalten</h3><p>Die Erhebung von Informationen und die Verknüpfung mit zuvor erhobenen Informationen, die Auswahl und Schaltung von Inhalten und die Bewertung der Schaltung und der Wirksamkeit dieser Inhalte. Dies umfasst die Nutzung bereits erhobener Informationen über die Interessen der Benutzer, um Inhalte auszuwählen, Daten darüber zu verarbeiten, welche Inhalte angezeigt wurden, wie oft diese angezeigt wurden, wann und wo sie angezeigt wurden und ob auf den Inhalt eine Handlung gefolgt ist, wie zum Beispiel das Klicken auf einen Inhalt.</p><h3>Bewertung</h3><p>Die Erhebung von Informationen über die Nutzung der Inhalte durch den Benutzer und die Verknüpfung mit zuvor erhobenen Informationen, die herangezogen werden, um die Benutzer-Nutzung der Inhalte zu bewerten, zu verstehen und darüber zu berichten.</p><p>Überprüfen Sie die Registerkarte \"Datenschutzeinstellungen\", um Ihre Daten zu verwalten.</p>"},"it":{"title":"Perché avete bisogno del mio consenso?","titleMobile":"Perché?","content":"<p>Al fine di costruire un business online di successo, [[[NAME SITE]]] e terze parti conservano e accedono alle informazioni sul tuo dispositivo mediante l'utilizzo di cookie e altre tecnologie. Alcune terze parti elaborano inoltre i dati personali allo scopo di fornirti contenuti e annunci personalizzati, anche su siti web diversi dal nostro.</p><p>Abbiamo bisogno del tuo consenso sia per impostare i cookie sia per trattare i tuoi dati personali.</p><p>La scheda \"Impostazioni di privacy\" consente di autorizzare solo determinati utilizzi o terze parti escludendone altri. È possibile modificare queste impostazioni in qualsiasi momento.</p><h1>Per quali finalità è necessario il mio consenso?</h1><p>Noi e terze parti utilizzano i cookie e trattano i dati personali per le finalità indicate di seguito.</p><h1>Conservazione e accesso alle informazioni</h1><p>La conservazione di informazioni o l’accesso a informazioni già conservate sul dispositivo dell’utente come l’accesso a identificativi pubblicitari e/o altri identificativi del dispositivo e/o l’utilizzo di cookie o tecnologie simili.</p><h1>Personalizzazione</h1><p>La raccolta e il trattamento di informazioni sull’utente di un sito per la successiva personalizzazione della pubblicità per il medesimo utente in altri contesti, ad esempio in altri siti o app, nel tempo. In genere, i contenuti del sito o dell’app sono utilizzati per dedurre gli interessi degli utenti, in base ai quali informare le selezioni future.</p><h1>Selezione degli annunci, distribuzione, reporting</h1><p>La raccolta di informazioni e la combinazione con informazioni precedentemente raccolte, per selezionare e distribuire annunci pubblicitari e per misurare la distribuzione e l’efficacia di tali annunci pubblicitari. Ciò include l’utilizzo delle informazioni raccolte in precedenza sugli interessi degli utenti per selezionare gli annunci, il trattamento dei dati sugli annunci che sono stati visualizzati, la frequenza con cui sono stati visualizzati, quando e dove sono stati visualizzati e se è stata intrapresa una qualsiasi azione correlata all’annuncio, incluso ad esempio facendo clic sull’annuncio o effettuando un acquisto.</p><h1>Selezione dei contenuti, distribuzione, reporting</h1><p>La raccolta di informazioni e la combinazione con informazioni precedentemente raccolte, per selezionare e distribuire contenuti e per misurare la distribuzione e l’efficacia di tali contenuti. Ciò include l’utilizzo delle informazioni raccolte in precedenza sugli interessi degli utenti per selezionare i contenuti, il trattamento dei dati sui contenuti che sono stati visualizzati, la frequenza con cui e per quanto tempo sono stati visualizzati, quando e dove sono stati visualizzati e se è stata intrapresa una qualsiasi azione correlata ai contenuti, incluso ad esempio facendo clic sui contenuti.</p><h1>Misurazione</h1><p>La raccolta di informazioni sull’utilizzo dei contenuti da parte dell’utente e la loro combinazione con informazioni raccolte in precedenza, utilizzate per misurare, comprendere e stilare un report sull’utilizzo dei contenuti da parte degli utenti.</p><p>Accedi alla scheda \"Impostazioni di privacy\" per gestire i tuoi dati.</p>"},"fr":{"title":"Pourquoi vous faut-il mon consentement?","titleMobile":"Pourquoi?","content":"<p><p>Afin de mener une activité prospère en ligne, [[[NAME SITE]]]] et des sociétés tierces stockent et accèdent à des informations sur votre appareil à l’aide de cookies et d’autres technologies. Plusieurs tierces parties traitent également des données à caractère personnel pour vous présenter des contenus et publicités personnalisés. Cela peut également se produire sur des sites que ne nous appartiennent pas.</p><p>Votre consentement est nécessaire à la fois pour placer des cookies et pour traiter vos données à caractère personnel.</p><p>Si vous souhaitez autoriser certains usages ou tierces parties mais pas d’autres, vous pouvez le faire sous l’onglet Paramètres de confidentialité. En outre, vous pouvez toujours revenir et vérifier vos choix par la suite.</p><h1>Pourquoi en avez-vous besoin ?</h1><p>Nous et les tierces parties mentionnées utilisons des cookies et traitons des données à caractère personnel pour les finalités suivantes:</p><h1>Conservation des informations et accès aux informations</h1><p>Conservation d’informations ou accès à des informations déjà conservées sur l’appareil d’un utilisateur, par exemple accès aux identifiants publicitaires ou aux identifiants de l’appareil, ou utilisation de cookies ou de technologies similaires.</p><h1>Personnalisation</h1><p>Collecte et traitement d’informations relatives à l’utilisateur d’un site afin de lui adresser, ultérieurement, des publicités personnalisées dans d’autres contextes (par exemple sur d’autres sites ou applications). En général, le contenu du site ou de l’application est utilisé pour faire des déductions concernant les intérêts de l’utilisateur, ce qui sera utile dans le cadre de sélections ultérieures.</p><h1>Sélection, affichage et rapport sur les publicités</h1><p>Collecte d’informations que l’on associe à des informations collectées précédemment pour sélectionner et diffuser des publicités, et évaluer leur diffusion et leur efficacité. Cela comprend : le fait d’utiliser des informations collectées précédemment relativement aux intérêts de l’utilisateur afin de sélectionner des publicités ; le traitement de données indiquant quelles publicités ont été affichées et à quelle fréquence, à quel moment et où elles ont été affichées ; et le fait de savoir si l’utilisateur a fait quelque chose par rapport auxdites publicités, par exemple s’il a cliqué dessus ou effectué un achat.</p><h1>Sélection, diffusion et signalement de contenu</h1><p>Collecte d’informations que l’on associe à des informations collectées précédemment afin de sélectionner et de diffuser du contenu, et d’évaluer ensuite la diffusion et l’efficacité dudit contenu. Cela comprend : le fait d’utiliser des informations collectées précédemment relativement aux intérêts de l’utilisateur afin de sélectionner du contenu ; le traitement de données indiquant quel contenu a été affiché, à quelle fréquence, pendant combien de temps, à quel moment et où il a été affiché ; et le fait de savoir si l’utilisateur a fait quelque chose par rapport audit contenu, par exemple s’il a cliqué dessus.</p><h1>Évaluation</h1><p>Collecte d’informations relatives à l’utilisation du contenu par l’utilisateur et association desdites informations avec des informations précédemment collectées afin d’évaluer, de comprendre et de rendre compte de la façon dont l’utilisateur utilise le contenu.</p><p>Consultez l’onglet \"Paramètres de confidentialité\" pour gérer vos données.</p></p>"},"bg":{"title":"За какво давам съгласието си?","titleMobile":"За какво","content":"<p>За да можем да продължим нормалната си работа, ние и трети страни събират и достъпват информация на Вашето устройство, като използват бисквитки и подобни технологии. Подбрани и внимателно контролирани трети страни също са получили достъп до събиране и обработка на Вашите лични данни за целите на персонализираното съдържание и реклама и за измерване на Вашето поведение на сайтовете и мобилните приложения.</p><p>Ние използваме само стандартни и универсално приети индустриални методи за онлайн събиране, обработка, съхранение и трансфер на данни.</p><p>Вашето съгласие е необходимо както за работа с бисквитките, така и за обработка на личните Ви данни.</p><p>Ако искате да позволите само на определени трети страни да поставят бисквитки и да обработват личните Ви данни, използвайте таб Настройки за поверителност. Винаги можете да кликнете на бтуона с \"пръстовия отпечатък\", за да отидете на Настройки за поверителност и да промените изборите си.</p><h1>За какво давам съгласието си?</h1><p>Ние и трети страни използваме бисквитки и обработвам лични данни за следните цели:</p><h3>Съхранение и достъп до информация</h3><p>Съхранението на информация или достъпът до вече запазена информация на Вашето устройство, като достъп до идентификатори на реклами, идентификатори на устройства, бисквитки и подобни технологии.</p><h3>Персонализиране</h3><p>Събирането и обработването на информация за Вашето ползване на тази услуга с цел впоследствие рекламата и/или съдържанието да се персонализира за Вас в други контексти, т.е. на други уеб сайтове или приложения, с течение на времето. Обикновено съдържанието на уеб сайта или приложението се използват, за да се направят изводи за Вашите интереси, които да формират бъдещи подбори на реклами и/или съдържание.</p><h3>Избор на реклама, доставяне, отчитане</h3><p>Събирането на информация и съчетаването с предварително събрана информация за подбор и предоставяне на реклами за Вас, както и за измерване на доставянето и ефективността на такива реклами. Това включва използването на предварително събрана информация относно Вашите интереси с цел да се подберат реклами, да се обработват данните за това, какви реклами са били показвани, колко често са били показвани, кога и къде са били показвани и дали сте предприели действия, свързани с рекламата, включително например кликване върху дадена реклама или извършване на покупка. Това не включва персонализиране, което е събирането и обработването на информация за използването на тази услуга, за да персонализираме впоследствие рекламата и/или съдържанието за Вас в други контексти, като уеб сайтове или приложения, с течение на времето.</p><h3>Избор на съдържание, доставяне, отчитане</h3><p>Събирането на информация и съчетаването с предварително събрана информация с цел подбор и предоставяне на съдържание, както и измерване на доставянето и ефективността на такова съдържание. Това включва използването на предварително събрана информация относно Вашите интереси с цел да се подбере съдържание, да се обработят данни за това, какво съдържание е било показано, колко често или колко дълго е било показвано, кога и къде е било показвано и дали са предприемани действия, свързани със съдържанието например кликване върху съдържание. Това не включва Персонализиране, което е събирането и обработването на информация за Вашето използване на тази услуга, за да персонализираме впоследствие съдържанието и/или рекламата за Вас в други контексти, като уеб сайтове или приложения, с течение на времето.</p><h3>Измерване</h3><p>Събирането на информация за използването на съдържанието от Вас и съчетаването с предварително събрана информация, използвана за измерване, разбиране и отчитане на Вашето използване на услугата. Това не включва Персонализиране, събирането на информация за Вашето използване на тази услуга, за да персонализираме впоследствие съдържанието и/или рекламата в друг контекст, т.е. при други услуги, като уеб сайтове или приложения, с течение на времето.</p>"},"nl":{"title":"Waarom hebben jullie mijn toestemming nodig?","titleMobile":"Waarom?","content":"<p>Om u een ​​succesvolle online service of content te kunnen aanbieden, slaan zowel wij als derden informatie op uw apparaat op met behulp van cookies en andere technologieën, en lezen zij vervolgens die informatie ook weer uit. Meerdere derden verwerken daarbij ook persoonsgegevens om u gepersonaliseerde inhoud en advertenties te tonen. Dit kan ook op websites zijn die niet van ons zijn.</p><p>Uw toestemming is nodig voor zowel het plaatsen van cookies als het verwerken van uw persoonsgegevens. Als u klikt op Accepteer alles gaat u ermee akkoord dat wij en alle derden die zijn genoemd in onze Privacy en Cookie Verklaring cookies plaatsen en uw persoonsgegevens verwerken voor het doel van analytics, personalisatie en advertenties.</p><p>Als u alleen bepaalde doelen of partijen wilt toestaan dan kunt u dit onder de tab Privacy Instellingen doen. U kunt hier ook altijd terugkomen om uw keuzes te bekijken en aan te passen door op de privacy fingerprint te klikken op onze websites.</p><h1>Waar hebben jullie mijn toestemming voor nodig?</h1><p>Wij en derde partijen gebruiken cookies en verwerken persoonsgegevens voor de volgende doeleinden:</p><h3>Opslag van en toegang tot informatie</h3><p>De opslag van informatie of toegang tot informatie die reeds is opgeslagen op gebruikersapparatuur zoals toegang tot reclame-identifiers en/of andere apparatuur-identifiers en/of het gebruik van cookies of soortgelijke technologieën.</p><h3>Personalisatie</h3><p>Het verzamelen en verwerken van informatie over de gebruiker van een site om vervolgens in de loop van de tijd reclame af te stemmen op de gebruiker in andere contexten, d.w.z. op andere sites of apps. De inhoud van de site of app wordt in principe gebruikt om conclusies te trekken over interesses van de gebruiker ten behoeve van toekomstige selecties en voorkeuren.</p><h3>Reclame selectie, -levering en -rapportage</h3><p>Het verzamelen van informatie en de combinatie met eerder verzamelde informatie voor het selecteren en leveren van reclame en om de levering en de doeltreffendheid van dergelijke reclame te meten. Dit omvat het gebruik van eerder verzamelde informatie over interesses van gebruikers om reclame te selecteren, de verwerking van gegevens over welke reclame wordt getoond, hoe vaak deze werd getoond, wanneer en waar deze werd getoond en of er actie werd ondernomen in verband met de reclame, met inbegrip van bijvoorbeeld het klikken op reclame of het verrichten van een aankoop.</p><h3>Inhoud selectie, -levering en -rapportage</h3><p>Het verzamelen van informatie en de combinatie met eerder verzamelde informatie voor het selecteren en leveren van inhoud en om de levering en de doeltreffendheid van dergelijke inhoud te meten. Dit omvat het gebruik van eerder verzamelde informatie over interesses van de gebruiker om inhoud te selecteren, de verwerking van gegevens over welke inhoud werd getoond, hoe vaak of hoe lang deze werd getoond, wanneer en waar deze werd getoond of er actie werd ondernomen in verband met de inhoud, met inbegrip van bijvoorbeeld het klikken op inhoud.</p><h3>Metingen</h3><p>Het verzamelen van informatie over het gebruik van inhoud door de gebruiker en de combinatie met eerder verzamelde informatie die gebruikt wordt voor het meten van, inzicht krijgen in en rapporteren van het gebruik van de inhoud door de gebruiker.</p>"}}}]},"loggingConsentExternally":true,"storePublisherConsentGlobally":false,"faktorId":null,"fingerprintConfig":{"backgroundColor":"rgb(115,192,107)","id":"fingerprint","position":"bottomLeft","color":"rgb(249,249,249)","gradient":{"isSet":false,"topColor":"#DD8257","bottomColor":"#2A9CD2"}},"allowedAcceptAllUrls":".*","storeConsentGlobally":false,"enableRevokeAll":false,"forceLocale":null,"allowedRevokeAllUrls":".*","additionalVendorIds":[18,17,5,21,92,93,94,16,15,90,4,95,50,100,98,6,32,91,171,170,174],"syncWithGlobalCookies":false,"gdprApplies":true,"siteId":"b4826de8-0c24-44f4-a1b5-194cd70a93fb","logging":false,"configVersion":44});

    

function portalTagc4a114bc() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'linkedin_consent'
});

}

function portalTaga09d24bc() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'hotjar_consent'
});

}

function portalTagd01b2d1c() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'adroll_inc_consent'
});

}

function portalTag1e27f26e() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'airpr_consent'
});

}

function portalTag97db3f6d() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'bing_consent'
});

}

function portalTag2232f509() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'bizible__consent'
});

}

function portalTagf5ae6dc7() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'google_analytics_consent'
});

}

function portalTag26a116b5() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'capterra_consent'
});

}

function portalTagcc800d18() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'centro_inc_consent'
});

}

function portalTag982cd785() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'engagio_consent'
});

}

function portalTag3f8ba3bb() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'facebook_consent'
});

}

function portalTag0b9aee10() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'marketo_munchkin_consent'
});

}

function portalTagdfcccfd8() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'terminus_consent'
});

}

function portalTag01dd2dfe() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'twitter_consent'
});

}

function portalTag94ade377() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'listenloop_consent'
});

}

function portalTage3ad3bb9() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'google_ads_consent'
});

}

function portalTageddb224d() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'visual_website_optimizer_consent'
});

}

function portalTag98f87b57() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'driftcominc_consent'
});

}

function portalTag8b14a7ad() {
  
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    'event': 'liveramp_inc_consent'
});

}


function hasConsent(given, expected) {
  return expected.every(function (value) {
      return given[value];
  });
};

function checkConsent() {
  window.__cmp('consentDataExist', null, function(consentDataExist) {
    if (consentDataExist) {
      window.__cmp('getVendorConsents', null, function(vendorConsents) {
        window.__cmp('getAdditionalVendorConsents', null, function(additionalVendorConsents) {
          
if ((![1,3] || [1,3].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,3]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![18] || [18].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [18]))) {
    portalTagc4a114bc();
}

if ((![1,5] || [1,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![17] || [17].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [17]))) {
    portalTaga09d24bc();
}

if ((![1] || [1].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1]))
  && (![130] || [130].length <= 0 || hasConsent(vendorConsents.vendorConsents, [130]))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, []))) {
    portalTagd01b2d1c();
}

if ((![5] || [5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![100] || [100].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [100]))) {
    portalTag1e27f26e();
}

if ((![1,3] || [1,3].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,3]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![21] || [21].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [21]))) {
    portalTag97db3f6d();
}

if ((![1,2,3,4,5] || [1,2,3,4,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,2,3,4,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![92] || [92].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [92]))) {
    portalTag2232f509();
}

if ((![1,5] || [1,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![4] || [4].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [4]))) {
    portalTagf5ae6dc7();
}

if ((![1,2,3,4,5] || [1,2,3,4,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,2,3,4,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![93] || [93].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [93]))) {
    portalTag26a116b5();
}

if ((![1] || [1].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1]))
  && (![156] || [156].length <= 0 || hasConsent(vendorConsents.vendorConsents, [156]))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, []))) {
    portalTagcc800d18();
}

if ((![1,2,3,4,5] || [1,2,3,4,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,2,3,4,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![94] || [94].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [94]))) {
    portalTag982cd785();
}

if ((![1,3] || [1,3].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,3]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![16] || [16].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [16]))) {
    portalTag3f8ba3bb();
}

if ((![1,2,3,4,5] || [1,2,3,4,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,2,3,4,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![90] || [90].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [90]))) {
    portalTag0b9aee10();
}

if ((![1,2,3,4,5] || [1,2,3,4,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,2,3,4,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![95] || [95].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [95]))) {
    portalTagdfcccfd8();
}

if ((![1,3] || [1,3].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,3]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![15] || [15].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [15]))) {
    portalTag01dd2dfe();
}

if ((![3] || [3].length <= 0 || hasConsent(vendorConsents.purposeConsents, [3]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![97] || [97].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [97]))) {
    portalTag94ade377();
}

if ((![1,2,3,5] || [1,2,3,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,2,3,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![91] || [91].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [91]))) {
    portalTage3ad3bb9();
}

if ((![] || [].length <= 0 || hasConsent(vendorConsents.purposeConsents, []))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![134] || [134].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [134]))) {
    portalTageddb224d();
}

if ((![1,5] || [1,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,5]))
  && (![] || [].length <= 0 || hasConsent(vendorConsents.vendorConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![174] || [174].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, [174]))) {
    portalTag98f87b57();
}

if ((![1,2,3,4,5] || [1,2,3,4,5].length <= 0 || hasConsent(vendorConsents.purposeConsents, [1,2,3,4,5]))
  && (![97] || [97].length <= 0 || hasConsent(vendorConsents.vendorConsents, [97]))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.purposeConsents, []))
  && (![] || [].length <= 0 || hasConsent(additionalVendorConsents.vendorConsents, []))) {
    portalTag8b14a7ad();
}

        });
      });
    }
  });
}

window.__cmp('addEventListener', 'cmpReady', function () {
  checkConsent();
});

window.__cmp('addEventListener', 'consentChanged', function () {
  checkConsent();
});

};

cmp.onerror = function (e) {
    console.log('Script not loaded due to: ', e);
};


      if (/MSIE/.test(navigator.userAgent)) {
        console.log("Your browser doesn't support full CMP. Please update to a more recent one. Till then we will fallback to the headless CMP version.");
        var fallbackEvent = document.createEvent('Event');
			  fallbackEvent.initEvent('fallbackToHeadlessCmp', true, false);
			  document.dispatchEvent(fallbackEvent);
        cmp.src = 'https://cmp.choice.faktor.io/dist/headless/1.2/cmp.bundle.js';
      } else {
        cmp.src = 'https://cmp.choice.faktor.io/dist/1.2/cmp.bundle.js';
      }
    

var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(cmp, node);
