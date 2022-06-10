<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManMapelModel extends CI_Model {

    public function GetAll($user_id)
    {
        $peran = $this->session->userdata('logged_in')['result']->PERAN;
        if (strtolower($peran)=='klien') {
            $sql = "SELECT MM_MANAGE_MAPEL_ID,KLS_KELAS_ID,PROG_PROGRAM_ID,MP_MAPEL_ID FROM mnag_mapel WHERE FIND_IN_SET('".$user_id."',CREATOR_ID) AND IS_DELETED=0";
        }else if(strtolower($peran)=='admin'){
            $sql = "SELECT MM_MANAGE_MAPEL_ID,KLS_KELAS_ID,PROG_PROGRAM_ID,MP_MAPEL_ID FROM mnag_mapel WHERE IS_DELETED=0";
        }
        return $this->db->query($sql);
    }

    public function ShowManMapelForBankSoal(){
        $sql = "SELECT a.MM_MANAGE_MAPEL_ID, md5(a.MM_MANAGE_MAPEL_ID) as token, d.NAMA_JENJANG, c.KELAS, e.NAMA_PROGRAM, b.NAMA_MAPEL FROM mnag_mapel a JOIN mp_mapel b ON a.MP_MAPEL_ID=b.MP_MAPEL_ID JOIN kls_kelas c ON a.KLS_KELAS_ID=c.KLS_KELAS_ID JOIN jnjg_jenjang d ON c.JNJG_JENJANG_ID=d.JNJG_JENJANG_ID LEFT JOIN prog_program e ON a.PROG_PROGRAM_ID=e.PROG_PROGRAM_ID WHERE a.IS_DELETED=0";
        return $this->db->query($sql);
    }

    public function GetIDByForBankSoal($key){
        $sql = "SELECT MM_MANAGE_MAPEL_ID FROM mnag_mapel WHERE md5(MM_MANAGE_MAPEL_ID)='".$key."'";
        return $this->db->query($sql);
    }

    public function Insert($kls, $prog, $mapel, $user_id)
    {
        $sql = "CALL insertManMapel(".$kls.",".$prog.",".$mapel.",".$user_id.")";
        return $this->db->query($sql);
    }

    public function Delete($id)
    {
        $user_id = $this->session->userdata('logged_in')['result']->USR_USER_ID;
        $peran = $this->session->userdata('logged_in')['result']->PERAN;
        if (strtolower($peran)=='klien') {
            $sql = "UPDATE mnag_mapel SET CREATOR_ID = replace(CREATOR_ID, '".$user_id."','0') WHERE FIND_IN_SET('".$user_id."', CREATOR_ID) AND MM_MANAGE_MAPEL_ID=".$id;
        }else if(strtolower($peran)=='admin'){
            $sql = "UPDATE mnag_mapel SET IS_DELETED='1' WHERE MM_MANAGE_MAPEL_ID=".$id;
        }
        return $this->db->query($sql);
    }
}