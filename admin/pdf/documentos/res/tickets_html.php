<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
        <?php
            $configuration = mysqli_query($con, "select * from configuration");
        ?>
            <tr>
                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "Ticketly "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>
        <?php foreach ($configuration as $settings) { ?> 
        <?php if ($settings['name']=="website") { ?>
            <td style="width: 25%; color: #444444;">
                <!-- <img style="width: 100%;" src="../../images/<?php echo $settings['val']; ?>" alt="Logo"><br> -->
                <h1><?php echo $settings['val']; ?></h1>
            </td>
        <?php } ?>   
		<?php } //end foreach ?>   
            <td style="width: 75%;text-align:right">
                <h2 style="color: #16a085;">Tickets</h2>
            </td>
        </tr>
    </table>
    <br>

	
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
		<tr>
			<td style="width: 100%;text-align:right">
			Fecha: <?php echo date("d/m/Y");?>
			</td>
		</tr>
	</table>

    <br>
  
    <table cellspacing="0" style="width: 100%; border: solid 1px #16a085; background: #16a085;color:white; text-align: center; font-size: 10pt;padding:1mm;">
        <tr>
            <th style="width: 10%">FECHA</th>
            <th style="width: 15%">CODIGO</th>
            <th style="width: 20%">EMPRESA</th>
            <th style="width: 20%">NOMBRE</th>
            <th style="width: 15%">ESTADO</th>
            <th style="width: 20%">PROBLEMA</th>
            
        </tr>
    </table>

	<table border="" cellspacing="0" style="width: 100%; border: solid 1px #16a085;  text-align: center; font-size: 9.5pt;padding:1mm;">
    <?php

      $sTable="tickets";
        
			list ($f_inicio,$f_final)=explode(" - ",$daterange);//Extrae la fecha inicial y la fecha final en formato espa?ol
			list ($dia_inicio,$mes_inicio,$anio_inicio)=explode("/",$f_inicio);//Extrae fecha inicial 
			$fecha_inicial="$anio_inicio-$mes_inicio-$dia_inicio 00:00:00";//Fecha inicial formato ingles
			list($dia_fin,$mes_fin,$anio_fin)=explode("/",$f_final);//Extrae la fecha final
			$fecha_final="$anio_fin-$mes_fin-$dia_fin 23:59:59";
		
			$sWhere = "where created_at between '$fecha_inicial' and '$fecha_final' ";
		
			if ($category>0){
				$sWhere .=" and status_id='$category'";
			}
			$sWhere.=" order by created_at desc";
			$sql="SELECT * FROM  $sTable $sWhere";
			$query = mysqli_query($con, $sql);
			$sumador_total=0;

			while ($key=mysqli_fetch_array($query)) {
				$category_id=$key['status_id'];

				 $category=mysqli_query($con, "select * from status where id=$category_id");
				 $rw=mysqli_fetch_array($category);
				 $category_name=$rw['name'];

                $kind_id=$key['kind_id'];
                $kind_id=mysqli_query($con, "select * from kind where id=$kind_id");
                $rw=mysqli_fetch_array($kind_id);
                $kind_name=$rw['name'];

                $client_id=$key['client_id'];
                $clients=mysqli_query($con, "select * from clientes where id=$client_id");
                while ($row=mysqli_fetch_array($clients)) {
                    $business=$row['business'];
                }

			?>
			<tr>
				<td style="width: 10%; text-align: left"><?php echo date("d/m/Y", strtotime($key['created_at'])); ?></td>
				<td style="width: 15%; text-align: right;"><?php echo $key['number_ticket']; ?></td>
                <td style="width: 20%; text-align: center;"><?php echo $business; ?></td>
                <td style="width: 20%; text-align: center;"><?php echo $key['name']; ?></td>
                <td style="width: 15%; text-align: center"><?php echo $category_name; ?></td>
				<td style="width: 20%; text-align: center"><?php echo $kind_name; ?></td>
			</tr>	 
				 <?php
				 
			}	

    ?>     
    </table>
    <br><br><br><br>	
	
</page>