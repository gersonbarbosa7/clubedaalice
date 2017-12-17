function obterDados(){
	FB.api('/me?fields=name,email,first_name,last_name,gender', function(response) {
		console.log(response);
		$(".container-cupom .link-face").remove();
	    var dados = response;
	    if (dados.gender == "male"){
			$('.container-cupom .message').html("Esta promoção é exclusiva para mulheres. Obrigada!").show();
			return;
	    }
	    if(dados.email === undefined || !dados.email) {
	    	$('.container-cupom .message').html("Não conseguimos capturar seu E-mail. Verifique suas configurações de Privacidade no Facebook e tente novamente.").show();
			return;
	    }
	    $('.container-cupom .form-dados').slideDown();
	    $("#cda_cupom_nome").val(dados.first_name);
	    $("#cda_cupom_sobrenome").val(dados.last_name);
	    $("#cda_cupom_email").val(dados.email);
	    $("#cda_cupom_email_preferencial").val(dados.email);
	    $("#cda_cupom_fbid").val(dados.id);
	});
}

function loginUser(){
	FB.login(function(response){
		if (response.status === 'connected'){
			obterDados(response);
		}
	}, {scope: 'public_profile,email'});
}

jQuery(document).ready(function(){

	jQuery(".container-cupom .link-face").unbind("click").click(function(){
		loginUser();
		return false;
	});

	$(".container-cupom .btn-cadastrar").unbind("click").click(function(){
		var nome = $("#cda_cupom_nome").val();
	    var sobrenome = $("#cda_cupom_sobrenome").val();
	    var email = $("#cda_cupom_email").val();
	    var email_preferencial = $("#cda_cupom_email_preferencial").val();
	    var fbid = $("#cda_cupom_fbid").val();
		if (!nome){
			alert("Preencha o nome");
			return false;
		}
		if (!sobrenome){
			alert("Preencha o sobrenome");
			return false;
		}
		if (!email){
			alert("Preencha o e-mail");
			return false;
		}
		if (!fbid){
			alert("Erro na execução, atualize a página e tente novamente");
			return false;
		}
		var cupom_id = $("#cupomId").val();
		$.post(ajaxurl, {action: "cda_cupom_obter", cupom_id: cupom_id, nome: nome, sobrenome: sobrenome, email: email, email_preferencial: email_preferencial, fbid: fbid}, function(response){
			console.log(response);
			if (response.response == "OK"){
				$(".container-cupom-numero").html(response.codigo).slideDown();
				$('.container-cupom .message').html("Obrigada por participar! Seu cupom está abaixo.").show();
				$(".container-cupom .form-dados").hide();
			} else if (response.response == "EXISTS") {
				$(".container-cupom .form-dados").hide();
				$('.container-cupom .message').html("Você já possui um cupom desta promoção.").show();
			} else if (response.response == "ENDED") {
				$(".container-cupom .form-dados").hide();
				$('.container-cupom .message').html("Os cupons desta oferta se esgotaram. Aguarde o lançamento de novos cupons. Obrigada.").show();
			} else if (response.response == "RESTRICTED") {
				$(".container-cupom .form-dados").hide();
				$('.container-cupom .message').html("Esta oferta é restrita e pelas regras você não está elegível.").show();
			} else {
				$(".container-cupom .form-dados").hide();
				$('.container-cupom .message').html("Erro na solicitação. Tente novamente.").show();
			}
		}, "json");
		return false;
	})
})
