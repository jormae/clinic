<?php 

class ThaiDate{

	function thaiTimeZone()
	{
		$timezone 		= "Asia/Bangkok";
		return date_default_timezone_set($timezone);
	}

	function thaiMonthYear($date)	{

	// $date 	= "2018-10-20";
	// $day 	= substr($date, 8,2);
		$th_day_arr 	= array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
		$th_month_arr 	= array( "01"=>"มกราคม", "02"=>"กุมภาพันธ์", "03"=>"มีนาคม", "04"=>"เมษายน", "05"=>"พฤษภาคม", "06"=>"มิถุนายน", "07"=>"กรกฎาคม", "08"=>"สิงหาคม", "09"=>"กันยายน", "10"=>"ตุลาคม", "11"=>"พฤศจิกายน", "12"=>"ธันวาคม" );
	    $year 	= substr($date, 0,4);
	    $month 	= substr($date, 5,2);
	    $thYear = $year + 543;

		$thMonth = 	array(
					"01"=>"มกราคม",   
					"02"=>"กุมภาพันธ์",   
					"03"=>"มีนาคม",   
					"04"=>"เมษายน",   
					"05"=>"พฤษภาคม",   
					"06"=>"มิถุนายน",    
					"07"=>"กรกฎาคม",   
					"08"=>"สิงหาคม",   
					"09"=>"กันยายน",   
					"10"=>"ตุลาคม",   
					"11"=>"พฤศจิกายน",   
					"12"=>"ธันวาคม"                     
					);
		
		$thFormat  = $thMonth[$month]." ".$thYear;
		return $thFormat;
	}

	function thaiShortDate($date){

	    $day 	= substr($date, 8,2);
	    $month 	= substr($date, 5,2);
	    $year 	= substr($date, 0,4);

		$thFormat = $day;    
	    $thFormat .= "/".$month."/";
		$thFormat .= $year + 543;

	    return $thFormat;
	}

	function thaiShortDateYear($date){

	    $day 	= substr($date, 8,2);
	    $month 	= substr($date, 5,2);
	    $year 	= substr($date, 0,4) + 543;

		$thFormat = $day;    
	    $thFormat .= "/".$month."/";
		$thFormat .= substr($year, 2,2);

	    return $thFormat;
	}

	function thaiShortDateTime($date){

	    $day 	= substr($date, 8,2);
	    $month 	= substr($date, 5,2);
	    $year 	= substr($date, 0,4);
	    $hour 	= substr($date, 12,2);
	    $minute	= substr($date, 15,2);

		$thFormat = $day;    
	    $thFormat .= "/".$month."/";
		$thFormat .= $year + 543;
		$thFormat .= " ".$hour;
		$thFormat .= ":".$minute;

	    return $thFormat;
	}

	function thaiFullDate($date){

		// global $th_month_arr;
		$th_day_arr 	= array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
		$th_month_arr 	= array( "01"=>"มกราคม", "02"=>"กุมภาพันธ์", "03"=>"มีนาคม", "04"=>"เมษายน", "05"=>"พฤษภาคม", "06"=>"มิถุนายน", "07"=>"กรกฎาคม", "08"=>"สิงหาคม", "09"=>"กันยายน", "10"=>"ตุลาคม", "11"=>"พฤศจิกายน", "12"=>"ธันวาคม" );

	    $day 	= substr($date, 8,2);
	    $month 	= $th_month_arr[substr($date, 5,2)];
	    $year 	= substr($date, 0,4);

		$thFormat = "วันที่ " .$day;    
	    $thFormat .= " เดือน ".$month." พ.ศ. ";
		$thFormat .= $year + 543;

	    return $thFormat;
	}
}