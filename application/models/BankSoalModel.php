<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankSoalModel extends CI_Model {

    public function GetDataEdit($id)
    {
        $sql = "SELECT d.SL_BANKSOAL_ID, a.SL_SOAL_ID, a.SOAL, a.TYPEOFQUESTION, a.BOBOT_BENAR, a.BOBOT_SALAH, a.BOBOT_TIDAKJAWAB, c.MM_MANAGE_MAPEL_ID, c.TINGKAT_SULIT, c.BB_BAB_ID, b.PILIHAN, b.JAWABAN_BENAR FROM sl_soal a JOIN sl_pilihan b ON a.SL_SOAL_ID = b.SL_SOAL_ID LEFT JOIN sl_banksoal c ON a.SL_SOAL_ID = c.SL_SOAL_ID LEFT JOIN sl_banksoal d ON a.SL_SOAL_ID=d.SL_SOAL_ID WHERE md5(d.SL_BANKSOAL_ID)=?";
        $param = array($id);
        return $this->db->query($sql,$param);
    }

    public function Delete($idbanksoal)
    {
        $sql = "CALL deleteSoal(?)";
        $param = array($idbanksoal);
        return $this->db->query($sql,$param);
    }

    public function Update($idbanksoal,$idsoal,$question,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab)
    {
        $user_id = $this->session->userdata('logged_in')['result']->USR_USER_ID;

        if (!$bab_id) {
            $bab_id = NULL;
        }

        $var1 =0;
        $var2 =0;
        foreach (count_chars($option_e, 1) as $i => $val) {
            if(chr($i)){
                if(chr($i)==' '){
                    $var1++;
                }else{
                    $var2++;
                }
            }
        }
        if(($var1==0 && $var2==0) || ($var1>=1 && $var2==0)){
            $option_e = NULL;
        }

        $var3 =0;
        $var4 =0;
        foreach (count_chars($option_d, 1) as $j => $val) {
            if(chr($j)){
                if(chr($j)==' '){
                    $var3++;
                }else{
                    $var4++;
                }
            }
        }
        if(($var3==0 && $var4==0) || ($var3>=1 && $var4==0)){
            $option_d = NULL;
        }

        $sql = "CALL updateSoal(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $param = array($idbanksoal,$idsoal,$question,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab,$user_id);
        return $this->db->query($sql,$param);
    }

    public function Insert($question,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab)
    {
        $user_id = $this->session->userdata('logged_in')['result']->USR_USER_ID;
        $peran = $this->session->userdata('logged_in')['result']->PERAN;
        if (strtolower($peran)=='klien') {
            $d_c_question = "0";
            $isdefeaultbobot = "0";
        }else if(strtolower($peran)=='admin'){
            $d_c_question = "1";
            $isdefeaultbobot = "1";
        }
        if (!$bab_id) {
            $bab_id = NULL;
        }

        $var1 =0;
        $var2 =0;
        foreach (count_chars($option_e, 1) as $i => $val) {
            if(chr($i)){
                if(chr($i)==' '){
                    $var1++;
                }else{
                    $var2++;
                }
            }
        }
        if(($var1==0 && $var2==0) || ($var1>=1 && $var2==0)){
            $option_e = NULL;
        }

        $var3 =0;
        $var4 =0;
        foreach (count_chars($option_d, 1) as $j => $val) {
            if(chr($j)){
                if(chr($j)==' '){
                    $var3++;
                }else{
                    $var4++;
                }
            }
        }
        if(($var3==0 && $var4==0) || ($var3>=1 && $var4==0)){
            $option_d = NULL;
        }

        //$sql = "CALL insertBankSoal('".$question."','".$d_c_question."','".$user_id."','".$user_id."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$option_e."','".$correct_ans."',".$idmanmapel.",".$bab_id.", '".$tingkatsulit."', '".$bobotbenar."', '".$bobotsalah."', '".$bobottidakjawab."', '".$isdefeaultbobot."',NULL)";
        $sql = "CALL insertBankSoal(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $param = array($question,$d_c_question,$user_id,$user_id,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab,$isdefeaultbobot,NULL);
        return $this->db->query($sql,$param);
    }

    public function InsertFromDetail($question,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab,$idpaket_ujianmd5)
    {
        $user_id = $this->session->userdata('logged_in')['result']->USR_USER_ID;
        $peran = $this->session->userdata('logged_in')['result']->PERAN;
        if (strtolower($peran)=='klien') {
            $d_c_question = "0";
            $isdefeaultbobot = "0";
        }else if(strtolower($peran)=='admin'){
            $d_c_question = "1";
            $isdefeaultbobot = "1";
        }
        if (!$bab_id) {
            $bab_id = 'NULL';
        }

        $var1 =0;
        $var2 =0;
        foreach (count_chars($option_e, 1) as $i => $val) {
            if(chr($i)){
                if(chr($i)==' '){
                    $var1++;
                }else{
                    $var2++;
                }
            }
        }
        if(($var1==0 && $var2==0) || ($var1>=1 && $var2==0)){
            $option_e = NULL;
        }

        $var3 =0;
        $var4 =0;
        foreach (count_chars($option_d, 1) as $j => $val) {
            if(chr($j)){
                if(chr($j)==' '){
                    $var3++;
                }else{
                    $var4++;
                }
            }
        }
        if(($var3==0 && $var4==0) || ($var3>=1 && $var4==0)){
            $option_d = NULL;
        }

        $sql = "CALL insertBankSoal(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $param = array($question,$d_c_question,$user_id,$user_id,$option_a,$option_b,$option_c,$option_d,$option_e,$correct_ans,$idmanmapel,$bab_id,$tingkatsulit,$bobotbenar,$bobotsalah,$bobottidakjawab,$isdefeaultbobot,$idpaket_ujianmd5);
        return $this->db->query($sql,$param);
    }
}