<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPaketUjianModel extends CI_Model {

    public function getPertanyaan($idmanagemapel)
    {
        // $sql = "SELECT * FROM sl_soal ss
        //         JOIN sl_banksoal sbs on sbs.SL_SOAL_ID = ss.SL_SOAL_ID
        //         WHERE sbs.MM_MANAGE_MAPEL_ID ='".$idmanagemapel."'";
        // return $this->db->query($sql);
        $sql = "SELECT * FROM sl_soal ss
                JOIN sl_banksoal sbs on sbs.SL_SOAL_ID = ss.SL_SOAL_ID
                WHERE sbs.MM_MANAGE_MAPEL_ID =? AND sbs.IS_DELETED=0";
        $param = array($idmanagemapel);
        return $this->db->query($sql,$param);
    }

    public function getPertanyaanSoalUjian($iddetailpaketujian)
    {
        $sql = "SELECT * FROM sl_soal ss
                JOIN sl_banksoal sbs on sbs.SL_SOAL_ID = ss.SL_SOAL_ID
                WHERE sbs.IS_DELETED=0 AND sbs.SL_BANKSOAL_ID IN (SELECT SL_BANKSOAL_ID FROM sl_ujian WHERE ID_DETAIL_PAKETUJIAN=?)";
        $param = array($iddetailpaketujian);
        return $this->db->query($sql,$param);
    }

    public function GetAll($id)
    {
        $sql = "SELECT a.ID_DETAIL_PAKETUJIAN, a.NAKSES_PERGROUP, a.SISA_NAKSES_GROUP, a.NSOAL_SULIT, a.NSOAL_SEDANG, a.NSOAL_MUDAH, a.DEFAULT_OR_CUSTOM, a.DURASI_UJIAN_MENIT, a.BAB, a.SYARATKETENTUAN, a.MM_MANAGE_MAPEL_ID, md5(a.MM_MANAGE_MAPEL_ID) as token, a.TGL_MULAI_UJIAN, d.NAMA_JENJANG, c.KELAS, e.NAMA_PROGRAM, f.NAMA_MAPEL FROM detail_paketujian a JOIN mnag_mapel b ON a.MM_MANAGE_MAPEL_ID = b.MM_MANAGE_MAPEL_ID JOIN kls_kelas c ON b.KLS_KELAS_ID = c.KLS_KELAS_ID JOIN jnjg_jenjang d ON c.JNJG_JENJANG_ID = d.JNJG_JENJANG_ID LEFT JOIN prog_program e ON b.PROG_PROGRAM_ID = e.PROG_PROGRAM_ID JOIN mp_mapel f ON b.MP_MAPEL_ID = f.MP_MAPEL_ID WHERE md5(a.PKTU_PAKETUJIAN_ID) ='".$id."' AND a.IS_DELETED='0'";
        return $this->db->query($sql);
    }

    public function GetDetailForSiswa($id)
    {
        $sql = "SELECT ID_DETAIL_PAKETUJIAN, SYARATKETENTUAN FROM detail_paketujian WHERE IS_DELETED='0' AND md5(ID_DETAIL_PAKETUJIAN)=?";
        $param = array($id);
        return $this->db->query($sql,$param);
        //return $this->db->query($sql);
    }

    public function Insert($mngmapelid, $pktujian, $kuota, $durasi, $babid, $syarat, $tglmulaiujian)
    {
        $sql = "INSERT INTO detail_paketujian (ID_DETAIL_PAKETUJIAN,MM_MANAGE_MAPEL_ID,PKTU_PAKETUJIAN_ID,NAKSES_PERGROUP,SISA_NAKSES_GROUP,DURASI_UJIAN_MENIT,BAB,SYARATKETENTUAN,TGL_MULAI_UJIAN) VALUES (`NextVal`('detail_paketujian_id_seq'),".$mngmapelid.",".$pktujian.",'".$kuota."','".$kuota."','".$durasi."','".$babid."','".$syarat."','".$tglmulaiujian."')";
        return $this->db->query($sql);
    }

    public function SetJumlahSoal($id, $userid, $nslsulit, $nslsedang, $nslmudah, $c_d, $bobotsoal, $bobotb, $bobots, $bobottj)
    {
        //$sql = "UPDATE detail_paketujian SET NSOAL_SULIT='".$nslsulit."',NSOAL_SEDANG='".$nslsedang."',NSOAL_MUDAH='".$nslmudah."',DEFAULT_OR_CUSTOM='".$c_d."',IS_BOBOTDEFAULT='".$bobotsoal."' WHERE ID_DETAIL_PAKETUJIAN=".$id;
        $sql = "CALL getSoalDefaultorCustom (".$id.", ".$userid.", '".$nslsulit."', '".$nslsedang."', '".$nslmudah."', '".$c_d."', '".$bobotsoal."', '".$bobotb."', '".$bobots."', '".$bobottj."')";
        return $this->db->query($sql);
    }

    // public function Insert($mngmapelid, $pktujian, $kuota, $nslsulit, $nslsedang, $nslmudah, $durasi, $babid, $syarat)
    // {
    //     $sql = "INSERT INTO detail_paketujian (ID_DETAIL_PAKETUJIAN,MM_MANAGE_MAPEL_ID,PKTU_PAKETUJIAN_ID,NAKSES_PERGROUP,SISA_NAKSES_GROUP,NSOAL_SULIT,NSOAL_SEDANG,NSOAL_MUDAH,DURASI_UJIAN_MENIT,BAB,SYARATKETENTUAN) VALUES (`NextVal`('detail_paketujian_id_seq'),".$mngmapelid.",".$pktujian.",'".$kuota."','".$kuota."','".$nslsulit."','".$nslsedang."','".$nslmudah."','".$durasi."','".$babid."','".$syarat."')";
    //     return $this->db->query($sql);
    // }

    public function Delete($mngmapelid, $pktujian)
    {
        $sql = "DELETE FROM detail_paketujian WHERE MM_MANAGE_MAPEL_ID =".$mngmapelid." AND PKTU_PAKETUJIAN_ID =".$pktujian;
        return $this->db->query($sql);
    }
    // public function Delete($mngmapelid, $pktujian)
    // {
    //     $sql = "UPDATE detail_paketujian SET IS_DELETED='1' WHERE MM_MANAGE_MAPEL_ID ='".$mngmapelid."' AND PKTU_PAKETUJIAN_ID ='".$pktujian."'";
    //     return $this->db->query($sql);
    // }

    // public function getUjianSiswa($id)
    // {
    //     $sql = "SELECT dpu.ID_DETAIL_PAKETUJIAN, dpu.DURASI_UJIAN_MENIT, dpu.BAB, ppu.NAMA_UJIAN, dpu.TGL_MULAI_UJIAN, mnmp.NAMA_SOAL, mp.MP_MAPEL_ID, mp.NAMA_MAPEL
    //             from detail_paketujian dpu
    //                 join pktu_paketujian ppu on ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
    //                 join mnag_mapel mnmp on mnmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
    //                 join mp_mapel mp on mp.MP_MAPEL_ID = mnmp.MP_MAPEL_ID
    //                 join usr_profile up on up.USR_USER_ID = ppu.USR_USER_ID
    //             WHERE up.USR_USER_ID in (select USR_USER_ID from usr_profile WHERE FIND_IN_SET(".$id.",SUB_ID))";
    //     return $this->db->query($sql);
    // }

    // public function getUjianKlien($id)
    // {
    //     $sql = "SELECT dpu.ID_DETAIL_PAKETUJIAN, dpu.DURASI_UJIAN_MENIT, dpu.BAB, ppu.NAMA_UJIAN, dpu.TGL_MULAI_UJIAN,ppu.TGL_SELESAI, ppu.TOTAL_KUOTA, ppu.SISA_KUOTA, ppu.IS_ACTIVATED, mnmp.NAMA_SOAL, mp.MP_MAPEL_ID, mp.NAMA_MAPEL
    //             from detail_paketujian dpu
    //                 join pktu_paketujian ppu on ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
    //                 join mnag_mapel mnmp on mnmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
    //                 join mp_mapel mp on mp.MP_MAPEL_ID = mnmp.MP_MAPEL_ID
    //                 join usr_profile up on up.USR_USER_ID = ppu.USR_USER_ID
    //             WHERE dpu.TGL_MULAI_UJIAN >= NOW() AND dpu.IS_DELETED= 0 AND  up.USR_USER_ID=".$id;
    //     return $this->db->query($sql);
    // }

    // public function getUjianSemuaKlien($id)
    // {
    //     $sql = "SELECT dpu.ID_DETAIL_PAKETUJIAN, up.NAMA, dpu.DURASI_UJIAN_MENIT, dpu.BAB, ppu.NAMA_UJIAN, dpu.TGL_MULAI_UJIAN,ppu.TGL_PELAKSANAAN,ppu.TGL_SELESAI, ppu.TOTAL_KUOTA, ppu.SISA_KUOTA, ppu.IS_ACTIVATED, mnmp.NAMA_SOAL, mp.MP_MAPEL_ID, mp.NAMA_MAPEL
    //             from detail_paketujian dpu
    //                 join pktu_paketujian ppu on ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
    //                 join mnag_mapel mnmp on mnmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
    //                 join mp_mapel mp on mp.MP_MAPEL_ID = mnmp.MP_MAPEL_ID
    //                 join usr_profile up on up.USR_USER_ID = ppu.USR_USER_ID
    //             WHERE dpu.IS_DELETED= 0 order by  dpu.TGL_MULAI_UJIAN ASC";
    //     return $this->db->query($sql);
    // }

    public function getUjianSiswa($id)
    {
        // $sql = "SELECT dpu.ID_DETAIL_PAKETUJIAN, dpu.DURASI_UJIAN_MENIT, dpu.BAB, ppu.NAMA_UJIAN, dpu.TGL_MULAI_UJIAN, mnmp.KLS_KELAS_ID, kls.KELAS, prog.NAMA_PROGRAM, jjng.NAMA_JENJANG, mp.MP_MAPEL_ID, mp.NAMA_MAPEL
        //         from detail_paketujian dpu
        //             join pktu_paketujian ppu on ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
        //             join mnag_mapel mnmp on mnmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
        //             join mp_mapel mp on mp.MP_MAPEL_ID = mnmp.MP_MAPEL_ID
        //             join usr_profile up on up.USR_USER_ID = ppu.USR_USER_ID
        //             join kls_kelas kls on kls.KLS_KELAS_ID = mnmp.KLS_KELAS_ID
        //             join prog_program prog on prog.PROG_PROGRAM_ID = mnmp.PROG_PROGRAM_ID
        //             join jnjg_jenjang jjng on jjng.JNJG_JENJANG_ID = kls.JNJG_JENJANG_ID
        //         WHERE up.USR_USER_ID in (select USR_USER_ID from usr_profile WHERE FIND_IN_SET(".$id.",SUB_ID)) AND (DATE_ADD(dpu.TGL_MULAI_UJIAN, INTERVAL 1 MINUTE) > NOW() OR DATE_ADD(dpu.TGL_MULAI_UJIAN, INTERVAL dpu.DURASI_UJIAN_MENIT MINUTE) > NOW())";

        $sql = "SELECT dpu.ID_DETAIL_PAKETUJIAN, dpu.DURASI_UJIAN_MENIT, dpu.BAB, ppu.NAMA_UJIAN, dpu.TGL_MULAI_UJIAN, mnmp.KLS_KELAS_ID, kls.KELAS, prog.NAMA_PROGRAM, jjng.NAMA_JENJANG, mp.MP_MAPEL_ID, mp.NAMA_MAPEL
                from detail_paketujian dpu
                    join pktu_paketujian ppu on ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
                    join mnag_mapel mnmp on mnmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
                    join mp_mapel mp on mp.MP_MAPEL_ID = mnmp.MP_MAPEL_ID
                    join usr_profile up on up.USR_USER_ID = ppu.USR_USER_ID
                    join kls_kelas kls on kls.KLS_KELAS_ID = mnmp.KLS_KELAS_ID
                    join prog_program prog on prog.PROG_PROGRAM_ID = mnmp.PROG_PROGRAM_ID
                    join jnjg_jenjang jjng on jjng.JNJG_JENJANG_ID = kls.JNJG_JENJANG_ID
                WHERE up.USR_USER_ID in (select USR_USER_ID from usr_profile WHERE FIND_IN_SET(".$id.",SUB_ID)) AND NOW() BETWEEN DATE_ADD(dpu.TGL_MULAI_UJIAN, INTERVAL -5 MINUTE) AND DATE_ADD(dpu.TGL_MULAI_UJIAN, INTERVAL dpu.DURASI_UJIAN_MENIT MINUTE)";
        return $this->db->query($sql);
    }

    public function getHistoryUjianSiswa($id)
    {
        $sql = "SELECT dpu.ID_DETAIL_PAKETUJIAN, kk.kelas nama_kelas, pp.PROG_PROGRAM_ID, pp.nama_program,dpu.DURASI_UJIAN_MENIT, dpu.BAB, ppu.NAMA_UJIAN, dpu.TGL_MULAI_UJIAN, mnmp.KLS_KELAS_ID, mp.MP_MAPEL_ID, mp.NAMA_MAPEL
                from detail_paketujian dpu
                    join pktu_paketujian ppu on ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
                    join mnag_mapel mnmp on mnmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
                    join kls_kelas kk on kk.KLS_KELAS_ID=mnmp.KLS_KELAS_ID
                    join prog_program pp on pp.PROG_PROGRAM_ID=mnmp.PROG_PROGRAM_ID
                    join mp_mapel mp on mp.MP_MAPEL_ID = mnmp.MP_MAPEL_ID
                    join usr_profile up on up.USR_USER_ID = ppu.USR_USER_ID
                WHERE up.USR_USER_ID in (select USR_USER_ID from usr_profile WHERE FIND_IN_SET(".$id.",SUB_ID)) AND (DATE_ADD(dpu.TGL_MULAI_UJIAN, INTERVAL 1 MINUTE) > NOW() OR DATE_ADD(dpu.TGL_MULAI_UJIAN, INTERVAL dpu.DURASI_UJIAN_MENIT MINUTE) > NOW()) ";
        return $this->db->query($sql);
    }

    public function getUjianKlien($id)
    {
        $sql = "SELECT dpu.ID_DETAIL_PAKETUJIAN, dpu.TGL_MULAI_UJIAN, dpu.DURASI_UJIAN_MENIT, dpu.BAB, ppu.NAMA_UJIAN, ppu.TGL_PELAKSANAAN,ppu.TGL_SELESAI, ppu.TOTAL_KUOTA, ppu.SISA_KUOTA, ppu.IS_ACTIVATED, mnmp.NAMA_SOAL, mp.MP_MAPEL_ID, mp.NAMA_MAPEL
                from detail_paketujian dpu
                    join pktu_paketujian ppu on ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
                    join mnag_mapel mnmp on mnmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
                    join mp_mapel mp on mp.MP_MAPEL_ID = mnmp.MP_MAPEL_ID
                    join usr_profile up on up.USR_USER_ID = ppu.USR_USER_ID
                WHERE (NOW() BETWEEN ppu.TGL_PELAKSANAAN AND ppu.TGL_SELESAI) AND ppu.IS_DELETED=0 AND dpu.IS_DELETED= 0 AND  up.USR_USER_ID=".$id;
                // WHERE ppu.TGL_PELAKSANAAN >= NOW() AND dpu.IS_DELETED= 0 AND  up.USR_USER_ID=".$id;
        return $this->db->query($sql);
    }

    public function getUjianSemuaKlien($id)
    {
        $sql = "SELECT dpu.ID_DETAIL_PAKETUJIAN, up.NAMA, dpu.DURASI_UJIAN_MENIT, dpu.BAB, ppu.NAMA_UJIAN, ppu.TGL_PELAKSANAAN,ppu.TGL_SELESAI, ppu.TOTAL_KUOTA, ppu.SISA_KUOTA, ppu.IS_ACTIVATED, mnmp.NAMA_SOAL, mp.MP_MAPEL_ID, mp.NAMA_MAPEL
                from detail_paketujian dpu
                    join pktu_paketujian ppu on ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
                    join mnag_mapel mnmp on mnmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
                    join mp_mapel mp on mp.MP_MAPEL_ID = mnmp.MP_MAPEL_ID
                    join usr_profile up on up.USR_USER_ID = ppu.USR_USER_ID
                WHERE dpu.IS_DELETED= 0 order by  ppu.TGL_PELAKSANAAN ASC";
        return $this->db->query($sql);
    }
}