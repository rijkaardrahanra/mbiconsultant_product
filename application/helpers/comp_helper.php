<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function format_rupiah($angka){
 
 $rupiah = number_format($angka, 2, ',', '.');
 return $rupiah;
}

function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function tanggal_indo2_fromdatetime($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
    $dt = new DateTime($tanggal);
    $date = $dt->format('Y-m-d');
	$split = explode('-', $date);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}


function complete_tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
    $dt = new DateTime($tanggal);
    $dates = $dt->format('Y-m-d');
    $times = $dt->format('H:i');
	$date = explode('-', $dates);
	$time = explode(':', $times);
	return $date[2] . ' ' . $bulan[ (int)$date[1] ] . ' ' . $date[0] . ' ' . $time[0] . ':' . $time[1];
}

function getDays($date1, $date2)
{
	$awal=date_create($date1);
	$akhir=date_create($date2);
	$diff=date_diff($awal,$akhir);
	return $diff->format("%a");
}

function durationminute($strStart,$strEnd)
{
	$awal=date_create($strStart);
	$akhir=date_create($strEnd);
	$diff=date_diff($awal,$akhir);
	$dayduration = $diff->format("%a");

	$dteStart = new DateTime($strStart);
	$dteEnd   = new DateTime($strEnd);

	$dteDiff  = $dteStart->diff($dteEnd);
	//$durationhour = $dteDiff->format("%H jam %I menit %S detik");
	$timehour = $dteDiff->format("%H:%I:%S");
	$time    = explode(':', $timehour);

	if($dayduration>0)
	{
		//$result = $dayduration.' hari '.$durationhour;
		$minutes = ($dayduration * 1440 + $time[0] * 60.0 + $time[1] * 1.0);
	}else{
		//$result = $durationhour;
		$minutes = ($time[0] * 60.0 + $time[1] * 1.0);
	}

	//return $result;
	return $minutes;
}

function CapitalizeEachWord($word)
{
	$result='';
	$result = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($word))));
	return $result;
}

function upload_image($userfile)
{
	$uploadedFile = $userfile['tmp_name'];
	$target_dir = "assets/images/user/";
	$targetthumb_dir = "assets/images/user/thumbs/";
	$uniquesavename=time().uniqid(rand());
	$target_file = $target_dir . $uniquesavename . basename($userfile["name"]);
	$targetthumb_file = $targetthumb_dir . $uniquesavename . basename($userfile["name"]);

	//folder path setup
	//$target_path = $target_folder; == $target_dir
	//$thumb_path = $thumb_folder; == $target_dir

	//file name setup
    $filename_err = explode(".",$userfile['name']);
    $filename_err_count = count($filename_err);
    $file_ext = $filename_err[$filename_err_count-1];
    $fileName = $userfile['name'];

    $thumb_width = '100';
	$thumb_height = '100';

	if(move_uploaded_file($uploadedFile, $target_file))
	{
        list($width,$height) = getimagesize($target_file);
        $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
        switch($file_ext){
            case 'jpg':
                $source = imagecreatefromjpeg($target_file);
                break;
            case 'jpeg':
                $source = imagecreatefromjpeg($target_file);
                break;

            case 'png':
                $source = imagecreatefrompng($target_file);
                break;
            case 'gif':
                $source = imagecreatefromgif($target_file);
                break;
            default:
                $source = imagecreatefromjpeg($target_file);
        }

        imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
        switch($file_ext){
            case 'jpg' || 'jpeg':
                imagejpeg($thumb_create,$targetthumb_file,100);
                break;
            case 'png':
                imagepng($thumb_create,$targetthumb_file,100);
                break;

            case 'gif':
                imagegif($thumb_create,$targetthumb_file,100);
                break;
            default:
                imagejpeg($thumb_create,$targetthumb_file,100);
        }
		return json_encode(array(
				'status'=> 1,
				'pesan'	=> 'Sukses',
				'name'	=> $uniquesavename . basename($userfile["name"])
				));
	}else{
		return json_encode(array(
				'status'=> 0,
				'pesan'	=> 'move_uploaded_file failed'
				));
	}
}