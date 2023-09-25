@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <input id="basicFlatpickri" value="{{ $diaA }}" class="form-control flatpickr flatpickr-input active"
                type="text" placeholder="Seleccione fecha..." readonly="readonly">
        </div>
        <div>
            <input id="basicFlatpickrf" value="{{ $diaA }}" class="form-control flatpickr flatpickr-input active"
                type="text" placeholder="Seleccione fecha..." readonly="readonly">
        </div>
        <div id="chartArea" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Promedio diario</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="s-line-area" name="s-line-area" class="" style="min-height: 365px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var dPregunta1 = [];
        var dHoraFec1 = [];
        var f1 = flatpickr(document.getElementById('basicFlatpickri'));
        var f2 = flatpickr(document.getElementById('basicFlatpickrf'));
        var lchart;

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

            callback();
            lchart = new ApexCharts(
                document.querySelector('#s-line-area'),
                sLineArea
            );
            lchart.render();
        }

        document.querySelector("#basicFlatpickri").addEventListener("change", (event) => {
            lchart.zoomX(document.querySelector("#basicFlatpickri").value, document.querySelector(
                "#basicFlatpickrf").value)
        });

        LlenarChart(LlenarVariable);
    </script>
@endsection
