<?php
class ThongTinTaiKhoan{
    var $TenTaiKhoan;
    var $HoTen;
    var $Sdt;
    var $GioiTinh;
    
    
    function __construct($TenTaiKhoan, $HoTen, $Sdt, $GioiTinh) {
        $this->TenTaiKhoan = $TenTaiKhoan;
        $this->HoTen = $HoTen;
        $this->Sdt = $Sdt;
        $this->GioiTinh = $GioiTinh;
        

    }


}
