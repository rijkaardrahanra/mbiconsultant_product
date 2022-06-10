<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

    public function Login($user, $pass, $jenislogin)
    {
        $data = array();
        //$sqladmin = "SELECT a.USR_USER_ID,a.USERNAME,a.TGL_KERJASAMA,b.PERAN,c.NAMA_GROUP,d.NAMA,d.ADDRESS,d.ID_KELURAHAN,e.NAMA_LOKASI as 'Lurah',f.ID_KECAMATAN,f.NAMA_LOKASI as 'Camat',g.ID_KABUPATENKOTA,g.NAMA_LOKASI as 'KobKot',h.ID_PROVINSI,h.NAMA_LOKASI as 'Prov',d.PHONE,d.EMAIL,d.SUB_ID FROM usr_user a JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID LEFT JOIN grp_group c ON b.GRP_GROUP_ID = c.GRP_GROUP_ID JOIN usr_profile d ON a.USR_USER_ID = d.USR_USER_ID JOIN kelurahan e ON d.ID_KELURAHAN = e.ID_KELURAHAN JOIN kecamatan f ON e.ID_KECAMATAN = f.ID_KECAMATAN JOIN kabupaten_kota g ON f.ID_KABUPATENKOTA = g.ID_KABUPATENKOTA JOIN provinsi h ON g.ID_PROVINSI = h.ID_PROVINSI WHERE a.IS_DELETED = 0 AND a.IS_ACTIVATED = 1 AND b.PERAN = '".$jenislogin."' AND BINARY a.USERNAME='".$user."' AND a.PASSWORD = md5('".$pass."')";
        $sqladmin = "SELECT a.USR_USER_ID,a.USERNAME,a.TGL_KERJASAMA,b.PERAN,c.NAMA_GROUP,d.NAMA,d.KLS_KELAS_ID,d.ADDRESS,d.ID_KELURAHAN,e.NAMA_LOKASI as 'Lurah',f.ID_KECAMATAN,f.NAMA_LOKASI as 'Camat',g.ID_KABUPATENKOTA,g.NAMA_LOKASI as 'KobKot',h.ID_PROVINSI,h.NAMA_LOKASI as 'Prov',d.PHONE,d.EMAIL,d.SUB_ID 
                    FROM usr_user a 
                    left JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID 
                    LEFT JOIN grp_group c ON b.GRP_GROUP_ID = c.GRP_GROUP_ID 
                    JOIN usr_profile d ON a.USR_USER_ID = d.USR_USER_ID 
                    JOIN kelurahan e ON d.ID_KELURAHAN = e.ID_KELURAHAN 
                    JOIN kecamatan f ON e.ID_KECAMATAN = f.ID_KECAMATAN 
                    JOIN kabupaten_kota g ON f.ID_KABUPATENKOTA = g.ID_KABUPATENKOTA 
                    JOIN provinsi h ON g.ID_PROVINSI = h.ID_PROVINSI 
                    WHERE a.IS_DELETED = 0 
                    AND a.IS_ACTIVATED = 1 
                    AND b.PERAN = ? 
                    AND BINARY a.USERNAME=? 
                    AND a.PASSWORD = md5(?)";
        $param = array($jenislogin,$user,$pass);
        $data['user']=$this->db->query($sqladmin,$param);
        if($data['user']->num_rows()>=1){
            if (strtolower($jenislogin)=='klien') {
                $sqlpktu = "SELECT b.PKTU_PAKETUJIAN_ID, b.NAMA_UJIAN FROM usr_user a JOIN pktu_paketujian b ON a.USR_USER_ID = b.USR_USER_ID JOIN usr_group c ON a.USR_USER_ID = c.USR_USER_ID WHERE a.IS_DELETED=0 AND b.IS_DELETED=0 AND a.IS_ACTIVATED = 1 AND BINARY a.USERNAME=? AND b.TGL_SELESAI > CURDATE() AND a.PASSWORD = md5(?)";
                $param = array($user,$pass);
                $data['paket']=$this->db->query($sqlpktu,$param);
            }else if(strtolower($jenislogin)=='siswa'){
                $sqlhasuser = "SELECT a.USR_USER_ID, c.NAMA FROM usr_user a JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID JOIN usr_profile c ON a.USR_USER_ID = c.USR_USER_ID WHERE b.PERAN = 'Klien' AND a.IS_DELETED = 0 AND a.IS_ACTIVATED = 1 AND FIND_IN_SET(?,c.SUB_ID)";
                $param = array($data['user']->row()->USR_USER_ID);
                $data['hasuser']=$this->db->query($sqlhasuser,$param);
            }
        }
        return $data;
    }


    public function Loginsiswa($user, $pass, $jenislogin)
    {
        $data = array();
        //$sqladmin = "SELECT a.USR_USER_ID,a.USERNAME,a.TGL_KERJASAMA,b.PERAN,c.NAMA_GROUP,d.NAMA,d.ADDRESS,d.ID_KELURAHAN,e.NAMA_LOKASI as 'Lurah',f.ID_KECAMATAN,f.NAMA_LOKASI as 'Camat',g.ID_KABUPATENKOTA,g.NAMA_LOKASI as 'KobKot',h.ID_PROVINSI,h.NAMA_LOKASI as 'Prov',d.PHONE,d.EMAIL,d.SUB_ID FROM usr_user a JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID LEFT JOIN grp_group c ON b.GRP_GROUP_ID = c.GRP_GROUP_ID JOIN usr_profile d ON a.USR_USER_ID = d.USR_USER_ID JOIN kelurahan e ON d.ID_KELURAHAN = e.ID_KELURAHAN JOIN kecamatan f ON e.ID_KECAMATAN = f.ID_KECAMATAN JOIN kabupaten_kota g ON f.ID_KABUPATENKOTA = g.ID_KABUPATENKOTA JOIN provinsi h ON g.ID_PROVINSI = h.ID_PROVINSI WHERE a.IS_DELETED = 0 AND a.IS_ACTIVATED = 1 AND b.PERAN = '".$jenislogin."' AND BINARY a.USERNAME='".$user."' AND a.PASSWORD = md5('".$pass."')";
        $sqladmin = "SELECT uu.USR_USER_ID,
                             uu.USERNAME,
                             uu.TGL_KERJASAMA,
                             ug.PERAN,
                             up.NAMA,
                             up.KLS_KELAS_ID,
                             up.PROG_PROGRAM_ID,
                             up.ADDRESS,
                             up.ID_KELURAHAN,
                             up.PHONE,
                             up.EMAIL,
                             up.SUB_ID 
                    FROM usr_user uu 
                    JOIN usr_group ug ON uu.USR_USER_ID = ug.USR_USER_ID 
                    JOIN usr_profile up ON uu.USR_USER_ID = up.USR_USER_ID 

                    WHERE uu.IS_DELETED = 0 
                    AND uu.IS_ACTIVATED = 1 
                    AND ug.PERAN = ? 
                    AND BINARY uu.USERNAME=? 
                    AND uu.PASSWORD = md5(?)";
        $param = array($jenislogin,$user,$pass);
        $data['user']=$this->db->query($sqladmin,$param);
        if($data['user']->num_rows()>=1){
            if (strtolower($jenislogin)=='klien') {
                $sqlpktu = "SELECT b.PKTU_PAKETUJIAN_ID, b.NAMA_UJIAN FROM usr_user a JOIN pktu_paketujian b ON a.USR_USER_ID = b.USR_USER_ID JOIN usr_group c ON a.USR_USER_ID = c.USR_USER_ID WHERE a.IS_DELETED=0 AND b.IS_DELETED=0 AND a.IS_ACTIVATED = 1 AND BINARY a.USERNAME=? AND b.TGL_SELESAI > CURDATE() AND a.PASSWORD = md5(?)";
                $param = array($user,$pass);
                $data['paket']=$this->db->query($sqlpktu,$param);
            }else if(strtolower($jenislogin)=='siswa'){
                $sqlhasuser = "SELECT a.USR_USER_ID, c.NAMA FROM usr_user a JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID JOIN usr_profile c ON a.USR_USER_ID = c.USR_USER_ID WHERE b.PERAN = 'Klien' AND a.IS_DELETED = 0 AND a.IS_ACTIVATED = 1 AND FIND_IN_SET(?,c.SUB_ID)";
                $param = array($data['user']->row()->USR_USER_ID);
                $data['hasuser']=$this->db->query($sqlhasuser,$param);

                $id_siswa = $data['user']->row()->USR_USER_ID;
                $sqlhas_siswa = "SELECT * FROM usr_profile up 
                                        JOIN prog_program p ON p.PROG_PROGRAM_ID = up.PROG_PROGRAM_ID 
                                        JOIN kls_kelas k ON k.KLS_KELAS_ID = up.KLS_KELAS_ID 
                                        WHERE USR_USER_ID = '$id_siswa'";
                // $param = array($data['user']->row()->USR_USER_ID);
                $data['has_siswa']=$this->db->query($sqlhas_siswa);
            }
        }
        return $data;
    }

    public function Refresh($user, $jenislogin)
    {
        $data = array();
        $sqladmin = "SELECT a.USR_USER_ID,a.USERNAME,a.TGL_KERJASAMA,b.PERAN,c.NAMA_GROUP,d.NAMA,d.KLS_KELAS_ID,d.ADDRESS,d.ID_KELURAHAN,e.NAMA_LOKASI as 'Lurah',f.ID_KECAMATAN,f.NAMA_LOKASI as 'Camat',g.ID_KABUPATENKOTA,g.NAMA_LOKASI as 'KobKot',h.ID_PROVINSI,h.NAMA_LOKASI as 'Prov',d.PHONE,d.EMAIL,d.SUB_ID FROM usr_user a JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID LEFT JOIN grp_group c ON b.GRP_GROUP_ID = c.GRP_GROUP_ID JOIN usr_profile d ON a.USR_USER_ID = d.USR_USER_ID JOIN kelurahan e ON d.ID_KELURAHAN = e.ID_KELURAHAN JOIN kecamatan f ON e.ID_KECAMATAN = f.ID_KECAMATAN JOIN kabupaten_kota g ON f.ID_KABUPATENKOTA = g.ID_KABUPATENKOTA JOIN provinsi h ON g.ID_PROVINSI = h.ID_PROVINSI WHERE a.IS_DELETED = 0 AND a.IS_ACTIVATED = 1 AND b.PERAN = ? AND a.USR_USER_ID=?";
        $param = array($jenislogin,$user);
        $data['user']=$this->db->query($sqladmin,$param);
        if($data['user']->num_rows()>=1){
            if (strtolower($jenislogin)=='klien') {
                $sqlpktu = "SELECT b.PKTU_PAKETUJIAN_ID, b.NAMA_UJIAN FROM usr_user a JOIN pktu_paketujian b ON a.USR_USER_ID = b.USR_USER_ID JOIN usr_group c ON a.USR_USER_ID = c.USR_USER_ID WHERE a.IS_DELETED=0 AND b.IS_DELETED=0 AND a.IS_ACTIVATED = 1 AND a.USR_USER_ID=? AND b.TGL_SELESAI > CURDATE()";
                $param = array($user);
                $data['paket']=$this->db->query($sqlpktu,$param);
            }else if(strtolower($jenislogin)=='siswa'){
                $sqlhasuser = "SELECT a.USR_USER_ID, c.NAMA FROM usr_user a JOIN usr_group b ON a.USR_USER_ID = b.USR_USER_ID JOIN usr_profile c ON a.USR_USER_ID = c.USR_USER_ID WHERE b.PERAN = 'Klien' AND a.IS_DELETED = 0 AND a.IS_ACTIVATED = 1 AND FIND_IN_SET(?,c.SUB_ID)";
                $param = array($data['user']->row()->USR_USER_ID);
                $data['hasuser']=$this->db->query($sqlhasuser,$param);
            }
        }
        return $data;
    }
}