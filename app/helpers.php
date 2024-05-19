<?php

if (!function_exists('getMonths')) {
    function getMonths(): array
    {
        return [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
        ];
    }
}


if (!function_exists('compareTimeLess')) {
    function compareTimeLess($start, int $h, int $m, int $s): bool
    {
        try {
            if (strlen($start) == 5) {
                $parsedTime = \Carbon\Carbon::createFromFormat(
                    'H:i',
                    $start,
                );
            } else if (strlen($start) == 8) {
                $parsedTime = \Carbon\Carbon::createFromFormat(
                    'H:i:s',
                    $start,
                );
            } else {
                return false;
            }
            $comparisonTime = \Carbon\Carbon::createFromTime($h, $m, $s); // 6:35:0
            return $parsedTime->lessThanOrEqualTo($comparisonTime);
        } catch (\Exception $e) {
            return false;
        }
    }
}
if (!function_exists('compareTimegreater')) {
    function compareTimegreater($start, int $h, int $m, int $s): bool
    {
        try {
            if (strlen($start) == 5) {
                $parsedTime = \Carbon\Carbon::createFromFormat(
                    'H:i',
                    $start,
                );
            } else if (strlen($start) == 8) {
                $parsedTime = \Carbon\Carbon::createFromFormat(
                    'H:i:s',
                    $start,
                );
            } else {
                return false;
            }

            $comparisonTime = \Carbon\Carbon::createFromTime($h, $m, $s); // 6:35:0
            return $parsedTime->greaterThanOrEqualTo($comparisonTime);
        } catch (\Exception $e) {
            return false;
        }
    }
}
if (!function_exists('formatRupiah')) {
    function formatRupiah(int $value): string
    {
        return 'Rp.' . number_format($value, 2, ',', '.');
    }
}
