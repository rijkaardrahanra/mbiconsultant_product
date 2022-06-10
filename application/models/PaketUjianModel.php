<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketUjianModel extends CI_Model {

    public function GetAll($id)
    {
        $sql = "SELECT PKTU_PAKETUJIAN_ID, NAMA_UJIAN, TOTAL_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT FROM pktu_paketujian WHERE IS_DELETED = 0 AND TGL_SELESAI > CURDATE() AND md5(USR_USER_ID) ='".$id."'";
        return $this->db->query($sql);
    }

    public function GetARowPaketUjian($id)
    {
        $sql = "SELECT PKTU_PAKETUJIAN_ID, NAMA_UJIAN, TOTAL_KUOTA, SISA_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT FROM pktu_paketujian WHERE IS_DELETED = 0 AND TGL_SELESAI > CURDATE() AND md5(PKTU_PAKETUJIAN_ID) ='".$id."'";
        return $this->db->query($sql);
    }

    public function Insert($user_id, $nmujian, $kouta, $start, $end, $istampil, $created_id)
    {
        $sql = "INSERT INTO pktu_paketujian(PKTU_PAKETUJIAN_ID, USR_USER_ID, NAMA_UJIAN, TOTAL_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT, CREATOR_ID) VALUES (`NextVal`('pktu_paketujian_id_seq'),'".$user_id."','".$nmujian."','".$kouta."','".$start."','".$end."','".$istampil."','".$created_id."')";
        return $this->db->query($sql);
    }

    public function ReverseLangsung($id, $is_langsung)
    {
        $sql = "UPDATE pktu_paketujian SET IS_LANGSUNGRESULT='".$is_langsung."' WHERE PKTU_PAKETUJIAN_ID='".$id."'";
        return $this->db->query($sql);
    }

    public function Delete($id)
    {
        $sql = "UPDATE pktu_paketujian SET IS_DELETED = '1' WHERE PKTU_PAKETUJIAN_ID =".$id;
        return $this->db->query($sql);
    }

    public function GetPaketUjianDetailSiswa($id)
    {
        $sql = "SELECT PKTU_PAKETUJIAN_ID, NAMA_UJIAN, TOTAL_KUOTA, SISA_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT FROM pktu_paketujian WHERE IS_DELETED = 0 AND TGL_SELESAI > CURDATE() AND md5(PKTU_PAKETUJIAN_ID) ='".$id."'";
        return $this->db->query($sql);
    }
}