<?php
class Insurance 
{
	function __construct()
	{
	// parent::__construct();	
	// newpas12
		// $this->load->helper('insure');
		$alldata=get_instance();
			/* printarray($alldata->website['data']->insurance_pss); */
		$this->creden='<pUserId_inout xsi:type="xsd:string">travel@browsenbook.com</pUserId_inout>
         <apassword xsi:type="xsd:string">'.$alldata->website['data']->insurance_pss.'</apassword>'; 
		
	 }
	
	function index()
	{
		/* echo "ddd";die; */
	}
     function get_age_plan_details()
	{
		// Travel Prime Age Silver 50,000 USD
		// Travel Prime Individual Silver 50,000 USD
	 $message = <<<EOM
<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://com/bajajallianz/BjazTravelWebservice.wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns1="http://com/bajajallianz/BjazTravelWebservice.wsdl/types/">
   <env:Header/>
   <env:Body>
      <ns:getPlanDetails>
      '.$this->creden.'
         <aPlanname xsi:type="xsd:string">Travel Prime Age Silver 50,000 USD</aPlanname>
         <pTrvPlanDtlsList_out xsi:type="ns1:BjazTrvPlanDtlsObjUserArray"/>
         <pTrvCoverDtlsList_out xsi:type="ns1:WeoTrvCoverUserArray"/>
         <pError_out xsi:type="ns1:WeoTygeErrorMessageUserArray"/>
         <pErrorCode_out xsi:type="xsd:decimal">0</pErrorCode_out>
      </ns:getPlanDetails>
   </env:Body>
</env:Envelope>
EOM;

$soap_do = curl_init("http://webservices.bajajallianz.com:80/BjazTravelWebservice/BjazTravelWebservicePort");
              
$header = array(
"Content-Type: text/xml;charset=UTF-8", 
"Accept: gzip,deflate", 
"Cache-Control: no-cache", 
"Pragma: no-cache", 
// "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/bjazWebserviceTravelPlan",
/* "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/getPlanDetails", */
"SOAPAction: http://webservices.bajajallianz.com/BjazTravelWebservice/BjazTravelWebservicePort?WSDL/getPlanDetails",
"Content-length: ".strlen($message),
); 

	$response=SELF::curl_request($soap_do,$message,$header); 
	
		
	return $response;
	}  
	function get_plan_details()
	{
		// Travel Prime Age Silver 50,000 USD
		// Travel Prime Individual Silver 50,000 USD
	 $message = <<<EOM
<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://com/bajajallianz/BjazTravelWebservice.wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns1="http://com/bajajallianz/BjazTravelWebservice.wsdl/types/">
   <env:Header/>
   <env:Body>
      <ns:getPlanDetails>
      '.$this->creden.'
         <aPlanname xsi:type="xsd:string">Travel Prime Individual Silver 50,000 USD</aPlanname>
         <pTrvPlanDtlsList_out xsi:type="ns1:BjazTrvPlanDtlsObjUserArray"/>
         <pTrvCoverDtlsList_out xsi:type="ns1:WeoTrvCoverUserArray"/>
         <pError_out xsi:type="ns1:WeoTygeErrorMessageUserArray"/>
         <pErrorCode_out xsi:type="xsd:decimal">0</pErrorCode_out>
      </ns:getPlanDetails>
   </env:Body>
</env:Envelope>
EOM;

// echo htmlentities($message);
$soap_do = curl_init("http://webservices.bajajallianz.com:80/BjazTravelWebservice/BjazTravelWebservicePort");
              
$header = array(
"Content-Type: text/xml;charset=UTF-8", 
"Accept: gzip,deflate", 
"Cache-Control: no-cache", 
"Pragma: no-cache", 
// "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/bjazWebserviceTravelPlan",
/* "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/getPlanDetails", */
"SOAPAction: http://webservices.bajajallianz.com/BjazTravelWebservice/BjazTravelWebservicePort?WSDL/getPlanDetails",
"Content-length: ".strlen($message),
); 

	$response=SELF::curl_request($soap_do,$message,$header); 
	
		
	return $response;
	} 

 function get_plan_domestic()
{
		// Travel Prime Age Silver 50,000 USD
		// Travel Prime Individual Silver 50,000 USD
	 $message = <<<EOM
<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://com/bajajallianz/BjazTravelWebservice.wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns1="http://com/bajajallianz/BjazTravelWebservice.wsdl/types/">
   <env:Header/>
   <env:Body>
      <ns:getPlanDetails>
         '.$this->creden.'
         <aPlanname xsi:type="xsd:string">E-Travel</aPlanname>
         <pTrvPlanDtlsList_out xsi:type="ns1:BjazTrvPlanDtlsObjUserArray"/>
         <pTrvCoverDtlsList_out xsi:type="ns1:WeoTrvCoverUserArray"/>
         <pError_out xsi:type="ns1:WeoTygeErrorMessageUserArray"/>
         <pErrorCode_out xsi:type="xsd:decimal">0</pErrorCode_out>
      </ns:getPlanDetails>
   </env:Body>
</env:Envelope>
EOM;
// echo htmlentities($message); 
/* echo "-----------------------------------------"; */
$soap_do = curl_init("http://webservices.bajajallianz.com:80/BjazTravelWebservice/BjazTravelWebservicePort");
              
$header = array(
"Content-Type: text/xml;charset=UTF-8", 
"Accept: gzip,deflate", 
"Cache-Control: no-cache", 
"Pragma: no-cache", 
// "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/bjazWebserviceTravelPlan",
 // "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/getPlanDetails", 
"SOAPAction: http://webservices.bajajallianz.com/BjazTravelWebservice/BjazTravelWebservicePort?WSDL/getPlanDetails",
"Content-length: ".strlen($message),
); 

	$response=SELF::curl_request($soap_do,$message,$header); 
	// echo htmlentities($response);
		// die;
	return $response;
	} 

function curl_request($soap_do,$message,$header)
{
curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false); 
curl_setopt($soap_do, CURLOPT_POST, true ); 
curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message); 
curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header); 
curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
$return = curl_exec($soap_do);
curl_close($soap_do);
// echo htmlentities($return);
return $return;

	
}



function send_request_insurance($plan_name,$paxval,$pax,$random_data)
{
	$destination_code=$random_data['destination_code']; 
	$fromDate=$random_data['fromDate'];
	$arrDate=$random_data['arrDate'];
	$titlee=$paxval['title'];
	$paxname=$paxval['first_name'];
	$last_name=$paxval['last_name'];
	$passport=$paxval['passport'];
	$dobb=$paxval['dob'];
	$dob=date('d-M-Y',strtotime($dobb));
	$mobile=$pax['leadpax']['mobile'];
	$emailid=$pax['leadpax']['emailid'];
	
	
	switch($titlee)
	{
	case "Mr":	
	$title = "Male";
	break;
	case "Mstr":	
	$title = "Male";
	break;
	case "Mrs":	
	$title = "FEMALE";
	break;
	case "Miss":	
	$title = "FEMALE";
	break;
	case "Ms":	
	$title = "FEMALE";
	break;
	default:
	$title = "Male";
	break;
	}
	
	 $message = <<<EOM
<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://com/bajajallianz/BjazTravelWebservice.wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns1="http://com/bajajallianz/BjazTravelWebservice.wsdl/types/">
   <env:Header/>
   <env:Body>
      <ns:bjazWebserviceIssuePolicy>
         '.$this->creden.'
         <pWeoTrvProcessPolicyIn_inout xsi:type="ns1:BjazTrvIssueUser">
            <ns1:passigneeName>$paxname</ns1:passigneeName>
            <ns1:pfullTermPremium>0</ns1:pfullTermPremium>
            <ns1:telephone3/>
            <ns1:ptotalPremium>0</ns1:ptotalPremium>
            <ns1:telephone2/>
            <ns1:nationalId></ns1:nationalId>
            <ns1:userid>travel@browsenbook.com</ns1:userid>
            <ns1:surname>$last_name</ns1:surname>
            <ns1:ppremiumPayerId>0</ns1:ppremiumPayerId>
            <ns1:partnerRef>P</ns1:partnerRef>
            <ns1:psubagentCode>0</ns1:psubagentCode>
            <ns1:pdealerCode>0</ns1:pdealerCode>
            <ns1:ploading>0</ns1:ploading>
            <ns1:pfamilyFlag>N</ns1:pfamilyFlag>
            <ns1:pserviceTaxAmt>0</ns1:pserviceTaxAmt>
            <ns1:ppartnerId>0</ns1:ppartnerId>
            <ns1:pdiscount>0</ns1:pdiscount>
            <ns1:middleName/>
            <ns1:fax/>
            <ns1:countryCode/>
            <ns1:addressLine5></ns1:addressLine5>
            <ns1:addressLine4></ns1:addressLine4>
            <ns1:addressLine3></ns1:addressLine3>
            <ns1:postcode>411045</ns1:postcode>
            <ns1:pproduct>9910</ns1:pproduct>
            <ns1:addressLine2></ns1:addressLine2>
            <ns1:pfromDate>$fromDate</ns1:pfromDate>
            <ns1:addressLine1>G-1001,Pride Platinum Baner</ns1:addressLine1>
            <ns1:pcompref>NA</ns1:pcompref>
            <ns1:taxId>0</ns1:taxId>
            <ns1:email>$emailid</ns1:email>
            <ns1:pruralFlag>N</ns1:pruralFlag>
            <ns1:pcoverNoteNo>0</ns1:pcoverNoteNo>
            <ns1:quality>0</ns1:quality>
            <ns1:ptravelplan>$plan_name</ns1:ptravelplan>
            <ns1:ppassportNo>$passport</ns1:ppassportNo>
            <ns1:pserviceCharge>0</ns1:pserviceCharge>
            <ns1:ppaymentMode>AGENT_FLOAT</ns1:ppaymentMode>
            <ns1:language/>
            <ns1:pspCondition>0</ns1:pspCondition>
            <ns1:pareaplan>$destination_code</ns1:pareaplan>
            <ns1:ppremiumPayerFlag>N</ns1:ppremiumPayerFlag>
            <ns1:employmentStatus/>
            <ns1:pmasterpolicyno>0</ns1:pmasterpolicyno>
            <ns1:dateOfBirth>$dob</ns1:dateOfBirth>
            <ns1:sex>Male</ns1:sex>
            <ns1:institutionName/>
            <ns1:contact1>$mobile</ns1:contact1>
            <ns1:partId>0</ns1:partId>
            <ns1:addId>0</ns1:addId>
            <ns1:maritalStatus />
            <ns1:partnerType>P</ns1:partnerType>
            <ns1:ptermStartDate>$fromDate</ns1:ptermStartDate>
            <ns1:regNumber>0</ns1:regNumber>            
            <ns1:pempno>0</ns1:pempno>
			<ns1:plocationCode>0</ns1:plocationCode>
            <ns1:policyNo>0</ns1:policyNo>
            <ns1:firstName>$paxname</ns1:firstName>
            <ns1:pdateOfBirth>$dob</ns1:pdateOfBirth>
            <ns1:afterTitle/>
            <ns1:pintermediaryCode>0</ns1:pintermediaryCode>
            <ns1:ptermEndDate>$arrDate</ns1:ptermEndDate>
            <ns1:beforeTitle>$title</ns1:beforeTitle>
            <ns1:ptoDate>$arrDate</ns1:ptoDate>
            <ns1:pdestination>0</ns1:pdestination>
            <ns1:puserName>travel@browsenbook.com</ns1:puserName>
            <ns1:pspDiscountAmt>0</ns1:pspDiscountAmt>
            <ns1:pspDiscount>0</ns1:pspDiscount>
            <ns1:checkBox>0</ns1:checkBox>
            <ns1:pcoOrgUnit>0</ns1:pcoOrgUnit>
            <ns1:vatNumber>0</ns1:vatNumber>
            <ns1:notes>0</ns1:notes>
            <ns1:telephone></ns1:telephone>
         </pWeoTrvProcessPolicyIn_inout>
         <pfamilyParamList_inout xsi:type="ns1:WeoTrvFamilyParamInUserArray"/>
         <pCoverList_out xsi:type="ns1:WeoTrvCoverUserArray"/>
         <pPolicyFamilyList_out xsi:type="ns1:WeoTrvFamilyMemberUserArray"/>
         <pPolicyObj_out xsi:type="ns1:WeoTrvPolicyUser">
           <ns1:passigneeName />
        <ns1:pfullTermPremium />
        <ns1:ptelephone />
        <ns1:pdepartureDate />
        <ns1:paddressLine2 />
        <ns1:paddressLine3>addressLine3</ns1:paddressLine3>
        <ns1:ppolicyRef />
        <ns1:paddressLine1>G-1001,Pride Platinum Baner</ns1:paddressLine1>
        <ns1:pgrossPremium />
        <ns1:pserviceTaxAmt />
        <ns1:pplan />
        <ns1:pdateOfBirth />
        <ns1:preturnDate />
        <ns1:pimdcode />
        <ns1:psurname />
        <ns1:recString20 />
        <ns1:parea />
        <ns1:pcustomerTextName />
        <ns1:pfirstName />
        <ns1:ppostcode>411045</ns1:ppostcode>
        <ns1:ppartId />
        <ns1:ppassportNo />
        <ns1:pspCondition />
        <ns1:pentryDate/>
         </pPolicyObj_out>
         <ppayDtls_out xsi:type="xsd:string"/>
         <pagentName_out xsi:type="xsd:string"/>
         <proLocationAdd_out xsi:type="xsd:string"/>
         <pError_out xsi:type="ns1:WeoTygeErrorMessageUserArray"/>
         <pErrorCode_out xsi:type="xsd:decimal">0</pErrorCode_out>
      </ns:bjazWebserviceIssuePolicy>
   </env:Body>
</env:Envelope>
EOM;

 // echo htmlentities($message);
// die; 
$soap_do = curl_init("http://webservices.bajajallianz.com:80/BjazTravelWebservice/BjazTravelWebservicePort");
              
$header = array(
"Content-Type: text/xml;charset=UTF-8", 
"Accept: gzip,deflate", 
"Cache-Control: no-cache", 
"Pragma: no-cache", 
// "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/bjazWebserviceTravelPlan",
/* "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/bjazWebserviceIssuePolicy", */
"SOAPAction: http://webservices.bajajallianz.com/BjazTravelWebservice/BjazTravelWebservicePort?WSDL/bjazWebserviceIssuePolicy",
"Content-length: ".strlen($message),
); 

	$response=SELF::curl_request($soap_do,$message,$header); 
	
/* 	 echo htmlentities($response);
die; 	 */
	return $response;
}



function send_request_insurance_dom($plan_name,$paxval,$pax,$random_data)
{
	
	$destination_code=$random_data['destination_code']; 
	$fromDate=$random_data['fromDate'];
	$arrDate=$random_data['arrDate'];
	$titlee=$paxval['title'];
	$paxname=$paxval['first_name'];
	$last_name=$paxval['last_name'];
	$passport=$paxval['passport'];
	$dobb=$paxval['dob'];
	$dob=date('d-M-Y',strtotime($dobb));
	$mobile=$pax['leadpax']['mobile'];
	$emailid=$pax['leadpax']['emailid'];
	switch($titlee)
	{
	case "Mr":	
	$title = "Male";
	break;
	case "Mstr":	
	$title = "Male";
	break;
	case "Mrs":	
	$title = "FEMALE";
	break;
	case "Miss":	
	$title = "FEMALE";
	break;
	case "Ms":	
	$title = "FEMALE";
	break;
	default:
	$title = "Male";
	break;
	}
	 $message = <<<EOM
<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://com/bajajallianz/BjazTravelWebservice.wsdl" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns1="http://com/bajajallianz/BjazTravelWebservice.wsdl/types/">
  <env:Header />
  <env:Body>
    <ns:bjazWebserviceIssuePolicy>
     '.$this->creden.'
      <pWeoTrvProcessPolicyIn_inout xsi:type="ns1:BjazTrvIssueUser">
        <ns1:passigneeName>$paxname</ns1:passigneeName>
        <ns1:pfullTermPremium>104</ns1:pfullTermPremium>
        <ns1:telephone3>$mobile</ns1:telephone3>
        <ns1:ptotalPremium>104</ns1:ptotalPremium>
        <ns1:telephone2>$mobile</ns1:telephone2>
        <ns1:nationalId />
        <ns1:userid>travel@browsenbook.com</ns1:userid>
        <ns1:surname>$last_name</ns1:surname>
        <ns1:ppremiumPayerId>0</ns1:ppremiumPayerId>
        <ns1:partnerRef>P</ns1:partnerRef>
        <ns1:psubagentCode>0</ns1:psubagentCode>
        <ns1:pdealerCode>0</ns1:pdealerCode>
        <ns1:ploading>0</ns1:ploading>
        <ns1:pfamilyFlag>N</ns1:pfamilyFlag>
        <ns1:pserviceTaxAmt>0</ns1:pserviceTaxAmt>
        <ns1:ppartnerId>0</ns1:ppartnerId>
        <ns1:pdiscount>0</ns1:pdiscount>
        <ns1:middleName />
        <ns1:fax />
        <ns1:countryCode />
        <ns1:addressLine5>G-1001,Pride Platinum Baner</ns1:addressLine5>
        <ns1:addressLine4>411045</ns1:addressLine4>
        <ns1:addressLine3>Pune</ns1:addressLine3>
        <ns1:postcode>411045</ns1:postcode>
        <ns1:pproduct />
        <ns1:addressLine2>G-1001,Pride Platinum Baner</ns1:addressLine2>
        <ns1:pfromDate>$fromDate</ns1:pfromDate>
        <ns1:addressLine1>G-1001,Pride Platinum Baner</ns1:addressLine1>
        <ns1:pcompref>0</ns1:pcompref>
        <ns1:taxId>0</ns1:taxId>
        <ns1:email>$emailid</ns1:email>
        <ns1:pruralFlag>N</ns1:pruralFlag>
        <ns1:pcoverNoteNo>0</ns1:pcoverNoteNo>
        <ns1:quality>0</ns1:quality>
        <ns1:ptravelplan>E-Travel</ns1:ptravelplan>
        <ns1:ppassportNo>$passport</ns1:ppassportNo>
        <ns1:pserviceCharge>0</ns1:pserviceCharge>
        <ns1:ppaymentMode>Agent Float</ns1:ppaymentMode>
        <ns1:language />
        <ns1:pspCondition>0</ns1:pspCondition>
        <ns1:pareaplan>Within India Only</ns1:pareaplan>
        <ns1:ppremiumPayerFlag>N</ns1:ppremiumPayerFlag>
        <ns1:employmentStatus />
        <ns1:pmasterpolicyno>0</ns1:pmasterpolicyno>
        <ns1:dateOfBirth>$dob</ns1:dateOfBirth>
        <ns1:sex>$title</ns1:sex>
        <ns1:institutionName />
        <ns1:contact1>$mobile</ns1:contact1>
        <ns1:partId>0</ns1:partId>
        <ns1:addId>0</ns1:addId>
        <ns1:maritalStatus />
        <ns1:partnerType />
        <ns1:ptermStartDate>$fromDate</ns1:ptermStartDate>
        <ns1:regNumber>0</ns1:regNumber>
        <ns1:plocationCode>0</ns1:plocationCode>
        <ns1:pempno>0</ns1:pempno>
        <ns1:policyNo>0</ns1:policyNo>
        <ns1:firstName>$paxname</ns1:firstName>
        <ns1:pdateOfBirth>$dob</ns1:pdateOfBirth>
        <ns1:afterTitle />
        <ns1:pintermediaryCode>0</ns1:pintermediaryCode>
        <ns1:ptermEndDate>$arrDate</ns1:ptermEndDate>
        <ns1:beforeTitle>$titlee</ns1:beforeTitle>
        <ns1:ptoDate>$arrDate</ns1:ptoDate>
        <ns1:pdestination>0</ns1:pdestination>
        <ns1:puserName>$paxname</ns1:puserName>
        <ns1:pspDiscountAmt>0</ns1:pspDiscountAmt>
        <ns1:pspDiscount>0</ns1:pspDiscount>
        <ns1:checkBox>0</ns1:checkBox>
        <ns1:pcoOrgUnit>0</ns1:pcoOrgUnit>
        <ns1:vatNumber>0</ns1:vatNumber>
        <ns1:notes>0</ns1:notes>
        <ns1:telephone>$mobile</ns1:telephone>
      </pWeoTrvProcessPolicyIn_inout>
      <pfamilyParamList_inout xsi:type="ns1:WeoTrvFamilyParamInUserArray" />
      <pCoverList_out xsi:type="ns1:WeoTrvCoverUserArray" />
      <pPolicyFamilyList_out xsi:type="ns1:WeoTrvFamilyMemberUserArray" />
      <pPolicyObj_out xsi:type="ns1:WeoTrvPolicyUser">
        <ns1:passigneeName />
        <ns1:pfullTermPremium />
        <ns1:ptelephone />
        <ns1:pdepartureDate />
        <ns1:paddressLine2 />
        <ns1:paddressLine3 />
        <ns1:ppolicyRef />
        <ns1:paddressLine1 />
        <ns1:pgrossPremium />
        <ns1:pserviceTaxAmt />
        <ns1:pplan />
        <ns1:pdateOfBirth />
        <ns1:preturnDate />
        <ns1:pimdcode />
        <ns1:psurname />
        <ns1:recString20 />
        <ns1:parea />
        <ns1:pcustomerTextName />
        <ns1:pfirstName />
        <ns1:ppostcode />
        <ns1:ppartId />
        <ns1:ppassportNo />
        <ns1:pspCondition />
        <ns1:pentryDate />
      </pPolicyObj_out>
      <ppayDtls_out xsi:type="xsd:string" />
      <pagentName_out xsi:type="xsd:string" />
      <proLocationAdd_out xsi:type="xsd:string" />
      <pError_out xsi:type="ns1:WeoTygeErrorMessageUserArray" />
      <pErrorCode_out xsi:type="xsd:decimal">0</pErrorCode_out>
    </ns:bjazWebserviceIssuePolicy>
  </env:Body>
</env:Envelope>
EOM;
$htmldatareq = htmlentities($message);
 $_SESSION['insure']['request']=$htmldatareq;
 
// die; 
$soap_do = curl_init("http://webservices.bajajallianz.com:80/BjazTravelWebservice/BjazTravelWebservicePort");
              
$header = array(
"Content-Type: text/xml;charset=UTF-8", 
"Accept: gzip,deflate", 
"Cache-Control: no-cache", 
"Pragma: no-cache", 
// "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/bjazWebserviceTravelPlan",
/* "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/bjazWebserviceIssuePolicy", */
"SOAPAction: http://webservices.bajajallianz.com/BjazTravelWebservice/BjazTravelWebservicePort?WSDL/bjazWebserviceIssuePolicy",
"Content-length: ".strlen($message),
); 

	$response=SELF::curl_request($soap_do,$message,$header); 
	$htmldata = htmlentities($response);
	 $_SESSION['insure']['response']=$htmldata;
/* 	 echo 
die; 	 */
	return $response;
}


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
/* "SOAPAction: http://com/bajajallianz/BjazTravelWebservice.wsdl/downloadFile", */
"SOAPAction: http://general.bajajallianz.com/docDownldWS/WebServiceImplService?wsdl/downloadFile",
"Content-length: ".strlen($message),
); 

	$response=SELF::curl_request($soap_do,$message,$header); 
	
	
	 $htmldata = htmlentities($response); 
	 $_SESSION['insure']['response']=$htmldata;

	return $response;
}





/* 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:baj="http://bajaj.com/">

<soapenv:Header /> 
<soapenv:Body> 
<baj:downloadFile> 
<arg0> 
<password>newpas12</password> 
<pdfMode>WS_POLICY_PDF</pdfMode> 
<policyNum>$policy_no</policyNum> 
<userId>travel@browsenbook.com</userId> 
</arg0> 
</baj:downloadFile> 
</soapenv:Body> 
</soapenv:Envelope> */
















	
	
}
