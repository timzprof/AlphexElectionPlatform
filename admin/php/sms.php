<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');
require_once 'ca4nafa3ga.php';

if (isset($_POST['voteSms'])) {
  $rec = $_POST['recipient'];
  $msg = $_POST['message'];
}
// Specify your authentication credentials
$username   = "alphexshii";
$apikey     = "775a70eda48c0b2939999ec4822df2b6ab667d02278a82961ab6adc48787053e";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+234 for Nigeria in this case)
$recipients = $rec;
// And of course we want our recipients to know what we really do
$message    = $msg;
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
/*************************************************************************************
  NOTE: If connecting to the sandbox:
  1. Use "sandbox" as the username
  2. Use the apiKey generated from your sandbox application
     https://account.africastalking.com/apps/sandbox/settings/key
  3. Add the "sandbox" flag to the constructor
  $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
**************************************************************************************/
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}
// DONE!!! 