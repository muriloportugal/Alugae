(function ($) {
	"use strict";

	var inputsCEP = $('.logradouro, .bairro, .localidade, .uf, .ibge, #uf0');
	var validacep = /^[0-9]{8}$/;

	function limpa_formulário_cep(alerta) {
		if (alerta !== undefined) {
			alert(alerta);
			inputsCEP.text('');
			inputsCEP.val('');
		}
	}

	function get(url) {

		$.get(url, function (data) {

			if (!("erro" in data)) {

				if (Object.prototype.toString.call(data) === '[object Array]') {
					var data = data[0];
				}

				$.each(data, function (nome, info) {
					if (nome != 'cep') {
						$('.' + nome).text(info);
						$('.' + nome).val(info);
					}
				});
				$('#uf0').text(' - ');
				$('#FindCity').submit();
			} else {
				limpa_formulário_cep("CEP não encontrado.");
			}

		});
	}


	// Digitando CEP
	$('.cep').on('blur', function (e) {

		inputsCEP.text('');

		var cep =  $(this).val().replace(/\D/g, '').replace(/-/g, '');

		if (cep !== "" && validacep.test(cep)) {

			inputsCEP.text('...');
			get('https://viacep.com.br/ws/' + cep + '/json/');

		} else {
			limpa_formulário_cep(cep == "" ? undefined : "Formato de CEP inválido.");
		}
	});


})(window.jQuery);
