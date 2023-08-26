<?php


function helloAku()
{
    return 'Say Hello';
}

function cekLogin()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('id_user')) {
        redirect('auth', 'refresh');
    }


    $segment = $CI->uri->segment(1);
    if ($segment == 'user') {
        if ($CI->session->userdata('id_role') != 1) {
            $CI->alert->set('warning', 'Warning', 'Gak bisa akses');
            redirect('dashboard', 'refresh');
        }
    }
}
