<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UjianModel extends CI_Model {

    public function GetDataUjianBy($mapel,$kelas,$groupklien)
    {
        //$sql = "SELECT ID_DETAIL_PAKETUJIAN, NAKSES_PERGROUP, SISA_NAKSES_GROUP, NSOAL_SULIT, NSOAL_SEDANG, NSOAL_MUDAH, DURASI_UJIAN_MENIT FROM detail_paketujian WHERE IS_DELETED = 0 AND MM_MANAGE_MAPEL_ID IN ( SELECT MM_MANAGE_MAPEL_ID FROM mnag_mapel WHERE IS_DELETED = 0 AND MP_MAPEL_ID = '".$mapel."' AND KLS_KELAS_ID = '".$kelas."' AND FIND_IN_SET('".$groupklien."', CREATOR_ID) ) AND PKTU_PAKETUJIAN_ID IN (SELECT b.PKTU_PAKETUJIAN_ID FROM usr_user a JOIN pktu_paketujian b ON a.USR_USER_ID = b.USR_USER_ID JOIN usr_group c ON a.USR_USER_ID = c.USR_USER_ID WHERE a.IS_DELETED=0 AND b.IS_DELETED=0 AND b.IS_ACTIVATED=1 AND a.IS_ACTIVATED=1 AND a.USR_USER_ID='".$groupklien."' AND b.TGL_SELESAI > CURDATE())";
        $sql = "SELECT a.ID_DETAIL_PAKETUJIAN, a.NAKSES_PERGROUP, a.SISA_NAKSES_GROUP, a.NSOAL_SULIT, a.NSOAL_SEDANG, a.NSOAL_MUDAH, a.DURASI_UJIAN_MENIT, a.SYARATKETENTUAN, b.NAMA_UJIAN, b.TGL_PELAKSANAAN, b.TGL_SELESAI FROM detail_paketujian a JOIN pktu_paketujian b ON a.PKTU_PAKETUJIAN_ID=b.PKTU_PAKETUJIAN_ID JOIN usr_user c ON b.USR_USER_ID = c.USR_USER_ID WHERE a.IS_DELETED = 0 AND c.IS_DELETED=0 AND b.IS_DELETED=0 AND b.IS_ACTIVATED=1 AND c.IS_ACTIVATED=1 AND c.USR_USER_ID='".$groupklien."' AND b.TGL_SELESAI > CURDATE() AND a.MM_MANAGE_MAPEL_ID IN (SELECT MM_MANAGE_MAPEL_ID FROM mnag_mapel WHERE IS_DELETED = 0 AND MP_MAPEL_ID = '".$mapel."' AND KLS_KELAS_ID = '".$kelas."' AND FIND_IN_SET('".$groupklien."', CREATOR_ID))";
        return $this->db->query($sql);
    }

    public function CekHasUjian($iddetail,$user)
    {
        //$sql = "SELECT COUNT(*) as NUJIAN FROM hslu_hasilujian WHERE ID_DETAIL_PAKETUJIAN=".$iddetail." AND USR_USER_ID=".$user;
        $sql = "CALL getUjianSiswa(?, ?)";
        $param = array($iddetail,$user);
        return $this->db->query($sql,$param);
    }

    public function GetDurasiSiswa($iddetail)
    {
        $sql = "SELECT IF((DURASI_UJIAN_MENIT - (ROUND((UNIX_TIMESTAMP() - UNIX_TIMESTAMP(TGL_MULAI_UJIAN)) / 60)))>DURASI_UJIAN_MENIT, DURASI_UJIAN_MENIT, (DURASI_UJIAN_MENIT - (ROUND((UNIX_TIMESTAMP() - UNIX_TIMESTAMP(TGL_MULAI_UJIAN)) / 60)))) as MENIT FROM detail_paketujian WHERE ID_DETAIL_PAKETUJIAN=?";
        //$sql = "SELECT (DURASI_UJIAN_MENIT - (ROUND((UNIX_TIMESTAMP() - UNIX_TIMESTAMP(TGL_MULAI_UJIAN)) / 60))) as MENIT  FROM detail_paketujian WHERE ID_DETAIL_PAKETUJIAN=?";
        $param = array($iddetail);
        return $this->db->query($sql,$param);
    }

    public function UpdateJawaban($iddetail,$value)
    {
        //$sql = "UPDATE hslu_detail_jawaban SET JAWAB='".$value."' WHERE ID_DETAILHASILUJIAN=".$iddetail;
        $sql = "CALL updateJawaban(?, ?)";
        $param = array($iddetail,$value);
        return $this->db->query($sql,$param);
    }

    public function CekHasilUjian($iddtl,$usr)
    {
        $sql1 = "SELECT IS_LANGSUNGRESULT FROM pktu_paketujian WHERE PKTU_PAKETUJIAN_ID IN (SELECT PKTU_PAKETUJIAN_ID FROM detail_paketujian WHERE ID_DETAIL_PAKETUJIAN = ?)";
        $param1 = array($iddtl);
        $islangsung=$this->db->query($sql1,$param1);
        if ($islangsung->row()->IS_LANGSUNGRESULT==1){
            //$sql2 = "SELECT HSLU_HASILUJIAN_ID, TOTAL_SCORE, TOTAL_BENAR, TOTAL_SALAH, TOTAL_TIDAKJAWAB FROM hslu_hasilujian WHERE ID_DETAIL_PAKETUJIAN=? AND USR_USER_ID=? AND IS_DELETED=0";
            $sql2 = "SELECT a.HSLU_HASILUJIAN_ID, a.TOTAL_SCORE, a.TOTAL_BENAR, a.TOTAL_SALAH, a.TOTAL_TIDAKJAWAB, c.NAMA, c.EMAIL, d.TGL_MULAI_UJIAN, d.DURASI_UJIAN_MENIT, f.KELAS, g.NAMA_JENJANG, h.NAMA_PROGRAM, i.NAMA_MAPEL, j.NAMA_UJIAN FROM hslu_hasilujian a JOIN usr_user b ON a.USR_USER_ID = b.USR_USER_ID JOIN usr_profile c ON c.USR_USER_ID = b.USR_USER_ID JOIN detail_paketujian d ON d.ID_DETAIL_PAKETUJIAN=a.ID_DETAIL_PAKETUJIAN JOIN mnag_mapel e ON e.MM_MANAGE_MAPEL_ID=d.MM_MANAGE_MAPEL_ID JOIN kls_kelas f ON f.KLS_KELAS_ID=e.KLS_KELAS_ID JOIN jnjg_jenjang g ON g.JNJG_JENJANG_ID=f.JNJG_JENJANG_ID JOIN prog_program h ON h.PROG_PROGRAM_ID=e.PROG_PROGRAM_ID JOIN mp_mapel i ON i.MP_MAPEL_ID=e.MP_MAPEL_ID JOIN pktu_paketujian j ON j.PKTU_PAKETUJIAN_ID=d.PKTU_PAKETUJIAN_ID WHERE a.ID_DETAIL_PAKETUJIAN=? AND a.USR_USER_ID=? AND a.IS_DELETED=0";
            //$sql = "CALL getHasilUjian(?, ?)";
            $param2 = array($iddtl,$usr);
            $data['status']='1';
            $data['result']=$this->db->query($sql2,$param2);
        }else{
            $data['status']='0';
            $data['result']='Hasil Akan Dibagikan Oleh Sekolah';
        }
        return $data;
    }
}