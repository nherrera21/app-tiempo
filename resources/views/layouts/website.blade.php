<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Meteorologica</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <style>
        .mohammad-a {
            /* Style for "mohammad-a" */
            background-image: url('img/bg.png');
            background-position: center;
            background-size: cover;
            width: auto;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .bitmap {
            /* Style for "Bitmap" */
            background-image: url('img/logo.png');
            width: 618px;
            height: 158px;
            margin-top: 100px;
        }

        .texto-a {
            /* Style for "Entérate d" */
            width: 527px;
            height: 48px;
            color: #ffffff;
            font-family: "Muli";
            font-size: 18px;
            font-weight: 700;
            font-style: normal;
            letter-spacing: normal;
            line-height: 24px;
            text-align: center;
            margin-top: 157px;
        }

        .input-a {
            /* Style for "Rectangle" */
            width: 527px;
            height: 48px;
            border-radius: 4px;
            border: 1px solid #ffffff;
            margin-top: 30px;
        }

        .input-b {
            /* Style for "Introduce" */
            width: 527px;
            height: 48px;
            border-color: transparent;
            color: #ffffff;
            font-family: "Muli";
            font-size: 18px;
            font-weight: 400;
            font-style: normal;
            letter-spacing: normal;
            line-height: normal;
            text-align: center;
            background-color: transparent;
        }

        .btn-b {
            /* Style for "Rectangle" */
            width: 527px;
            height: 48px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            background-color: #00bde0;
            margin-top: 16px;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .text-btn-b {
            /* Style for "Buscar" */
            width: 80px;
            height: 30px;
            color: #ffffff;
            font-family: "Muli";
            font-size: 24px;
            font-weight: 700;
            font-style: normal;
            letter-spacing: normal;
            line-height: normal;
            text-align: center;
        }

        .icon-btn-b {
            background-image: url('img/btn-icon.png');
            background-repeat: no-repeat;
            background-size: contain;
            width: 30px;
            height: 30px;
        }

        .footer-a {
            /* Style for "¡Que la ll" */
            width: 208px;
            height: 24px;
            color: #ffffff;
            font-family: "Muli";
            font-size: 18px;
            font-weight: 700;
            font-style: normal;
            letter-spacing: normal;
            line-height: 24px;
            text-align: center;
            margin-top: 100px;
            margin-bottom: 100px;
        }

        .texto-b {
            /* Style for "Entérate d" */
            width: 527px;
            height: 48px;
            color: #ffffff;
            font-family: "Muli";
            font-size: 18px;
            font-weight: 700;
            font-style: normal;
            letter-spacing: normal;
            line-height: 24px;
            text-align: right;
        }

        .area {
            height: 100%;
            width: 100%;
            margin-bottom: 80px
        }

        .area-a {
            background-image: url('img/rectangle.png');
            height: 400px;
            background-size: cover;
        }

        .area-aa {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .area-b {
            display: flex;
            flex-direction: column;
        }

        .label-a {
            /* Style for "Código pos" */
            width: 106px;
            height: 24px;
            color: #ffffff;
            font-family: "Muli";
            font-size: 16px;
            font-weight: 400;
            font-style: normal;
            letter-spacing: normal;
            line-height: 24px;
            text-align: left;
        }

        .label-aa {
            /* Style for "08034" */
            width: 260px;
            height: 24px;
            color: #ffffff;
            font-family: "Muli";
            font-size: 20px;
            font-weight: 700;
            font-style: normal;
            letter-spacing: normal;
            line-height: 24px;
            text-align: left;
        }

        .lable-temp {
            /* Style for "-3º" */
            width: 79px;
            height: 73px;
            color: #ffffff;
            font-family: "Muli";
            font-size: 58px;
            font-weight: 300;
            font-style: normal;
            letter-spacing: normal;
            line-height: normal;
            text-align: center;
        }

        .label-temp-a {
            /* Style for "Código pos" */
            color: #ffffff;
            font-family: "Muli";
            font-size: 16px;
            font-weight: 400;
            font-style: normal;
            letter-spacing: normal;
            line-height: 24px;
            text-align: center;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>