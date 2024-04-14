<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        svg {
            position: absolute; /* Colocamos el SVG en posición absoluta */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Aseguramos que el SVG esté detrás del contenido */
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="{{ asset('js/index.js') }}"></script>
</head>

<body>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1600 900"
        preserveAspectRatio="xMidYMax slice">
        <defs>
            <linearGradient id="bg">
                <stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.06)"></stop>
                <stop offset="50%" style="stop-color:rgba(76, 190, 255, 0.6)"></stop>
                <stop offset="100%" style="stop-color:rgba(115, 209, 72, 0.2)"></stop>
            </linearGradient>
            <path id="wave" fill="url(#bg)"
                d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
        s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
        </defs>
        <g>
            <use xlink:href='#wave' opacity=".3">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="10s"
                    calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacity=".6">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                    calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacity=".9">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                    calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
        </g>
    </svg>
    <div class="container">
    @if(session('message') && session('message')['success'])
        <div id="custom-alert" class="alert alert-info alert-dismissible fade show custom-alert" role="alert">
            {{ session('message')['success'] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(function () {
                document.getElementById('custom-alert').remove();
            }, 2000); // Cambia 5000 por el número de milisegundos que deseas que el mensaje se muestre (en este caso, 5 segundos)
        </script>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-4">
            <h2 class="text-center mb-4 text-white">Agregar usuario</h2>
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
                            <div class="mb-3">
                                {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                {!! Form::label('email', 'Correo', ['class' => 'form-label']) !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                {!! Form::label('password', 'Contraseña', ['class' => 'form-label']) !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
