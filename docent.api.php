<?php
	
	if($parameters[2] == 'list'){

		$html = file_get_contents("https://static.***.nl/ee/beheer/modules/roosters/get_elementen.php?soort=docent&week=8&jaar=2015");
		
		
		function getTextBetweenTags($tag, $html, $strict=0)
		{
		    /*** a new dom object ***/
		    $dom = new domDocument;
		
		    /*** load the html into the object ***/
		    if($strict==1)
		    {
		        $dom->loadXML($html);
		    }
		    else
		    {
		        $dom->loadHTML($html);
		    }
		
		    /*** discard white space ***/
		    $dom->preserveWhiteSpace = false;
		
		    /*** the tag by its tag name ***/
		    $content = $dom->getElementsByTagname($tag);
		
		    /*** the array to return ***/
		    $out = array();
		    foreach ($content as $item)
		    {
		        /*** add node value to the out array ***/
		        $out[] = $item->nodeValue;
		    }
		    /*** return the results ***/
		    return $out;
		}
		
		$content = getTextBetweenTags('option', $html);
		
		$matches = array();
		
		foreach( $content as $item )
		{
		    $matches['docent'][substr($item, 0, 4)]['naam'] = substr($item, 7);
		}
		
		echo json_encode($matches, JSON_PRETTY_PRINT);

	}else{
		echo requestStatus(405);
		die();
	}
?>