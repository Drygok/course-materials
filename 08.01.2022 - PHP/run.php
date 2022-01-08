<?php 

	$content = str_replace("\r", "", file_get_contents('ans_1.html1'));
	
	$lines = explode("\n", $content);
	
	$questions = array();
	
	foreach ($lines as $line) {
		if (!str_contains($line, '<td class="col1">')) {
			continue;
		}
		
		$substrings = explode(':', $line);
		if (count($substrings) != 2) {
			continue;
		}
		
		$count = 1;
		if (isset($questions[$substrings[1]])) {
			$count += $questions[$substrings[1]];
		}
		$questions[$substrings[1]] = $count;
		
	}
	
	foreach ($questions as $question => $count) {
		echo("Вопрос: $question | Количество повторений: $count\n");
	}

?>