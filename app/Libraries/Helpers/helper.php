<?php
/**
 * Z Helper
 * @author John Nguyen
 * @version 1.0
 */
if (!function_exists('current_section')) {
    /**
     * Get the information whether the current section is backend, admin or public
     * @return array
     */
    function current_section()
    {
        if (Request::is('backend*')) {
            $link_type = 'backend';
            $theme = !is_null(env('THEME_BACKEND')) ? env('THEME_BACKEND') : 'default';
        } else {
            $link_type = 'frontend';
            $theme = !is_null(env('THEME_FRONTEND')) ? env('THEME_FRONTEND') : 'default';
        }
        return array($link_type, $theme);
    }
}

if (!function_exists('current_user')) {
    /**
     * Current User
     * @return object
     */
    function current_user()
    {
        if (Auth::check()) {
            return Auth::user();
        }
        return false;
    }
}

if( !function_exists('user_state')) {
    /**
     * Convert state
     * @param int
     * @return string
     */
    function user_state($state) {
        switch($state) {
            case 1:
                return "Activated"; break;
            case 0:
            default :
                return "Unactivated"; break;
        }
    }
}


if( !function_exists('status_convert')) {
    /**
     * State convert
     * @param int
     * @return string
     */
    function status_convert($state) {
        switch($state) {
            case 1:
                return "Publish"; break;
            case 0:
                return "UnPublish"; break;
            case -1:
            default :
                return "Draft"; break;
        }
    }
}

if (!function_exists('get_template_directory')) {
    /**
     * Get current template path
     * @return string
     */
    function get_template_directory() {
        list($type, $theme) = current_section();
        return asset('templates/'.$type.'/'.$theme);
    }
}

if( !function_exists('format_time')) {
    /**
     * Convert int to time
     * @param $t
     * @param string $f
     * @return string
     */
    function format_time($t) // t = seconds, f = separator
    {
        $time_string = "";
        if(floor($t/3600) > 0) {
            $time_string .= floor($t/3600) . ' hours ';
        }
        if(($t/60)%60 > 0){
            $time_string .= ($t/60)%60 . ' minutes ';
        }
        if( $t%60 >= 0) {
            $time_string .= $t%60 . 's';
        }
        return $time_string;
    }
}


/**
 * Get Lat - Long via ZipCode
 *
 * @param $zipcode
 * @return array
 */
function getLatLong($zipcode){
    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zipcode)."&sensor=false";
    $result_string = file_get_contents($url);
    $result = json_decode($result_string, true);
    $result1=$result['results'][0];
    $result2=$result1['geometry'];
    $result3=$result2['location'];
    return $result3;
}

/**
 * Get city, state from Zip Code
 * @param $zip
 * @param bool $blnUSA
 * @return array
 */
function getCityState($zip, $blnUSA = true) {
    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $zip . "&sensor=true";

    $address_info = file_get_contents($url);
    $json = json_decode($address_info);
    $city = "";
    $state = "";
    $country = "";
    if (count($json->results) > 0) {
        //break up the components
        $arrComponents = $json->results[0]->address_components;

        foreach($arrComponents as $index=>$component) {
            $type = $component->types[0];

            if ($city == "" && ($type == "sublocality_level_1" || $type == "locality") ) {
                $city = trim($component->short_name);
            }
            if ($state == "" && $type=="administrative_area_level_1") {
                $state = trim($component->short_name);
            }
            if ($country == "" && $type=="country") {
                $country = trim($component->short_name);

                if ($blnUSA && $country!="US") {
                    $city = "";
                    $state = "";
                    break;
                }
            }
            if ($city != "" && $state != "" && $country != "") {
                //we're done
                break;
            }
        }
    }
    $arrReturn = array("city"=>$city, "state"=>$state, "country"=>$country);

    return $arrReturn;
}

