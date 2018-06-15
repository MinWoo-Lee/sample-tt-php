<?php
include_once('./import.php');

$url = "https://store.steampowered.com/search/?filter=globaltopsellers&os=win";
$html = file_get_html($url);
$count = 0;
$BGRank = 0;
$DBDRank = 0;
$RaftRank = 0;

echo "순위\t타이틀\n";

foreach($html->find('span.title') as $element) {
	$count++;
	$title = $element->innertext;
	
	if ($title == "PLAYERUNKNOWN'S BATTLEGROUNDS") {
		echo "$count\t$title\n";
		$BGRank = $count;
		
	} else if ($title == "Dead by Daylight") {
		echo "$count\t$title\n";
		$DBDRank = $count;
		
	} else if ($title == "Raft") {
		echo "$count\t$title\n";
		$RaftRank = $count;
	}
}

echo "\n";

if ($BGRank && $DBDRank && $RaftRank) {
	if ($DBDRank < $RaftRank) {
		echo "데바데 짱\n";
	} else {
		echo "망햇네\n";
	}
} else {
	echo "셋 중 하나가 순위권에 들지 못함";
}
?>
