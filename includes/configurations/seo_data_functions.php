<?php

function get_seo_data_json() {
    $json_file = file_get_contents('seo_data.json');
    $decoded_json_file = json_decode($json_file, true);
    return $decoded_json_file;
}

function get_seo_data() {
    $seo_data = get_seo_data_json();
    $seo_data_arr = [];
    foreach($seo_data as $data) {
        array_push($seo_data_arr, $data);
    }
    return $seo_data_arr;
}

function get_seo_data_by_route($actual_page_uri) {
    $route_name = $actual_page_uri;
    $seo_data = get_seo_data_json();
    $seo_route_data = [];

    foreach($seo_data as $key=>$route_data) {
        if($route_data["link"] == $route_name) {
            $seo_route_data = $route_data;
        } 
    }

    return $seo_route_data;
}

?>
