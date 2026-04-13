<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function userbookingdate($date){
$timestamp = strtotime($date);
return date('F d, Y', $timestamp);
}
function getdetailurl($pactype=null,$refid=null)
{	
switch ($pactype) {
        case "flight":
            $url = site_url('flight/bookingdetailsb2c/'.$refid.'');
            break;
        case "hotel":
            $url = site_url('hotel/bookingdetailsb2c/'.$refid.'');
            break;
        case "bus":
            $url = site_url('flight/bookingdetailsb2c/'.$refid.'');
            break;
		case "car":
            $url = site_url('flight/bookingdetailsb2c/'.$refid.'');
            break;
		case "holidays":
            $url = site_url('flight/bookingdetailsb2c/'.$refid.'');
            break;
        default:
            $url = 'javascript:void(0);';
    }

	return $url;	
}
