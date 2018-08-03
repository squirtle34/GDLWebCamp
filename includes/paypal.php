<?php


require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost:8888/gdlwebcamp');

$apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'AefY7De1NWXa8ApBtFUHzWQ2H30L54PkDmru0QZOieIbHQEtb1JT0CfAiImMLNmiRwc3BnnGeZJGXAHO',  // ClienteID
          'ENvQAhpPzN6JmdYJQLhZnMyIlDpYrl7ujVCnujUvpB2M4tBI_Ymqp9hB2oL0As8aH0RB1avl5bhAJHLX'  // Secret
      )
);

