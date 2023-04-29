<!-- Modal content-->
<div id="_status_admit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><span class="ui-icon ace-icon fa fa-user fa-3x green"></span>รายละเอียดผู้ป่วย</h4>
        </div>
		
		<div class="col-xs-12 col-sm-12">
										 สืบค้นตามเลข ปชช.<input type="text" maxlength="13" class="form-control" name="keywordscid" id="keywordscid" placeholder="ค้นหา CID">
		</div>					
				<div id="result_search_cid" class="col-xs-12 col-sm-12">	
                        	<div class="row">
								<div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
								<div class="col-sm-8" style="background-color:lavenderblush;">.col-sm-8</div>
						  	</div>
                </div>						
										
		<br><br><br><br>
			
        
        <div class="modal-footer">
            <input type="hidden" name="id_an" id="id_an">
            <input type="hidden" name="old_menu" id="old_menu">
            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
    </div>

  </div>
</div>

<!--Tag 2-->
<div id="_print_admit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-xl">
  
   <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
			</div>					
				<embed src="../ipd/plugins/TCPDF/examples/print_sticker.php" frameborder="0" width="100%" height="400px">
	
		</div>
	  </div>	
     </div>

  </div>
</div>
 <!-- Modal content-->
 <!-- Modal content-->
 





<!-- Modal show_ht_perday-->
<div class="container-fluid">
<div id="_showdata_dm_perday" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><span class="ui-icon ace-icon fa fa-user fa-3x green"></span>_showdata_dm_perday</h4>
        </div>
		
			<?php $stmt_pop = $pdo->query("SELECT COUNT(*) AS total,sum(if(alll.chk=1,'1','0')) AS chk_send,SUM(if(alll.chk_authen=1,'1','0')) AS chk_authen
			FROM (
			SELECT a.hn,(SELECT if(cc.hn<>'','1','0') AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) limit 1) as chk,
			(SELECT if(cd.hn<>'','1','0') AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) limit 1) as chk_authen,
			pt.getCid(a.hn) as cid 
			FROM claim_moph.target a WHERE a.regdate=CURDATE() AND a.type_group='DM'
			) AS alll");
			$row_QQ2_chk = $stmt_pop->fetch();
		?>
		  
		 <section class="content">
      			<div class="container-fluid">
        				<!-- Small boxes (Stat box) -->
        				<div class="row">
						<!-- small box -->
          					<div class="col-lg-3 col-6">
              						<div class="small-box bg-info">
									  <div class="inner">
										<h3><?php echo $row_QQ2_chk['total']; ?></h3>
						
										<p>คาดจะสามารถกส่งเบิกได้</p>
									  </div>
									</div>	
							</div>
							<!-- small box -->
							<!-- small box -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
								  <div class="inner">
									<h3><?php echo $row_QQ2_chk['chk_send']; ?></h3>
					
									<p>จำนวนส่งข้อมูลเข้าส่วนกลาง</p>
								  </div>
								  <div class="icon">
									<i class="ion ion-stats-bars"></i>
								  </div>
								</div>
							  </div>
							  <!-- small box -->
							  <!-- small box -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
								  <div class="inner">
									<h3><?php echo $row_QQ2_chk['chk_authen']; ?></h3>
					
									<p>จำนวน Authen code ในระบบ</p>
								  </div>
								  <div class="icon">
									<i class="ion ion-stats-bars"></i>
								  </div>
								</div>
							  </div>
							  <!-- small box -->
							  <!-- small box -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
								  <div class="inner">
									<h3>53<sup style="font-size: 20px">%</sup></h3>
					
									<p>DM</p>
								  </div>
								  <div class="icon">
									<i class="ion ion-stats-bars"></i>
								  </div>
								</div>
							  </div>
							  <!-- small box -->
						</div>
				</div>
			</section>
		  
		
		<?php $stmt = $pdo->query("SELECT a.regdate,a.hn,pt.getFullname(a.hn) AS fullname,a.namelab,a.result_lab,a.regdate,a.type_group,pt.getCid(a.hn) as cid,(SELECT if(cc.hn<>'','1','0') AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) and cc.claim_code_response='200' limit 1) as chk,
(SELECT if(cd.hn<>'','1','0') AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,
pt.getCid(a.hn) as cid 
FROM claim_moph.target a WHERE a.regdate=CURDATE() AND a.type_group='DM'");
          ?>
		 <!--  start project -->
	<section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <table id="showdata_dm_perday" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 25%">Claim
                    </th>
					<th style="width: 25%">chk_authen
                    </th>
					<th style="width: 25%">MOPH Clim
                    </th>
				  	<th style="width: 12%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 10%">HN
                    </th>
					 <th style="width: 10%">CID
                    </th>
                    <th style="width: 25%">fullname
                    </th>
                    <th style="width: 25%">namelab
                    </th>
					<th style="width: 25%">result
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					 
					
                  </tr>
                </thead>
                <tbody>
                  <?php
				    $i=1;
                  while ($row = $stmt->fetch()) {
                  ?>
                    <tr>
						<td valign="middle" align="center">
				 	<?php if( $row["chk"] <>'') {?> 
					 <span class="ui-icon ace-icon fa fa-check fa-3x green"></span> <?php } else{ ?>
					 <span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span> <?php }; ?>
                 </td>
				  <td valign="middle" align="center">
				 	<?php if( $row["chk_authen"] <>'') {?> 
					 <span class="ui-icon ace-icon fa fa-check fa-3x green"></span> <?php } else{ ?>
					 <span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span> <?php }; ?>
                 </td>
						<td valign="middle" align="center"><?php if( $row["chk"] <>'') {?> 
					 <a href="#" class="btn btn-success btn-sm" ><?php echo 'Detial'; ?></a><?php } else{ ?>
					 <div class="action-buttons">
							<a class="red chk_mophic" data_type="dm" data_regdate="<?php echo $row["regdate"]; ?>" data_hn="<?php  echo $row["hn"]; ?>"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล DM</button>
                            </a></div><?php }; ?>
                 </td>
						<td align="center" valign="bottom"> 
					  	<?php echo $i; ?>
                      </td>
                      <td>
					  	<?php echo $row["regdate"]; ?>
                      </td>
                      <td>
					  <?php echo $row["hn"]; ?>
                      </td>
					  <td>
					  <?php echo $row["cid"]; ?>
                      </td>
                      <td>
                        <?php echo $row["fullname"]; ?>
                      </td>
                      <td>
                     <?php echo $row["namelab"]; ?> 
                 </td>
				 <td>
                     <?php echo $row["result_lab"]; ?> 
                 </td>
				 <td align="center">
                     <?php echo $row["regdate"]; ?> 
                 </td>
				 
                 
				 
                    </tr>
                  <?php
                  $i++;}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
		</div>
  </section>		   
				<div class="modal-footer">
				
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
   		 </div>

  		</div>
	</div>
	

<!-- Modal _showdata_error-->
<div class="container-fluid">
<div id="_showdata_error" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><span class="ui-icon ace-icon fa fa-user fa-3x green"></span>_showdata_error</h4>
        </div>
		
		<?php 
		
		$stmt = $pdo->query("SELECT a.regdate,a.hn,pt.getFullname(a.hn) AS fullname,a.namelab,a.result_lab,a.regdate,a.type_group,pt.getCid(a.hn) as cid,(SELECT if(cc.hn<>'','1','0') AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) and cc.claim_code_response='200' limit 1) as chk,
(SELECT if(cd.hn<>'','1','0') AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,
pt.getCid(a.hn) as cid 
FROM claim_moph.target a WHERE a.regdate=CURDATE() AND a.type_group='DM'");
          ?>
		 <!--  start project -->
	<section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <table id="showdata_dm_perday" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  	<th style="width: 25%"><?php echo $_itypeservice; ?>
                    </th>
					<th style="width: 25%">chk_authen
                    </th>
					<th style="width: 25%">MOPH Clim
                    </th>
				  	<th style="width: 12%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 10%">HN
                    </th>
					 <th style="width: 10%">CID
                    </th>
                    <th style="width: 25%">fullname
                    </th>
                    <th style="width: 25%">namelab
                    </th>
					<th style="width: 25%">result
                    </th>
					 <th style="width: 15%">regdate
                    </th>
					 
					
                  </tr>
                </thead>
                <tbody>
                  <?php
				    $i=1;
                  while ($row = $stmt->fetch()) {
                  ?>
                    <tr>
						<td valign="middle" align="center">
				 	<?php if( $row["chk"] <>'') {?> 
					 <span class="ui-icon ace-icon fa fa-check fa-3x green"></span> <?php } else{ ?>
					 <span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span> <?php }; ?>
                 </td>
				  <td valign="middle" align="center">
				 	<?php if( $row["chk_authen"] <>'') {?> 
					 <span class="ui-icon ace-icon fa fa-check fa-3x green"></span> <?php } else{ ?>
					 <span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span> <?php }; ?>
                 </td>
						<td valign="middle" align="center"><?php if( $row["chk"] <>'') {?> 
					 <a href="#" class="btn btn-success btn-sm" ><?php echo 'Detial'; ?></a><?php } else{ ?>
					 <div class="action-buttons">
							<a class="red chk_mophic" data_type="dm" data_regdate="<?php echo $row["regdate"]; ?>" data_hn="<?php  echo $row["hn"]; ?>"> 
                                    <button type="button" class="btn btn-warning">ส่งข้อมูล DM</button>
                            </a></div><?php }; ?>
                 </td>
						<td align="center" valign="bottom"> 
					  	<?php echo $i; ?>
                      </td>
                      <td>
					  	<?php echo $row["regdate"]; ?>
                      </td>
                      <td>
					  <?php echo $row["hn"]; ?>
                      </td>
					  <td>
					  <?php echo $row["cid"]; ?>
                      </td>
                      <td>
                        <?php echo $row["fullname"]; ?>
                      </td>
                      <td>
                     <?php echo $row["namelab"]; ?> 
                 </td>
				 <td>
                     <?php echo $row["result_lab"]; ?> 
                 </td>
				 <td align="center">
                     <?php echo $row["regdate"]; ?> 
                 </td>
				 
                 
				 
                    </tr>
                  <?php
                  $i++;}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
		</div>
  </section>		   
				<div class="modal-footer">
				
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
   		 </div>

  		</div>
	</div>

	<!-- Modal _showdata_note-->
<div class="container-fluid">
<div id="_showdata_note" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-x2">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><span class="ui-icon ace-icon fa fa-user fa-3x green"></span>_showdata_notefdsfs</h4>
        </div>
		

      	<div class="container-fluid" id="show_data_note">
		</div>
	   
				<div class="modal-footer">
				
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
   		 </div>

  		</div>
	</div>

<!-- Modal _showdata_ht_perday-->
<div id="_showdata_ht_perday" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"><span class="ui-icon ace-icon fa fa-user fa-3x green"></span>_showdata_ht_perday</h4>
        </div>
		
<?php $stmt_pop_ht = $pdo->query("SELECT COUNT(*) AS total,sum(if(alll.chk=1,'1','0')) AS chk_send,SUM(if(alll.chk_authen=1,'1','0')) AS chk_authen
FROM (
SELECT a.hn,(SELECT if(cc.hn<>'','1','0') AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) limit 1) as chk,
(SELECT if(cd.hn<>'','1','0') AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,
pt.getCid(a.hn) as cid 
FROM claim_moph.target a WHERE a.regdate=CURDATE() AND a.type_group='HT' GROUP BY hn) AS alll");
$row_QQ2_chk = $stmt_pop_ht->fetch();
          ?>
		  
		 <section class="content">
      			<div class="container-fluid">
        				<!-- Small boxes (Stat box) -->
        				<div class="row">
						<!-- small box -->
          					<div class="col-lg-3 col-6">
              						<div class="small-box bg-info">
									  <div class="inner">
										<h3><?php echo $row_QQ2_chk['total']; ?></h3>
						
										<p>คาดจะสามารถกส่งเบิกได้</p>
									  </div>
									</div>	
							</div>
							<!-- small box -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
								  <div class="inner">
									<h3><?php echo $row_QQ2_chk['chk_send']; ?></h3>
					
									<p>จำนวนส่งข้อมูลเข้าส่วนกลาง</p>
								  </div>
								  <div class="icon">
									<i class="ion ion-stats-bars"></i>
								  </div>
								</div>
							  </div>
							  <!-- small box -->
							  <!-- small box -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
								  <div class="inner">
									<h3><?php echo $row_QQ2_chk['chk_authen']; ?></h3>
					
									<p>จำนวน Authen code ในระบบ</p>
								  </div>
								  <div class="icon">
									<i class="ion ion-stats-bars"></i>
								  </div>
								</div>
							  </div>
							  <!-- small box -->
							  <!-- small box -->
							<div class="col-lg-3 col-6">
								<!-- small box -->
								<div class="small-box bg-success">
								  <div class="inner">
									<h3>53<sup style="font-size: 20px">%</sup></h3>
					
									<p>DM</p>
								  </div>
								  <div class="icon">
									<i class="ion ion-stats-bars"></i>
								  </div>
								</div>
							  </div>
							  <!-- small box -->
						</div>
				</div>
			</section>
		  
		
		<?php 
		$stmt = $pdo->query("SELECT a.regdate,a.hn,pt.getFullname(a.hn) AS fullname,GROUP_CONCAT(a.namelab) as namelab,a.regdate,a.type_group,pt.getCid(a.hn) as cid,
		(SELECT if(cc.hn<>'','1','0') AS chk FROM claim_moph.claim_dmht_data cc WHERE cc.visit_date=a.regdate AND cc.pid=(pt.getCid(a.hn)) AND cc.is_used_ht='1' and cc.claim_code_response='200' limit 1) as chk,
		(SELECT if(cd.hn<>'','1','0') AS chk FROM nhso.nhso_authen cd WHERE cd.authen_date=a.regdate AND cd.cid=pt.getCid(a.hn) LIMIT 1) as chk_authen,
pt.getCid(a.hn) as cid 
FROM claim_moph.target a WHERE a.regdate=curdate() AND a.type_group='HT' GROUP BY regdate,hn");
          ?>
		 <!--  start project -->
		 
          <div class="card">
            <div class="card-body">
              <table id="showdata_ht_perday" class="table table-bordered table-striped dataTable dtr-inline">
			  
                <thead>
                  <tr align="center">
				  <th style="width: 25%">Claim
                    </th>
					<th style="width: 25%">chk_authen
                    </th>
					<th style="width: 25%">MOPH Clim
                    </th>
				  <th style="width: 12%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 10%">HN
                    </th>
					 <th style="width: 10%">CID
                    </th>
                    <th style="width: 25%">fullname
                    </th>
                    <th style="width: 25%">namelab
                    </th>
					
					
                  </tr>
                </thead>
                <tbody>
                  <?php
				   $i=1;
                  while ($row = $stmt->fetch()) {
                  ?>
                    <tr>
					 <td valign="middle" align="center">
				 	<?php if( $row["chk"] <>'') {?> 
					 <span class="ui-icon ace-icon fa fa-check fa-3x green"></span> <?php } else{ ?>
					 <span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span> <?php }; ?>
                 </td>
				  <td valign="middle" align="center">
				 	<?php if( $row["chk_authen"] <>'') {?> 
					 <span class="ui-icon ace-icon fa fa-check fa-3x green"></span> <?php } else{ ?>
					 <span class="ui-icon ace-icon fa fa-spinner fa-spin fa-3x green"></span> <?php }; ?>
                 </td>
				 <td>
				 	<?php if( $row["chk"] <>'') {?> 
					 <a href="#" class="btn btn-success btn-sm" ><?php echo 'Detial'; ?></a><?php } else{ ?>
					 <div class="action-buttons">
							<a class="blue chk_mophic" data_type="HT" data_regdate="<?php echo $row["regdate"]; ?>" data_hn="<?php  echo $row["hn"]; ?>"> 
                                    <button type="button" class="btn btn-primary">ส่งข้อมูล HT</button>
                            </a>
						</div> <?php }; ?>

                 </td>
					<td align="center" valign="middle"> 
					  	<?php echo $i; ?>
                      </td>
                      <td>
					  	<?php echo $row["regdate"]; ?>
                      </td>
                      <td>
					 <?php echo $row["hn"]; ?>
                      </td>
					  <td>
					  <?php echo $row["cid"]; ?>
                      </td>
                      <td>
                        <?php echo $row["fullname"]; ?>
                      </td>
                      <td>
                     <?php echo $row["namelab"]; ?> 
                 </td> 
                
                    </tr>
                  <?php
                  $i++;}
                  ?>
                </tbody>
              </table>
            </div>
          </div>
						   
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
    </div>

  </div>
</div>



 <!--Tag 2-->
<div id="_showdata_detail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-x4">
  
   <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
			</div>					
				 <div class="show">
            <div class="card-body">
              <table id="showdata_dm_perday" class="table table-bordered table-striped">
                <thead>
                  <tr align="center">
				  <th style="width: 12%">No.
                    </th>
                    <th style="width: 12%">regdate
                    </th>
                    <th style="width: 10%">HN
                   
                  </tr>
                </thead>
                <tbody>

                    <tr>
				     <td align="center" valign="middle"> 
					  	
                      </td>
                      <td>
					  	
                      </td>
                      <td>
					 
                      </td>
                    </tr>

                </tbody>
              </table>
            </div>
          </div>
		   <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
		</div>
	  </div>	
     </div>

  </div>
</div>
 <!-- Modal content-->
 <!-- Modal content-->


<!-- Modal show_ht_perday-->

