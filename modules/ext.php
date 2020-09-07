<?php

   require_once("modules/home.php");

	class ext extends home                                                                    
   {              
      
      /*
       *  Métodos que servem Json com os caminhos das imagens no S3
       * 
       * drivers() -> imagens dos Drivers
       * 
       * Retorno: 
       * 
       * id_driver
       * driver_name
       * photo
       * photo_id_1
       * photo_id_2
       * 
       * wrattachments() -> imagens dos anexos dos WR
       * 
       * Retorno: 
       * 
       * id_wr
       * number
       * descricao
       * file_path
       * 
       * 
       * wrvolumes() -> imagens dos volumes dos WR
       * 
       * Retorno:
       * 
       * wr_number 
       * tracking_number
       * photo_1
       * photo_2
       * photo_3
       * photo_4
       * photo_5
       * photo_6
       * photo_7
       * photo_8
       * photo_19
       * photo_10
       */
      
      
		function main()
		{
                        
		}

		function drivers()
		{
         
         $ext_key = $this->blockrequest($_REQUEST['id']);
         
         
         if(isset($_REQUEST['id']) &&  $ext_key == EXT_KEY )
         {
            $db = new db();
            $db2 = new db();
            $db3 = new db();
         
            ini_set('max_execution_time', 0);
            ini_set('memory_limit',-1);

            @session_start();
            
            $data = array();

            $sql = "SELECT id, driver_name, photo, photo_id_1, photo_id_2 FROM drivers ORDER BY id DESC";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();
            for($i = 0; $i < $db->num_rows(); $i++)
            {
               $data[$i]["id_driver"] = $db->f("id");
               $data[$i]["driver_name"] = $db->f("driver_name");
               $data[$i]["photo"] = $db->f("photo");
               $data[$i]["photo_id_1"] = $db->f("photo_id_1");
               $data[$i]["photo_id_2"] = $db->f("photo_id_2");

               $db->next_record();
            }
            
           // echo json_encode(var_dump($data));
            echo json_encode($data);
         }
         else 
         {
            die("Acesso negado.");
         }
                        
		}
      
      
		function wrattachments()
		{
         
         $ext_key = $this->blockrequest($_REQUEST['id']);
         
         
         if(isset($_REQUEST['id']) &&  $ext_key == EXT_KEY )
         {
            $db = new db();
            $db2 = new db();
            $db3 = new db();
         
            ini_set('max_execution_time', 0);
            ini_set('memory_limit',-1);

            @session_start();
            
            $data = array();

            $sql = "SELECT wr_attachments.id_wr, wr.number, wr_attachments.file_patch,wr_attachments_types.descricao FROM wr, wr_attachments, wr_attachments_types 
                   WHERE wr.id = wr_attachments.id_wr 
                   AND wr_attachments.file_type = wr_attachments_types.id
                   ORDER BY wr_attachments.id DESC";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();
            for($i = 0; $i < $db->num_rows(); $i++)
            {
               $data[$i]["id_wr"] = $db->f("id_wr");
               $data[$i]["number"] = $db->f("number");
               $data[$i]["descricao"] = $db->f("descricao");
               $data[$i]["file_patch"] = $db->f("file_patch");

               $db->next_record();
            }
            
           // echo json_encode(var_dump($data));
            echo json_encode($data);
         }
         else 
         {
            die("Acesso negado.");
         }
                        
		}


		function wrvolumes()
		{
         
         $ext_key = $this->blockrequest($_REQUEST['id']);
         
         
         if(isset($_REQUEST['id']) &&  $ext_key == EXT_KEY )
         {
            $db = new db();
            $db2 = new db();
            $db3 = new db();
         
            ini_set('max_execution_time', 0);
            ini_set('memory_limit',-1);

            @session_start();
            
            $data = array();

            $sql = "SELECT
                 wr.id
               , wr.number
               , wr_volumes.tracking_number
               , wr_volumes.photo1
               , wr_volumes.photo2
               , wr_volumes.photo3
               , wr_volumes.photo4
               , wr_volumes.photo5
               , wr_volumes.photo6
               , wr_volumes.photo7
               , wr_volumes.photo8
               , wr_volumes.photo9
               , wr_volumes.photo10
               FROM
               wr_volumes
               INNER JOIN wr 
               ON (wr_volumes.id_wr = wr.id) ORDER BY wr_volumes.id DESC";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();
            for($i = 0; $i < $db->num_rows(); $i++)
            {
               $data[$i]["wr_number"] = $db->f("number");
               $data[$i]["tracking_number"] = $db->f("tracking_number");
               $data[$i]["photo1"] = $db->f("photo1");
               $data[$i]["photo2"] = $db->f("photo2");
               $data[$i]["photo3"] = $db->f("photo3");
               $data[$i]["photo4"] = $db->f("photo4");
               $data[$i]["photo5"] = $db->f("photo5");
               $data[$i]["photo6"] = $db->f("photo6");
               $data[$i]["photo7"] = $db->f("photo7");
               $data[$i]["photo8"] = $db->f("photo8");
               $data[$i]["photo9"] = $db->f("photo9");
               $data[$i]["photo10"] = $db->f("photo10");

               $db->next_record();
            }
            
           // echo json_encode(var_dump($data));
            echo json_encode($data);
         }
         else 
         {
            die("Acesso negado.");
         }
                        
		}
      
      
      function hmgtoken()
      {
                     $dmstoken =  $this->getDmsToken();
                     echo $dmstoken;

      }
      
         function showCustomers()
         {


               echo "<pre>";
               echo var_dump($this->getShippers("https://sys.dmslog.com/api/customers/"));
               echo "</pre>";

           /*
            if(isset($_REQUEST['id']))
            {
               echo "<pre>";
               echo var_dump($this->getShipper($_REQUEST['id']));
               echo "</pre>";
            }

             */
         }
         function showVendors()
         {


               echo "<pre>";
               echo var_dump($this->getShippers("https://sys.dmslog.com/api/operational-suppliers/vendors"));
               echo "</pre>";

           /*
            if(isset($_REQUEST['id']))
            {
               echo "<pre>";
               echo var_dump($this->getShipper($_REQUEST['id']));
               echo "</pre>";
            }

             */
         }
         

         function getJsonWR($url, $client_id, $client_secret, $token)
         {

               $headers = array(
                   'Content-Type: application/json',
               );

               // query string
               $fields = array(
                   'client_id' =>$client_id,
                   'client_secret' => $client_secret,
                  'j' => $token,
                    'callback' => $callBackUrl
               );
               $url =$url. http_build_query($fields);

               // Open connection
               $ch = curl_init();

               // Set the url, number of GET vars, GET data
               curl_setopt($ch, CURLOPT_URL, $url);
               curl_setopt($ch, CURLOPT_POST, false);
               curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
               curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
               curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

               // Execute request
               $result = curl_exec($ch);

               // Close connection
               curl_close($ch);

               // get the result and parse to JSON

               $result = $this->remove_utf8_bom($result);

               $result_arr = $result;

               return $result_arr;
         }
         
         function remove_utf8_bom($text)
        {
            $bom = pack('H*','EFBBBF');
            $text = preg_replace("/^$bom/", '', $text);
            return $text;
        }         
      
        
         function wr()
         {
            /*
             *   Método que retorna o Json dos WRs
             */
                  header('Content-Type: application/json');

                  @session_start();
                  $db = new db();
                  $db2 = new db();
                  $db3 = new db();

               $jToken = "ZpcFskvhTR9Kx6DypwPLNHjMuYUL6G";
              
               if(isset($_REQUEST['j']) && isset($_REQUEST['client_id']) && isset($_REQUEST['client_secret']))
               { 

                      $key = $this->blockrequest($_REQUEST['j']);
                      $client_id = $this->blockrequest($_REQUEST['client_id']);
                      $client_secret = $this->blockrequest($_REQUEST['client_secret']);
                      
                      if(isset($_REQUEST['id']))
                         $dmsorder_recurso = $this->blockrequest($_REQUEST['id']);
                      
                      
                      $myObj = array();

                      if($key == $jToken)
                      {
                              //  Busca o Client Secret e o Client ID
                              $sql = "SELECT id_usuario,  client_id, client_secret FROM tokens WHERE client_id = '".$client_id."' AND client_secret = '".$client_secret."' ";
                              $db->query($sql,__LINE__,__FILE__);
                              $db->next_record();
                              if($db->num_rows() > 0)
                              {
                                 
                                 $sql = "SELECT
                                             wr.id AS id,
                                             wr.number,
                                             DATE_FORMAT(wr.wr_date,'%Y/%m/%d %H:%i:%s') AS wr_date,
                                             wr.employee,
                                             wr.id_shipper,
                                             wr.id_consignee,
                                             DATE_FORMAT(wr.dataCadastro,'%Y/%m/%d %H:%i:%s') AS dataCadastro,
                                             wr.notes,
                                             wr.hawb,
                                             wr.mawb,
                                             wr.dmsorder,
                                             wr.finalizado,
                                             wr.id_warehouse,
                                             wr.ibec_cargo,
                                             wr.ibec_number,
                                             wr.s3_report
                                             FROM wr WHERE 1 = 1 ";
                                 
                                 if(isset($_REQUEST['id']))
                                 {
                                    $sql .= " AND wr.id = ".$dmsorder_recurso." ";
                                 }
                                 
                                 
                                 $sql .= " ORDER BY id DESC";
                                 $db->query($sql,__LINE__,__FILE__);
                                 $db->next_record();

                                 for($i = 0; $i < $db->num_rows(); $i++)
                                 {
                                    $id = $db->f("id");			
                                    $number = $db->f("number");			
                                    $wr_date = $db->f("wr_date");			
                                    $employee = $db->f("employee");			
                                    $id_shipper = $db->f("id_shipper");			
                                    $id_consignee = $db->f("id_consignee");			
                                    $dataCadastro = $db->f("dataCadastro");			
                                    $notes = $db->f("notes");			
                                    $hawb = $db->f("hawb");			
                                    $mawb = $db->f("mawb");			
                                    $dmsorder = $db->f("dmsorder");
                                    $finalizado = $db->f("finalizado");
                                    $id_warehouse = $db->f("id_warehouse");
                                    $ibec_cargo = $db->f("ibec_cargo");
                                    $ibec_number = $db->f("ibec_number");
                                    $s3_report = $db->f("s3_report");
                                    
                                    $sql2 = "SELECT sigla FROM warehouses WHERE id = ".$id_warehouse." ";  
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $warehouse = $db2->f("sigla");

                                    
                                    @$myObj[$i]["dmsorder"] = $dmsorder;
                                    @$myObj[$i]["id"] = $id;
                                    @$myObj[$i]["number"] = $number;
                                    @$myObj[$i]["wr_date"] = $wr_date;
                                    @$myObj[$i]["employee"] = $employee;
                                    @$myObj[$i]["dataCadastro"] = $dataCadastro;
                                    @$myObj[$i]["notes"] = $notes;
                                    @$myObj[$i]["hawb"] = $hawb;
                                    @$myObj[$i]["mawb"] = $mawb;
                                    @$myObj[$i]["finalizado"] = $finalizado;
                                    @$myObj[$i]["warehouse"] = $warehouse;
                                    @$myObj[$i]["ibec_cargo"] = $ibec_cargo;
                                    @$myObj[$i]["ibec_number"] = $ibec_number;
                                    @$myObj[$i]["s3_report"] = $s3_report;
                                    
                                    
                                    $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_shipper." ";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $nomeShipper = $db2->f("shipper_name");

                                    @$myObj[$i]["id_shipper"] = $id_shipper;
                                    @$myObj[$i]["nome_shipper"] = $nomeShipper;
                                    

                                    $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_consignee." ";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $nomeConsignee = $db2->f("shipper_name");

                                    @$myObj[$i]["id_consignee"] = $id_consignee;
                                    @$myObj[$i]["nome_consignee"] = $nomeConsignee;
                                    
                                    
                                    $sql2 = "SELECT SUM(weight) AS totalGrossWeight FROM wr_volumes WHERE id_wr = ".$id." ";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $totalGrossWeight = $db2->f("totalGrossWeight");
                                    
                                    @$myObj[$i]["total_gross_weight"] = $totalGrossWeight;
                                    
                                    
                                    $sql2 = "SELECT COUNT(id) AS total FROM wr_volumes WHERE id_wr = ".$id." ";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $totalVolumes = $db2->f("total");
                                    
                                    @$myObj[$i]->total_volumes = $totalVolumes;
                                    
                                    $sql2 = "SELECT status FROM wr_status WHERE id_wr = ".$id." ORDER BY id DESC LIMIT 1";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $status = $db2->f("wr_status");
                                    switch($status)
                                    {
                                       case 0:
                                          $status  = "OHOH";
                                       break;

                                       case 1:
                                          $status  = "OHGG";
                                       break;

                                       case 2:
                                          $status  = "OFFH";
                                       break;

                                    }
                                    
                                    
                                    @$myObj[$i]["wr_status"] = $status;
                                    

                                    
                                    // Volumes do Warehouse Receipts
                                    $sql2 = "SELECT  COUNT(wr_volumes.id) AS total,
                                                   SUM(wr_volumes.weight) AS peso,
                                                   wr_volumes.id AS id,
                                                   wr_volumes.id_wr,
                                                   wr_volumes.id_ca,
                                                   ca.number AS ca_number,
                                                   wr_volumes.id_ca_volumes_types,
                                                   ca_volumes_types.descricao AS volume_type,
                                                   wr_volumes.weight,
                                                   wr_volumes.tracking_number,
                                                   wr_volumes.subvolumes,
                                                   wr_volumes.status,
                                                   DATE_FORMAT(wr_volumes.dataCadastro,'%Y/%m/%d %H:%i:%s') AS dataCadastro,
                                                   wr_volumes.height,
                                                   wr_volumes.width,
                                                   wr_volumes.length,
                                                   wr_volumes.photo1,
                                                   wr_volumes.photo2,
                                                   wr_volumes.photo3,
                                                   wr_volumes.photo4,
                                                   wr_volumes.photo5,
                                                   wr_volumes.photo6,
                                                   wr_volumes.photo7,
                                                   wr_volumes.photo8,
                                                   wr_volumes.photo9,
                                                   wr_volumes.photo10,
                                                   wr_volumes.description,
                                                   wr_volumes.location,
                                                   wr_volumes.ca_volume_id,
                                                   wr_volumes.nr
                                                   FROM wr_volumes, ca, ca_volumes_types WHERE wr_volumes.id_ca = ca.id 
                                                   AND wr_volumes.id_ca_volumes_types = ca_volumes_types.id
                                                   AND  wr_volumes.id_wr = ".$id." GROUP BY wr_volumes.height, wr_volumes.width, wr_volumes.length ORDER BY wr_volumes.id DESC";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();

                                    for($i2 = 0; $i2 < $db2->num_rows(); $i2++)
                                    {
                                       
                                       @$myObj[$i]["VOLUMES"][$i2]["nr"] = $db2->f("nr");
                                       @$myObj[$i]["VOLUMES"][$i2]["qty"] = $db2->f("total");
                                       @$myObj[$i]["VOLUMES"][$i2]["id"] = $db2->f("id");
                                       @$myObj[$i]["VOLUMES"][$i2]["cargo_acceptance"] = $db2->f("ca_number");
                                       @$myObj[$i]["VOLUMES"][$i2]["volume_type"] = $db2->f("volume_type");
                                       @$myObj[$i]["VOLUMES"][$i2]["weight"] = $db2->f("peso");
                                       @$myObj[$i]["VOLUMES"][$i2]["tracking_number"] = $db2->f("tracking_number");
                                       @$myObj[$i]["VOLUMES"][$i2]["subvolumes"] = $db2->f("subvolumes");
                                       @$myObj[$i]["VOLUMES"][$i2]["dataCadastro"] = $db2->f("dataCadastro");
                                       @$myObj[$i]["VOLUMES"][$i2]["height"] = $db2->f("height");
                                       @$myObj[$i]["VOLUMES"][$i2]["width"] = $db2->f("width");
                                       @$myObj[$i]["VOLUMES"][$i2]["length"] = $db2->f("length");
                                       
                                       
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo1"] = $db2->f("photo1");
                                       
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo1"] = $db2->f("photo1");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo2"] = $db2->f("photo2");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo3"] = $db2->f("photo3");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo4"] = $db2->f("photo4");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo5"] = $db2->f("photo5");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo6"] = $db2->f("photo6");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo6"] = $db2->f("photo6");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo7"] = $db2->f("photo7");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo8"] = $db2->f("photo8");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo9"] = $db2->f("photo9");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo10"] = $db2->f("photo10");
                                       
                                       @$myObj[$i]["VOLUMES"][$i2]["description"] = $db2->f("description");
                                       @$myObj[$i]["VOLUMES"][$i2]["location"] = $db2->f("location");
                                       
                                       $db2->next_record();
                                    }
                                    
                                    
                                       $sql2 = "SELECT
                                             wr_attachments.id AS id,
                                              wr_attachments.id_wr,
                                              wr_attachments.file_patch,
                                              wr_attachments.file_name,
                                              wr_attachments.number,
                                              wr_attachments.original,
                                              wr_attachments.file_type,
                                              wr_attachments.invoice_value,
                                              wr_attachments.po_number,
                                              DATE_FORMAT(wr_attachments.dataCadastro,'%Y/%m/%d %H:%i:%s') AS dataCadastro,
                                              wr_attachments_types.descricao AS type_name
                                              FROM wr_attachments,  wr_attachments_types
                                              WHERE wr_attachments.file_type = wr_attachments_types.id
                                              AND wr_attachments.id_wr = ".$id." ORDER BY id DESC ";
                                      $db2->query($sql2,__LINE__,__FILE__);
                                      $db2->next_record();

                                     for($i2 = 0; $i2 < $db2->num_rows(); $i2++)
                                     {
                                        
                                        if($db2->f("file_type") == "1")
                                           $invoice_value = $db2->f("invoice_value");
                                        else
                                           $invoice_value = "";

                                          @$myObj[$i]["ANEXOS"][$i2]["id"] = $db2->f("id");
                                          @$myObj[$i]["ANEXOS"][$i2]["file_type"] = $db2->f("type_name");
                                          @$myObj[$i]["ANEXOS"][$i2]["file_name"] = $db2->f("file_name");
                                          @$myObj[$i]["ANEXOS"][$i2]["invoice_value"] = $invoice_value;
                                          @$myObj[$i]["ANEXOS"][$i2]["number"] = $db2->f("number");
                                          @$myObj[$i]["ANEXOS"][$i2]["original"] = $db2->f("original");
                                          @$myObj[$i]["ANEXOS"][$i2]["po_number"] = $db2->f("po_number");
                                          @$myObj[$i]["ANEXOS"][$i2]["file_patch"] = $db2->f("file_patch");
                                          @$myObj[$i]["ANEXOS"][$i2]["dataCadastro"] = $db2->f("dataCadastro");

                                        $db2->next_record();

                                     }
                                     
                                        $db->next_record();
                                     
                                 }
                                 
                                 $myJSON = json_encode($myObj);

                                 echo $myJSON;
                                 
                              }
                              
                      }
                            
                           
               } 
               
               
            
         }
         
         function getwrs()
         {
            /*
          *  Método que passa os parâmetros para o método que retorna o Json dos WRs
          * 
          */
            $token = "ZpcFskvhTR9Kx6DypwPLNHjMuYUL6G";
            $client_id = "yhMWDgyMj7fKFEvCYNNVs6f";
            $client_sercret = "nSFh9LHbCPDAapq9AVsdP5j5jZeKCpn8C4APM8Lz";
            
            $listagem_wr = $this->getJsonWR(ABS_LINK."index.php?module=ext&method=wr&",$client_id,$client_sercret,$token);
            
            echo var_dump($listagem_wr);
            
            
         }
        
         function getwr($id_wr)
         {
            /*
          *  Método que passa os parâmetros para o método que retorna o Json dos WRs
          * 
          */
            
            header('Access-Control-Allow-Origin: *');
           header("Content-type: application/json; charset=utf-8");

         ini_set('max_execution_time', 0);
         ini_set('memory_limit',-1);

         @session_start();

			$db = new db();
			$db2 = new db();
			$db3 = new db();
            
            
            $token = "ZpcFskvhTR9Kx6DypwPLNHjMuYUL6G";
            $client_id = "yhMWDgyMj7fKFEvCYNNVs6f";
            $client_sercret = "nSFh9LHbCPDAapq9AVsdP5j5jZeKCpn8C4APM8Lz";
            
            $id = $id_wr;
            
            

                              //  Busca o Client Secret e o Client ID
                              $sql = "SELECT id_usuario,  client_id, client_secret FROM tokens WHERE client_id = '".$client_id."' AND client_secret = '".$client_sercret."' ";
                              $db->query($sql,__LINE__,__FILE__);
                              $db->next_record();
                              
                              if($db->num_rows() > 0)
                              {
                                 
                                 $sql = "SELECT
                                             wr.id AS id,
                                             wr.number,
                                             DATE_FORMAT(wr.wr_date,'%Y/%m/%d %H:%i:%s') AS wr_date,
                                             wr.employee,
                                             wr.id_shipper,
                                             wr.id_consignee,
                                             DATE_FORMAT(wr.dataCadastro,'%Y/%m/%d %H:%i:%s') AS dataCadastro,
                                             wr.notes,
                                             wr.hawb,
                                             wr.mawb,
                                             wr.dmsorder,
                                             wr.finalizado,
                                             wr.id_warehouse,
                                             wr.ibec_cargo,
                                             wr.ibec_number,
                                             wr.s3_report
                                             FROM wr WHERE 1 = 1  AND wr.id = ".$id." ";
                                 
                                 
                                 $sql .= " ORDER BY id DESC";
                                 
                                 
                                 
                                 $db->query($sql,__LINE__,__FILE__);
                                 $db->next_record();

                                 for($i = 0; $i < $db->num_rows(); $i++)
                                 {
                                    $id = $db->f("id");			
                                    $number = $db->f("number");			
                                    $wr_date = $db->f("wr_date");			
                                    $employee = $db->f("employee");			
                                    $id_shipper = $db->f("id_shipper");			
                                    $id_consignee = $db->f("id_consignee");			
                                    $dataCadastro = $db->f("dataCadastro");			
                                    $notes = $db->f("notes");			
                                    $hawb = $db->f("hawb");			
                                    $mawb = $db->f("mawb");			
                                    $dmsorder = $db->f("dmsorder");
                                    $finalizado = $db->f("finalizado");
                                    $id_warehouse = $db->f("id_warehouse");
                                    $ibec_cargo = $db->f("ibec_cargo");
                                    $ibec_number = $db->f("ibec_number");
                                    $s3_report = $db->f("s3_report");
                                    
                                    $sql2 = "SELECT sigla FROM warehouses WHERE id = ".$id_warehouse." ";  
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $warehouse = $db2->f("sigla");

                                    
                                    @$myObj[$i]["dmsorder"] = $dmsorder;
                                    @$myObj[$i]["id"] = $id;
                                    @$myObj[$i]["number"] = $number;
                                    @$myObj[$i]["wr_date"] = $wr_date;
                                    @$myObj[$i]["employee"] = $employee;
                                    @$myObj[$i]["dataCadastro"] = $dataCadastro;
                                    @$myObj[$i]["notes"] = $notes;
                                    @$myObj[$i]["hawb"] = $hawb;
                                    @$myObj[$i]["mawb"] = $mawb;
                                    @$myObj[$i]["finalizado"] = $finalizado;
                                    @$myObj[$i]["warehouse"] = $warehouse;
                                    @$myObj[$i]["ibec_cargo"] = $ibec_cargo;
                                    @$myObj[$i]["ibec_number"] = $ibec_number;
                                    @$myObj[$i]["s3_report"] = $s3_report;
                                    
                                    
                                    $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_shipper." ";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $nomeShipper = $db2->f("shipper_name");

                                    @$myObj[$i]["id_shipper"] = $id_shipper;
                                    @$myObj[$i]["nome_shipper"] = $nomeShipper;
                                    

                                    $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_consignee." ";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $nomeConsignee = $db2->f("shipper_name");

                                    @$myObj[$i]["id_consignee"] = $id_consignee;
                                    @$myObj[$i]["nome_consignee"] = $nomeConsignee;
                                    
                                    
                                    $sql2 = "SELECT SUM(weight) AS totalGrossWeight FROM wr_volumes WHERE id_wr = ".$id." ";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $totalGrossWeight = $db2->f("totalGrossWeight");
                                    
                                    @$myObj[$i]["total_gross_weight"] = $totalGrossWeight;
                                    
                                    
                                    $sql2 = "SELECT COUNT(id) AS total FROM wr_volumes WHERE id_wr = ".$id." ";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $totalVolumes = $db2->f("total");
                                    
                                    @$myObj[$i]->total_volumes = $totalVolumes;
                                    
                                    $sql2 = "SELECT status FROM wr_status WHERE id_wr = ".$id." ORDER BY id DESC LIMIT 1";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();
                                    $status = $db2->f("wr_status");
                                    switch($status)
                                    {
                                       case 0:
                                          $status  = "OHOH";
                                       break;

                                       case 1:
                                          $status  = "OHGG";
                                       break;

                                       case 2:
                                          $status  = "OFFH";
                                       break;

                                    }
                                    
                                    
                                    @$myObj[$i]["wr_status"] = $status;
                                    

                                    
                                    // Volumes do Warehouse Receipts
                                    $sql2 = "SELECT  COUNT(wr_volumes.id) AS total,
                                                   SUM(wr_volumes.weight) AS peso,
                                                   wr_volumes.id AS id,
                                                   wr_volumes.id_wr,
                                                   wr_volumes.id_ca,
                                                   ca.number AS ca_number,
                                                   wr_volumes.id_ca_volumes_types,
                                                   ca_volumes_types.descricao AS volume_type,
                                                   wr_volumes.weight,
                                                   wr_volumes.tracking_number,
                                                   wr_volumes.subvolumes,
                                                   wr_volumes.status,
                                                   DATE_FORMAT(wr_volumes.dataCadastro,'%Y/%m/%d %H:%i:%s') AS dataCadastro,
                                                   wr_volumes.height,
                                                   wr_volumes.width,
                                                   wr_volumes.length,
                                                   wr_volumes.photo1,
                                                   wr_volumes.photo2,
                                                   wr_volumes.photo3,
                                                   wr_volumes.photo4,
                                                   wr_volumes.photo5,
                                                   wr_volumes.photo6,
                                                   wr_volumes.photo7,
                                                   wr_volumes.photo8,
                                                   wr_volumes.photo9,
                                                   wr_volumes.photo10,
                                                   wr_volumes.description,
                                                   wr_volumes.location,
                                                   wr_volumes.ca_volume_id,
                                                   wr_volumes.nr
                                                   FROM wr_volumes, ca, ca_volumes_types WHERE wr_volumes.id_ca = ca.id 
                                                   AND wr_volumes.id_ca_volumes_types = ca_volumes_types.id
                                                   AND  wr_volumes.id_wr = ".$id." GROUP BY wr_volumes.height, wr_volumes.width, wr_volumes.length ORDER BY wr_volumes.id DESC";
                                    $db2->query($sql2,__LINE__,__FILE__);
                                    $db2->next_record();

                                    for($i2 = 0; $i2 < $db2->num_rows(); $i2++)
                                    {
                                       
                                       @$myObj[$i]["VOLUMES"][$i2]["nr"] = $db2->f("nr");
                                       @$myObj[$i]["VOLUMES"][$i2]["qty"] = $db2->f("total");
                                       @$myObj[$i]["VOLUMES"][$i2]["id"] = $db2->f("id");
                                       @$myObj[$i]["VOLUMES"][$i2]["cargo_acceptance"] = $db2->f("ca_number");
                                       @$myObj[$i]["VOLUMES"][$i2]["volume_type"] = $db2->f("volume_type");
                                       @$myObj[$i]["VOLUMES"][$i2]["weight"] = $db2->f("peso");
                                       @$myObj[$i]["VOLUMES"][$i2]["tracking_number"] = $db2->f("tracking_number");
                                       @$myObj[$i]["VOLUMES"][$i2]["subvolumes"] = $db2->f("subvolumes");
                                       @$myObj[$i]["VOLUMES"][$i2]["dataCadastro"] = $db2->f("dataCadastro");
                                       @$myObj[$i]["VOLUMES"][$i2]["height"] = $db2->f("height");
                                       @$myObj[$i]["VOLUMES"][$i2]["width"] = $db2->f("width");
                                       @$myObj[$i]["VOLUMES"][$i2]["length"] = $db2->f("length");
                                       
                                       
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo1"] = $db2->f("photo1");
                                       
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo1"] = $db2->f("photo1");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo2"] = $db2->f("photo2");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo3"] = $db2->f("photo3");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo4"] = $db2->f("photo4");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo5"] = $db2->f("photo5");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo6"] = $db2->f("photo6");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo6"] = $db2->f("photo6");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo7"] = $db2->f("photo7");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo8"] = $db2->f("photo8");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo9"] = $db2->f("photo9");
                                       @$myObj[$i]["VOLUMES"][$i2]["PHOTOS"]["photo10"] = $db2->f("photo10");
                                       
                                       @$myObj[$i]["VOLUMES"][$i2]["description"] = $db2->f("description");
                                       @$myObj[$i]["VOLUMES"][$i2]["location"] = $db2->f("location");
                                       
                                       $db2->next_record();
                                    }
                                    
                                    
                                       $sql2 = "SELECT
                                             wr_attachments.id AS id,
                                              wr_attachments.id_wr,
                                              wr_attachments.file_patch,
                                              wr_attachments.file_name,
                                              wr_attachments.number,
                                              wr_attachments.original,
                                              wr_attachments.file_type,
                                              wr_attachments.invoice_value,
                                              wr_attachments.po_number,
                                              DATE_FORMAT(wr_attachments.dataCadastro,'%Y/%m/%d %H:%i:%s') AS dataCadastro,
                                              wr_attachments_types.descricao AS type_name
                                              FROM wr_attachments,  wr_attachments_types
                                              WHERE wr_attachments.file_type = wr_attachments_types.id
                                              AND wr_attachments.id_wr = ".$id." ORDER BY id DESC ";
                                      $db2->query($sql2,__LINE__,__FILE__);
                                      $db2->next_record();

                                     for($i2 = 0; $i2 < $db2->num_rows(); $i2++)
                                     {
                                        
                                        if($db2->f("file_type") == "1")
                                           $invoice_value = $db2->f("invoice_value");
                                        else
                                           $invoice_value = "";

                                          @$myObj[$i]["ANEXOS"][$i2]["id"] = $db2->f("id");
                                          @$myObj[$i]["ANEXOS"][$i2]["file_type"] = $db2->f("type_name");
                                          @$myObj[$i]["ANEXOS"][$i2]["file_name"] = $db2->f("file_name");
                                          @$myObj[$i]["ANEXOS"][$i2]["invoice_value"] = $invoice_value;
                                          @$myObj[$i]["ANEXOS"][$i2]["number"] = $db2->f("number");
                                          @$myObj[$i]["ANEXOS"][$i2]["original"] = $db2->f("original");
                                          @$myObj[$i]["ANEXOS"][$i2]["po_number"] = $db2->f("po_number");
                                          @$myObj[$i]["ANEXOS"][$i2]["file_patch"] = $db2->f("file_patch");
                                          @$myObj[$i]["ANEXOS"][$i2]["dataCadastro"] = $db2->f("dataCadastro");

                                        $db2->next_record();

                                     }
                                     
                                        $db->next_record();
                                     
                                 }
                                 
                                 $myJSON = json_encode($myObj);

                                // echo $myJSON;
                                 
                              }
            
            
            
            //$listagem_wr = $this->getJsonWR(ABS_LINK."index.php?module=ext&method=wr&id=".$id."&",$client_id,$client_sercret,$token);
            
            
            return $myJSON;
            
            
         }
         
         function testsmtp()
         {
            $this->email("raphaelcozzi@gmail.com", "teste de envio ".date("d/m/Y H:i:s")." ", "Teste...");
         }
         
         

       function importcsv()
      {
         set_time_limit(0);
         
			@session_start();
			$db = new db();
			$db2 = new db();
         
         $delimitador = ',';
         
         $ids_wr_que_ficam = array();
         $ids_volumes_que_ficam = array();
 
      $f = fopen('wrs.csv', 'r');
      if ($f) {

          // Enquanto nao terminar o arquivo
          while (!feof($f)) {

              // Ler uma linha do arquivo
              $linha = fgetcsv($f, 0, $delimitador);
              
              if (!$linha) {
                  continue;
              }

              $location = $linha[0];
              $numeroVolume = $linha[1];
              $numeroVolume = explode("-",$numeroVolume);
              $id_volume = $numeroVolume[0];
              $numero_wr = $numeroVolume[1]."-".$numeroVolume[2];
              
               $sql = "SELECT id FROM wr WHERE number = '".$numero_wr."' ";
               $db->query($sql,__LINE__,__FILE__);
               $db->next_record();
               
               $id_wr = $db->f("id");
               
               if($id_wr != "")
                  array_push($ids_wr_que_ficam,$id_wr);
               
               if($id_volume != "")
                  array_push($ids_volumes_que_ficam, $id_volume);
               
               $sql2 = "UPDATE locations SET status = 2 WHERE numero = '".$location."' ";
               $db2->query($sql2,__LINE__,__FILE__);
               $db2->next_record();
               
               
               echo "Atualizado ".$numero_wr;
               echo "<br>";
               
              }
          fclose($f);
      }
      
         $ids_volumes_que_ficam = array_unique($ids_volumes_que_ficam);
         $ids_wr_que_ficam = array_unique($ids_wr_que_ficam);
         
         $ids_volumes_que_ficam = implode(",",$ids_volumes_que_ficam);
         $ids_wr_que_ficam = implode(",",$ids_wr_que_ficam);
         
         
         $sql = "SELECT id FROM wr WHERE id NOT IN(".$ids_wr_que_ficam.")";
         $db->query($sql,__LINE__,__FILE__);
         $db->next_record();
         for($i = 0; $i < $db->num_rows(); $i++)
         {
            $id_wr = $db->f("id");
            
            $sql2 = "INSERT INTO wr_status (id_wr,status,status_Date,id_warehouse) VALUES (".$id_wr.",2, NOW(), 1)";
            $db2->query($sql2,__LINE__,__FILE__);
            $db2->next_record();
            

           $db->next_record();
         }

      
      
         $sql2 = "DELETE FROM wr_volumes_locations WHERE id_wr_volume NOT IN(".$ids_volumes_que_ficam.")";
         $db2->query($sql2,__LINE__,__FILE__);
         $db2->next_record();

       }
       
       
		function handover()
		{
                        if(!isset($_REQUEST['j']) || $_REQUEST['j'] != "YsCwvpx87CeTgAnv" || !isset($_REQUEST['code']))
                        {
                           die("Access Denied");
                        }
                        
                        $_SESSION['code'] = $_REQUEST['code'];
         
         ini_set('max_execution_time', 0);
         ini_set('memory_limit',-1);

         @session_start();

			$db = new db();
			$db2 = new db();
			$db3 = new db();
			$db4 = new db();
         
               $_SESSION['id_user_sys'] = $this->blockrequest($_REQUEST['code']);
               
         
               @$wr_number = $_REQUEST['number'];
               @$data_de = $_REQUEST['data_de'];
               @$data_ate = $_REQUEST['data_ate'];
               @$status = $_REQUEST['status'];
               @$dmsorder = $_REQUEST['dmsorder'];
               @$dmsorder_pesquisa = $_REQUEST['dmsorder'];

		$sql = "SELECT
                  wr.id AS id,
                  wr.number,
                  DATE_FORMAT(wr.wr_date,'%Y/%m/%d %H:%i') AS wr_date,
                  wr.employee,
                  wr.id_shipper,
                  wr.id_consignee,
                  DATE_FORMAT(wr.dataCadastro,'%Y/%m/%d %H:%i') AS dataCadastro,
                  wr.notes,
                  wr.hawb,
                  wr.mawb,
                  wr.s3_report,
                  wr.dmsorder
                  FROM wr  WHERE wr.id_warehouse IN(1)  AND wr.hold_handover = 0";

                 if(isset($_REQUEST['status']))
                    $sql .= " AND wr.number LIKE '%".$wr_number."%' ";

                 
                 if(isset($_REQUEST['data_de']) && $_REQUEST['data_de'] != "")
                    $sql .= " AND wr.wr_date BETWEEN '".$data_de."' AND '".$data_ate."' ";
                 
                 if(isset($_REQUEST['ibec_cargo']) && $_REQUEST['ibec_cargo'] == "1")
                    $sql .= " AND wr.ibec_cargo = 1 ";
                 
                 
                   $sql .= " GROUP BY wr.id ORDER BY wr.id ";
                   
                 $db->query($sql,__LINE__,__FILE__);
                 $db->next_record();
			

			for($i = 0; $i < $db->num_rows(); $i++)
			{
				$id = $db->f("id");			
				$number = $db->f("number");			
				$wr_date = $db->f("wr_date");			
				$id_shipper = $db->f("id_shipper");			
				$id_consignee = $db->f("id_consignee");			
				$dataCadastro = $db->f("dataCadastro");			
            
            
                        $sql3 = "SELECT id FROM wr_status WHERE id_wr = ".$id." AND (status = 1 OR status = 2) /* ORDER BY id DESC LIMIT 1 */";
                        $db3->query($sql3,__LINE__,__FILE__);
                        $db3->next_record();
                        if($db3->num_rows() ==  0)
                        {
                              $sql2 = "SELECT tracking_number FROM wr_volumes WHERE  id_wr = ".$id." AND tracking_number <> '' ORDER BY id DESC LIMIT 1";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $tracking_number = $db2->f("tracking_number");
                              
                              $sql2 = "SELECT po_number FROM wr_attachments WHERE id_wr = ".$id." AND po_number <> ' ' LIMIT 1";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $po_number = $db2->f("po_number");



                              $sql2 = "SELECT SUM(weight) AS totalGrossWieight FROM wr_volumes WHERE id_wr = ".$id." ";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $totalGrossWieight = $db2->f("totalGrossWieight");


                              $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_shipper." ";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $nomeShipper = $db2->f("shipper_name");


                              $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_consignee." ";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $nomeConsignee = $db2->f("shipper_name");

                              $listagem .= '<tr> 
                                              <td align="center"><a href="wr/report/'.$db->f("id").'" target="_blank"><i class="fa fa-file"></i></a></td>
                                                <td>'.$tracking_number.'</td>
                                                <td>'.$po_number.'</td>
                                                <td>'.$number.'</td>
                                                <td>'.$nomeShipper.'</td> 
                                                <td>'.$nomeConsignee.'</td> 
                                                <td>'.$wr_date.'</td> 
                                                <td>'.$totalGrossWieight.'</td> 
                                                <td align="center"><a href="index.php?module=ext&method=novohandover&id_wr='.$id.'"><button type="button" class="btn blue btn-outline">Receive</button></a></td>
                                             </tr>';




                           }
                              $db->next_record();
                           }
                           
                           
		$sql = "SELECT
                  wr.id AS id,
                  wr.number,
                  DATE_FORMAT(wr.wr_date,'%Y/%m/%d %H:%i') AS wr_date,
                  wr.employee,
                  wr.id_shipper,
                  wr.id_consignee,
                  DATE_FORMAT(wr.dataCadastro,'%Y/%m/%d %H:%i') AS dataCadastro,
                  wr.notes,
                  wr.hawb,
                  wr.mawb,
                  wr.s3_report,
                  wr.dmsorder
                  FROM wr WHERE wr.id_warehouse IN(1)  AND wr.hold_handover = 1 ";

                 if(isset($_REQUEST['status']))
                    $sql .= " AND wr.number LIKE '%".$wr_number."%' ";

                 
                 if(isset($_REQUEST['data_de']) && $_REQUEST['data_de'] != "")
                    $sql .= " AND wr.wr_date BETWEEN '".$data_de."' AND '".$data_ate."' ";
                 
                 if(isset($_REQUEST['ibec_cargo']) && $_REQUEST['ibec_cargo'] == "1")
                    $sql .= " AND wr.ibec_cargo = 1 ";
                 
                 
                   $sql .= " GROUP BY wr.id ORDER BY wr.id ";
                   
                 $db->query($sql,__LINE__,__FILE__);
                 $db->next_record();
			

			for($i = 0; $i < $db->num_rows(); $i++)
			{
				$id = $db->f("id");			
				$number = $db->f("number");			
				$wr_date = $db->f("wr_date");			
				$id_shipper = $db->f("id_shipper");			
				$id_consignee = $db->f("id_consignee");			
				$dataCadastro = $db->f("dataCadastro");			
            
                              $sql2 = "SELECT tracking_number FROM wr_volumes WHERE  id_wr = ".$id." AND tracking_number <> '' ORDER BY id DESC LIMIT 1";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $tracking_number = $db2->f("tracking_number");
                              
                              $sql2 = "SELECT po_number FROM wr_attachments WHERE id_wr = ".$id." AND po_number <> ' ' LIMIT 1";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $po_number = $db2->f("po_number");



                              $sql2 = "SELECT SUM(weight) AS totalGrossWieight FROM wr_volumes WHERE id_wr = ".$id." ";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $totalGrossWieight = $db2->f("totalGrossWieight");


                              $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_shipper." ";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $nomeShipper = $db2->f("shipper_name");


                              $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_consignee." ";
                              $db2->query($sql2,__LINE__,__FILE__);
                              $db2->next_record();
                              $nomeConsignee = $db2->f("shipper_name");

                              $listagem_hold .= '<tr> 
                                              <td align="center"><a href="wr/report/'.$db->f("id").'" target="_blank"><i class="fa fa-file"></i></a></td>
                                                <td>'.$tracking_number.'</td>
                                                <td>'.$po_number.'</td>
                                                <td>'.$number.'</td>
                                                <td>'.$nomeShipper.'</td> 
                                                <td>'.$nomeConsignee.'</td> 
                                                <td>'.$wr_date.'</td> 
                                                <td>'.$totalGrossWieight.'</td> 
                                                <td align="center"><a href="index.php?module=ext&method=novohandover&id_wr='.$id.'"><button type="button" class="btn blue btn-outline">Receive</button></a></td>
                                             </tr>';


                              $db->next_record();
                           }
                           
         
            
		$this->cabecalho_deslogado();                                                                            
		$GLOBALS["base"]->template = new template();       
      
		
		$GLOBALS["base"]->template->set_var("listagem",$listagem);
		$GLOBALS["base"]->template->set_var("listagem_hold",$listagem_hold);
		$GLOBALS["base"]->template->set_var("data_de",$_REQUEST['data_de']);
		$GLOBALS["base"]->template->set_var("data_ate",$_REQUEST['data_ate']);
		$GLOBALS["base"]->template->set_var("wr_number",$_REQUEST['number']);
													
		$GLOBALS["base"]->write_design_specific('ext.tpl' , 'handover');                       
		$GLOBALS["base"]->template = new template();                                                  
		$this->footer();                                                                           

			
		}
      
      function novohandover()
      {
         $id_wr = $_REQUEST['id_wr'];
         
         $_SESSION['handover_aprovado'] = 1;
         $_SESSION['handover_restrito_motivo'] = "";
         $_SESSION['checklist_item_denied'] = array();
         
         
                          
         if(isset($_REQUEST['id_wr']) && $_REQUEST['id_wr'] != "")
         {
           @session_start();
            $db = new db();
            $db2 = new db();
            $db3 = new db();
            
            
            if(isset($_REQUEST['dmsorder']))
            {
               
                  // 200738197 dmsorder de teste na homologação
                  $dmsorder = $_REQUEST['dmsorder'];

                     // recebe os dados dos itens
                   //  $url = 'https://operational.hmg.dmslog.com/api/items?order_number='.$dmsorder;
                   $url = 'https://operational.dmslog.com/api/items?order_number='.$dmsorder;

                     $dmstoken = 'HVd6FUwPeEs6PVTMLVX8u5E6';

                     $header = array('Content-Type' => 'application/json', 
                         'DMSTOKEN' => base64_encode($token), 
                         'Authorization' => 'Baerer '.$dmstoken);
                     $response =  $this->request("GET",$url, $header);

                     $itemsJson =  json_decode($response,true);
                     
                     $itemsJson = $itemsJson['results'];
                     
               
                     
                     $items = '<h3 class="col-md-offset-3">&nbsp;&nbsp;&nbsp;<strong>Match Volume Items</strong></h3><br>';
                     
                     
                     /// ITENS DO SYS
                     
                     
                     $items .= '<div class="col-md-offset-3 col-md-9">
    <div class="portlet light bordered">

    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-list font-dark"></i>
            <span class="caption-subject bold uppercase">SYS Volume Items</span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover nowrap" id="sample_101">
            <thead>
                <tr>
                    <th>Length</th>
                    <th>Height</th>
                    <th>Width</th>
                    <th>Gross Weight</th>
                    <th>Item Type</th>
                    <th>Invoice</th>
                    <th>Qty</th>
                    <th style="color:#ff0000;">#NR</th>
                </tr>
            
            </thead>
            <tbody>';
                     
                   // Loop nos items do array do Json  
                     for($i = 0; $i < count($itemsJson); $i++)
                     {
                         $sys_nr = $itemsJson[$i]['nr'];
                         $sys_length = $itemsJson[$i]['length'];
                         $sys_width = $itemsJson[$i]['width'];
                         $sys_height = $itemsJson[$i]['height'];
                         $sys_weight = $itemsJson[$i]['gross_weight'];
                         $sys_item_type = $itemsJson[$i]['item_type'];
                         $sys_invoice = $itemsJson[$i]['get_invoice'][0];
                         $sys_quantity = $itemsJson[$i]['quantity'];
                         
                           $items .= '<tr>
                                 <td>'.$sys_length.' cm</td>
                                 <td>'.$sys_width.' cm</td>
                                 <td>'.$sys_height.' cm</td>
                                 <td>'.$sys_weight.' kg</td>
                                 <td>'.$sys_item_type.'</td>
                                 <td>'.$sys_invoice.'</td>
                                  <td>'.$sys_quantity.'</td>
                                <td align="center" style="color:#ff0000;"><strong>'.$sys_nr.'</strong></td>
                             </tr>';

                         
                         $listagem_nr_sys .= '<option value="'.$sys_nr.'">'.$sys_nr.'</option>';
                     }
            


$items .= '</tbody>
        </table>
            
    </div>
</div></div>
';
                     
           

                     
                     /// ITENS DO DWSYS
                     
                     
                     $items .= '<h3 class="col-md-offset-3">&nbsp;&nbsp;&nbsp;Select Volume Items to Replace: (if necessary)</h3><br>';
                     
                     
                     $items .= '<div class="col-md-offset-3 col-md-9">
    <div class="portlet light bordered">

    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-list font-dark"></i>
            <span class="caption-subject bold uppercase">DWSYS Volume Items</span>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover nowrap" id="sample_102">
            <thead>
                <tr>
                    <th>Length</th>
                    <th>Height</th>
                    <th>Width</th>
                    <th>Gross Weight</th>
                    <th>Item Type</th>
                    <th>Invoice</th>
                    <th>Qty</th>
                    <th style="color:#ff0000;">#NR to Replace</th>
                </tr>
            
            </thead>
            <tbody>';
            
                     
            $sql = "SELECT wr_volumes.id, 
                   wr_volumes.length, 
                   wr_volumes.height, 
                   wr_volumes.width, 
                   wr_volumes.weight, 
                   wr_volumes.subvolumes, 
                   ca_volumes_types.descricao
                   FROM wr_volumes
                   LEFT JOIN ca_volumes_types 
                   ON (wr_volumes.id_ca_volumes_types = ca_volumes_types.id)
                   WHERE wr_volumes.id_wr = ".$id_wr." ORDER BY id DESC";         
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();

         for($i = 0; $i < $db->num_rows(); $i++)
	{
            
            $sql2 = "SELECT number  FROM wr_attachments WHERE id_wr = ".$id_wr." AND file_type = 1";
            $db2->query($sql2,__LINE__,__FILE__);
            $db2->next_record();
            
                     
            $items .= '<tr>
                <td>'.$db->f("length").' cm</td>
                <td>'.$db->f("height").' cm</td>
                <td>'.$db->f("width").' cm</td>
                <td>'.$db->f("weight").' Kg</td>
                <td>'.$db->f("descricao").'</td>
                <td>'.$db2->f("number").'</td>
                <td>'.$db->f("subvolumes").'</td>
                <td><select name="nr_'.$db->f("id").'" class="form-control">
                <option value="0"> No Replace </option>
                '.$listagem_nr_sys.'
                </select></td>
            </tr>';
            
      			$db->next_record();
            
         }

            $items .= '</tbody>
        </table>
            
    </div>
</div>
';
                     
            }
            else
            {
               $items = "";
            }
            
            
            $sql = "SELECT
                        id,
                        number,
                        DATE_FORMAT(wr_date,'%Y-%m-%d') AS wr_date,
                        DATE_FORMAT(wr_date,'%H:%i') AS wr_time,
                        id_shipper,
                        id_consignee,
                        DATE_FORMAT(dataCadastro,'%Y/%m/%d %H:%i') AS dataCadastro 
                        FROM wr WHERE id = ".$id_wr." ";
               $db->query($sql,__LINE__,__FILE__);
               $db->next_record();

               $id = $db->f("id");			
               $number = $db->f("number");			
               $wr_date = $db->f("wr_date");			
               $wr_time = $db->f("wr_time");			
               $id_shipper = $db->f("id_shipper");			
               $id_consignee = $db->f("id_consignee");			
               $dataCadastro = $db->f("dataCadastro");	
               
               
            
               $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_shipper." ";
               $db2->query($sql2,__LINE__,__FILE__);
               $db2->next_record();
               $shipper_name = $db2->f("shipper_name");


               $sql2 = "SELECT shipper_name FROM shippers WHERE id_sys = ".$id_consignee." ";
               $db2->query($sql2,__LINE__,__FILE__);
               $db2->next_record();
               $consignee_name = $db2->f("shipper_name");
               
               $array_shipper = $this->getShipper($id_shipper, "shipper");
               
               $awareness = $array_shipper["awareness"]; // AWARENESS
               
               
               
                $expiration_date_ksms = $array_shipper["expiration_date_ksms"];
                $expiration_date_ksms = substr($expiration_date_ksms,0,10);
               
               $tsa_consente = $array_shipper["tsa_consente"];
               $expiration_date_tsa = $array_shipper["expiration_date_tsa"]; 
               $expiration_date_tsa = substr($expiration_date_tsa,0,10);

               $sed_authorization = $array_shipper["sed_authorization"];
               $expiration_date_sed = $array_shipper["expiration_date_sed"];
               $expiration_date_sed = substr($expiration_date_sed,0,10);
               
               
                  if($awareness == "Conhecido")
                     $awareness = "KNOWN";
                  else
                  {
                     $awareness = "UNKNOWN";
                     $_SESSION['handover_aprovado'] = 0;
                     $_SESSION['handover_restrito_motivo'] = "UNKNOWN Shipper Status<br>";
                     array_push($_SESSION['checklist_item_denied'],1);
                  }
               
            
                  
         $sql = "SELECT id, item, padrao FROM handovers_checklist_itens ORDER BY ordem ASC";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();

         for($i = 0; $i < $db->num_rows(); $i++)
			{
            
            $listagem_checklist .= '<tr>';

               $listagem_checklist .= '<td>';
                  $listagem_checklist .= $db->f("item");
               $listagem_checklist .= '</td>';
            
               $listagem_checklist .= '<td>';
               
               if($db->f("id") != "1" && $db->f("id") != "2" && $db->f("id") != "6")
               {
               
                  $listagem_checklist .= '<input type="radio" name="ac_'.$db->f("id").'" ';
                  
                  if($db->f("padrao") == "1")
                     $listagem_checklist .= ' checked ';
                  
                  $listagem_checklist .= ' value="1"  onClick="activateFinalize()">YES &nbsp;';
                  $listagem_checklist .= '<input type="radio" name="ac_'.$db->f("id").'" ';
                  
                  
                  if($db->f("padrao") == "0")
                     $listagem_checklist .= ' checked ';
                  
                   $listagem_checklist .= ' value="0" onClick="activateFinalize()">NO &nbsp;';
                   
         }
         else 
          {
                  if($db->f("id") ==  "1") // Shipper Status
                  {
                     $listagem_checklist .= $awareness;
                     
                     if($expiration_date_ksms == "")
                     {
                        $listagem_checklist .= "<i>(DATE N/A)</i>";
                     }   
                     elseif(strtotime($expiration_date_ksms) < strtotime("-1 year"))
                     {
                        $listagem_checklist .= " EXPIRED";
                        $_SESSION['handover_aprovado'] = 0;
                         $_SESSION['handover_restrito_motivo'] .= " / The shipper Status is expired or Unknown.<br>";
                        array_push($_SESSION['checklist_item_denied'],1);
                     }

                  }

                  if($db->f("id") ==  "2") // SED AUTHORIZATION
                  {
                     if($sed_authorization == true)
                     {
                        $listagem_checklist .= "YES ";
                     }

                     if($sed_authorization == false)
                     {
                        $listagem_checklist .= "NO ";
                         $_SESSION['handover_aprovado'] = 0;
                         $_SESSION['handover_restrito_motivo'] .= "The SED authorization form is expired or does not exists.<br>";
                        array_push($_SESSION['checklist_item_denied'],2);
                     }

                     if($expiration_date_sed == "")
                     {
                        $listagem_checklist .= "<i>(DATE N/A)</i>";
                     }
                     elseif(strtotime($expiration_date_sed) < strtotime(date("Y-m-d")))
                     {
                         $listagem_checklist .= " EXPIRED";
                        $_SESSION['handover_aprovado'] = 0;
                         $_SESSION['handover_restrito_motivo'] .= " / The SED authorization form is expired or does not exists.<br>";
                        array_push($_SESSION['checklist_item_denied'],2);
                     }
                     else
                     {
                        $listagem_checklist .= " VALID";
                     }
                     
                     
                  }
                  
                  if($db->f("id") ==  "6") // CONSENT TO SCREEN IN FILE
                  {
                     if($tsa_consente == true)
                     {
                        $listagem_checklist .= "YES ";
                     }

                     if($tsa_consente == false)
                     {
                        $listagem_checklist .= "NO ";
                        $_SESSION['handover_aprovado'] = 0;
                         $_SESSION['handover_restrito_motivo'] .= "The consent to screen form is in file.<br>";
                         array_push($_SESSION['checklist_item_denied'],6);
                     }

                     if($expiration_date_tsa == "")
                     {
                        $listagem_checklist .= "<i>(DATE N/A)</i>";
                     }
                     elseif(strtotime($expiration_date_tsa) < strtotime(date("Y-m-d")))
                     {
                         $listagem_checklist .= " EXPIRED";
                         $_SESSION['handover_aprovado'] = 0;
                         $_SESSION['handover_restrito_motivo'] .= " / The consent to screen form is expired.<br>";
                        array_push($_SESSION['checklist_item_denied'],6);
                     }
                     else
                     {
                        $listagem_checklist .= " VALID";
                     }

                  }
                  
            
         }
                   
               $listagem_checklist .= '</td>';

            $listagem_checklist .= '</tr>';
            
            
   			$db->next_record();
         }
                  
        
         
         $listagem_details = '';
                  
         $listagem_details .= '<tr>';
            $listagem_details .= '<td>Warehouse Receipt</td>';
            $listagem_details .= '<td align="center"><a href="index.php?module=wr&method=report&id='.$id_wr.'" target="_blank"><button type="button" class="btn blue" style="width:100px;"><i class="fa fa-eye"></i></button></a></td>';
         $listagem_details .= '</tr>';
         
         
         // INVOICE 
         $_SESSION['hasInvoice'] = "1";
         
         $sql = "SELECT file_patch AS link, number  FROM wr_attachments WHERE id_wr = ".$id_wr." AND file_type = 1";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
         $link = $db->f("link");
         if($link == "")
         {
            $link = "#";
            $_SESSION['hasInvoice'] = "0";
         }
         
         $doc_number ="# ". $db->f("number");

         if($db->f("number") == "")
            $doc_number = "";

         
         $listagem_details .= '<tr>';
            $listagem_details .= '<td>Inovoice  <div style="float:right;"><strong><i> '.$doc_number.'</i></strong></div></td>';
            $listagem_details .= '<td align="center"><a href="'.$link.'" target="_blank"><button type="button" class="btn blue" style="width:100px;"><i class="fa fa-eye"></i></button></a></td>';
         $listagem_details .= '</tr>';


        
         // PACKING LIST
         
         
         $_SESSION['hasPackingList'] = "1";

         $sql = "SELECT file_patch AS link, number  FROM wr_attachments WHERE id_wr = ".$id_wr." AND file_type = 2";
			$db->query($sql,__LINE__,__FILE__);
			$db->next_record();
         $link = $db->f("link");
         if($link == "")
         {
            $link = "#";
            $_SESSION['hasPackingList'] = "0";
         }

         $doc_number ="# ". $db->f("number");

         if($db->f("number") == "")
            $doc_number = "";

         $listagem_details .= '<tr>';
            $listagem_details .= '<td>Packing List <div style="float:right;"><strong><i> '.$doc_number.'</i></strong></div></td>';
            $listagem_details .= '<td align="center"><a href="'.$link.'" target="_blank"><button type="button" class="btn blue" style="width:100px;"><i class="fa fa-eye"></i></button></a></td>';
         $listagem_details .= '</tr>';
         
         
         $modal_confirm_shipper = '<div class="modal fade" id="shipper_confirm" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="height:auto !important;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">WARNING!</h4>
                                                </div>
                                                <div class="modal-body"> 

                                             <span>';
         
         
         
         if(in_array(1,$_SESSION['checklist_item_denied']))
         {
               $modal_confirm_shipper .= '<h4><i class="fa fa-warning"></i>The shipper Status is expired or Unknown. You may continue with Unknown status or you may appeal / renew reply in 24 hs.</h4> <span><br>';
         }
         
         if(in_array(2,$_SESSION['checklist_item_denied']))
         {
               $modal_confirm_shipper .= '<h4><i class="fa fa-warning"></i>The SED authorization form is expired or does not exists. You may continue this process considering it is a "Shipper\'s Self Filling" or you may appeal/renew</h4> <span><br>';
         }
 
        if(in_array(6,$_SESSION['checklist_item_denied']))
         {
               $modal_confirm_shipper .= '<h4><i class="fa fa-warning"></i>The consent to screen form is expired or not in file. You may not continue an achievement without this file. You may appeal / renew, or you may continue as as ocean shipment.</h4> <span><br>';
         }
         if($_SESSION['hasInvoice'] == "0")
         {
               $modal_confirm_shipper .= '<h4><i class="fa fa-warning"></i>This file has no Invoice, you may continue without invoice or you can Hold.</h4> <span><br>';
         }
          
         if($_SESSION['hasPackingList'] == "0")
         {
               $modal_confirm_shipper .= '<h4><i class="fa fa-warning"></i>This file has no Packing List, you may continue without Packing List or you can Hold.</h4> <span><br>';
         }
                                                   
               $modal_confirm_shipper .='</div>
                                                <div class="modal-footer">
                                                <center>
                                                   <a href="index.php?module=ext&method=appeal&id_wr='.$id_wr.'"><button type="button" class="btn red" style="width:300px;">Appeal / Renew (Hold)</button></a><br><br>

                                                    <a href="javascript:void(0);" onclick="document.editar.submit();"><button type="button" class="btn green" style="width:300px;">Continue</button></a><br><br>
                                                    </center>
                                      
                                                   <button type="button" id="closemodal" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
';         
            
         
         
            $this->cabecalho_deslogado();                                                                            
            $GLOBALS["base"]->template = new template();       

            $GLOBALS["base"]->template->set_var("shipper_name",$shipper_name);
            $GLOBALS["base"]->template->set_var("consignee_name",$consignee_name);
            $GLOBALS["base"]->template->set_var("number",$number);
            $GLOBALS["base"]->template->set_var("known",$awareness);
            $GLOBALS["base"]->template->set_var("dmsorder",$_REQUEST['dmsorder']);
            $GLOBALS["base"]->template->set_var("items",$items);
            $GLOBALS["base"]->template->set_var("wr_date",$wr_date);
            $GLOBALS["base"]->template->set_var("wr_time",$wr_time);
            
            
            if(in_array(1,$_SESSION['checklist_item_denied']) || in_array(2,$_SESSION['checklist_item_denied']) || in_array(6,$_SESSION['checklist_item_denied']) || $_SESSION['hasInvoice'] == "0" || $_SESSION['hasPackingList'] == "0" )
            {
               $GLOBALS["base"]->template->set_var("modal_confirm_shipper",$modal_confirm_shipper);
               $GLOBALS["base"]->template->set_var("validacao_envio","validaEnvioShipper");
            }
            else
            {
               $GLOBALS["base"]->template->set_var("modal_confirm_shipper","");
               $GLOBALS["base"]->template->set_var("validacao_envio","validaEnvio");
            }
            
            $GLOBALS["base"]->template->set_var("listagem_checklist",$listagem_checklist);
            $GLOBALS["base"]->template->set_var("listagem_details",$listagem_details);
            
            $GLOBALS["base"]->template->set_var("id_wr",$id_wr);

            $GLOBALS["base"]->write_design_specific('ext.tpl' , 'novohandover');                       
            $GLOBALS["base"]->template = new template();                                                  
            $this->footer();                                                                           
         }
         else
         {
            $this->notificacao("Warehouse Receipt Not Found!", "red");
            header("Location: index.php?module=ext&method=handover");
            die();
         }
         
      }
      
       function inserehandover()
      {
         
         $id_wr = $this->blockrequest($_REQUEST['id_wr']);
         $dmsorder = $this->blockrequest($_REQUEST['dmsorder']);
         

            if(isset($_REQUEST['id_wr']) && $_REQUEST['id_wr'] != "" && isset($_SESSION['id_user_sys']) && $_SESSION['id_user_sys'] != "")
            {
                  @session_start();
                   $db = new db();
                   $db2 = new db();
                   $db3 = new db();
                   
                   
                   if(isset($_REQUEST['btn_dmsorder']))
                   {
                      header("Location: index.php?module=ext&method=novohandover&id_wr=".$id_wr."&dmsorder=".$dmsorder);
                      die();
                   }
                   
                     $sql = "SELECT number FROM wr WHERE id = ".$id_wr." ";
                     $db->query($sql,__LINE__,__FILE__);
                     $db->next_record();
                     $wr_number = $db->f("number");
                   
                   
                   if($_REQUEST['ac_3'] == "0")
                   {
                     array_push($_SESSION['checklist_item_denied'],3);
                     $_SESSION['handover_restrito_motivo'] .= "Info on WR does not match the invoice. You may not continue.<br>";
                   }
                   
                   if($_REQUEST['ac_4'] == "0")
                   {
                     array_push($_SESSION['checklist_item_denied'],4);
                     $_SESSION['handover_restrito_motivo'] .= "No Shippper Letter of Instruction. You may not Coninue.<br>";
                   }
 
                   if($_REQUEST['ac_5'] == "0")
                   {
                     array_push($_SESSION['checklist_item_denied'],5);
                //      $_SESSION['handover_restrito_motivo'] .= "EAR 99 / NO License required. Attention this shipment requires export license.<br>";
                   }
                    
                     if( (in_array("5",$_SESSION['checklist_item_denied']) || in_array("1",$_SESSION['checklist_item_denied']) || in_array("2",$_SESSION['checklist_item_denied']) || in_array("6",$_SESSION['checklist_item_denied']) ) && (!in_array("3",$_SESSION['checklist_item_denied']) && !in_array("4",$_SESSION['checklist_item_denied']) ))
                     {
                        $_SESSION['handover_aprovado']  = "1";
                     }

                   
                     // Atualiza o dms order mesmo se não passar no checklist 
                     $sql = "UPDATE wr SET dmsorder = '".$dmsorder."' WHERE id = ".$id_wr." LIMIT 1 ";
                     $db->query($sql,__LINE__,__FILE__);
                     $db->next_record();
                     
                       // Atualiza os volumes com os NR escolhidos no Match dos Items
                     
                        $sql = "SELECT wr_volumes.id AS volume_id
                               FROM wr_volumes
                               WHERE wr_volumes.id_wr = ".$id_wr." ORDER BY id DESC";         
                        $db->query($sql,__LINE__,__FILE__);
                        $db->next_record();

                        for($i = 0; $i < $db->num_rows(); $i++)
                        {
                            if(isset($_REQUEST["nr_".$db->f("volume_id")]))
                            {
                                $nr = $_REQUEST["nr_".$db->f("volume_id")];
                                
                                $sql2 = "UPDATE wr_volumes SET nr = ".$nr." WHERE id = ".$db->f("volume_id")." ";
                                $db2->query($sql2,__LINE__,__FILE__);
                                $db2->next_record();
                                
                            }
                            
                            $db->next_record();
                        }
                     
                       
                        
                        $wrJsonContent = $this->getwr($id_wr);
                        
                        
                        
                       // Envia o Json para o SYS com o dmsorder e a quantidade de WR pendentes de dmsorder
                        
                            $url = "https://operational.dmslog.com/order/dwsys/match/";
                           // $url = "https://operational.hmg.dmslog.com/order/dwsys/match/";

                            /*
                                $data = array(
                                  'result'      => $wrJsonContent,
                                );            
                                */


                          $options = array(
                            'http' => array(
                              'method'  => 'POST',
                              'content' => $wrJsonContent,
                              'header'=>  "Authorization: U5Ezh4yvvsgVJ27M\r\n" .
                                          "Content-Type: application/json\r\n" .
                                          "Accept: application/json\r\n"
                              )
                          );

                          $context  = stream_context_create( $options );
                          $result = file_get_contents( $url, false, $context );
                          $response = json_decode( $result );            
                          
                          
                          
                     $sql = "UPDATE wr_volumes SET nr = -1 WHERE nr <> 0 AND id_wr = ".$id_wr." ";
                     $db->query($sql,__LINE__,__FILE__);
                     $db->next_record();

                   
                   if($_SESSION['handover_aprovado'] == "1")
                   {

                        $sql = "INSERT INTO wr_status (id_wr,status,status_Date,id_warehouse) VALUES (".$id_wr.",1, NOW(), 1)";
                        $db->query($sql,__LINE__,__FILE__);
                        $db->next_record();
                        
                        
                        
                        
                          $numSeq = 1;

                          $sql = "SELECT id FROM handovers ORDER BY id DESC LIMIT 1";
                          $db->query($sql,__LINE__,__FILE__);
                          $db->next_record();

                          $numSeq += $db->f("id");

                          $number = "HO-".$_SESSION['sigla_warehouse']."".date("y").date("m").number_format(($numSeq/1000000),6,'','');


                       $sql = "INSERT INTO handovers
                             (number, 
                             id_wr,
                             dataCadastro,
                             status)
                             VALUES ('".$number."',
                             ".$id_wr.",
                             NOW(),
                             0) ";
                       $db->query($sql,__LINE__,__FILE__);
                       $db->next_record();

                       $id_handover = $db->get_last_insert_id("handovers","id");
                       
                       
                     
                       $sql = "SELECT id FROM handovers_checklist_itens ORDER BY ordem ASC";
                       $db->query($sql,__LINE__,__FILE__);
                       $db->next_record();
                       for($i = 0; $i < $db->num_rows(); $i++)
                       {
                          if(isset($_REQUEST['ac_'.$db->f("id")]))
                          {
                             $sql2 = "INSERT INTO handovers_checklist (id_handover, id_checklist_item, resposta, dataCadastro) VALUES (".$id_handover.", ".$db->f("id").", ".$_REQUEST['ac_'.$db->f("id")].", NOW())";
                             $db2->query($sql2,__LINE__,__FILE__);
                             $db2->next_record();
                          }

                          $db->next_record();
                       }
                        
                        


                       $sql = "UPDATE handovers SET status = 1 WHERE id = ".$id_handover." ";
                       $db->query($sql,__LINE__,__FILE__);
                       $db->next_record();

                       
                        $sql = "INSERT INTO handovers_users (id_user_sys, id_handover, data_cadastro) VALUES (".$_SESSION['id_user_sys'].", ".$id_handover.", NOW())";
                        $db->query($sql,__LINE__,__FILE__);
                        $db->next_record();
                        
                        
                     $sql = "UPDATE wr SET hold_handover = 0 WHERE id = ".$id_wr." LIMIT 1";
                     $db->query($sql,__LINE__,__FILE__);
                     $db->next_record();
                     
                     
                     if(in_array("5",$_SESSION['checklist_item_denied']))
                     {
                              $assunto = "DWSYS - Pending Compliance Checklist  (Appeal)";


                              $msg = "The Warehouse Receipt #".$wr_number." was marked as 'EAR/99 NO'.  ";
                              $msg .= '<br><br>';
                              $msg .= 'EAR99/No License Required was selected as “NO” so this shipment should have restrictions to export. Shipment might not be available to Ship.';
                     
                              $this->email("raphaelcozzi@gmail.com",$assunto,$msg);                        
                             // $this->email("compliance@dmslog.com",$assunto,$msg);                        
                     }
                     
                     
                     // Caso não tenha invoice, envia email pra Warehouse MIA
                     if($_SESSION['hasInvoice'] == "0")
                     {
                              $assunto = "DWSYS - Warehouse Receipt has no Invoice";

                              $msg = "The Warehouse Receipt #".$wr_number." was completed without an Invoice. ";
                              $msg .= '<br><br>';
                     
                              $this->email("raphaelcozzi@gmail.com",$assunto,$msg);                        
                             // $this->email("warehouse.mia@dmslog.com",$assunto,$msg);                        
                        
                     }

                     // Caso não tenha Packing List, envia email pra Warehouse MIA
                     if($_SESSION['hasPackingList'] == "0")
                     {
                              $assunto = "DWSYS - Warehouse Receipt has no Packing List";

                              $msg = "The Warehouse Receipt #".$wr_number." was completed without a Packing List. ";
                              $msg .= '<br><br>';
                     
                              $this->email("raphaelcozzi@gmail.com",$assunto,$msg);                        
                             // $this->email("warehouse.mia@dmslog.com",$assunto,$msg);                        
                        
                     }



                       $this->notificacao("Handover Complete!", "green");
                       header("Location: index.php?module=ext&method=confirmedhandover&id_handover=".$id_handover);
                   }
                   else // Caso de não ter passado no checklist
                   {
                      
                               // Envia email para compliance@dmslog.com
                               
                               $assunto = "DWSYS - Pending Compliance Checklist";
                               $msg = 'The Warehouse Receipt #'.$wr_number.' could not be finished due to: <br><br> ';
                               
                               
                            if(in_array(3, $_SESSION['checklist_item_denied'])) // Shippers info on  WR matches invoice
                            {
                               $msg .= " Info on WR does not match the invoice. <br><br>";
                            }
                               
                            if(in_array(4, $_SESSION['checklist_item_denied'])) // Shippers letter of instruction
                            {
                               $msg .= " No Shippper Letter of Instruction. <br><br>";
                            }

                            /*
                            if(in_array(5, $_SESSION['checklist_item_denied'])) // EAR99/No license required?
                            {
                               $msg .= " EAR 99 / NO License required. Attention this shipment requires export license. <br><br>";
                            }
                             */  

                               $this->email("raphaelcozzi@gmail.com",$assunto,$msg);
                                //$this->email("compliance@dmslog.com",$assunto,$msg);
                               
                            
                            
                            //if(in_array(3, $_SESSION['checklist_item_denied']) || in_array(4, $_SESSION['checklist_item_denied']) || in_array(5, $_SESSION['checklist_item_denied']))
                            if(in_array(3, $_SESSION['checklist_item_denied']) || in_array(4, $_SESSION['checklist_item_denied']))
                            {
                                 $this->notificacao("Warning! Handover could not be completed.", "red");
                                 header("Location: index.php?module=ext&method=error&id_wr=".$id_wr."&dmsorder=".$dmsorder);
                                 die();
                            }
                      
                   }
         
         }
         else
         {
            $this->notificacao("Warehouse Receipt Not Found!", "red");
            header("Location: index.php?module=ext&method=handover");
            die();
         }
         
      }
      
      function confirmedhandover()
      {
         
         $id_handover = $this->blockrequest($_REQUEST['id_handover']);
         
         if(isset($_REQUEST['id_handover']) && $_REQUEST['id_handover'] != "")
         {
           @session_start();
            $db = new db();
            $db2 = new db();
            $db3 = new db();
            
            $sql = "SELECT number, id_wr FROM handovers WHERE id = ".$id_handover." ";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();
            $number = $db->f("number");
            $id_wr = $db->f("id_wr");
            
            $sql = "SELECT number FROM wr WHERE id = ".$id_wr." ";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();
            $wr_number = $db->f("number");
            
               if(in_array("1",$_SESSION['checklist_item_denied']) || in_array("2",$_SESSION['checklist_item_denied']) || in_array("6",$_SESSION['checklist_item_denied']) || in_array("5",$_SESSION['checklist_item_denied']))
               {
                     $msg_continue  = 'The Handover Process was finalized, however, some items of the Compliance Checklist were ignored:<br><br>';

                           if(in_array(1,$_SESSION['checklist_item_denied']))
                           {
                                 $msg_continue .= '<h4><i class="fa fa-warning"></i>The shipper Status is expired or Unknown.</h4> <span><br>';
                           }

                           if(in_array(2,$_SESSION['checklist_item_denied']))
                           {
                                 $msg_continue .= '<h4><i class="fa fa-warning"></i>The SED authorization form is expired or does not exists.</h4> <span><br>';
                           }

                          if(in_array(6,$_SESSION['checklist_item_denied']))
                           {
                                 $msg_continue .= '<h4><i class="fa fa-warning"></i>The consent to screen form is expired or not in file.</h4> <span><br>';
                           }
                     
                          if(in_array(5,$_SESSION['checklist_item_denied']))
                           {
                                 $msg_continue .= '<h4><i class="fa fa-warning"></i>EAR99/No License Required was selected as “NO” so this shipment should have restrictions to export. The system will let you continue, but will inform Compliance Department about this Compliance Issue. Shipment might not be available to Ship.</h4> <span><br>';
                           }
                     
               }
            
            

            $this->cabecalho_deslogado();                                                                            
            $GLOBALS["base"]->template = new template();       

            $GLOBALS["base"]->template->set_var("msg_continue",$msg_continue);
            $GLOBALS["base"]->template->set_var("id_handover",$id_handover);
            $GLOBALS["base"]->template->set_var("number",$number);
            $GLOBALS["base"]->template->set_var("wr_number",$wr_number);

            $GLOBALS["base"]->write_design_specific('ext.tpl' , 'confirmedhandover');                       
            $GLOBALS["base"]->template = new template();                                                  
            $this->footer();                                                                           
            
            
         }
         else
         {
            $this->notificacao("Handover Not Found!", "red");
            header("Location: index.php?module=ext&method=handover");
            die();
         }
         
         
      }
      
      function pendingwr()
      {
            header('Access-Control-Allow-Origin: *');
            header("Content-type: application/json; charset=utf-8");
         
           @session_start();
            $db = new db();
         
         //   $sql = "SELECT COUNT(id) AS total FROM wr WHERE dmsorder = ''  OR dmsorder IS NULL";
            
            $sql = 'SELECT
                        COUNT(wr.id) AS total FROM wr  WHERE wr.id_warehouse IN(1) 
                        AND wr.id NOT IN (SELECT wr_status.id_wr FROM wr_status WHERE wr_status.status = 1 OR wr_status.status = 2)';
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();
            $totalPendentes = $db->f("total");
            
            
            echo $totalPendentes;
            
            
            
         
      }
      
      function testeJsonDmsorder()
      {
            
         
          $dmsorder = "200533469";

         $url = "https://operational.hmg.dmslog.com/order/dwsys/match/";
         
         
                     $data = array(
                       'dmsorder'      => $dmsorder
                     );            
            
            
               $options = array(
                 'http' => array(
                   'method'  => 'POST',
                   'content' => json_encode( $data ),
                   'header'=>  "Authorization: U5Ezh4yvvsgVJ27M\r\n" .
                               "Content-Type: application/json\r\n" .
                               "Accept: application/json\r\n"
                   )
               );

               $context  = stream_context_create( $options );
               $result = file_get_contents( $url, false, $context );
               $response = json_decode( $result );            
         
      }
      
      function error()
      {
           @session_start();
            $db = new db();
            
            
            if(in_array("1",$_SESSION['checklist_item_denied']) || in_array("2",$_SESSION['checklist_item_denied']) || in_array("6",$_SESSION['checklist_item_denied']))
                    $hold_message = "Handover was marked as 'Hold'and will be checked later. New Handover can be found on 'Pending Handovers' list. ";
            else
               $hold_message = "";
         
            $this->cabecalho_deslogado();                                                                            
            $GLOBALS["base"]->template = new template();       

            $GLOBALS["base"]->template->set_var("id_wr",$_REQUEST['id_wr']);
            $GLOBALS["base"]->template->set_var("handover_restrito_motivo",$_SESSION['handover_restrito_motivo']);
            
            $GLOBALS["base"]->template->set_var("hold_message",$hold_message);

            $GLOBALS["base"]->write_design_specific('ext.tpl' , 'error');                       
            $GLOBALS["base"]->template = new template();                                                  
            $this->footer();                                                                           
         
      }
      
      
      function appeal()
      {
           @session_start();
            $db = new db();
            
             $id_wr = $_REQUEST['id_wr'];
            $dmsorder = $this->blockrequest($_REQUEST['dmsorder']);
            
            $sql = "SELECT number FROM wr WHERE id = ".$id_wr." ";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();
            $wr_number = $db->f("number");
            
            
            $sql = "UPDATE wr SET hold_handover = 1 WHERE id = ".$id_wr." LIMIT 1";
            $db->query($sql,__LINE__,__FILE__);
            $db->next_record();
            

            $this->notificacao("Warning! Handover marked as Appeal. On Hold.", "red");
            // Envia email para compliance@dmslog.com
             $assunto = "DWSYS - Pending Compliance Checklist  (Appeal)";

             $msg = "The Warehouse Receipt #<strong>".$wr_number."</strong> could not be finished due to: ";
             $msg .= "<br><br>";
             
            if(in_array(1, $_SESSION['checklist_item_denied'])) // Shippers Status Expired
            {
               $msg .= " The shipper Status is expired or Unknown. <br><br>";
            }
                               
            if(in_array(2, $_SESSION['checklist_item_denied'])) // SED Authorization
            {
               $msg .= " The SED authorization form is expired or does not exists. <br><br>";
            }
             
            if(in_array(6, $_SESSION['checklist_item_denied'])) // Consent to screen file
            {
               $msg .= " The consent to screen form is expired or not in file. <br><br>";
            }
             
             $msg .= "The Warehouse Receipt #".$wr_number." was marked as 'APPEAL' in order to be verified. ";
             $this->email("raphaelcozzi@gmail.com",$assunto,$msg);
          //    $this->email("compliance@dmslog.com",$assunto,$msg);
             
             
               // Caso não tenha invoice, envia email pra Warehouse MIA
               if($_SESSION['hasInvoice'] == "0")
               {
                  $assunto = "DWSYS - Warehouse Receipt has no Invoice";

                  $msg .= "The Warehouse Receipt #".$wr_number." was marked as 'APPEAL' in order to be verified. Warehouse Receipt has no Invoice. ";
                  $msg .= '<br><br>';

                  $this->email("raphaelcozzi@gmail.com",$assunto,$msg);                        
                 // $this->email("warehouse.mia@dmslog.com",$assunto,$msg);                        

               }

               // Caso não tenha Packing List, envia email pra Warehouse MIA
               if($_SESSION['hasPackingList'] == "0")
               {
                 $assunto = "DWSYS - Warehouse Receipt has no Packing List";

                  $msg .= "The Warehouse Receipt #".$wr_number." was marked as 'APPEAL' in order to be verified. Warehouse Receipt has no Packing List. ";
                  $msg .= '<br><br>';

                  $this->email("raphaelcozzi@gmail.com",$assunto,$msg);                        
                 // $this->email("warehouse.mia@dmslog.com",$assunto,$msg);                        

               }
             
         
            
            $this->cabecalho_deslogado();                                                                            
            $GLOBALS["base"]->template = new template();       

            $GLOBALS["base"]->template->set_var("wr_number",$wr_number);
            $GLOBALS["base"]->template->set_var("code",$_SESSION['code']);
            $GLOBALS["base"]->template->set_var("id_wr",$_REQUEST['id_wr']);
            $GLOBALS["base"]->write_design_specific('ext.tpl' , 'appeal');                       
            $GLOBALS["base"]->template = new template();                                                  
            $this->footer();                                                                           
            

      }
      
      function loadJsonItems()
      {
         /*
          *
          array(4) {
  ["count"]=>
  int(5)
  ["next"]=>
  NULL
  ["previous"]=>
  NULL
  ["results"]=>
  array(5) {
    [0]=>
    array(10) {
      ["nr"]=>
      int(4)
      ["length"]=>
      string(5) "60.00"
      ["height"]=>
      string(5) "86.00"
      ["width"]=>
      string(5) "80.00"
      ["gross_weight"]=>
      string(6) "78.500"
      ["quantity"]=>
      int(1)
      ["item_type"]=>
      string(6) "pallet"
      ["get_invoice"]=>
      array(1) {
        [0]=>
        string(10) "9161300624"
      }
      ["volume_weight"]=>
      string(6) "68.800"
      ["chargeable_weight"]=>
      string(6) "78.500"
    } 
          * 
          * 
          */
         
         
         $dmsorder = $_REQUEST['dmsorder'];
         
            // recebe os dados dos itens
            $url = 'https://operational.hmg.dmslog.com/api/items?order_number='.$dmsorder;
         
            $dmstoken = 'HVd6FUwPeEs6PVTMLVX8u5E6';

            $header = array('Content-Type' => 'application/json', 
                'DMSTOKEN' => base64_encode($token), 
                'Authorization' => 'Baerer '.$dmstoken);
            $response =  $this->request("GET",$url, $header);
            
            echo var_dump(json_decode($response,true));
            
            
      }
  
      
function buildBrokenJson( array $data ) {

   $result = '{';

   $separator = '';
   foreach( $data as $key=>$val ) {
      $result .= $separator . $key . ':';

      if( is_int( $val ) ) {
         $result .= $val;
      } elseif( is_string( $val ) ) {
         $result .= '"' . str_replace( '"', '\"', $val) . '"';
      } elseif( is_bool( $val ) ) {
         $result .= $val ? 'true' : 'false';
      } else {
         $result .= $val;
      }

      $separator = ', ';
   }

   $result .= '}';

   return $result;
}      
      
}                                                                                                     





?>