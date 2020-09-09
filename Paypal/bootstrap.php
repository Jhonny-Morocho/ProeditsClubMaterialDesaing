<?php 
    require __DIR__ .'/vendor/autoload.php';
    use PayPal\Rest\ApiContex;
    use PayPal\Auth\OAuthTokenCredential;
   

    

    $modDev = true;//false para q este en modo real

    if($modDev) {

    	define('URL_SITIO','http://localhost/ProeditsClubMaterialDesaing');
        
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                    'AU9i9nbVJv4j1pf-AytaMqSWw_5jXXpfKZSccADUMF5w86gHangspAt7vDmqG5sPECRhemYWRvNioxwP',
                    'EHFOIpNnimC4lbSyhPMPe8MuUaRmmpoM27hjWY_5p4WLcFco-HkLuXgNZFH3neXL9snHF2ZsS0wNVsyN'
                )
        );

        $apiContext->setConfig(
            array(
                    'mode' => 'sandbox',
                    'log.LogEnabled' => true,
                    'log.FileName' => 'PayPal.log',
                    'log.LogLevel' => 'DEBUG'
                )
        );

    } else {

    	define('URL_SITIO','http://proeditsclub.com');
	 	
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                    'AcoLZONEouMB-aKL4TUMB5lCBtnTNEFzt2R6CF2XN4mPI_IZGl0SgRwgjk1Nr-ccCyJZ2-zUrzw2OBYk',
                    'EKV7yx85Qr5WH34p2efjVPCQTh_V6Ip47f2Fnc2eWiaQpoiR5ZAL0mSqGTrGBh6ECGqZmoTS66JNsXVt'
                )
        );

        $apiContext->setConfig(
            array(
                    'mode' => 'live',
                    'log.LogEnabled' => true,
                    'log.FileName' => 'PayPal.log',
                    'log.LogLevel' => 'DEBUG'
                )
        );
    }

 ?>