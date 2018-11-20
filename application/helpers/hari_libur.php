<?php
function hari_libur($bulan, $tanggal, $tahun, $end){
    $bulan_patokan = date("m");
    $patokan_bulan = array((int)$bulan_patokan);
    $minggu = array(0);
    $count = 0;
    $counter = mktime(0, 0, 0, (int)$bulan, (int)$tanggal, (int)$tahun);
    while($counter <= $end){
        if(in_array(date("m", $counter), $patokan_bulan) == true && in_array(date("w", $counter), $minggu) == false){
            $count ++;
        }
        $counter = strtotime("+1 day", $counter);
    }
    return $count;
}
?>