<?php

class TaiKhoan
{
    var $TenTaiKhoan;
    var $MatKhau;
    var $LoaiTaiKhoan;
    var $TrangThai;

    function __construct($TenTaiKhoan, $MatKhau, $LoaiTaiKhoan, $TrangThai)
    {
        $this->TenTaiKhoan = $TenTaiKhoan;
        $this->MatKhau = $MatKhau;
        $this->LoaiTaiKhoan = $LoaiTaiKhoan;
        $this->TrangThai = $TrangThai;
    }
}
