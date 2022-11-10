<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bumi Baik</title>
    <link rel="icon" href="{{ asset('asset/color-logo.png') }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bgimg {
            background-image: url('https://www.w3schools.com/w3images/forestbridge.jpg');
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
            color: white;
            font-family: "Courier New", Courier, monospace;
            font-size: 25px;
        }

        .topleft {
            position: absolute;
            top: 0;
            left: 16px;
        }

        .bottomleft {
            position: absolute;
            bottom: 0;
            left: 16px;
        }

        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        hr {
            margin: auto;
            width: 40%;
        }
    </style>
</head>

<body>
    <div class="bgimg">
        <div class="topleft">
            <img src="{{ asset('asset/white-logo.png') }}" alt="Bumi Baik" style="padding-top: 20px" width="100px">
        </div>
        <div class="middle">
            {{-- // create button link --}}
            <a href="{{ asset('asset/apk/bumibaik.apk') }}"
                style="text-decoration: none; padding: 20px; background-color: white; border-radius: 10px; color: black; font-weight: bold">Download
                Beta App</a>
        </div>
        {{-- <div class="bottomleft">
            <p>Some text</p>
        </div> --}}
    </div>
</body>

</html>
