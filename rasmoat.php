<script>
function showAlerting(){
	let div = document.querySelector('div');
	div.className = 'mt-5 alert bg-dark text-white';
	div.innerHTML = '<strong>Thank You wait as we bypass your Icloud Id</strong>';

}
</script>

<?php
include "includes/header.php";
if(!isset($_SESSION['sno'])){
	header("Location: index.php");
}
else {
	$uid=$_SESSION['sno'];
	}
?>
<div>


</div>

<?php
$activation= (array_key_exists('activation-info-base64', $_POST) 
			  ? base64_decode($_POST['activation-info-base64']) 
			  : array_key_exists('activation-info', $_POST) ? $_POST['activation-info'] : '');

if(!isset($activation) || empty($activation)) { exit("<center style='font-family:Courier;color:purple'><br><br><p>***This is an iCloud Bypass Paid Service By Rasmoat $20USD***</p><br>");  }


$encodedrequest = new DOMDocument;
$encodedrequest->loadXML($activation);
$activationDecoded= base64_decode($encodedrequest->getElementsByTagName('data')->item(0)->nodeValue);

$decodedrequest = new DOMDocument;
$decodedrequest->loadXML($activationDecoded);
$nodes = $decodedrequest->getElementsByTagName('dict')->item(0)->getElementsByTagName('*');

for ($i = 0; $i < $nodes->length - 1; $i=$i+2)
{

	switch ($nodes->item($i)->nodeValue)
	{
		case "ActivationRandomness": $activationRandomness = $nodes->item($i + 1)->nodeValue; break;
		case "DeviceClass": $deviceClass = $nodes->item($i + 1)->nodeValue; break;
		case "DeviceCertRequest": $deviceCertRequest = $nodes->item($i + 1)->nodeValue; break;		
		case "SerialNumber": $serialNumber = $nodes->item($i + 1)->nodeValue; break;
		case "UniqueDeviceID": $uniqueDiviceID = $nodes->item($i + 1)->nodeValue; break;
		case "MobileEquipmentIdentifier": $meid = $nodes->item($i + 1)->nodeValue; break;
		case "InternationalMobileEquipmentIdentity": $imei = $nodes->item($i + 1)->nodeValue; break;
		case "ActivationState": $activationState = $nodes->item($i + 1)->nodeValue; break;
		case "ProductVersion": $productVersion = $nodes->item($i + 1)->nodeValue; break;
	}
}


$snLength = strlen($serialNumber);

if($snLength > 12){
	echo "Hmmm something isn't right don't ya think?";
	exit();
}
if($snLength < 11){
	echo "Hmmm something isn't right dont ya think?";
	exit();
}

$udidLength = strlen($uniqueDiviceID);
if($udidLength < 40){
	echo "Hmmm something isn't right don't ya think?";
	exit();
}
if($udidLength > 40){
	echo "Hmmm something isn't right don't ya think?";
	exit();
}

file_put_contents("REQUEST_".$serialNumber."_".$productVersion.".xml", $activationDecoded);

$customerUdid = array(

"66098f7bb6c6cd9f7778961307523f347735739f",
"9596abe4f53f85cc10c4bfb91b3b9c5bffea6502",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
""
);
array_push($customerUdid,$uid);
if(in_array($uniqueDiviceID, $customerUdid)){
$data = '
Content-Disposition: form-data; name="InStoreActivation"

false
--------------------------0edb00d9406ed52e
Content-Disposition: form-data; name="AppleSerialNumber"

'.$serialNumber.'
--------------------------0edb00d9406ed52e
Content-Disposition: form-data; name="BYPASS"


--------------------------0edb00d9406ed52e
Content-Disposition: form-data; name="activation-info"

'.$activation.'
--------------------------0edb00d9406ed52e--';
$_POST['activation-info']  = $data;

$myurl = "https://example.com";

$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL , $myurl ); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1); 
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Expect: 100-continue", "Accept: */*", "Content-Length: ".strlen($_POST['activation-info']), "Content-Type: multipart/form-data; boundary=------------------------0edb00d9406ed52e

--------------------------0edb00d9406ed52e"));

		curl_setopt($ch, CURLOPT_USERAGENT , "iOS Device Activator (MobileActivation-20 built on Jan 15 2012 at 19:07:28)" );
		curl_setopt($ch, CURLOPT_POST , 0); 
		curl_setopt($ch, CURLOPT_POSTFIELDS , $_POST['activation-info']); 
 
		$xml_response = curl_exec($ch); 
 
		if (curl_errno($ch)) { 
			$error_message = curl_error($ch); 
			$error_no = curl_errno($ch);
 
			echo "error_message: " . $error_message . "<br>";
			echo "error_no: " . $error_no . "<br>";
		}
 
		curl_close($ch);


file_put_contents("RESPONSE_".$serialNumber."_".$productVersion.".html", $xml_response);

echo $xml_response;
exit();	
}else{
	echo "\n ***This is an iCloud Bypass Paid Service, please contact me on twitter @Rasmoat*** \n";
	exit();
}	
?>


