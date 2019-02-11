<div class="showback" >
  <h4><i class="fa fa-angle-right"></i>AGRGUEAR EMISORES</h4>
    <br>
    <form class="form-horizontal style-form" method="post" action="<?php echo base_url(); ?>catalogos/submit_post_emisor" 
      enctype="multipart/form-data">
        <section>     
            <form class="form-horizontal style-form" method="get">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="showback">
          <h4><i class="fa fa-angle-right"></i> DATOS GENERALES*</h4>
          <table>
            <tr>
              <td><b>RFC</b></td>
              <td><b>RAZON SOCIAL DE LA EMPRESA</b></td>
              <td><b>REGIMEN FISCAL</b></td>
            </tr>  
            <tr>
              <td><input type="text" name="rfc" size="25" class="form-control"></td>
              <td><input type="text" name="razon_social" size="70" class="form-control"></td>
              <td>
                <select class="form-control" name="Regimen_fiscal">
                  <option value="601">General de Ley Personas Morales</option>
                  <option value="603">Personas Morales con Fines no Lucrativos</option>
                  <option value="605">Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                  <option value="606">Arrendamiento</option>
                  <option value="608">Demás ingresos</option>
                  <option value="609">Consolidación</option>
                  <option value="610">Residentes en el Extranjero sin Establecimiento Permanente en México</option>
                  <option value=611"">Ingresos por Dividendos (socios y accionistas)</option>
                  <option value="612">Personas Físicas con Actividades Empresariales y Profesionales</option>
                  <option value="614">Ingresos por intereses</option>
                  <option value="616">Sin obligaciones fiscales</option>
                  <option value="620">Sociedades Cooperativas de Producción que optan por diferir sus ingresos</option>
                  <option value="621">Incorporación Fiscal</option>
                  <option value="622">Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras</option>
                  <option value="623">Opcional para Grupos de Sociedades</option>
                  <option value="624">Coordinados</option>
                  <option value="628">Hidrocarburos</option>
                  <option value="607">Régimen de Enajenación o Adquisición de Bienes</option>
                  <option value="609">De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option>
                  <option value="630">Enajenación de acciones en bolsa de valores</option>
                  <option value="615">Régimen de los ingresos por obtención de premios</option>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="2">TIPO DE PERSONA</td><td></td>
            </tr>
            <tr>
              <td>
                <label>FISICA <input type="radio" 
                name="tipo_persona" value="ficica"></label>
              </td>
              <td>
                <label>MORAL  <input type="radio" 
                name="tipo_persona" value="moral"></label>
              </td>
            </tr>   
          </table>     
        </div>
      </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="showback">
            <h4><i class="fa fa-angle-right"></i> DOMICILIO</h4>
            <table>
              <tr>
                <td><b>CALLE</b></td>
                <td><b>NO INTERIOR</b></td>
                <td><b>NO EXTERIOR</b></td>

              </tr>
              <tr>
                <td><input type="text" name="calle" size="15" class="form-control"></td>
                <td><input type="text" name="ninterior" size="10" class="form-control"></td>
                <td><input type="text" name="nexterior" size="10" class="form-control">
              </td>
              <tr>
                <td><b>COLONIA</b></td>
                <td><b>LOCALIDAD</b></td>
                <td><b>MUNICIPIO</b></td>

              </tr>
              <tr>
                <td><input type="text" name="colonia" size="15" class="form-control"></td>
                <td><input type="text" name="localidad" size="10" class="form-control"></td>
                <td><input type="text" name="municipio" size="10" class="form-control">
              </td>

              </tr>
              <tr>
                <td><b>ESTADO</b></td>
                <td><b>PAIS</b></td>
                <td><b>CODIGO POSTAL</b></td>

              </tr>
              <tr>
                <td><input type="text" name="estado" size="15" class="form-control"></td>
                <td><input type="text" name="pais" size="10" class="form-control"></td>
                <td><input type="text" name="codigo_postal" size="10" class="form-control">
              </td>
            </table>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="showback">
            <h4><i class="fa fa-angle-right"></i> DOCUMENTOS*</h4>
              
              <div class="form-group">
                <label class="col-sm-4 col-sm-4 control-label">ARCHIVO .CER</label>
                  <div class="col-sm-6">
                    <input type="file" name="archivo1[]">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 col-sm-4 control-label">ARCHIVO .PEM</label>
                  <div class="col-sm-6">
                    <input type="file" name="archivo2[]">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 col-sm-4 control-label">NUMERO DE CERTIFICADO</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="n_cer">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">USUARIO</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="id_usu">
                  </div>
                <label class="col-sm-2 col-sm-2 control-label">CONTRASEÑA</label>
                  <div class="col-sm-4">
                    <input type="password" class="form-control" name="pass_usu">
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="showback">
            <h4><i class="fa fa-angle-right"></i> DATOS DE CONTACTO</h4>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">TELEFONO</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="telefono">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">CORREO</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="correo">
                  </div>
              </div>
          </div>
        </div>
        <br>
        <b>.</b>
          <br><br>
          <div align="center">
            <button type="submit" name="insertar" class="btn btn-info"><span class='glyphicon glyphicon-ok'></span> <b>AGREGAR CONCEPTO/S</b></button>
          </div>
        </section>
      </form>
</div>