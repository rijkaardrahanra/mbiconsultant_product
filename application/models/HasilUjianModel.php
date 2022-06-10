<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilUjianModel extends CI_Model {

    public function GetAll($id)
    {
        $sql = "SELECT PKTU_PAKETUJIAN_ID, NAMA_UJIAN, TOTAL_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT FROM pktu_paketujian WHERE IS_DELETED = 0 AND TGL_SELESAI > CURDATE() AND md5(USR_USER_ID) ='".$id."'";
        return $this->db->query($sql);
    }

    public function GetAllUjian($id)
    {
        $sql = "SELECT PKTU_PAKETUJIAN_ID, NAMA_UJIAN, TOTAL_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT FROM pktu_paketujian WHERE IS_DELETED = 0 AND TGL_SELESAI AND md5(USR_USER_ID) ='".$id."'";
        return $this->db->query($sql);
    }

    public function GetARowPaketUjian($id)
    {
        $sql = "SELECT PKTU_PAKETUJIAN_ID, NAMA_UJIAN, TOTAL_KUOTA, SISA_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT FROM pktu_paketujian WHERE IS_DELETED = 0 AND TGL_SELESAI > CURDATE() AND md5(PKTU_PAKETUJIAN_ID) ='".$id."'";
        return $this->db->query($sql);
    }

    public function Insert($user_id, $nmujian, $kouta, $start, $end, $created_id)
    {
        $sql = "INSERT INTO pktu_paketujian(PKTU_PAKETUJIAN_ID, USR_USER_ID, NAMA_UJIAN, TOTAL_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, CREATOR_ID) VALUES (`NextVal`('pktu_paketujian_id_seq'),'".$user_id."','".$nmujian."','".$kouta."','".$start."','".$end."','".$created_id."')";
        return $this->db->query($sql);
    }

    public function ReverseLangsung($id, $is_langsung)
    {
        $sql = "UPDATE pktu_paketujian SET IS_LANGSUNGRESULT='".$is_langsung."' WHERE PKTU_PAKETUJIAN_ID='".$id."'";
        return $this->db->query($sql);
    }

    public function Delete($id)
    {
        $sql = "UPDATE pktu_paketujian SET IS_DELETED = '1' WHERE PKTU_PAKETUJIAN_ID =".$id;
        return $this->db->query($sql);
    }

    public function GetPaketUjianDetailSiswa($id)
    {
        $sql = "SELECT PKTU_PAKETUJIAN_ID, NAMA_UJIAN, TOTAL_KUOTA, SISA_KUOTA, TGL_PELAKSANAAN, TGL_SELESAI, IS_LANGSUNGRESULT FROM pktu_paketujian WHERE IS_DELETED = 0 AND TGL_SELESAI > CURDATE() AND md5(PKTU_PAKETUJIAN_ID) ='".$id."'";
        return $this->db->query($sql);
    }

    public function GetPaketUjian($id)
    {
        $sql = "SELECT ppu.*, dpu.ID_DETAIL_PAKETUJIAN
                FROM pktu_paketujian ppu
                JOIN detail_paketujian dpu ON dpu.PKTU_PAKETUJIAN_ID = ppu.PKTU_PAKETUJIAN_ID
                JOIN hslu_hasilujian hhu ON hhu.ID_DETAIL_PAKETUJIAN = dpu.ID_DETAIL_PAKETUJIAN
                WHERE ppu.IS_DELETED = 0 AND md5(ppu.USR_USER_ID) ='".$id."'";
        return $this->db->query($sql);
    }

    public function GetDetailPaketUjian($id,$id_detailpaketujian)
    {
        $sql = "SELECT dpu.*,kk.KELAS, mmp.NAMA_MAPEL, pp.NAMA_PROGRAM, ppu.USR_USER_ID,ppu.NAMA_UJIAN
                FROM detail_paketujian dpu
                JOIN pktu_paketujian ppu ON dpu.PKTU_PAKETUJIAN_ID = ppu.PKTU_PAKETUJIAN_ID
               
                JOIN mnag_mapel mnm ON mnm.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
                JOIN mp_mapel mmp ON mmp.MP_MAPEL_ID = mnm.MP_MAPEL_ID
                JOIN kls_kelas kk ON kk.KLS_KELAS_ID = mnm.KLS_KELAS_ID
                JOIN prog_program pp ON pp.PROG_PROGRAM_ID =mnm.PROG_PROGRAM_ID
                WHERE dpu.PKTU_PAKETUJIAN_ID = '".$id_detailpaketujian."'
                AND ppu.IS_DELETED = 0 AND md5(ppu.USR_USER_ID) ='".$id."'";
        return $this->db->query($sql);

        
    }

     public function GetDetailPaketUjianById($id_detailpaketujian)
    {
        $sql = "SELECT ppu.NAMA_UJIAN, dpu.*,kk.KELAS, mmp.NAMA_MAPEL, pp.NAMA_PROGRAM, ppu.USR_USER_ID,ppu.NAMA_UJIAN
                FROM detail_paketujian dpu
                JOIN pktu_paketujian ppu ON dpu.PKTU_PAKETUJIAN_ID = ppu.PKTU_PAKETUJIAN_ID               
                JOIN mnag_mapel mnm ON mnm.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
                JOIN mp_mapel mmp ON mmp.MP_MAPEL_ID = mnm.MP_MAPEL_ID
                JOIN kls_kelas kk ON kk.KLS_KELAS_ID = mnm.KLS_KELAS_ID
                JOIN prog_program pp ON pp.PROG_PROGRAM_ID =mnm.PROG_PROGRAM_ID
                WHERE dpu.ID_DETAIL_PAKETUJIAN ='".$id_detailpaketujian."'
                AND ppu.IS_DELETED = 0";

        
        return $this->db->query($sql);

        
    }
    public function GetListSiswaUjian($id_detailpaketujian)
    {
        $sql = "SELECT up.NAMA, jj.NAMA_JENJANG, kk.KELAS, pp.NAMA_PROGRAM, hhu.* 
        FROM hslu_hasilujian hhu 
                JOIN usr_user uu ON hhu.USR_USER_ID =uu.USR_USER_ID
                JOIN usr_profile up ON hhu.USR_USER_ID =up.USR_USER_ID
                JOIN kls_kelas kk ON kk.KLS_KELAS_ID =up.KLS_KELAS_ID
                JOIN jnjg_jenjang jj ON jj.JNJG_JENJANG_ID =kk.JNJG_JENJANG_ID
                JOIN prog_program pp ON pp.PROG_PROGRAM_ID = up.PROG_PROGRAM_ID
                WHERE hhu.IS_DELETED = 0  AND  hhu.ID_DETAIL_PAKETUJIAN ='".$id_detailpaketujian."'
                ORDER BY hhu.TOTAL_SCORE DESC";
        return $this->db->query($sql);


    } 

    public function GetDetailSiswaUjian($id,$id_hasil)
    {
        $sql = "SELECT hhu.HSLU_HASILUJIAN_ID, hhu.TOTAL_SCORE,hhu.TOTAL_BENAR, hhu.TOTAL_SALAH, hhu.TOTAL_TIDAKJAWAB,
                        up.USR_USER_ID, up.NAMA, up.ADDRESS, up.PHONE, up.EMAIL, 
                        dpu.DURASI_UJIAN_MENIT, dpu.TGL_MULAI_UJIAN,
                        ppu.NAMA_UJIAN, kk.KELAS, mm.NAMA_MAPEL, pp.NAMA_PROGRAM, jj.NAMA_JENJANG

                FROM hslu_hasilujian hhu
                JOIN usr_profile up ON up.USR_USER_ID = hhu.USR_USER_ID
                JOIN detail_paketujian dpu ON dpu.ID_DETAIL_PAKETUJIAN = hhu.ID_DETAIL_PAKETUJIAN
                JOIN pktu_paketujian ppu ON ppu.PKTU_PAKETUJIAN_ID = dpu.PKTU_PAKETUJIAN_ID
                JOIN mnag_mapel mmp ON mmp.MM_MANAGE_MAPEL_ID = dpu.MM_MANAGE_MAPEL_ID
                JOIN kls_kelas kk ON kk.KLS_KELAS_ID = mmp.KLS_KELAS_ID
                JOIN mp_mapel mm ON mm.MP_MAPEL_ID = mmp.MP_MAPEL_ID
                LEFT JOIN prog_program pp ON pp.PROG_PROGRAM_ID = mmp.PROG_PROGRAM_ID 
                LEFT JOIN jnjg_jenjang jj ON jj.JNJG_JENJANG_ID = kk.JNJG_JENJANG_ID
                WHERE hhu.IS_DELETED = 0  AND  hhu.HSLU_HASILUJIAN_ID =".$id." AND  hhu.USR_USER_ID =".$id_hasil."";                
        return $this->db->query($sql);
    }

      public function GetDetailJawabanHasilUjian($id)
    {
        $sql = "SELECT hdj.*, ss.SOAL FROM hslu_detail_jawaban hdj
                JOIN hslu_hasilujian hhu ON hhu.HSLU_HASILUJIAN_ID = hdj.HSLU_HASILUJIAN_ID
                JOIN sl_banksoal sbs ON sbs.SL_BANKSOAL_ID = hdj.SL_BANKSOAL_ID
                LEFT JOIN sl_soal ss ON ss.SL_SOAL_ID = sbs.SL_SOAL_ID
                WHERE hdj.HSLU_HASILUJIAN_ID =".$id."";                
        return $this->db->query($sql);



    }
}