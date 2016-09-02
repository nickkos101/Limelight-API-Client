<?php

class LimeLight_Client {

  public $api_baseurl;
  public $api_endpoint;
  public $api_username;
  public $api_password;

  function __construct($api_username, $api_password, $api_baseurl) {

    $this->api_baseurl  = $api_baseurl;
    $this->api_username = $api_username;
    $this->api_password = $api_password;

  }

  function get_api_endpoint($api_type) {

    if ($api_type === 'membership') {
      $this->api_endpoint = $this->api_baseurl.'membership.php';
    } elseif ($api_type === 'transaction') {
      $this->api_endpoint = $this->api_baseurl.'transact.php';
    } else {
      exit();
    }

    return $this->api_endpoint;

  }

  function get_response($api_method, $api_type, $parameters) {

    //Push the limelight credentials and endpoint into the data to be transmitted

    $parameters['username'] = $this->api_username;
    $parameters['password'] = $this->api_password;
    $parameters['method'] = $api_method;

    $this->api_endpoint = $this->get_api_endpoint($api_type);

    $curl_handler = curl_init();

    curl_setopt($curl_handler, CURLOPT_HEADER, FALSE);
    curl_setopt($curl_handler, CURLOPT_POST, TRUE);
    curl_setopt($curl_handler, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl_handler, CURLOPT_URL, $this->api_endpoint);

    parse_str(curl_exec($curl_handler), $output);
    curl_close($curl_handler);

    return $output;

  }

}
