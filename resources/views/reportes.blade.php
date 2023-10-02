@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row layout-spacing">
            <div class=" col-6">
                <label for="fechai">Fecha de inicio</label>
                <input id="basicFlatpickri" value="{{ $diaI }}" class="form-control flatpickr flatpickr-input active"
                    type="text" placeholder="Seleccione fecha..." readonly="readonly">
            </div>
            <div class=" col-6">
                <label for="fechaf">Fecha final</label>
                <input id="basicFlatpickrf" value="{{ $diaA }}"
                    class="form-control flatpickr flatpickr-input active" type="text" placeholder="Seleccione fecha..."
                    readonly="readonly">
            </div>
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
        var f1 = flatpickr(document.getElementById('basicFlatpickri'), {
            minDate: '1920-01-01',
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                },
                months: {
                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                    longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                },
            },

        });
        var f2 = flatpickr(document.getElementById('basicFlatpickrf'), {
            minDate: '1920-01-01',
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                },
                months: {
                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                    longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                },
            },

        }
        );
        var lchart;
        var datePick1 = document.querySelector("#basicFlatpickri");
        var datePick2 = document.querySelector("#basicFlatpickrf");

        function LlenarVariable() {
            Object.entries(@json($evaluaciones)).forEach(([key, value]) => {
                dPregunta1.push([value.DIA, (value.SUMA / value.CANT).toFixed(2)]);
                /*                 dHoraFec1.push(value.DIA); */
            })
            console.log(dPregunta1);
        }

        function LlenarChart(callback) {
            var sLineArea = {
                chart: {
                    defaultLocale: 'es',
                    locales: [{
                        name: 'es',
                        options: {
                            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'mayo', 'Junio', 'Julio', 'Agosto',
                                'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                            ],
                            shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
                                'Nov', 'Dic'
                            ],
                            days: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                            shortDays: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                            toolbar: {
                                download: 'Descargar SVG',
                                selection: 'Seleccion',
                                selectionZoom: 'Acercamiento',
                                zoomIn: 'Acercarse',
                                zoomOut: 'Alejarse',
                                pan: 'Panoramica',
                                reset: 'Resetear acercamiento',
                            }
                        }
                    }],
                    id: 'area-datetime',
                    height: 350,
                    type: 'area',
                    zoom: {
                        autoScaleYaxis: true
                    },
                    toolbar: {
                        show: false,
                    }
                },
                dataLabels: {
                    enabled: false
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
                    tickAmount: 6,
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

        function modificar() {
            lchart.zoomX(new Date(datePick1.value).getTime(), new Date(datePick2.value).getTime())
        }

        datePick1.addEventListener("change", (event) => {
            modificar()
        });
        datePick2.addEventListener("change", (event) => {
            modificar()
        });

        LlenarChart(LlenarVariable);
    </script>
@endsection
