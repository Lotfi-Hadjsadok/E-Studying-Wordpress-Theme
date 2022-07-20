<?php

namespace Inc\Api;

class TokenVerification
{
    public $Api_Key;
    function __construct()
    {
        $theme_settings =  get_option('cod_global_settings');
        $this->Api_Key = array_key_exists('cod_admin_api_key', $theme_settings) ? $theme_settings['cod_admin_api_key'] : '';
    }
    function verify($key)
    {
        if ($key != $this->Api_Key && $this->Api_Key != '') {
            wp_send_json("Wrong Api Key");
            exit;
        }
    }
}
