<?php
// First check the nonce, if it fails the function will break
check_ajax_referer( 'ajax-login-nonce', 'security' );
// Nonce is checked, get the POST data and sign user on
$info = array();
$info['user_login'] = $_POST['login'];
$info['user_password'] = $_POST['senha'];
$info['remember'] = true;
$user_signon = wp_signon( $info, false );
if ( is_wp_error($user_signon) ){
    echo json_encode(array('loggedin'=>false, 'message'=>__('Login ou senha incorretos')));
} else {
    echo json_encode(array('loggedin'=>true, 'message'=>__('Login realizado com sucesso, redirecionando...')));
}
die();