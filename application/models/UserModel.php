<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function GetAll()
    {
        $sql = "SELECT a.USR_USER_ID, md5(a.USR_USER_ID) as IDUNIK, d.NAMA, d.ADDRESS, e.ID_KELURAHAN, e.NAMA_LOKASI as 'LURAH',f.NAMA_LOKASI as 'CAMAT',g.NAMA_LOKASI as 'KABKOT',h.NAMA_LOKASI as 'PROV',d.PHONE,d.EMAIL, c.GRP_GROUP_ID, c.NAMA_GROUP, a.TGL_KERJASAMA, a.USERNAME, a.IS_ACTIVATED FROM usr_user a JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID JOIN grp_group c ON b.GRP_GROUP_ID = c.GRP_GROUP_ID JOIN usr_profile d ON a.USR_USER_ID = d.USR_USER_ID JOIN kelurahan e ON d.ID_KELURAHAN = e.ID_KELURAHAN JOIN kecamatan f ON e.ID_KECAMATAN = f.ID_KECAMATAN JOIN kabupaten_kota g ON f.ID_KABUPATENKOTA = g.ID_KABUPATENKOTA JOIN provinsi h ON g.ID_PROVINSI = h.ID_PROVINSI WHERE a.IS_DELETED = 0";
        return $this->db->query($sql);
    }

    public function GetDetail($id)
    {
       /* $sql = "SELECT 
         a.USR_USER_ID,
         d.NAMA, d.ADDRESS,
         e.ID_KELURAHAN, e.NAMA_LOKASI as 'LURAH',
         f.NAMA_LOKASI as 'CAMAT',
         g.NAMA_LOKASI as 'KABKOT',
         h.NAMA_LOKASI as 'PROV',
         d.PHONE,d.EMAIL, 
         c.GRP_GROUP_ID, 
         a.TGL_KERJASAMA, a.USERNAME 
            FROM usr_user a 
            JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID 
            JOIN grp_group c ON b.GRP_GROUP_ID = c.GRP_GROUP_ID 
            JOIN usr_profile d ON a.USR_USER_ID = d.USR_USER_ID 
            JOIN kelurahan e ON d.ID_KELURAHAN = e.ID_KELURAHAN 
            JOIN kecamatan f ON e.ID_KECAMATAN = f.ID_KECAMATAN 
            JOIN kabupaten_kota g ON f.ID_KABUPATENKOTA = g.ID_KABUPATENKOTA 
            JOIN provinsi h ON g.ID_PROVINSI = h.ID_PROVINSI 
            WHERE a.IS_DELETED = 0 AND a.USR_USER_ID=".$id.""; */

        $sql = "SELECT
         a.USR_USER_ID,
         d.NAMA, d.ADDRESS, 
         e.ID_KELURAHAN, e.NAMA_LOKASI as 'LURAH',
         f.NAMA_LOKASI as 'CAMAT',
         g.NAMA_LOKASI as 'KABKOT',
         h.NAMA_LOKASI as 'PROV',
         d.PHONE,d.EMAIL, 
         b.GRP_GROUP_ID, 
         a.TGL_KERJASAMA, a.USERNAME, a.PASSWORD 
            FROM usr_user a 
            JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID
            
            JOIN usr_profile d ON a.USR_USER_ID = d.USR_USER_ID 
            LEFT JOIN kelurahan e ON d.ID_KELURAHAN = e.ID_KELURAHAN
            LEFT JOIN kecamatan f ON e.ID_KECAMATAN = f.ID_KECAMATAN 
            LEFT JOIN kabupaten_kota g ON f.ID_KABUPATENKOTA = g.ID_KABUPATENKOTA 
            LEFT JOIN provinsi h ON g.ID_PROVINSI = h.ID_PROVINSI 
            WHERE a.IS_DELETED = 0 AND a.USR_USER_ID=".$id."";


        
        return $this->db->query($sql)->row();
    }

    public function GetEditData($id)
    {
        $sql = "SELECT a.USR_USER_ID, d.NAMA, d.ADDRESS, e.ID_KELURAHAN, e.NAMA_LOKASI as 'LURAH',f.NAMA_LOKASI as 'CAMAT',g.NAMA_LOKASI as 'KABKOT',h.NAMA_LOKASI as 'PROV',d.PHONE,d.EMAIL, c.GRP_GROUP_ID, a.TGL_KERJASAMA, a.USERNAME FROM usr_user a JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID JOIN grp_group c ON b.GRP_GROUP_ID = c.GRP_GROUP_ID JOIN usr_profile d ON a.USR_USER_ID = d.USR_USER_ID JOIN kelurahan e ON d.ID_KELURAHAN = e.ID_KELURAHAN JOIN kecamatan f ON e.ID_KECAMATAN = f.ID_KECAMATAN JOIN kabupaten_kota g ON f.ID_KABUPATENKOTA = g.ID_KABUPATENKOTA JOIN provinsi h ON g.ID_PROVINSI = h.ID_PROVINSI WHERE a.IS_DELETED = 0 AND md5(a.USR_USER_ID)='".$id."'";
        return $this->db->query($sql);
    }

    // public function GetPaketUjian($id)
    // {
    //     $sql = "SELECT PKTU_PAKETUJIAN_ID, NAMA_UJIAN, TOTAL_KAPASITAS, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT FROM pktu_paketujian WHERE IS_DELETED = 0 AND md5(USR_USER_ID) ='".$id."'";
    //     return $this->db->query($sql);
    // }

    public function GetProvinsi()
    {
        $sql = "SELECT ID_PROVINSI, NAMA_LOKASI FROM provinsi";
        return $this->db->query($sql);
    }

    public function GetKabKot()
    {
        $sql = "SELECT ID_KABUPATENKOTA, ID_PROVINSI, NAMA_LOKASI FROM kabupaten_kota";
        return $this->db->query($sql);
    }

    public function GetKelurahanByKabupaten($kab)
    {
        $sql = "SELECT ID_KELURAHAN, ID_KECAMATAN, NAMA_LOKASI FROM kelurahan WHERE ID_KECAMATAN IN (SELECT ID_KECAMATAN FROM kecamatan WHERE ID_KABUPATENKOTA = ".$kab.")";
        return $this->db->query($sql);
    }

    public function GetKecamatanByProvinsi($prov)
    {
        $sql = "SELECT ID_KECAMATAN, ID_KABUPATENKOTA, NAMA_LOKASI FROM kecamatan WHERE ID_KABUPATENKOTA IN (SELECT ID_KABUPATENKOTA FROM kabupaten_kota WHERE ID_PROVINSI=".$prov.")";
        return $this->db->query($sql);
    }

    public function Insert($clienttype_id, $user, $ciphertext, $kel_id, $nmklien, $almt, $phone, $email, $start_date)
    {
        $sql = "CALL insertClient('".$clienttype_id."','".$user."','".$ciphertext."','".$kel_id."','".$nmklien."','".$almt."','".$phone."','".$email."','".$start_date."')";
        return $this->db->query($sql);
    }

    public function ReverseStatus($id, $is_active)
    {
        $sql = "UPDATE usr_user SET IS_ACTIVATED='".$is_active."' WHERE USR_USER_ID='".$id."'";
        return $this->db->query($sql);
    }

    public function Update($iduser, $unm, $startdate, $groupid, $lurah, $klien, $almt, $tlp, $mail, $updater)
    {
        $sql = "CALL updateClient('".$iduser."','".$unm."','".$startdate."','".$groupid."','".$lurah."','".$klien."','".$almt."','".$tlp."','".$mail."','".$updater."')";
        return $this->db->query($sql);
    }

    public function UpdateProfile($iduser, $unm, $startdate, $lurah, $klien, $almt, $tlp, $mail, $updater)
    {
        $sql = "CALL updateProfile('".$iduser."','".$unm."','".$startdate."','".$lurah."','".$klien."','".$almt."','".$tlp."','".$mail."','".$updater."')";
        return $this->db->query($sql);
    }

    public function Delete($id)
    {
        $sql = "UPDATE usr_user SET IS_DELETED = '1' WHERE USR_USER_ID =".$id;
        return $this->db->query($sql);
    }

     public function getPassword($id){
         $sql = "SELECT PASSWORD FROM usr_user WHERE USR_USER_ID =".$id;
        return $this->db->query($sql);
    }

    public function ubahPassword($id,$password){
         $sql = "UPDATE usr_user SET PASSWORD = '".$password."' WHERE USR_USER_ID =".$id;
        return $this->db->query($sql);
    }
}