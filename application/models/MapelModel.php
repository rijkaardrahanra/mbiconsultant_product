<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MapelModel extends CI_Model {

    public function GetAll()
    {
        $sql = "SELECT MP_MAPEL_ID, NAMA_MAPEL FROM mp_mapel WHERE IS_DELETED=0 ";
        return $this->db->query($sql);
    }

    public function ShowAllForSiswa($id)
    {
        $sql = "SELECT MP_MAPEL_ID,NAMA_MAPEL FROM mp_mapel WHERE IS_DELETED=0 AND MP_MAPEL_ID IN (SELECT MP_MAPEL_ID FROM mnag_mapel WHERE FIND_IN_SET('".$id."',CREATOR_ID) AND IS_DELETED = 0)";
        return $this->db->query($sql);
    }

    public function Insert($nama_mapel)
    {
        $sql = "INSERT INTO mp_mapel(MP_MAPEL_ID, NAMA_MAPEL) VALUES (`NextVal`('mp_mapel_id_seq'),'".$nama_mapel."')";
        return $this->db->query($sql);
    }
    public function Delete($id)
    {
        $sql = "UPDATE mp_mapel SET IS_DELETED = '1' WHERE MP_MAPEL_ID =".$id;
        return $this->db->query($sql);
    }
}