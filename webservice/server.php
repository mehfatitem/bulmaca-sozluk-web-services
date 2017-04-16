<?php
	include("../createDbObject.php");
	$postsXml = array();
	$postsJson = array();

	if(isset($_GET['operand']) && isset($_GET['question']) && isset($_GET['format'])){
		$operand = $_GET['operand'];
		
		$conn =  $db->open();
		$question = mysqli_real_escape_string($conn , $_GET['question']);

		switch ($operand) {
			case '1':
				$condition = " = '".$question."'";
				break;
			case '2':
				$condition = " like '%".$question."%'";
				break;
			case '3':
				$condition = " like '".$question."%'";
				break;
			case '4':
				$condition = " like '%".$question."'";
				break;
			default:
				$condition = " = '".$question."'";
				break;
		}
		$sql = "Select * from question_answer where question ".$condition;

		$query = $db->runSql($sql);
		$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml';
		if($format == 'json') {
			while($post = mysqli_fetch_assoc($query)){
				$postsJson[] = $post;
			}
			header('Content-type: application/json');
			echo json_encode(array("posts" => $postsJson));
		}else {
		   	header('Content-type: text/xml');
			while($post = mysqli_fetch_assoc($query)){
				$postsXml[$post['id']] = "id";
				$postsXml[$post['question']] = "question";
				$postsXml[$post['answer']] = "answer";
			}
		    $xml = new SimpleXMLElement('<posts/>');
		    array_walk_recursive($postsXml,array ($xml, 'addChild'));
		    print $xml->asXML();
		}	
	}
?>
