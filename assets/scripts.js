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
                                    <h5>Pontos: </h5>
                                    <h5 id="time${index + 1}-pontos"> ${pontos}</h5> <!-- Exibe os pontos aqui -->
                                  </div>
                                  <div class = "containerNameTime">
                                    <h5>Time:</h5>
                                    <h5>${time}</h5>
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
  $.ajax({
    url: 'getPonto.php',  // URL para carregar os dados
    method: 'GET',
    dataType: 'json',
    success: function(data) {
      console.log('Dados recebidos:', data);  // Exibe os dados recebidos no console

      // Verifica se a resposta é um array válido
      if (Array.isArray(data)) {
        console.log("A resposta é um array válido.");

        // Coleta os nomes dos times e os pontos
        const times = data.map(item => item.time);
        const pontos = data.map(item => parseInt(item.pontos, 10));  // Converte os pontos para números inteiros

        const ctx = document.getElementById('myChart');

        // Se o gráfico já foi criado, apenas atualize os dados
        if (myChart) {
          myChart.data.labels = times;  // Atualiza os nomes dos times
          myChart.data.datasets[0].data = pontos;  // Atualiza os pontos dos times
          myChart.update();  // Atualiza o gráfico
        } else {
          // Caso o gráfico não tenha sido criado ainda, crie-o
          myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: times,
              datasets: [{
                label: '# de Pontos',
                data: pontos,
                borderColor: '#FFFFFF',
                backgroundColor: '#00BFFF',
                borderWidth: 2
              }]
            },
            options: {
              responsive: true,  // Garante que o gráfico será redimensionado automaticamente
              maintainAspectRatio: false,  // Permite que o gráfico preencha o contêiner (sem manter a proporção)
              scales: {
                y: {
                  beginAtZero: true,
                  ticks: {
                    font: {
                      size: 20,  // Tamanho da fonte para os pontos no eixo Y
                      color: '#FFFFFF'  // Cor da fonte para os rótulos no eixo Y
                    }
                  }
                },
                x: {
                  ticks: {
                    font: {
                      size: 20,  // Tamanho da fonte para os nomes dos times no eixo X
                      color: '#FFFFFF'  // Cor da fonte para os rótulos no eixo X
                    }
                  }
                }
              },
              plugins: {
                legend: {
                  labels: {
                    font: {
                      size: 18,  // Tamanho da fonte da legenda
                      color: '#FFFFFF'  // Cor da fonte para a legenda
                    }
                  }
                }
              }
            }
          });
        }
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
  carregarDashboard();  // Carregar o gráfico assim que a página carregar
  console.log("Dashboard carregado na inicialização");

  // Atualiza o gráfico a cada 1 segundo (1000ms)
  setInterval(function() {
    console.log("Atualizando Dashboard...");
    carregarDashboard();  // Atualiza o gráfico com os dados mais recentes
  }, 1000);
});
