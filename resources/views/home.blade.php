@extends('layouts.app')

@section('content')
    <div class="col-xl-12 col-12 layout-spacing">
        @forelse ($preguntas as $pregunta)
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Pregunta N° {{ ++$cont }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <p class="mb-4">{{ $pregunta->descripcion }}
                    </p>

                    <form method="post" action="{{ route('home.store') }}">
                        @csrf
                        <div class="n-chk">
                            <label class="new-control new-radio new-radio-text radio-classic-success">
                                <input type="radio" class="new-control-input" name="calif" value="5">
                                <span class="new-control-indicator"></span><span class="new-radio-content">Muy
                                    satisfecho</span>
                            </label>
                        </div>

                        <div class="n-chk">
                            <label class="new-control new-radio new-radio-text radio-classic-info">
                                <input type="radio" class="new-control-input" name="calif" value="4">
                                <span class="new-control-indicator"></span><span class="new-radio-content">Satisfecho</span>
                            </label>
                        </div>

                        <div class="n-chk">
                            <label class="new-control new-radio new-radio-text radio-classic-default">
                                <input type="radio" class="new-control-input" name="calif" value="3"
                                    checked="">
                                <span class="new-control-indicator"></span><span class="new-radio-content">Neutral</span>
                            </label>
                        </div>

                        <div class="n-chk">
                            <label class="new-control new-radio new-radio-text radio-classic-warning">
                                <input type="radio" class="new-control-input" name="calif" value="2">
                                <span class="new-control-indicator"></span><span
                                    class="new-radio-content">Insatisfecho</span>
                            </label>
                        </div>

                        <div class="n-chk">
                            <label class="new-control new-radio new-radio-text radio-classic-danger">
                                <input type="radio" class="new-control-input" name="calif" value="1">
                                <span class="new-control-indicator"></span><span class="new-radio-content">Muy
                                    insatisfecho</span>
                            </label>
                        </div>
                        <div>
                            <button id="resp" class="mr-2 btn btn-primary mixin" type="submit">Enviar respuesta</button>
                        </div>

                    </form>
                </div>
            </div>
        @empty
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>No se encontraron preguntas</h4>
                    </div>
                </div>
            </div>
        @endforelse

    </div>
    <script>
        $('.widget-content .mixin').on('click', function() {
            const toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000,
                padding: '2em'
            });

            toast({
                type: 'success',
                title: 'Gracias por su tiempo',
                padding: '2em',
            })

        })
    </script>
@endsection
