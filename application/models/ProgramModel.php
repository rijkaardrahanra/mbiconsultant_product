<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramModel extends CI_Model {

    public function GetAll()
    {
        $sql = "SELECT PROG_PROGRAM_ID, NAMA_PROGRAM FROM prog_program WHERE IS_DELETED=0";
        return $this->db->query($sql);
    }

    public function Insert($nama_program)
    {
        $sql = "INSERT INTO prog_program(PROG_PROGRAM_ID, NAMA_PROGRAM) VALUES (`NextVal`('prog_program_id_seq'),'".$nama_program."')";
        return $this->db->query($sql);
    }
    public function Delete($id)
    {
        $sql = "UPDATE prog_program SET IS_DELETED = '1' WHERE PROG_PROGRAM_ID =".$id;
        return $this->db->query($sql);
    }

}