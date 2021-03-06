<?php
	/*-------------------------
	Autor: Amner Saucedo Sosa
	Web: www.abisoftgt.net
	E-Mail: waptoing7@gmail.com
	---------------------------*/
	session_start();
	if (!isset($_SESSION['admin_id']) AND $_SESSION['admin_id'] != 1) {
        header("location: ../../");
		exit;
    }
	/* Connect To Database*/

	include("../../config/config.php");
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tickets ");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay Tickets agregados!')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$daterange = mysqli_real_escape_string($con,(strip_tags($_REQUEST['daterange'], ENT_QUOTES)));
	$category=intval($_REQUEST['category']);
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/tickets_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Tickets.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
