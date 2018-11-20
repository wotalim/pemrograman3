<?php
function hari_kerja($tahun, $bulan) {
    $minggu = array(0);
    $count = 0;
    $counter = mktime(0, 0, 0, $bulan, 1, $tahun);
    while (date("n", $counter) == $bulan) {
        if (in_array(date("w", $counter), $minggu) == false) {
            $count++;
        }
        $counter = strtotime("+1 day", $counter);
    }
    return $count;
}
?>