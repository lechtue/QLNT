<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KhuVuc
 *
 * @author tung
 */
class KhuVuc
{
    var $MaKhuVuc;
    var $TenKhuVuc;
    var $TenQuanHuyen;
    function __construct($MaKhuVuc, $TenKhuVuc, $TenQuanHuyen)
    {
        $this->MaKhuVuc = $MaKhuVuc;
        $this->TenKhuVuc = $TenKhuVuc;
        $this->TenQuanHuyen = $TenQuanHuyen;
    }

    //put your code here
}
