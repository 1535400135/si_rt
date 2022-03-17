<?php
$connect = new PDO("mysqli:host=localhost;dbname=test", "root", "");

if (isset($_POST["type"]))
{
	if ($_POST["type"] == "data_kab") {
		$query = "SELECT * FROM kabupaten ORDER BY nama ASC";
		$statement=$connect->prepare($query);
		$statement->execute();
		$data = $statement->fetchAll();
		foreach ($data as $row) {
			$output[] = array(
				'id' => $row["id_kab"],
				'name' => $row["nama"],
				);
		}
		echo json_encode($output);
	}
	else {
		$query = "SELECT * FROM kecamatan where id_kab='".$_POST["kab"]."' ORDER BY nama ASC";
		$statement=$connect->prepare($query);
		$statement->execute();
		$data=$statement->fetchAll();
		foreach ($data as $row) {
			$output[] = array(
				'id' => $row["id_kec"],
				'name' => $row["nama"],
			);
		}
	echo json_encode($output);
	}
}

?>