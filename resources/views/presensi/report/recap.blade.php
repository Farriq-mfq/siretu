 <div>
     @foreach ($recap as $r)
         @if (current($r)['data'])
             <h1>
                 {{ array_keys($r)[0] }}
             </h1>
             <table style="width: 100%;border: 1px solid #000">
                 <thead>
                     <tr style="border: 1px solid #000">
                         <th rowspan="2" style="width: 50px;text-align: center;border:1px solid #000">NO</th>
                         <th rowspan="2" style="padding-left: 3px;border:1px solid #000">NAMA</th>
                         <th colspan="{{ current($r)['total_days'] }}" style="text-align: center;border:1px solid #000">
                             <strong>
                                 Tanggal
                             </strong>
                         </th>
                         <th colspan="3" style="text-align: center;border:1px solid #000">Total</th>
                     </tr>
                     <tr style="border: 1px solid #000">
                         @for ($i = 1; $i <= current($r)['total_days']; $i++)
                             <th style="text-align:center;border:1px solid #000;background:#eb9834">{{ $i }}
                             </th>
                         @endfor
                         <th style="text-align: center;width: 100px;border:1px solid #000;background:green;color:white">
                             Lengkap
                         </th>
                         <th style="text-align: center;width: 100px;border:1px solid #000;;background:yellow">
                             Tidak Lengkap
                         </th>
                         <th style="text-align: center;width: 100px;border:1px solid #000">
                             Kosong
                         </th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach (current($r)['data'] as $name => $item)
                         <tr style="border: 1px solid #000">
                             <td style="text-align: center;border:1px solid #000">{{ $loop->iteration }}</td>
                             <td style="width: 300px;padding-left: 3px;border:1px solid #000">
                                 {{ $name }}
                             </td>
                             @foreach ($item as $c)
                                 @if ($c)
                                     @if ($c['DATANG'] && $c['PULANG'])
                                         <td style="background: green;width: 40px;height: 40px;border:1px solid #000">
                                         </td>
                                     @else
                                         <td style="background: yellow;width: 40px;height: 40px;border:1px solid #000">
                                         </td>
                                     @endif
                                 @else
                                     <td style="width: 40px;height: 40px;border:1px solid #000">
                                     </td>
                                 @endif
                             @endforeach
                             @php
                                 $total_lengkap = count(
                                     array_filter($item, function ($val) {
                                         return $val ? $val['DATANG'] != null && $val['PULANG'] != null : false;
                                     }),
                                 );
                                 $tidak_lengkap = count(
                                     array_filter($item, function ($val) {
                                         return $val ? $val['DATANG'] === null || $val['PULANG'] === null : false;
                                     }),
                                 );
                                 $kosong = count(
                                     array_filter($item, function ($val) {
                                         return $val === false;
                                     }),
                                 );
                             @endphp
                             <td style="text-align: center;border:1px solid #000">
                                 {{ $total_lengkap }}
                             </td>
                             <td style="text-align: center;border:1px solid #000">
                                 {{ $tidak_lengkap }}
                             </td>
                             <td style="text-align: center;border:1px solid #000">
                                 {{ $kosong }}
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         @endif
     @endforeach
 </div>
