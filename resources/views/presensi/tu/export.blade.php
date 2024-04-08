<table>
    <thead>
        <tr>
            <th colspan="5">
                DI CETAK OLEH SMK Negeri 1 Pekalongan
            </th>
            <th colspan="5">
                Tanggal {{ \Carbon\Carbon::today()->format('Y-m-d') }}
            </th>
        </tr>
        <tr>
            <th style="background: yellow;width: 100px">
                Status
            </th>
            <th style="background: yellow;width: 100px">
                NoFormulir
            </th>
            <th style="background: yellow;width: 100px">
                Tanggal Formulir
            </th>
            <th style="background: yellow;width: 100px">
                Nama Lengkap
            </th>
            <th style="background: yellow;width: 100px">
                No Telp
            </th>
            <th style="background: yellow;width: 100px">
                Kondisi
            </th>
            <th style="background: yellow;width: 100px">
                Datang
            </th>
            <th style="background: yellow;width: 100px">
                Jarak Datang
            </th>
            <th style="background: yellow;width: 100px">
                Jam Datang
            </th>
            <th style="background: yellow;width: 100px">
                Pulang
            </th>
            <th style="background: yellow;width: 100px">
                Jarak Pulang
            </th>
            <th style="background: yellow;width: 100px">
                Jam Pulang
            </th>
            <th style="background: yellow;width: 200px">
                Aktifitas yang di lakukan
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($presences as $presence)
            <tr>
                @if ($presence->DATANG && $presence->PULANG)
                    <th style="background: green;width: 100px">
                        Lengkap
                    </th>
                @else
                    <th style="background: red;width: 100px">
                        Belum Lengkap
                    </th>
                @endif
                <th>
                    {{ $presence->NoFormulir }}
                </th>
                <th>
                    {{ $presence->TglFormulir }}
                </th>
                <td>
                    {{ $presence->NAMALENGKAP }}
                </td>
                <td>
                    {{ $presence->NoTelp }}
                </td>
                <td>
                    {{ $presence->KONDISI }}
                </td>
                <td>
                    {{ $presence->PULANG }}
                </td>
                <td>
                    {{ $presence->JARAK_DATANG }}
                </td>
                <td>
                    {{ $presence->JAM_DATANG }}
                </td>
                <td>
                    {{ $presence->PULANG }}
                </td>
                <td>
                    {{ $presence->JARAK_PULANG }}
                </td>
                <td>
                    {{ $presence->JAM_PULANG }}
                </td>
                <td>
                    {{ $presence->AKTIFITAS }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
