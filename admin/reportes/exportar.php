<?php
	/*-------------------------
	Autor: Amner Saucedo Sosa
	Web: www.abisoftgt.net
	E-Mail: waptoing7@gmail.com
	---------------------------*/
if (PHP_SAPI == 'cli')
	die('Este reporte sólo se puede ejecutar desde un navegador Web');

/** Incluye PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Abisoft")
							 ->setLastModifiedBy("Abisoft")
							 ->setTitle("Office 2010 XLSX Documento de tickets")
							 ->setSubject("Office 2010 XLSX Documento de tickets")
							 ->setDescription("Documento de tickets para Office 2010 XLSX, generado usando clases de PHP.")
							 ->setKeywords("office 2010 openxml php")
							 ->setCategory("Archivo con resultado de tickets");



// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:H1');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'REPORTE DE TICKETS')
            ->setCellValue('A2', 'CODIGO')
            ->setCellValue('B2', 'NOMBRE')
            ->setCellValue('C2', 'EMAIL')
			->setCellValue('D2', 'ESTADO')
			->setCellValue('E2', 'EMPRESA')
			->setCellValue('F2', 'FECHA RECEPCIÓN')
			->setCellValue('G2', 'FECHA ATENCIÓN')
			->setCellValue('H2', 'TIEMPO ATENCIÓN');
			
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:H2')->applyFromArray($boldArray);		

	
			
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(23);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);	
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);		
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);	



	include "../config/config.php";

	$sql="SELECT * FROM tickets  order by created_at";
	$query=mysqli_query($con,$sql);
	$cel=3;//Numero de fila donde empezara a crear  el reporte
	while ($row=mysqli_fetch_array($query)){
		$number_ticket=$row['number_ticket'];
		$name=$row['name'];
		$email=$row['email'];
		$status_id=$row['status_id'];
		$comment=$row['comment'];
		$client_id=$row['client_id'];
		$created_at=$row['created_at'];
		$date_atendid=$row['date_atendid'];

		$status=mysqli_query($con, "select * from status where id=$status_id");
		if ($row=mysqli_fetch_array($status)) {
			$name_status=$row['name'];
		}

		$clientes=mysqli_query($con, "select * from clientes where id=$client_id");
		if ($row=mysqli_fetch_array($clientes)) {
			$business=$row['business'];
		}


		//campo de atendido
		if($date_atendid=="0000-00-00 00:00:00"){
			$atendido="Sin Atención";
		}else{
			$atendido=$date_atendid;
		}

		//campo de tiempo esperado
		if($date_atendid=="0000-00-00 00:00:00"){
			$esperado="Sin Atención";
		}else{
			$strStart = $created_at; 
   			$strEnd   = $date_atendid; 
		   	$dteStart = new DateTime($strStart); 
		   	$dteEnd   = new DateTime($strEnd); 
		   	$dteDiff  = $dteStart->diff($dteEnd);
		   	$esperado =$dteDiff->format("%H:%I:%S");
		}
		
			$a="A".$cel;
			$b="B".$cel;
			$c="C".$cel;
			$d="D".$cel;
			$e="E".$cel;
			$f="F".$cel;
			$g="G".$cel;
			$h="H".$cel;
			// Agregar datos
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($a, $number_ticket)
            ->setCellValue($b, $name)
            ->setCellValue($c, $email)
            ->setCellValue($d, $name_status)
			->setCellValue($e, $business)
			->setCellValue($f, $created_at)
			->setCellValue($g, $atendido)
			->setCellValue($h, $esperado);
			
	$cel+=1;
	}

/*Fin extracion de datos MYSQL*/
$rango="A2:$h";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte de tickets');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte_tickets.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;