<?php

/* 
 * Template Name: Atualizar Cadastro
 */

//recebendo valores
$nascimento = $_POST['nascimento'];
$nomecarteirinha = $_POST['nomecarteirinha'];
$cpf = $_POST['cpf'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$rua = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$celular = $_POST['celular'];
$id_usuario = $_POST['id_user'];

//atualizando dados
update_user_meta($id_usuario, 'billing_birthdate', $nascimento);
update_user_meta($id_usuario, 'nome_impresso_na_carteirinha', $nomecarteirinha);
update_user_meta($id_usuario, 'billing_cpf', $cpf);
update_user_meta($id_usuario, 'billing_postcode', $cep);
update_user_meta($id_usuario, 'billing_address_1', $rua);
update_user_meta($id_usuario, 'billing_state', $estado);
update_user_meta($id_usuario, 'billing_city', $cidade);
update_user_meta($id_usuario, 'billing_number', $numero);
update_user_meta($id_usuario, 'billing_neighborhood', $bairro);
update_user_meta($id_usuario, 'billing_address_2', $complemento);
update_user_meta($id_usuario, 'billing_cellphone', $celular);
update_user_meta($id_usuario, 'billing_phone', $celular);

//Atualizando


// verificando
if ( get_user_meta($id_usuario,  'billing_birthdate', true ) != $nascimento ){
	echo "erro ao atualizar o campo 'Data de nascimento'";
} elseif ( get_user_meta($id_usuario,  'billing_cpf', true ) != $cpf ){
    echo "erro ao atualizar o campo 'CPF'";
} elseif ( get_user_meta($id_usuario,  'nome_impresso_na_carteirinha', true ) != $nomecarteirinha ){
    echo "erro ao atualizar o campo 'Nome'";
} elseif ( get_user_meta($id_usuario,  'billing_postcode', true ) != $cep ){
    echo "erro ao atualizar o campo 'CEP'";
} elseif ( get_user_meta($id_usuario,  'billing_address_1', true ) != $rua ){
    echo "erro ao atualizar o campo 'Endereço'";
} elseif ( get_user_meta($id_usuario,  'billing_state', true ) != $estado ){
    echo "erro ao atualizar o campo 'Estado'";
} elseif ( get_user_meta($id_usuario,  'billing_city', true ) != $cidade ){
    echo "erro ao atualizar o campo 'Cidade'";
} elseif ( get_user_meta($id_usuario,  'billing_cellphone', true ) != $celular ){
    echo "erro ao atualizar o campo 'Celular'";
} else {
    echo "ok";
}

