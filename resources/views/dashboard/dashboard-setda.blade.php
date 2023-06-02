<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="refresh" content="10" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('images/banyuasin.png') }}" rel="shortcut icon">

    <style>
        * {
            box-sizing: border-box;
        }

        [class*="col-"] {
            float: left;
            padding: 15px;
            /* border: 1px solid white; */
        }

        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-5 {
            width: 41.66%;
        }

        .col-6 {
            width: 50%;
        }

        .col-7 {
            width: 58.33%;
        }

        .col-8 {
            width: 66.66%;
        }

        .col-9 {
            width: 75%;
        }

        .col-10 {
            width: 83.33%;
        }

        .col-11 {
            width: 91.66%;
        }

        .col-12 {
            width: 100%;
        }

        main {
            display: grid;
            font-family: 'Source Sans Pro';
            margin: 0;
            background-image: url('images/background.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            grid-template-areas: "header header"
                "side content"
                "nav content"
                "footer footer";
            grid-template-columns: 23% 77% auto;
            min-height: 100vh;
        }

        img.logo {
            width: 550px;
            max-width: 100% float: left;
        }

        img {
            width: 350px;
            float: left;
        }

        h1 {
            color: #ddd;
        }

        header {
            padding: 0px 5px 0px 5px;
            grid-template-rows: auto;
            grid-area: header;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        aside {
            grid-template-rows: 100vh;
            grid-area: side;
            display: flex;
            justify-content: center;
            align-items: center;
            image-orientation: from-image;
        }

        nav {
            grid-template-rows: 100vh;
            grid-area: nav;
        }

        section {
            padding: 5px;
            grid-template-rows: 100vh;
            grid-area: content;
        }

        footer {
            padding: 10px;
            grid-template-rows: 100vh;
            grid-area: footer;
        }

        span {
            opacity: 0;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            background-color: #f2f2f2;
            width: 100%;
            font-size: 1.5em;
            border-radius: 5px;
        }

        .title-header {
            display: flex;
            justify-content: start;
            align-items: center;
            gap: 10px;
            padding: 0px 5px 0px 5px;
        }

        .time-container {
            display: flex;
            justify-content: right;
            padding: 0px 5px 0px 5px;
            color: #f2f2f2;
        }

        th {
            text-align: left;
            padding: 10px;
            border-bottom: 4px solid maroon;
        }

        td {
            text-align: left;
            padding: 5px;
            border-bottom: 4px solid maroon;
        }



        .clock {
            font-family: Orbitron;
            font-size: 2em;
            letter-spacing: 7px;
            border-left: 2px solid #fefefe;
            display: flex;
            align-items: right;
            padding-left: 5px;

        }

        @media only screen and (max-width: 500px) {

            body {
                grid-template-areas:
                    "header header"
                    "side content"
                    "nav content";
            }
        }
    </style>
</head>

<body>


    <main class="container">
        <header>
            <div class="title-header col-6">
                <a href="/home"> <img class="logo" src="{{ asset('images/sekretariat-daerah/LOGO-PEMKAB.png') }}" />
                </a>
            </div>
            <div class="time-container col-6">
                <h5 style="font-size:2em; margin-right: 5px"> {{ $today }}</h5>
                <h5 id="MyClockDisplay" class="clock " onload="showTime()"></h5>
            </div>
        </header>

        <aside>
            <img src="{{ asset('images/sekretariat-daerah/sekda.png') }}" />
        </aside>


        <section>
            <span id="data-count">{{ $count }}</span>
            <table id="myTable" class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: left; width: 20px;">No.</th>
                        <th>Nama</th>
                        <th>Asal Instansi</th>
                        <th>Keperluan</th>
                        <th>Tujuan</th>
                    </tr>
                </thead>
                <tbody id="myTableBody">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($tamu as $item)
                        <tr>
                            <td style="text-align: center;">{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamatAsalInstansi }}</td>
                            <td>{{ $item->keperluan }}</td>
                            <td>{{ $item->tujuan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>


    <script src="{{ asset('template/dist/js/style.js') }}"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    url: '/get-latest-data-setda',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        date: '{{ $now }}'
                    },
                    success: function(response) {
                        var currentCount = parseInt($('#data-count').text());
                        if (response.count > currentCount) {
                            $('#data-count').text(response.count);

                            // Clear the table body
                            var tbody = $('#myTableBody');
                            tbody.html('');

                            // Append the latest data to the table
                            $.each(response.tamu, function(index, item) {
                                if (item.nama !== null) {
                                    var row = '<tr>' +
                                        '<td style="text-align: center;">' + (index +
                                            1) + '</td>' +
                                        '<td>' + item.nama + '</td>' +
                                        '<td>' + item.alamatAsalInstansi + '</td>' +
                                        '<td>' + item.keperluan + '</td>' +
                                        '<td>' + item.tujuan + '</td>' +
                                        '</tr>';
                                    tbody.append(row);
                                }
                            });
                        }
                    }
                });
            }, 2000);
        });
    </script>
</body>


</html>
