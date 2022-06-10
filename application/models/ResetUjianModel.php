<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetUjianModel extends CI_Model {

    public function GetDataUjianFromKlien()
    {
        $sql = "SELECT a.ID_DETAIL_PAKETUJIAN, a.PKTU_PAKETUJIAN_ID, c.NAMA_MAPEL, d.KELAS FROM detail_paketujian a JOIN mnag_mapel b ON a.MM_MANAGE_MAPEL_ID = b.MM_MANAGE_MAPEL_ID JOIN mp_mapel c ON b.MP_MAPEL_ID = c.MP_MAPEL_ID JOIN kls_kelas d ON b.KLS_KELAS_ID=d.KLS_KELAS_ID WHERE a.IS_DELETED<>1 AND b.IS_DELETED<>1 AND c.IS_DELETED<>1 AND d.IS_DELETED<>1";
        return $this->db->query($sql);
    }

    public function GetSiswaByUjian($iddetail)
    {
        $sql = "SELECT a.USR_USER_ID, a.NAMA, b.KELAS, c.NAMA_JENJANG FROM usr_profile a JOIN kls_kelas b ON a.KLS_KELAS_ID = b.KLS_KELAS_ID JOIN jnjg_jenjang c ON c.JNJG_JENJANG_ID=b.JNJG_JENJANG_ID WHERE a.USR_USER_ID IN (SELECT z.USR_USER_ID FROM hslu_hasilujian z WHERE md5(z.ID_DETAIL_PAKETUJIAN)=? GROUP BY z.ID_DETAIL_PAKETUJIAN, z.USR_USER_ID)";
        $param = array($iddetail);
        return $this->db->query($sql,$param);
    }

    public function ResetSiswa($siswa,$iddetail)
    {
        $sql = "CALL ResetUjianSiswa(?,?)";
        $param = array($siswa,$iddetail);
        return $this->db->query($sql,$param);
    }
}