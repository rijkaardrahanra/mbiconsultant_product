<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

    public function Insert($token, $user, $ciphertext, $namasiswa, $almt, $phone, $email,$kelas, $program)
    {	
        $sql = "CALL insertSiswa('".$token."','".$user."','".$ciphertext."','".$namasiswa."','".$almt."','".$phone."','".$email."','".$kelas."','".$program."')";

        return $this->db->query($sql);    
    }
    public function Update($iduser, $unm, $startdate, $groupid, $lurah, $klien, $almt, $tlp, $mail, $updater)
    {
        $sql = "CALL updateClient('".$iduser."','".$unm."','".$startdate."','".$groupid."','".$lurah."','".$klien."','".$almt."','".$tlp."','".$mail."','".$updater."')";
        return $this->db->query($sql);
    }

    public function getSiswaKlien($klien_id)
    {   
        $sql = "CALL getSiswa('".$klien_id."')";
        return $this->db->query($sql);    
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM usr_user WHERE USR_USER_ID =".$id;
        return $this->db->query($sql);
    }
}