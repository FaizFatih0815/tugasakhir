@extends('layout.layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="font-weight-bold mb-0 text-gray-100">Analytic</h1>
        </div>

        <div class="row">

            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" style="color:#222831">Chart Magnitude</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="ChartMagnitude"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" style="color:#222831">Chart Frekuensi</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="ChartFrequency"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




@stop
@section('customscript')
    <!-- Page level plugins -->
    <script src="js/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <!-- Page level custom scripts -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#222831';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        var labels = @json($labels);
        var max_magnitude = @json($max_magnitude);
        var min_magnitude = @json($min_magnitude);
        var max_frekuensi = @json($max_frekuensi);
        var min_frekuensi = @json($min_frekuensi);
        // Area Chart Example
        var ctx = document.getElementById("ChartMagnitude");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: "Nilai Magnitude Maximal",
                        lineTension: 0.3,
                        backgroundColor: "rgba(46, 52, 21, 0.05)",
                        fill: false,
                        borderColor: "rgba(30, 40, 49, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(30, 40, 49, 1)",
                        pointBorderColor: "rgba(30, 40, 49, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(244, 209, 96, 1)",
                        pointHoverBorderColor: "rgba(244, 209, 96, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: max_magnitude,
                    },
                    {
                        label: "Nilai Magnitude Minimal",
                        lineTension: 0.3,
                        backgroundColor: "rgba(30, 40, 49, 0.05)",
                        fill: false,
                        borderColor: "rgba(87, 91, 96, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(87, 91, 96, 1)",
                        pointBorderColor: "rgba(87, 91, 96, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(244, 209, 96, 1)",
                        pointHoverBorderColor: "rgba(244, 209, 96, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: min_magnitude,

                    }

                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7,
                            maxRotation: 45,
                            minRotation: 45,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            maxRotation: 45,
                            minRotation: 45,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    lables: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ' : ' + number_format(tooltipItem.yLabel) + ' V';
                        }
                    }
                }
            }
        });

        // Area Chart Example
        var ctx = document.getElementById("ChartFrequency");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: "Nilai Frekuensi Maksimal",
                        lineTension: 0.3,
                        backgroundColor: "rgba(46, 52, 21, 0.05)",
                        fill: false,
                        borderColor: "rgba(30, 40, 49, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(30, 40, 49, 1)",
                        pointBorderColor: "rgba(30, 40, 49, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(244, 209, 96, 1)",
                        pointHoverBorderColor: "rgba(244, 209, 96, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: max_frequency,
                    },
                    {
                        label: "Nilai Frekuensi Minimal",
                        lineTension: 0.3,
                        backgroundColor: "rgba(46, 52, 21, 0.05)",
                        fill: false,
                        borderColor: "rgba(87, 91, 96, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(87, 91, 96, 1)",
                        pointBorderColor: "rgba(87, 91, 96, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(244, 209, 96, 1)",
                        pointHoverBorderColor: "rgba(244, 209, 96, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: min_frequency,
                    }

                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7,
                            maxRotation: 45,
                            minRotation: 45,
                        },
                        left: 100,
                        right: 100,
                        // grid: {
                        //     padding: {
                        //         left: 50,
                        //         right: 50,
                        //     }
                        // }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            maxRotation: 45,
                            minRotation: 45,

                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    lables: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ' : ' + number_format(tooltipItem.yLabel) + ' Hz';
                        }
                    }
                }
            }
        });
    </script>
@stop
