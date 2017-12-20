<?php
include 'PHPExcel.php';


function readExcel($filePath){
$objPHPExcel = PHPExcel_IOFactory::load($filePath);
		$objWorksheet = $objPHPExcel->getActiveSheet();
		$keydata =array();  $x=0;$y=0;
		foreach($objPHPExcel->getWorksheetIterator() as $worksheet)
		{
		
			foreach ($objWorksheet->getRowIterator() as $row) {
					
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false); 
			$y=0;
			foreach ($cellIterator as $cell) {
			$keydata[$x][$y] = [
					'Value' => $cell->getValue(),
					'Index' => $cell->getCoordinate(),
					'CalculateValue' => $cell->getCalculatedValue()
					];
				$y++;
			  }
			  $x++;
			}
		}	
		$objPHPExcel->disconnectWorksheets();
		unset($objPHPExcel);
		return $keydata;
}

?>