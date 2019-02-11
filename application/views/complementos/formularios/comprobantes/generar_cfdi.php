<div class="content-panel">
	<table class="table" border="1">
		<tr>
			<td colspan="1"><center>SIN TIMBRADO</center></td>
			<td colspan="3"><center>TIMBRAR</center></td>
		</tr>
		<tr>
			<td colspan="1"><center><i class="fa fa-file-excel-o"></i> XML</center></td>
			<td colspan="1"><center><i class="fa fa-file-excel-o"></i> XML</center></td>
			<td colspan="1"><center> <i class="fa fa-file-pdf-o"></i> PDF</center></td>
		</tr>
		<tr>
			<td><center><a href="<?php echo base_url().$nombre_ubicacion_doc_xml?>"><button class="btn btn-round btn-success"><i class="fa fa-file-excel-o"></i> ver</button></a></center></td>
			<!--/$nombre_ubicacion_doc_xml/$nombre_archivo-->
			<!--
			<td><center><a href="<?php echo base_url().'comprobantes/descargar_documentos/?nombre_archivo='.$nombre_archivo.' 
			, &ubicacion_doc_xml='.$nombre_ubicacion_doc_xml.''?>"><button class="btn btn-round btn-danger"><i class="fa fa-cloud-download"></i> descargar</button></a></center></a></td>
			-->
			<td><a href=""><center><a href="<?php echo base_url().'../FacturacionModerna-PHP-master/prueba/'.$cfdi.'.xml'?>"><button class="btn btn-round btn-success"><i class="fa fa-file-excel-o"></i> ver.</button></a></center></a></td>
			<!--
			<td><a href=""><center><a href="<?php echo base_url().'comprobantes/descargar_documentos/?nombre_archivo='.$nombre_archivo.' 
			, &ubicacion_doc_xml=localhost/FacturacionModerna-PHP-master/prueba/'.$cfdi.'.xml &condicion=T'?>"><button class="btn btn-round btn-danger"><i class="fa fa-cloud-download"></i> descargar</button></a></center></td>-->

			<td><a href=""><center><a href="<?php echo base_url().'../FacturacionModerna-PHP-master/prueba/'.$cfdi.'.pdf'?>"><button class="btn btn-round btn-success"><i class="fa fa-file-excel-o"></i> ver</button></a></center></a></td>

			<!--
			<td><a href=""><center><a href="<?php echo base_url().'comprobantes/descargar_documentos/?nombre_archivo='.$cfdi.'.pdf 
			, &ubicacion_doc_xml=localhost/FacturacionModerna-PHP-master/prueba/'.$cfdi.'.pdfss &condicion=T'?>"><button class="btn btn-round btn-danger"><i class="fa fa-cloud-download"></i> descargar.</button></a></center></td>-->
		</tr>
	</table>
</div>