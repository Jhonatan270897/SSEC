@extends('layouts.app')

@section('content')
    <div class="col-xl-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Pregunta N° 01</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <p class="mb-4">¿Está satisfecho con la calidad de servicio ofrecida por la Oficina General de Admisión</p>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-success">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content">Muy satisfecho</span>
                    </label>
                </div>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-info">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content">Satisfecho</span>
                    </label>
                </div>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-default">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content" checked="">Neutral</span>
                    </label>
                </div>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-warning">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content">Satisfecho</span>
                    </label>
                </div>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-danger">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content">Muy
                            insatisfecho</span>
                    </label>
                </div>

            </div>
        </div>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Pregunta N° 02</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <p class="mb-4">¿Qué tan satisfactoria fue la atencion que recibio?</p>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-success">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content">Muy satisfecho</span>
                    </label>
                </div>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-info">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content">Satisfecho</span>
                    </label>
                </div>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-default">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content" checked="">Neutral</span>
                    </label>
                </div>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-warning">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content">Satisfecho</span>
                    </label>
                </div>

                <div class="n-chk">
                    <label class="new-control new-radio new-radio-text radio-classic-danger">
                        <input type="radio" class="new-control-input" name="custom-radio-5">
                        <span class="new-control-indicator"></span><span class="new-radio-content">Muy
                            insatisfecho</span>
                    </label>
                </div>

            </div>
        </div>
    </div>
@endsection
