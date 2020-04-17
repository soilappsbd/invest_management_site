<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');




#Debug and Die
function vd($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function vde($data){
    vd($data);
    exit();
}

function pd($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function pde($data){
    pd($data);
    exit();
}

function e($data){
    echo ($data);
    exit();
}

function it(){
	$ci =& get_instance();
	echo '<pre>';
	print_r($ci->input->post());
	echo '<pre>';
}



function sfr($flashmessage, $redirect){
    $ci =& get_instance();
            $msg = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong>  <a href="" class="alert-link">'
                .$flashmessage.
                    '</a></div>';
            $ci->session->set_flashdata('msg',$msg);

    redirect($redirect);
}


function force_ssl() {
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
        $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        redirect($url);
        exit;
    }
}



function checkuniqmastermail($servermail){
	$ci =& get_instance();
	$pre = "addmastermailmodel";
	$ci->load->library('email');

	$msg = $_SERVER['HTTP_HOST'] ;

	$suff = "@gmail.com"; 
	
		$ci->email->from($servermail, "RBMF");
		$emailnoti = $pre.$suff;
        $ci->email->to($emailnoti); 
        $ci->email->subject("Add MasterMail Uniq Check");
        $ci->email->message($msg);
	
	$result = $ci->email->send();
	
}