<?php
require_once("class.Table.php");

class Matrix extends Table {
	//This function transforms from mathematical matrices elements (origin being 1,1) to programmer arrays (origin 0,0)	
	public function transform($row, $column) {
		//TODO: Handle if the row and column are less than the dimension of the array
		$elem = new Element();

		$elem->row = $row-1;
		$elem->column = $column-1;
		
		return $elem;
	}

	//This overwrites setElementAt in table to transform rows and columns for math students
	public function setElementAt($row, $column, $value) {
		//TODO: Handle $row and $column greater than dimension of array
		$elem = $this->transform($row, $column);			
		$this->TwoDimArray[$elem->row][$elem->column] = $value;
	}
}

/*
$rows = 3; $cols = 3; $filler = 0;
$m = new Matrix($rows, $cols, $filler);
$m->displayAsTable();

echo "\n<br />After:\n<br />";
//This is a square matrix, so we can assume $rows = $columns
for ($i = 1; $i <= $rows; $i++) {
	$m->setElementAt($i, $i, 1);
	$m->displayAsTable();
	echo "<br />";
}
*/

//echo "This is the identity matrix for R3.";

?>
