<?php

class api {

    var $post_url  = '';
    var $display   = '';
    var $url       = '';
    var $post_data = '';
    var $result    = '';
    var $return    = '';
	var $domain    = 'http://api.textveloper.com/';
	
    /* @parameter1 = cuenta_token
     * @parameter2 = aplicacion_token
     * @parameter3 = telefono
     * @parameter4 = mensaje
     */

    function EnviarSms($parameters, $show_results = false) 
    {
        $this->url       =  $this->domain.'/sms/enviar/';
        $this->display   =  $show_results;
        $this->post_data =  $parameters;
        $this->makeCurl();
    }

    private function makeCurl() 
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_POST, 3);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->post_data);

        $this->result = curl_exec($curl);
        curl_close($curl);

        if ($this->display) 
        {
            echo $this->result;
        }
    }

}





?>