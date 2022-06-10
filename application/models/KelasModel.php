<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasModel extends CI_Model {

    public function GetAll()
    {
        $sql = "SELECT KLS_KELAS_ID, JNJG_JENJANG_ID, KELAS FROM kls_kelas WHERE IS_DELETED=0";
        return $this->db->query($sql);
    }

    public function ShowAllForSiswa($id)
    {
        $sql = "SELECT KLS_KELAS_ID, JNJG_JENJANG_ID, KELAS FROM kls_kelas WHERE IS_DELETED = 0 AND KLS_KELAS_ID IN (SELECT KLS_KELAS_ID FROM mnag_mapel WHERE FIND_IN_SET('".$id."', CREATOR_ID) AND IS_DELETED = 0 GROUP BY KLS_KELAS_ID)";
        return $this->db->query($sql);
    }

     public function Insert($jenjang, $nama_kelas)
    {
        $sql = "INSERT INTO kls_kelas(KLS_KELAS_ID, JNJG_JENJANG_ID, KELAS) VALUES (`NextVal`('kls_kelas_id_seq'),'".$jenjang."','".$nama_kelas."')";
        return $this->db->query($sql);
    }
    public function Delete($id)
    {
        $sql = "UPDATE kls_kelas SET IS_DELETED = '1' WHERE KLS_KELAS_ID =".$id;
        return $this->db->query($sql);
    }
}