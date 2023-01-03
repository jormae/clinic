<?php 

include_once __DIR__ . "/Visit_model.php";
class System_model{

	private $db;

	public function __construct()
	{
		$this->db = new Database;		
	}

	public function exportDatabase($host,$user,$pass,$name,$tables=false,$backup_name=false)
    {

        $mysqli = new mysqli($host,$user,$pass,$name); 
        $mysqli->select_db($name); 
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }   
        if($tables !== false) 
        { 
            $target_tables = array_intersect( $target_tables, $tables); 
        }
        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
            {
                while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                    {
                            $content .= "\nINSERT INTO ".$table." VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j<($fields_amount-1))
                        {
                                $content.= ',';
                        }      
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        $thDate = new ThaiDate();
  		$thDate->thaiTimeZone();
        $date = date('Ymd_His');

        $fileName = $backup_name.$date.".sql";
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$fileName."\"");  
        echo $content; exit;
        // die($backup_name);
    }

    public function sendLineNotify()
    {
        $session    = new Session();
        $username   = $_SESSION['username'];

        $thDate     = new ThaiDate();
        $thDate->thaiTimeZone();
        $datetime   = date('Y-m-d H:i:s');

        $visit      = new Visit_model();
        // $visitsInfo = $visit->getAllLabOrdersInfoByDate($_REQUEST['date']);
        $visitsInfo = $visit->getAllNewLabOrdersInfoByDate($_REQUEST['date']);
        $visitdate  = $_REQUEST['date'];
        $length     = count($visitsInfo);

        $validate   = new Validation();
        $isSentToday= $validate->isDataExisted("*", "tbl_line_log", "visitdate = '$visitdate'");
        $line       = new Utils();
        if ($isSentToday) {
            $introMsg   = "ขออนุญาตส่งรายชื่อผู้มารับบริการวันที่ ".$thDate->thaiShortDate($_REQUEST['date'])." เข้าห้องปฏิบัติการ โรงพยาบาลบาเจาะ จาก".ORG_NAME." เพิ่มเติม จำนวน ".$length." ราย ดังนี้";
            
        }
        else{
            $introMsg   = "ขออนุญาตส่งรายชื่อผู้มารับบริการวันที่ ".$thDate->thaiShortDate($_REQUEST['date'])." เข้าห้องปฏิบัติการ โรงพยาบาลบาเจาะ จาก".ORG_NAME." จำนวน ".$length." ราย ดังนี้";

        }

        $line->lineNotify($introMsg);
        sleep(10);

        ini_set('max_execution_time', 60 * $length);

        $i  = 1;
        foreach ($visitsInfo as $value) {
            $occupationName = empty($value['occupaname']) ? "-" : $value['occupaname'];
            $bloodGroup     = empty($value['bloodgroup']) ? "-" : $value['bloodgroup'];
            $father         = empty($value['father'])     ? "-" : $value['father'];
            $mother         = empty($value['mother'])     ? "-" : $value['mother'];
            $mate           = empty($value['mate'])       ? "-" : $value['mate'];
            $message = $i++.'/'.$length.' - ชื่อ-สกุล: '.$value['prenamelong'].$value['fname'].' '.$value['lname'].' เลขปชช.: '.$value['idcard'].' วันเกิด: '.$thDate->thaiShortDate($value['birth']).' ที่อยู่: '.$value['ADDRESS'].' อาชีพ: '.$occupationName.' กลุ่มเลือด: '.$bloodGroup.' ชื่อบิดา: '.$father.' มารดา: '.$mother.' คู่สมรส: '.$mate;
            $line->lineNotify($message);
            $dataLine = array('datetime'=>$datetime, 'lineText'=>$message, 'idcard'=>$value['idcard'], 'visitdate'=>$value['visitdate'], 'sendBy'=>$username);
            $this->db->insert("tbl_line_log", $dataLine);
            sleep(10);
        }

        $respond['success'] = true;
        $respond['message'] = "ส่งข้อมูลเข้าระบบไลน์กลุ่มเรียบร้อยแล้ว";

        echo json_encode($respond);

    }

}
