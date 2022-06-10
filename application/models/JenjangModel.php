<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenjangModel extends CI_Model {

    public function GetAll()
    {
        $sql = "SELECT JNJG_JENJANG_ID, NAMA_JENJANG FROM jnjg_jenjang where IS_DELETED=0";
        return $this->db->query($sql);
    }

    public function ShowAllForSiswa($id)
    {
        $sql = "SELECT JNJG_JENJANG_ID, NAMA_JENJANG FROM jnjg_jenjang a WHERE IS_DELETED = 0 AND JNJG_JENJANG_ID IN (SELECT JNJG_JENJANG_ID FROM kls_kelas WHERE IS_DELETED = 0 AND KLS_KELAS_ID IN (SELECT KLS_KELAS_ID FROM mnag_mapel WHERE FIND_IN_SET('".$id."', CREATOR_ID) AND IS_DELETED = 0 GROUP BY KLS_KELAS_ID) GROUP BY JNJG_JENJANG_ID)";
        return $this->db->query($sql);
    }

     public function Insert($nama_jenjang)
    {
        $sql = "INSERT INTO jnjg_jenjang(JNJG_JENJANG_ID, NAMA_JENJANG) VALUES (`NextVal`('jnjg_jenjang_id_seq'),'".$nama_jenjang."')";
        return $this->db->query($sql);
    }
    public function Delete($id)
    {
        $sql = "UPDATE jnjg_jenjang SET IS_DELETED = '1' WHERE JNJG_JENJANG_ID =".$id;
        return $this->db->query($sql);
    }

}