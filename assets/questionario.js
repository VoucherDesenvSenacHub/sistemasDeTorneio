
function submitAnswer(idDesafio) {
    // Obter o formulário correspondente à pergunta
    var formData = $('#form_' + idDesafio).serialize(); // Serializa os dados do formulário
    
    $.ajax({
        url: './processar_questionario.php',  // O arquivo que processa as respostas
        type: 'POST',
        data: formData,  // Envia os dados do formulário
        success: function(response) {
            // Exibe o retorno da resposta
            alert(response);
            // Desabilita o botão de envio após a resposta
            $('#form_' + idDesafio).find('button').prop('disabled', true);  
        },
        error: function() {
            alert('Ocorreu um erro. Tente novamente.');
        }
    });
}

