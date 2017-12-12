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

$(document).ready(function(){
    formasPgto();
    formasEntrega();
});

