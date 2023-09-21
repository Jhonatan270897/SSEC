@extends('layouts.app')

@section('content')
    <div id="chartArea" class="col-xl-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Promedio diario </h4>
                        <h5>{{$evaluaciones}}</h5>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div id="s-line-area" name="s-line-area" class="" style="min-height: 365px;">

                </div>
            </div>
        </div>
    </div>
    <script>
        var dPregunta1 = [];
        var dHoraFec1 = [];


        function LlenarVariable() {
            Object.entries(@json($evaluaciones)).forEach(([key, value]) => {
                dPregunta1.push((value.SUMA / value.CANT).toFixed(2));
                dHoraFec1.push(value.DIA);
            })
        }

        function LlenarChart(callback) {
            var sLineArea = {
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: false,
                    }
                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    curve: 'smooth'
                },
                series: [{
                    name: 'Pregunta 1',
                    data: dPregunta1
                }],
                yaxis: {
                    min: 1,
                    max: 5,
                    tickAmount: 4,
                },
                xaxis: {
                    type: 'datetime',
                    categories: dHoraFec1,
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy'
                    },
                }
            }
            var lchart = new ApexCharts(
                document.querySelector('#s-line-area'),
                sLineArea
            );

            callback();
            lchart.render();
            console.log(sLineArea);
        }

        LlenarChart(LlenarVariable);
    </script>
@endsection
