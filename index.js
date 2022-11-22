loadProvinces();

const MAX_PARTY = 6;

//Muestra los votos totales de una provincia seleccionada
function showProvince(str) {
    if (str == "") {
        document.getElementById("showAdvance").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText)

            let series = [];

            for (let i = 0; i < MAX_PARTY; i++) {
                series[i] = [data[i]['Partido'], parseInt(data[i]['Total_Votos'])];
            }

            const chart = Highcharts.chart('TotalVotsForProvince', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'Total Votos ' + str,
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '110%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total Votos',
                    innerSize: '50%',
                    data: series
                }]
            });
        }
    }
    xmlhttp.open("GET", "totalVotsProv.php?q=" + str, true);
    xmlhttp.send();
}

//Carga las provincias en el <form>
function loadProvinces() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("selectProvince").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getprovince.php?q=", true);
    xmlhttp.send();
}

//Muestra higchart votos totales
document.addEventListener("DOMContentLoaded", function () {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText);

            let series = [];

            for (let i = 0; i < MAX_PARTY; i++) {
                series[i] = [data[i]['Partido'], parseInt(data[i]['Total_Votos'])];
            }

            const chart = Highcharts.chart('showTotalVots', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'Total Votos',
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '110%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Total Votos',
                    innerSize: '50%',
                    data: series
                }]
            });
        }
    };
    xmlhttp.open("GET", "totalVots.php", true);
    xmlhttp.send();
});

//Muestra higchart avances por provincia
document.addEventListener("DOMContentLoaded", function () {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText);
            let provincias = [];
            let primer_av = [];
            let segundo_av = [];

            for (let i = 0; i < data.length; i++) {
                provincias[i] = data[i]['Provincia'];
            }
            for (let i = 0; i < data.length; i++) {
                primer_av[i] = parseInt(data[i]['Primer Avance']);
            }
            for (let i = 0; i < data.length; i++) {
                segundo_av[i] = parseInt(data[i]['Segundo Avance']);
            }
            const chart = Highcharts.chart('showAdvance', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: "Avences según la provincia"
                },
                xAxis: {
                    categories: provincias
                },
                yAxis: {
                    title: {
                        text: 'Votos'
                    }
                },
                series: [{
                    name: 'Primer Avance',
                    data: primer_av
                }, {
                    name: 'Segundo Avance',
                    data: segundo_av
                }]
            });
        }
    };
    xmlhttp.open("GET", "showadvance.php?q=", true);
    xmlhttp.send();
});

