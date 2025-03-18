function carregarPontos() {
  console.log("Carregando os pontos...");

  $.ajax({
      url: 'getPonto.php',  // URL para carregar os dados
      method: 'GET',
      dataType: 'json',
      success: function(data) {
          console.log('Dados recebidos:', data);  // Exibe os dados recebidos no console

          // Verifica se a resposta é um array válido
          if (Array.isArray(data)) {
              console.log("A resposta é um array válido.");

              // Atualiza os pontos para cada time
              data.forEach(function(item, index) {
                  var time = item.time;
                  var pontos = parseInt(item.pontos, 10);  // Converte a string para número

                  // Exibe os dados no console para depuração
                  console.log("Time:", time, "Pontos:", pontos);

                  // Verifica se a div do time já foi criada
                  if ($(`#time${index + 1}-pontos`).length === 0) {
                      // Cria a estrutura HTML para o time, caso ainda não tenha sido criada
                      var boxHtml = `
                      <div class="container1">
                          <div class="boxStyle box${index + 1}">
                              <div class="detalhes">
                                  <div class = "containerPontos ">
                                    <h4>Pontos: </h4>
                                    <h4 id="time${index + 1}-pontos"> ${pontos}</h4> <!-- Exibe os pontos aqui -->
                                  </div>
                                  <div class = "containerNameTime">
                                    <h4>Time:</h4>
                                    <h4>${time}</h4>
                                  </div>
                              </div>
                              <div id="caixa${index + 1}"></div>
                          </div>
                      </div>
                  `;
                  
                  $(".containerTimes").append(boxHtml);

                      // Exemplo de gráfico (dados aleatórios)
                      var sparkData = Array.from({ length: 10 }, () => Math.floor(Math.random() * 100)); // Dados fictícios
                      var sparkConfig = {
                          chart: {
                              id: `spark${index + 1}`,
                              group: 'sparks',
                              type: 'line',
                              height: 80,
                              sparkline: { enabled: true }
                          },
                          series: [{ data: sparkData }],
                          stroke: { curve: 'smooth' },
                          markers: { size: 0 },
                          grid: { padding: { top: 20, bottom: 10, left: 110 } },
                          colors: ['#fff'],
                          tooltip: { x: { show: false }, y: { title: { formatter: function() { return ''; }}}}
                      };

                      // Renderiza o gráfico
                      new ApexCharts(document.querySelector(`#spark${index + 1}`), sparkConfig).render();
                  }

                  // Atualiza os pontos diretamente
                  $(`#time${index + 1}-pontos`).text(pontos);
              });
          } else {
              console.log('Erro: A resposta não é um array válido.');
          }
      },
      error: function(xhr, status, error) {
          console.log('Erro ao carregar os pontos', error);
          console.log('Status:', status);
          console.log('Response Text:', xhr.responseText);
      }
  });
}

$(document).ready(function() {
  carregarPontos();  // Carregar os pontos assim que a página carregar
  console.log("Pontos carregados na inicialização");

  // Atualiza os pontos a cada 1 segundo (1000ms)
  setInterval(function() {
      console.log("Atualizando os pontos...");
      carregarPontos();  // Não recarrega a página, apenas atualiza os dados
  }, 1000);
});





let myChart;  // Variável global para armazenar a instância do gráfico

function carregarDashboard() {
  const ctx = document.getElementById('myChart');

  // Se o gráfico já foi criado, apenas atualize os dados
  if (myChart) {
    const novosDados = [12, 19, 3, 5, 2, 3];  // Substitua com seus dados reais
    myChart.data.datasets[0].data = novosDados;  // Atualiza os dados
    myChart.update();  // Atualiza o gráfico
  } else {
    // Caso o gráfico não tenha sido criado ainda, crie-o
    myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],  // Dados iniciais ou dados reais
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }
}

$(document).ready(function() {
  carregarDashboard();  // Carregar o gráfico assim que a página carregar
  console.log("Dashboard carregado na inicialização");

  // Atualiza o gráfico a cada 1 segundo (1000ms)
  setInterval(function() {
    console.log("Atualizando Dashboard...");
    carregarDashboard();  // Atualiza o gráfico sem recriar
  }, 1000);
});

