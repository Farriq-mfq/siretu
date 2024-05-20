<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print Table</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 20px
        }

        @page {
            size: auto;
            margin: 0;
        }

        .table-borderless>tbody>tr>td,
        .table-borderless>tbody>tr>th,
        .table-borderless>tfoot>tr>td,
        .table-borderless>tfoot>tr>th,
        .table-borderless>thead>tr>td,
        .table-borderless>thead>tr>th {
            border: none;
        }
    </style>
</head>

<body>
    @php
        $personil = \App\Models\Personil::where('NOTELP', request('personil'))->first();
        if (!$personil) {
            abort(404);
        }
    @endphp
    <div class="text-center">
        <h1 class="h1">Jurnal Kegiatan Belajar Mengajar</h1>
        <br><br>
        <div style="width:400px">
            <table class="table table-borderless">
                <tr>
                    <th>Nama </th>
                    <td>:</td>
                    <td class="text-left">&nbsp;{{ $personil->NAMALENGKAP }}</td>
                </tr>
                <tr>
                    <th>Mapel</th>
                    <td>:</td>
                    <td class="text-left">&nbsp;{{ $personil->MAPEL }}</td>
                </tr>
                <tr>
                    <th>Tanggal Cetak</th>
                    <td>:</td>
                    <td class="text-left">&nbsp;{{ \Carbon\Carbon::now()->format('d F Y') }}</td>
                </tr>
            </table>
        </div>
    </div>
    <table class="table table-bordered table-condensed table-striped">
        @foreach ($data as $row)
            @if ($loop->first)
                <tr>
                    @foreach ($row as $key => $value)
                        <th>{!! $key !!}</th>
                    @endforeach
                </tr>
            @endif
            <tr>
                @foreach ($row as $key => $value)
                    @if (is_string($value) || is_numeric($value))
                        <td>{!! $value !!}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
</body>

</html>
