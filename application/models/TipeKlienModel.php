<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipeKlienModel extends CI_Model {

    public function GetAll()
    {
        $sql = "SELECT GRP_GROUP_ID, NAMA_GROUP FROM grp_group";
        return $this->db->query($sql);
    }

}