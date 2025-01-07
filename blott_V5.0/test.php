<?PHP
function get_event($Year, $Month, $Day) {
	$Day = str_pad($Day, 2, 0, STR_PAD_LEFT);
	$cal_day = $Year."-".$Month."-".$Day;
	$cal_db = mysql_query("SELECT * FROM wpblog_posts WHERE post_date LIKE '%".$Year."-".$Month."-".$Day."%' AND post_type = 'post' ORDER BY post_date ASC");

	$post_pop_up = "<td class=\"date_has_event\">\n".$Day."<div class=\"events\">\n<ul>\n";
	
	while($cal_data = mysql_fetch_array($cal_db)) {
		$post_date = explode(" ", $cal_data['post_date']);
		$post_pop_up .= "<li><span class=\"title\"><a href=\"/?p=".$cal_data['ID']."\" title=\"".$cal_data['post_title']."\">".$cal_data['post_title']."</a></span><span class=\"desc\">";
		
		// limit the length of content that goes into the pop up post window		
		$limit = 200;
		$post_content = $cal_data['post_content'];
		
		if (strlen($post_content) > $limit) {
			$post_content = substr($post_content, 0, strrpos(substr($post_content, 0, $limit), ' ')) . '...';
		}
		$post_pop_up .= $post_content."</span></li>\n";
	}
	
	$post_pop_up .= "</ul>\n</div>\n</td>\n";	
	
	if($cal_day == $post_date[0] && str_pad(date('d'), 2, 0, STR_PAD_LEFT) >= $Day){
		echo $post_pop_up;
	} else if(date('d') == $Day) {
		echo "<td class=\"today\">".$Day."</td>\n";
	} else {
		echo "<td class=\"calender\">".$Day."</td>\n";
	}
}
?>


<?PHP
if ((!isset($_GET["Month"])) && (!isset($_GET["Year"]))) {
    $Month = date("m");
    $Year = date("Y");
} else {
    $Month = $_GET["Month"];
    $Year = $_GET["Year"];
}
	
$Day = date("d");
	
$Timestamp = mktime(0,0,0,$Month,1,$Year); 
$MonthName = date("F", $Timestamp); 
$Month = str_pad($Month, 2, 0, STR_PAD_LEFT);

echo "<table class=\"calender\" cellspacing=\"0\">\n<thead>\n<tr>\n"; 

$daysOfWeek = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");

foreach ($daysOfWeek as $value) {
  echo "<th class=\"calender\">$value</th>\n";
}

echo "</tr>\n</thead>\n<tfoot>\n<tr>\n";
 
foreach ($daysOfWeek as $value) {
  echo "<th class=\"calender\">$value</th>\n";
}
echo "</tr>\n</tfoot>\n<tbody>\n"; 

$MonthStart = date("w", $Timestamp);                

$LastDay = date("d", mktime(0,0,0,$Month+1, 0, $Year)); 
$StartDate = -$MonthStart; 
        
for ($k=1;$k<=6;$k++){

    if ($StartDate < $LastDay){
        echo"<tr>"; 
        for ($j=1;$j<=7;$j++){
            $StartDate++;
            if($StartDate <= $LastDay || $StartDate >= $LastDay) {
                if($StartDate > 0 && $StartDate <= $LastDay) {
                    get_event($Year, $Month, $StartDate); 
                } else { 
                    echo"<td class=\"calender\"></td> \n";  
                }
            }
        }
        echo"</tr>"; 
    } 
}
echo "</tbody>\n</table>";
?>