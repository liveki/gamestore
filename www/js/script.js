$(function(){
		$("#produto").hover(
			function(){
				//Ao posicionar o cursor sobre a div
				$(".catalogo").css('visibility', 'visible');
				$(".catalogo").css('opacity', '100');
				$(".catalogo").css('transition', '0.4s');
			},
			function(){
				//Ao remover o cursor da div
				$(".catalogo").css('visibility', 'hidden');
				$(".catalogo").css('opacity', '0');
				$(".catalogo").css('transition', '0.4s');
			}
		);
	});
	
$(function(){
	$(".catalogo").hover(
		function(){
			//Ao posicionar o cursor sobre a div
			$(".catalogo").css('visibility', 'visible');
			$(".catalogo").css('opacity', '100');
			$(".catalogo").css('transition', '0.4s');
		},
		function(){
			//Ao remover o cursor da div
			$(".catalogo").css('visibility', 'hidden');
			$(".catalogo").css('opacity', '0');
			$(".catalogo").css('transition', '0.4s');
		}
	);
});

$(function(){
	$(".genero").hover(
		function(){
			//Ao posicionar o cursor sobre a div
			$(".genero_catalogo").css('visibility', 'visible');
			$(".genero_catalogo").css('opacity', '100');
			$(".genero_catalogo").css('transition', '0.4s');
		},
		function(){
			//Ao remover o cursor da div
			$(".genero_catalogo").css('visibility', 'hidden');
			$(".genero_catalogo").css('opacity', '0');
			$(".genero_catalogo").css('transition', '0.4s');
		}
	);
});

$(function(){
	$(".genero_catalogo").hover(
		function(){
			//Ao posicionar o cursor sobre a div
			$(".genero_catalogo").css('visibility', 'visible');
			$(".genero_catalogo").css('opacity', '100');
			$(".genero_catalogo").css('transition', '0.4s');
			$(".catalogo").css('visibility', 'visible');
			$(".catalogo").css('opacity', '100');
		},
		function(){
			//Ao remover o cursor da div
			$(".genero_catalogo").css('visibility', 'hidden');
			$(".genero_catalogo").css('opacity', '0');
			$(".genero_catalogo").css('transition', '0.4s');
			$(".catalogo").css('visibility', 'hidden');
			$(".catalogo").css('opacity', '0');
			$(".catalogo").css('transition', '0.4s');
		}
	);
});

$(function(){
	$(".plataforma").hover(
		function(){
			//Ao posicionar o cursor sobre a div
			$(".plataforma_catalogo").css('visibility', 'visible');
			$(".plataforma_catalogo").css('opacity', '100');
			$(".plataforma_catalogo").css('transition', '0.4s');
		},
		function(){
			//Ao remover o cursor da div
			$(".plataforma_catalogo").css('visibility', 'hidden');
			$(".plataforma_catalogo").css('opacity', '0');
			$(".plataforma_catalogo").css('transition', '0.4s');
		}
	);
});

$(function(){
	$(".plataforma_catalogo").hover(
		function(){
			//Ao posicionar o cursor sobre a div
			$(".plataforma_catalogo").css('visibility', 'visible');
			$(".plataforma_catalogo").css('opacity', '100');
			$(".plataforma_catalogo").css('transition', '0.4s');
			$(".catalogo").css('visibility', 'visible');
			$(".catalogo").css('opacity', '100');
		},
		function(){
			//Ao remover o cursor da div
			$(".plataforma_catalogo").css('visibility', 'hidden');
			$(".plataforma_catalogo").css('opacity', '0');
			$(".plataforma_catalogo").css('transition', '0.4s');
			$(".catalogo").css('visibility', 'hidden');
			$(".catalogo").css('opacity', '0');
			$(".catalogo").css('transition', '0.4s');
		}
	);
});
$(function(){
		$("#conta").hover(
			function(){
				//Ao posicionar o cursor sobre a div
				$("#login2").css('visibility', 'visible');
				$("#login2").css('opacity', '100');
				$("#login2").css('transition', '0.4s');
			},
			function(){
				//Ao remover o cursor da div
				$("#login2").css('visibility', 'hidden');
				$("#login2").css('opacity', '0');
				$("#login2").css('transition', '0.4s');
			}
		);
	});
$(function(){
		$("#login").hover(
			function(){
				//Ao posicionar o cursor sobre a div
				$("#login").css('opacity', '100');
				$("#login").css('visibility', 'visible');
			},
			function(){
				//Ao remover o cursor da div
				$("#login").css('visibility', 'hidden');
				$("#login").css('opacity', '0');
				$("#login").css('transition', '0.4s');
			}
		);
	});	
	
$(function(){
		$("#login2").hover(
			function(){
				//Ao posicionar o cursor sobre a div
				$("#login2").css('visibility', 'visible');
				$("#login2").css('opacity', '100');
				$("#login2").css('transition', '0.4s');
			},
			function(){
				//Ao remover o cursor da div
				$("#login2").css('visibility', 'hidden');
				$("#login2").css('opacity', '0');
				$("#login2").css('transition', '0.4s');
			}
		);
	});

$(function(){
		$("#conta").hover(
			function(){
				//Ao posicionar o cursor sobre a div
				$("#login").css('visibility', 'visible');
				$("#login").css('opacity', '100');
				$("#login").css('transition', '0.4s');
			},
			function(){
				//Ao remover o cursor da div
				$("#login").css('visibility', 'hidden');
				$("#login").css('opacity', '0');
				$("#login").css('transition', '0.4s');
			}
		);
	});	
	
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
};
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
};
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
};

window.onload = function(){
	id('telefone').onkeypress = function(){
		mascara( this, mtel );
	}
};
	
jQuery('.bxslider').bxSlider({
		auto: true,
		pause: 8000,
		speed: 1000,
});	

$( "#password1" ).focusout(function() {
	pass1= document.form1.password1 .value
	if(pass1 != ""){
		$( "#img4" ).css( "transition", "0.3s" );
		$( "#img4" ).css( "transform", "scale(1)" );
	}else{
		$( "#img4" ).css( "transition", "0.3s" );
		$( "#img4" ).css( "transform", "scale(0)" );
	}
});


$( "#password2" ).focusout(function() {
	pass1= document.form1.password1 .value
	pass2 = document.form1.password2.value
	
	if (pass1 != pass2){
			$( "#img4" ).css( "transition", "0.3s" );
			$( "#img4" ).css( "transform", "scale(1)" );
			$( "#img5" ).css( "transition", "0.3s" );
			$( "#img5" ).css( "transform", "scale(0)" );
			$( "#img6" ).css( "transition", "0.3s" );
			$( "#img6" ).css( "transform", "scale(1)" );
	}else if(pass1 == pass2 && pass2 != ""){
			$( "#img4" ).css( "transition", "0.3s" );
			$( "#img4" ).css( "transform", "scale(1)" );
			$( "#img5" ).css( "transition", "0.3s" );
			$( "#img5" ).css( "transform", "scale(1)" );
			$( "#img6" ).css( "transition", "0.3s" );
			$( "#img6" ).css( "transform", "scale(0)" );
	}else if(pass2 == ""){
		$( "#img5" ).css( "transition", "0.3s" );
			$( "#img5" ).css( "transform", "scale(0)" );
			$( "#img6" ).css( "transition", "0.3s" );
			$( "#img6" ).css( "transform", "scale(0)" );
	}
});

$( "#email1" ).focusout(function() {
	email1 = document.form1.email1 .value
	if(email1 != ""){
		$( "#img1" ).css( "transition", "0.3s" );
		$( "#img1" ).css( "transform", "scale(1)" );
	}else{
		$( "#img1" ).css( "transition", "0.3s" );
		$( "#img1" ).css( "transform", "scale(0)" );
	}
});


$( "#email2" ).focusout(function() {
	email1= document.form1.email1 .value
	email2 = document.form1.email2.value
	
	if (email1 != email2){
			$( "#img1" ).css( "transition", "0.3s" );
			$( "#img1" ).css( "transform", "scale(1)" );
			$( "#img2" ).css( "transition", "0.3s" );
			$( "#img2" ).css( "transform", "scale(0)" );
			$( "#img3" ).css( "transition", "0.3s" );
			$( "#img3" ).css( "transform", "scale(1)" );
		}else if(email1 == email2 && email2 != ""){
			$( "#img1" ).css( "transition", "0.3s" );
			$( "#img1" ).css( "transform", "scale(1)" );
			$( "#img2" ).css( "transition", "0.3s" );
			$( "#img2" ).css( "transform", "scale(1)" );
			$( "#img3" ).css( "transition", "0.3s" );
			$( "#img3" ).css( "transform", "scale(0)" );
		}else if(email2 == ""){
			$( "#img2" ).css( "transition", "0.3s" );
			$( "#img2" ).css( "transform", "scale(0)" );
			$( "#img3" ).css( "transition", "0.3s" );
			$( "#img3" ).css( "transform", "scale(0)" );
		}
});



/*function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;

        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);

        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)        
                alert('CPF Invalido!');         
}*/

function getEndereco() {
if($.trim($("#cep").val()) != ""){
	$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&amp;cep="+$("#cep").val(), function(){
		if(resultadoCEP["tipo_logradouro"] != ''){
			if (resultadoCEP["resultado"]) {
				$("#rua").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
				$("#bairro").val(unescape(resultadoCEP["bairro"]));
				$("#cidade").val(unescape(resultadoCEP["cidade"]));
				$("#estado").val(unescape(resultadoCEP["uf"]));
				$("#numero").focus();
			}
		}
		});
	}
};



jQuery(function(){
   $("#cpf").mask("999.999.999-99",{placeholder:" "});
   $("#rg").mask("99.999.999-99",{placeholder:" "});
   $("#data").mask("99/99/9999");
});

$(function(){
	wscep();
});