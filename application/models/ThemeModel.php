<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThemeModel extends CI_Model {

    public function GetAll()
    {
        $sql = "SELECT * FROM theme ";
        return $this->db->query($sql);
    }

    public function Update($theme, $client_id)
    {
        $sql = "UPDATE usr_theme set theme_id='".$theme."' WHERE client_id='".$client_id."'";
        return $this->db->query($sql);
    }
    
}