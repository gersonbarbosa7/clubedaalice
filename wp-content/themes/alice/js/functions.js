var formasPgto = function(){
    //tipo de serviço
    var radioInputs = $("input[name='tipo_pgto']");
    radioInputs.click(function(){
        
            var tipopgto = $(this).val();  
            
            if (tipopgto == 'cartao'){
                $(".boleto").removeClass('radio-ativo');
                $(".cartao").addClass('radio-ativo');
            } else {
                $(".boleto").addClass('radio-ativo');
                $(".cartao").removeClass('radio-ativo');
            }

    });
    radioInputs.filter(":checked").trigger("click");  
};

var formasEntrega = function(){
    //tipo de serviço
    var radioInputs = $("input[name='entrega']");
    radioInputs.click(function(){
        
            var tipopgto = $(this).val();  
            
            if (tipopgto == 'retirar'){
                $(".sedex").removeClass('radio-ativo');
                $(".retirar").addClass('radio-ativo');
            } else {
                $(".sedex").addClass('radio-ativo');
                $(".retirar").removeClass('radio-ativo');
            }

    });
    radioInputs.filter(":checked").trigger("click");  
};

var selecionaProduto = function(id){
    
    var imgs = $(".check_"+id);
    
    //removendo demais
    $('.rowProduto .icon_check').each(function(){
        var referencia = $(this).attr('referencia');
        if(id == $(this).attr('referencia')){
            $('#'+id+' .empty_'+id).hide();
            $('#'+id+' .check_'+id).show(); 
            $("#produto_id").val(id);
        } else {                            
            $('#'+referencia+' .icon_check ').hide();    
            $('#'+referencia+' .icon_check-empty ').show();
            $("#produto_id").val(id);
        }
    });    
};

var prepararCheckout = function(idproduto){
    //dados da cliente
    var nome = $("#nome").val();
    var nascimento = $("#nascimento").val();    
    var email = $("#email").val();    
    var celular = $("#tel").val(); 
    
    //dados da compra
    var produto = $("#produto_id").val();
    var urlproduto = "";
    if (produto){
        urlproduto += $("#"+produto).attr("url-produto");
    }    
    var dadosform = $("#dados_carteirinha").serialize();
    var termos = $("#termos");
    
    //validação simples
    if (!nome){
        alert("Preencha o campo nome!");
        $("#nome").focus();
    } else if (!nascimento){
       alert("Informe a data de nascimento"); 
       $("#nascimento").focus();
    } else if (!email){
       alert("Informe seu e-mail"); 
       $("#email").focus();
    } else if (!celular){
       alert("Informe seu celular"); 
       $("#tel").focus();
    } else if (produto == '' || produto == 'undefined'){
       alert("Selecione o tipo de carteirinha!");       
    } else if (!termos.is(':checked')){
        alert("Você deve aceitar os termos e condições");
    } else {
        $("#preloader_modal").modal();
        window.location.href=urlproduto + '/?'+dadosform;
        /*$("#preloader_modal").modal('show');
        //var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + "/?post-type=product&add-to-cart='"+produto;
        setTimeout(function(){
            window.location.href=urlproduto + '/?'+dadosform;
        }, 2000);*/
    }    
}

var validarCpf = function(cpf){
      
    cpf = cpf.replace(/[^\d]+/g,'');    
    if(cpf == '') return false; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;       
    // Valida 1o digito 
    var add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return false;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    var rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return false;       
    return true;   

}

var buscarCep = function(){
    var cep = $("#cep").val();
    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/", function(){   
        //
    }).done(function(retorno){
        
        $("#bairro").removeClass('campo-erro');
        $("#rua").removeClass('campo-erro');
        $("#cidade").removeClass('campo-erro');
        $("#estado").removeClass('campo-erro');
        $("#complemento").removeClass('campo-erro');
        
        $("#bairro").val(retorno.bairro);
        $("#rua").val(retorno.logradouro);
        $("#cidade").val(retorno.localidade);
        $("#estado").val(retorno.uf);
        $("#complemento").val(retorno.complemento);
        $("#avancar").removeAttr('disabled');
    }).fail(function(){
        
        alert("CEP inválido, tente novamente!");
        
        $("#bairro").val('');
        $("#rua").val('');
        $("#cidade").val('');
        $("#estado").val('');
        $("#complemento").val('');
        
        $("#bairro").addClass('campo-erro');
        $("#rua").addClass('campo-erro');
        $("#cidade").addClass('campo-erro');
        $("#estado").addClass('campo-erro');
        $("#complemento").addClass('campo-erro');
        
        $("#avancar").attr('disabled', 'disabled');
    });
}

var dadosFacebook = function(){
    FB.api('/me?fields=name,email,first_name,last_name,gender,picture', function(response) {
		console.log(response);						
	    var dados = response;
	    if (dados.gender == "male"){
			//$('.container-cupom .message').html("Esta promoção é exclusiva para mulheres. Obrigada!").show();
                        //alert("Masculino!");             
                        $("#login_conta").modal("hide");
                        $("#bloqueio_homens").modal("show");
                        //consultaCadastro(dados.first_name, dados.id, dados.email, dados.first_name, dados.last_name, dados.picture.data.url);
			return;
	    }
	    if(dados.email === undefined || !dados.email) {
	    	alert("Não conseguimos capturar seu E-mail. Verifique suas configurações de Privacidade no Facebook e tente novamente.");
			return;
	    }
            consultaCadastro(dados.first_name, dados.id, dados.email, dados.first_name, dados.last_name, dados.picture.data.url);
            //alert("Seu nome é: "+dados.first_name);
	    
	});
};

var loginUserOk = function(){
	FB.login(function(response){
		if (response.status === 'connected'){
			dadosFacebook(response);
		}
	}, {scope: 'public_profile,email'});
};

var consultaCadastro = function(login, senha, email, nome, sobrenome, foto){
    var dados = "login="+login+"&senha="+senha+"&email="+email+"&nome="+nome+"&sobrenome="+sobrenome+"&foto="+foto;
    $.ajax({
        type:"POST",
        url:"https://www.gersonbarbosa.com/projetos/clubedaalice/cadastro-login/",
        dataType:"json",
        data: dados,
        success: function(retorno){
            if (retorno.status == 'ok'){
                $("#text_processando").html("Usuário cadastrado com sucesso! Fazendo login...");
                fazerLogin(retorno.login, retorno.senha, 'https://www.gersonbarbosa.com/projetos/clubedaalice/completar-cadastro');
            } else if (retorno.status == 'existente'){
                $("#text_processando").html("Usuário existente, fazendo login...");
                fazerLogin(login, senha, '');
            } else {
                alert(retorno.error_msg);
            }
            //window.location.href='solicitar-carteirinha.html';
        },
        beforeSend: function(){
            $("#login_conta").modal("hide");
            $("#preloader_modal").modal("show");
        },
        error: function(xhn, text, err){
            alert("Erro ao processar dados, tente novamente!");
        },
        complete: function(){
            //$("#preloader_modal").modal("hide");
        }
    });
}

var fazerLogin = function(login, senha, link){
    //get vars to login
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'https://www.gersonbarbosa.com/projetos/clubedaalice/fazer-login/',
        data: {            
            'login': login, 
            'senha': senha, 
            'security': $('#security').val() },
        success: function(data){             
            $('#text_processando').html(data.message);                 
            console.log(data);
                if (data.loggedin == true){
                    if (link){
                        window.location.href=link;
                    } else {
                        window.location.href='https://www.gersonbarbosa.com/projetos/clubedaalice/painel';
                    }
                    
                }
        },
         error: function (request, status, error) {                                       
            alert("Algo deu errado! Detalhes: "+status);
            console.log(request, status, error);            
        }
    })
};

var completarCadastro = function(){
    var nascimento = $("#nascimento").val();
    var nomecarteirinha = $("#nome_cateirinha").val();
    var cpf = $("#cpf").val();
    var cep = $("#cep").val();
    var endereco = $("#rua").val();
    var estado = $("#estado").val();
    var cidade = $("#cidade").val();
    var bairro = $("#bairro").val();
    var numero = $("#numero").val();
    var complemento = $("#complemento").val();
    var celular = $("#tel").val();
    var usuario = $("#id_user").val();
    //get vars to login
    $.ajax({
        type: 'POST',
        dataType: 'text',
        url: 'https://www.gersonbarbosa.com/projetos/clubedaalice/atualizar-cadastro/',
        data: {            
            'nascimento': nascimento, 
            'nomecarteirinha': nomecarteirinha, 
            'cpf': cpf, 
            'cep': cep, 
            'endereco': endereco, 
            'estado': estado, 
            'cidade': cidade, 
            'numero': numero, 
            'bairro': bairro, 
            'complemento': complemento,
            'celular': celular,
            'id_user': usuario },
        success: function(data){             
            $('#text_processando').html("Atualizando seus dados...");                             
            console.log(data);
                if (data == 'ok'){
                    window.location.href='https://www.gersonbarbosa.com/projetos/clubedaalice/solicitar-carteirinha';                    
                } else {
                    alert(data);
                }
        },
         error: function (request, status, error) {                                       
            alert("Algo deu errado! Detalhes: "+status);
            $(".btnAvancar").html("Avançar");
            console.log(request, status, error);            
        },
        beforeSend: function(){
            $(".btnAvancar").html("Salvando ...");
        },
        complete: function(){
            $(".btnAvancar").html("Redirecionando ...");
        }
    })
    
};

var atualizarCadastro = function(){
    var nascimento = $("#nascimento").val();
    var nomecarteirinha = $("#nome_cateirinha").val();
    var cpf = $("#cpf").val();
    var cep = $("#cep").val();
    var endereco = $("#rua").val();
    var estado = $("#estado").val();
    var cidade = $("#cidade").val();
    var bairro = $("#bairro").val();
    var numero = $("#numero").val();
    var complemento = $("#complemento").val();
    var celular = $("#tel").val();
    var usuario = $("#id_user").val();
    
    //retorno salvamento
    var retornoHtml = '<div class="form-group"><div class="col-sm-12 col-xs-12"><div class="alert alert-success">' +
                       '<i class="fa fa-check"></i> Dados atualizados com sucesso!'+
                        '</div></div><div class="clearfix"></div></div>';
    
    //get vars to login
    $.ajax({
        type: 'POST',
        dataType: 'text',
        url: 'https://www.gersonbarbosa.com/projetos/clubedaalice/atualizar-cadastro/',
        data: {            
            'nascimento': nascimento, 
            'nomecarteirinha': nomecarteirinha, 
            'cpf': cpf, 
            'cep': cep, 
            'endereco': endereco, 
            'estado': estado, 
            'cidade': cidade, 
            'numero': numero, 
            'bairro': bairro, 
            'complemento': complemento,
            'celular': celular,
            'id_user': usuario },
        success: function(data){             
            $('#text_processando').html("Atualizando seus dados...");                             
            console.log(data);
                if (data == 'ok'){
                    
                    $("#retorno-form").html(retornoHtml);
                        setTimeout(function(){
                            $("#retorno-form").html('');                            
                        },4500);                        
                                 
                } else {
                    alert(data);
                }
        },
         error: function (request, status, error) {                                       
            alert("Algo deu errado! Detalhes: "+status);
            $(".btnAvancar").html("Avançar");
            console.log(request, status, error);            
        },
        beforeSend: function(){
            $(".btnAvancar").html("Salvando ...");
        },
        complete: function(){
            $(".btnAvancar").html("Salvar Alterações");
        }
    })
    
};


var preloaderModal = function(){    
    $("#preloader_modal").modal();
};

var validarCadastro = function(redirect){
    var nascimento = $("#nascimento").val();
    var nomecarteirinha = $("#nome_cateirinha").val();
    var cpf = $("#cpf").val();
    var cep = $("#cep").val();
    var endereco = $("#rua").val();
    var numero = $("#numero").val();
    var complemento = $("#complemento").val();
    
    //condicionando
    if (!nascimento){
        alert("Informe a data de nascimento");
        $("#nascimento").focus();
    } else if (!nomecarteirinha){
        alert("Informe o nome a ser impresso na carteirinha");
        $("#nome_cateirinha").focus();
    } else if (!cpf){
        alert("Informe o CPF");
        $("#cpf").focus();
    } else if (!cep){
        alert("Informe o CEP");
        $("#cep").focus();
    } else if (!endereco){
        alert("Endereço inválido, reveja seu CEP");
        $("#cep").focus();    
    } else {
        if (redirect == 'sim'){
            completarCadastro();
        } else {
            atualizarCadastro();
        }
        
    }
    
};

$(document).ready(function(){
    formasPgto();
    formasEntrega();    
    
});

