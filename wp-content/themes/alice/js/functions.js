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

var prepararCheckout = function(){
    //dados da cliente
    var nome = $("#nome").val();
    var nascimento = $("#nascimento").val();    
    var email = $("#email").val();    
    var celular = $("#tel").val(); 
    
    //dados da compra
    var produto = $("#produto_id").val();
    var urlproduto = $("#"+produto).attr("url-produto");
    
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
    } else if (!produto){
       alert("Selecione o tipo de carteirinha!");       
    } else {
        $("#preloader_modal").modal('show');
        //var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + "/?post-type=product&add-to-cart='"+produto;
        setTimeout(function(){
            window.location.href=urlproduto;
        }, 2000);
    }    
}

$(document).ready(function(){
    formasPgto();
    formasEntrega();  
    
    var teste = window.location.pathname;
    console.log("url: "+teste);
    
});

