# Limelight-API-Client
A reusable class to connect to the LimeLight CRM API.


## Usage 

Include the class in your project and create a new instance of it.
```
$api_client = new LimeLight_Client(YOUR_LIMELIGHT_API_USERNAME, YOUR_LIMELIGHT_API_PASSWORD, YOUR_LIMELIGHT_API_BASEURL);
```
To get the response for any API method call the get_response() member function.
    
### Membership API Methods - 
http://help.limelightcrm.com/entries/317874-Membership-API-Documentation

Example Lookup Customer
  
  ```
  
  $parameters = array(
    'customer_id' => 323423,
  );
  
  $response = $api_client->get_response('customer_view','membership',$parameters);
  
  ```

### Transaction API Methods - 
http://help.limelightcrm.com/entries/22934241-Transaction-API-Documentation

Example New Prospect

```

 $parameters    = array(
    'firstName'  => 'Nick',
    'lastName'   => 'Koskowski',
    'address1'   => '',
    'address2'   => '',
    'city'       => 'San Diego',
    'state'      => 'CA',
    'zip'        => '92021',
    'country'    => 'US',
    'email'      => 'nickkoskowski@gmail.com',
    'ipAddress'  => '',
    'AFID'       => 'AEIOU',
    'campaignId' => 32,
  );
  
  $response = $api_client->get_response('new_prospect','transaction',$parameters);
  
  ```
