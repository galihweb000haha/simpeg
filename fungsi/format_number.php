<?php
function indo_number($number) {
    //$number = 100* round(($number/100.0));
    return 'Rp ' . number_format($number, 0, ',', '.');
}

function trim_number($number) {
    $ind_char = array('Rp', '.', ',00');
    $int_char = array('', '', '');
    $trim_number = str_replace($ind_char, $int_char, $number);
    return $trim_number;
}

function format_decimal($number) {
    return number_format($number, 0, '.', '');
}

function indo_number_without_rp($number) {
    if (!empty($number)) {
        return number_format($number, 0, ',', '.');
    } else {
        return 0;
    }
}

function idr($number) {
    if (!empty($number)) {
        return number_format($number, 0, ',', '.');
    } else {
        return 0;
    }
}

function to_terbilang($n) {
    $dasar = array(1 => 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan');
    $angka = array(1000000000000, 1000000000, 1000000, 1000, 100, 10, 1);
    $satuan = array('triliyun', 'milyar', 'juta', 'ribu', 'ratus', 'puluh', '');

    $i = 0;
    $str = '';
    if ($n == 0) {
        $str = "";
    } else {
        while ($n != 0) {
            $count = (int) ($n / $angka[$i]);
            if ($count >= 10) {
                $str .= $this->to_terbilang($count) . " " . $satuan[$i] . " ";
            } else if ($count > 0 && $count < 10) {
                $str .= $dasar[$count] . " " . $satuan[$i] . " ";
            }
            $n -= $angka[$i] * $count;
            $i++;
        }
        $str = preg_replace("/satu puluh (\w+)/i", "\\1 belas", $str);
        $str = preg_replace("/satu (ribu|ratus|puluh|belas)/i", "se\\1", $str);
    }
    return ucwords($str) . ' Rupiah';
}

