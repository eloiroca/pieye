function pintarMonitoreigRam(tipusDispositiu, dades_monitoreig){
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  if (tipusDispositiu == "ordenador"){amplada_grafic=450;alsada_grafic=200}else{amplada_grafic=190;alsada_grafic=100}

  var dades_RAM = dades_monitoreig[2].split(" ");

  var totalRAM = dades_RAM[8];
  var lliureRAM = dades_RAM[18];
  var utilitzadaRAM = totalRAM-lliureRAM;
  var percentatgeLliureRAM = (lliureRAM * 100)/totalRAM;

  var totalRAM_MB=totalRAM/1024;
  var utilitzadaRAM_MB=utilitzadaRAM/1024;

  function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Language', 'Rating'],
    ['Usando', 100-percentatgeLliureRAM],
    ['Libre', percentatgeLliureRAM]
  ]);
  var options = {
  title: 'RAM EN USO: '+Math.round(utilitzadaRAM_MB)+' MB de '+Math.round(totalRAM_MB)+' MB',
  colors: ['#2ECC71', '#AEB6BF'],
  pieHole: 0.2,
  'width':amplada_grafic,
  'height':alsada_grafic
  };
  var chart = new google.visualization.PieChart(document.getElementById('estatRAM'));
  chart.draw(data, options);
  }
}

function pintarMonitoreigCpu(tipusDispositiu, dades_monitoreig){
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  if (tipusDispositiu == "ordenador"){amplada_grafic=450;alsada_grafic=200}else{amplada_grafic=190;alsada_grafic=100}

  var us_cpu = dades_monitoreig[1].slice(0,-1);

  function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Language', 'Rating'],
    ['Usando', Math.round(us_cpu)],
    ['Libre', 100-Math.round(us_cpu)]
  ]);
  var options = {
  title: 'CPU EN USO: '+us_cpu+'%',
  colors: ['#2ECC71', '#AEB6BF'],
  pieHole: 0.2,
  'width':amplada_grafic,
  'height':alsada_grafic
  };
  var chart = new google.visualization.PieChart(document.getElementById('estatCPU'));
  chart.draw(data, options);
  }
}

function pintarMonitoreigCpuTemp(tipusDispositiu, dades_monitoreig){

  if (tipusDispositiu == "ordenador"){amplada_grafic=150;alsada_grafic=190}else{amplada_grafic=105;alsada_grafic=100}
  google.charts.load('current', {'packages':['gauge']});
  google.charts.setOnLoadCallback(drawGauge);

  var gaugeOptions = {
      min: 0, max: 85,
      yellowFrom: 55, yellowTo: 75,
      redFrom: 75, redTo: 85,
      minorTicks: 3,
      'width':amplada_grafic,'height':alsada_grafic
  };
  var gauge;

  function drawGauge() {
    gaugeData = new google.visualization.DataTable();
    gaugeData.addColumn('number', 'Temp °C');
    gaugeData.addRows(1);

    var temp = dades_monitoreig[0];
    var temp_real = temp.substring(0, 2);

    gaugeData.setCell(0, 0, temp_real);

    gauge = new google.visualization.Gauge(document.getElementById('estatCPUTEMP'));
    gauge.draw(gaugeData, gaugeOptions);

  }
}

function pintarMonitoreigEspai(tipusDispositiu, dades_monitoreig){
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  if (tipusDispositiu == "ordenador"){amplada_grafic=450;alsada_grafic=210}else{amplada_grafic=370;alsada_grafic=100}

  var dades_ESPAI = dades_monitoreig[3].split(" ");

  var totalMEM = dades_ESPAI[7].slice(0,-1);
  var lliureMEM = dades_ESPAI[11].slice(0,-1);
  var utilitzadaMEM = totalMEM-lliureMEM;
  var percentatgeLliureMEM = (lliureMEM * 100)/totalMEM;

  function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Language', 'Rating'],
    ['Usando', 100-percentatgeLliureMEM],
    ['Libre', percentatgeLliureMEM]
  ]);
  var options = {
  title: 'MEMORIA EN USO: '+Math.round(utilitzadaMEM) +' GB DE '+Math.round(totalMEM)+' GB',
  colors: ['#2ECC71', '#AEB6BF'],
  pieHole: 0.2,
  'width':amplada_grafic,
  'height':alsada_grafic
  };
  var chart = new google.visualization.PieChart(document.getElementById('estatESPAI'));
  chart.draw(data, options);
  }
}

function pintarGraficsIntranet(){
  //Carregar monitoreig RASPBERRY PI
  $.ajax({
       type: "POST",
       url: config.rutes[0].ajax_monitoreig_rasoberry,
       data: {textbox: 'e'},
       dataType: "text",
       cache:false,
       success:
          function(dades_monitoreig){
            dades_monitoreig = JSON.parse(dades_monitoreig);
            pintarMonitoreigCpuTemp(tipusDispositiu, dades_monitoreig);
            pintarMonitoreigCpu(tipusDispositiu, dades_monitoreig);
            pintarMonitoreigRam(tipusDispositiu, dades_monitoreig);
            pintarMonitoreigEspai(tipusDispositiu, dades_monitoreig);
        },
    });


}

$(document).ready(function () {
    pintarGraficsIntranet();
    setInterval(function() {pintarGraficsIntranet(); }, 10000);
  });
