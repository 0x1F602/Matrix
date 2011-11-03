<?php
require_once("class.Element.php");

abstract class Table {
	protected $TwoDimArray;

	//Creates the internal two dimension array as rows by columns with each element initialized as $filler
	function __construct($rows, $columns, $filler) {
		if ($rows < 1 || $columns < 1) {
			$error = "Error in File: " . __FILE__ . " on Line: " .  __LINE__ . " in Class: " . __CLASS__ . ". Message: Rows and columns must be greater than 0.";
			die($error);
		}

		for ($i = 0; $i < $rows; $i++) {
			$row = array();
			for ($x = 0; $x < $columns; $x++) {
				$row[] = $filler;	
			}
			$this->TwoDimArray[] = $row;
		}
	}

	//This function displays the internal two dimensional array $TwoDimArray as an HTML Table
	public function displayAsTable() {
		echo "<table>\n";
		foreach ($this->TwoDimArray as $row) {
			echo "\t<tr>\n\t\t";
			foreach ($row as $field) {
				echo "<td>$field</td>";	
			}
			echo "\n\t</tr>\n";
		}
		echo "</table>\n";
	}

	public function setElementAt($row, $column, $value) {
		//TODO: Handle $row and $column greater than dimension of array
		$elem = $this->transform($row, $column);			
		$this->TwoDimArray[$elem->row][$elem->column] = $value;
	}
}
?>
