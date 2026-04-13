<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	function printarray($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';	
	}
	function encode_url($string, $key="", $url_safe=TRUE)
{
    if($key==null || $key=="")
    {
        $key="sc_technology";
    }
      $CI =& get_instance();
      $ret = $CI->encrypt->encode($string, $key);

    if ($url_safe)
    {
        $ret = strtr(
                $ret,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );
    }

    return $ret;
}

 function decode_url($string, $key="")
{
	
     if($key==null || $key=="")
    {
        $key="sc_technology";
    }
        $CI =& get_instance();
    $string = strtr(
            $string,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );

    return $CI->encrypt->decode($string, $key);
}

 function myencryption($str){
return base64_encode($str);	 
 }
 
 function mydecryption($str){
return base64_decode($str);	 
 }
 
 




    
	function get_city_state_country($table,$id)
	{   
		 $CI = get_instance();
		 $CI->load->model('MY_Model');
		return $results = $CI->MY_Model->get_city_state_country($table,$id); 
		 
	}	

	/*------------ For Email Send Start -------------------------*/
	function email_send($to,$subject,$msg)
	{
	$ci = get_instance();
	$email_protocal=$ci->website['data']->email_protocal;
	if($email_protocal=='SMTP Email')
	{
	$config['protocol'] = "smtp";
	$config['smtp_host'] = $ci->website['data']->smtp_host_name;
	$config['smtp_port'] = $ci->website['data']->smtp_port;
	$config['smtp_user'] = $ci->website['data']->email_id; 
	$config['smtp_pass'] = $ci->website['data']->email_password;
	$config['charset'] = "utf-8";
	$config['mailtype'] = "html";
	$config['newline'] = "\r\n";
	$ci->load->library('email');
	$ci->email->initialize($config);		
	$ci->email->from($ci->website['data']->from_email_id, $ci->website['data']->company_name);
	$ci->email->to($to);
	$ci->email->bcc($ci->website['data']->bcc_email_id);
	$ci->email->subject($subject);
	$ci->email->message($msg);
	if ($ci->email->send()){
	return true;
	} else {
	return false;
	}
	}else{	
	$config = array();
	$config['useragent'] = "CodeIgniter";
	$config['mailpath'] = "/usr/sbin/sendmail"; 
	$config['protocol'] = "smtp";
	$config['smtp_host'] = "localhost";
	$config['smtp_port'] = "25";
	$config['mailtype'] = 'html';
	$config['charset']  = 'utf-8';
	$config['newline']  = "\r\n";
	$config['wordwrap'] = TRUE;
	$ci->load->library('email');
	$ci->email->initialize($config);
	$ci->email->from($ci->website['data']->from_email_id, $ci->website['data']->company_name);
	$ci->email->to($to);
	$ci->email->bcc($ci->website['data']->bcc_email_id);
	$ci->email->subject($subject);
	$ci->email->message($msg);
	if ($ci->email->send()){
	return true;
	} else {
	return false;
	}
	}
	}
	/*------------ For Email Send End -------------------------*/
	/*------------ For Sms Send Start -------------------------*/
	function sms_send($to,$message) {
	$ci = get_instance();
	$user=$ci->website['data']->sms_username; /* username */
	$password=$ci->website['data']->sms_password; /* password */
	$mobilenumbers=$to;  /* enter Mobile numbers comma seperated */
	$message = $message;  /* enter Your Message */
	$senderid=$ci->website['data']->sms_sender_id; /* senderid */
	$messagetype="N"; 
	$DReports="Y"; 
	$url="http://www.smscountry.com/SMSCwebservice_Bulk.aspx";
	$message = urlencode($message);
	$ch = curl_init();
	if (!$ch){die("Couldn't initialize a cURL handle");}
	$ret = curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt ($ch, CURLOPT_POSTFIELDS,
	"User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype&DR=$DReports");
	$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$curlresponse = curl_exec($ch);
	if(curl_errno($ch))
	/* echo 'curl error : '. curl_error($ch); */
	if (empty($ret)) {	
	/* die(curl_error($ch)); */
	curl_close($ch);		
	} else {
	$info = curl_getinfo($ch);
	curl_close($ch); 	
	}	
	$curlresponse=explode(':',$curlresponse);
	if($curlresponse[0]=='OK'){
	return true;	
	}else{
	return false;	
	}
	}
	/*------------ insurance and array function start -------------------------*/	




function download_pdf($policy_no)
{
	$message = <<<EOM
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:baj="http://bajaj.com/">
<soapenv:Header /> 
<soapenv:Body> 
<baj:downloadFile> 
<arg0> 
<password>feb@2018</password> 
<pdfMode>WS_POLICY_PDF</pdfMode> 
<policyNum>$policy_no</policyNum> 
<userId>travel@browsenbook.com</userId> 
</arg0> 
</baj:downloadFile> 
</soapenv:Body> 
</soapenv:Envelope>
EOM;
 $htmldatareq = htmlentities($message);
 
$_SESSION['insure']['request']=$htmldatareq;
 
$soap_do = curl_init("http://general.bajajallianz.com:80/docDownldWS/WebServiceImplService");
              
$header = array(
"Content-Type: text/xml;charset=UTF-8", 
"Accept: gzip,deflate", 
"Cache-Control: no-cache", 
"Pragma: no-cache", 
"SOAPAction: http://general.bajajallianz.com/docDownldWS/WebServiceImplService?wsdl/downloadFile",
"Content-length: ".strlen($message),
); 

	$response=curl_request($soap_do,$message,$header); 
	
	
	 $htmldata = htmlentities($response); 
	 $_SESSION['insure']['response']=$htmldata;

	return $response;
}
	/*------------ insurance and array function end -------------------------*/	


if (!function_exists('EncryptID'))
{
    function EncryptID($id)
    {
          $id=(double)$id*555355.24;
          return base64_encode($id);
    }
}
if (!function_exists('DecryptID'))
{
    function DecryptID($url_id)
    {
         $url_id=base64_decode($url_id);
         $id=(double)$url_id/555355.24;
         return $id;
    }
}
	