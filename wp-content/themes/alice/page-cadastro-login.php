<?php

/*
 * Template Name: Cadastro/Login
 * 
 */

$user_name = $_POST['login'];
$user_email = $_POST['email'];
$password = $_POST['senha'];
$id_fcb = $_POST['senha'];
$nome = $_POST['nome'];
$sosbrenome = $_POST['sobrenome'];
$foto_perfil = $_POST['foto'];


$website = "https://www.facebook.com/" . $id_fcb;
$userdata = array(
    'user_login' => $user_name,
    'user_url' => $website,
    'user_pass' => $password,
    'first_name' => $nome,
    'last_name' => $sosbrenome,
    'user_email' => $user_email,
    'role' => 'customer'
);

$user_id = username_exists($user_name);
if (!$user_id and email_exists($user_email) == false) {

    //cadastrando usuário
    $user_id = wp_insert_user($userdata);

    //On success
    if (!is_wp_error($user_id)) {
        update_user_meta($user_id, 'foto_do_perfil', $foto_perfil);
        update_user_meta($user_id, 'billing_sex', 'Feminino');
        update_user_meta($user_id, 'billing_country', 'BR');
        $retorno = array('status' => 'ok', 'login' => $user_name, 'senha' => $password);
        echo json_encode($retorno);        
    } else {
        $retorno = array('status' => 'erro', 'error_msg' => 'Erro ao cadastrar usuário!');
        echo json_encode($retorno);
    }
} else {
    $retorno = array('status' => 'existente', 'error_msg' => 'Usuario existente');
    echo json_encode($retorno);
}