<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BabModel extends CI_Model {

    public function GetAll()
    {
        $sql = "SELECT BB_BAB_ID, MP_MAPEL_ID, NAMA_BAB FROM bb_bab WHERE IS_DELETED=0";
        return $this->db->query($sql);
    }

    public function ShowByIDForBankSoal($id)
    {
        $sql = "SELECT BB_BAB_ID, MP_MAPEL_ID, NAMA_BAB FROM bb_bab WHERE IS_DELETED=0 AND MP_MAPEL_ID IN (SELECT MP_MAPEL_ID FROM mnag_mapel WHERE md5(MM_MANAGE_MAPEL_ID) = ?)";
        $param = array($id);
        return $this->db->query($sql,$param);
    }

    public function Insert($mapel,$nama_bab)
    {
        $sql = "INSERT INTO bb_bab(BB_BAB_ID, MP_MAPEL_ID, NAMA_BAB) VALUES (`NextVal`('bb_bab_id_seq'),'".$mapel."','".$nama_bab."')";
        return $this->db->query($sql);
    }
    public function Delete($id)
    {
        $sql = "UPDATE bb_bab SET IS_DELETED = '1' WHERE BB_BAB_ID =".$id;
        return $this->db->query($sql);
    }
}