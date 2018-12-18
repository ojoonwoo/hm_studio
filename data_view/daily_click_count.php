<?php
	// 설정파일
	include_once "../include/autoload.php";

	$mnv_f = new mnv_function();
	$my_db         = $mnv_f->Connect_MySQL();

	include "./head.php";

	if(isset($_REQUEST['targetmedia']) == false) {
		$mediaWhere = "";
	}else{
		// $media = $_REQUEST['targetmedia'];
		switch ($_REQUEST['targetmedia']) {
			case "naver1" :
				$mediaWhere = " AND click_source='naver' AND click_medium='display' AND click_content='740x120'";
			break;
			case "youtube1" :
				$mediaWhere = " AND click_source='youtube' AND click_medium='video' AND click_content='time_1'";
			break;
			case "youtube2" :
				$mediaWhere = " AND click_source='youtube' AND click_medium='video' AND click_content='time_2'";
			break;
			case "smr1" :
				$mediaWhere = " AND click_source='smr' AND click_medium='video' AND click_content='time_1'";
			break;
			case "smr2" :
				$mediaWhere = " AND click_source='smr' AND click_medium='video' AND click_content='time_2'";
			break;
			case "facebook" :
				$mediaWhere = " AND click_source='facebook' AND click_medium='video' AND click_content='time_1'";
			break;
			case "facebook" :
				$mediaWhere = " AND click_source='facebook' AND click_medium='video' AND click_content='time_2'";
			break;
			case "instagram" :
				$mediaWhere = " AND click_source='instagram' AND click_medium='story' AND click_content='story'";
			break;
			case "page_fb" :
				$mediaWhere = " AND click_source='share' AND click_medium='self' AND click_content='facebook'";
			break;
			case "page_kt" :
				$mediaWhere = " AND click_source='share' AND click_medium='self' AND click_content='kakaotalk'";
			break;
			case "page_ks" :
				$mediaWhere = " AND click_source='share' AND click_medium='self' AND click_content='kakaostory'";
			break;
			case "page_url" :
				$mediaWhere = " AND click_source='share' AND click_medium='self' AND click_content='url'";
			break;
			default :
				$mediaWhere = "";
			break;
		}
	}

	// $media_list_query = "SELECT click_media FROM click_info WHERE 1 Group by click_media ORDER BY click_media DESC";
	// $media_query_res = mysqli_query($my_db, $media_list_query);
	

// //	$options = array( 'jw', 'test' );
// 	$options = array();
// 	$i = 0;
// 	$output = '';
// 	while($media_array = mysqli_fetch_array($media_query_res)) {
// 		if($media_array['click_media'] == '') {
// 			$options[$i] = "----";
// 		} else {
// 			$options[$i] = $media_array['click_media'];
// 		}
		
// 		$output .= '<option ' 
// 			. ( $media == $options[$i] ? 'selected="selected"' : '' ) . '>' 
// 			. $options[$i] 
// 			. '</option>';
// 		$i++;
// 	}
// 	print_r($options);

//	$output = '';
//	for( $i=0; $i<count($options); $i++ ) {
//		$output .= '<option ' 
//			. ( $media == $options[$i] ? 'selected="selected"' : '' ) . '>' 
//			. $options[$i] 
//			. '</option>';
//	}
?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">캠페인 사이트 내 클릭 수 PC / Mobile</h1>
				</div>
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col">
					<div class="table-responsive">
						<div id="daily_applicant_count_div1" style="display:block">
							<form id="frm_execute" name="frm_execute" method="POST" onsubmit="">
								<span>미디어별 소팅 : </span>
								<select name="targetmedia" id="targetmedia">
									<option value="" <? if($mediaWhere == ""){?>selected<?}?>>전체</option>
									<option value="naver1" <? if($mediaWhere == "naver1"){?>selected<?}?>>네이버-타임보드_오토플레이</option>
									<option value="youtube1" <? if($mediaWhere == "youtube1"){?>selected<?}?>>유튜브-트루뷰 인스트림1</option>
									<option value="youtube2" <? if($mediaWhere == "youtube2"){?>selected<?}?>>유튜브-트루뷰 인스트림2</option>
									<option value="smr1" <? if($mediaWhere == "smr1"){?>selected<?}?>>SMR-프리롤1</option>
									<option value="smr2" <? if($mediaWhere == "smr2"){?>selected<?}?>>SMR-프리롤2</option>
									<option value="facebook1" <? if($mediaWhere == "facebook1"){?>selected<?}?>>페이스북-video1</option>
									<option value="facebook2" <? if($mediaWhere == "facebook2"){?>selected<?}?>>페이스북-video2</option>
									<option value="instagram" <? if($mediaWhere == "instagram"){?>selected<?}?>>인스타그램-스토리</option>
									<option value="page_fb" <? if($mediaWhere == "page_fb"){?>selected<?}?>>페이지공유-공유페이스북</option>
									<option value="page_kt" <? if($mediaWhere == "page_kt"){?>selected<?}?>>페이지공유-공유카카오톡</option>
									<option value="page_ks" <? if($mediaWhere == "page_ks"){?>selected<?}?>>페이지공유-공유카카오스토리</option>
									<option value="page_url" <? if($mediaWhere == "page_url"){?>selected<?}?>>페이지공유-공유URL</option>
								</select>
							</form>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>날짜</th>
										<th>클릭명</th>
										<th>PC</th>
										<th>Mobile</th>
										<!--<th>PC unique(IP)</th><th>MOBILE unique(IP)</th>-->
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
	// $mediaWhere = "";
	// if($media != "") {
	// 	$mediaWhere = " AND click_media LIKE '".$media."'";
	// }
		
	$daily_date_query	= "SELECT click_date FROM click_info WHERE 1 ".$mediaWhere." Group by substr(click_date,1,10) ORDER BY click_date DESC";
//	$daily_date_query	= "SELECT click_date FROM click_info Group by substr(click_date,1,10) ORDER BY click_date DESC";
	$date_res			= mysqli_query($my_db, $daily_date_query);
	while($date_daily_data = mysqli_fetch_array($date_res))
	{
		$daily_date		= substr($date_daily_data['click_date'],0,10);
		$click_query	= "SELECT click_name, COUNT( click_name ) click_name_cnt FROM click_info WHERE 1 ".$mediaWhere." AND click_date LIKE  '%".$daily_date."%' GROUP BY click_name";
		$click_res		= mysqli_query($my_db, $click_query);

		unset($click_name);
		unset($click_name_cnt);
		unset($click_cnt);
		unset($pc_cnt);
		unset($mobile_cnt);
		// unset($pc_unique_cnt);
		// unset($mobile_unique_cnt);
		// unset($click_unique_cnt);
		// unset($daily_unique_click_count);
		// unset($total_unique_click_cnt);
		$total_click_cnt = 0;
		$total_mobile_cnt = 0;
		$total_pc_cnt = 0;
		// $total_unique_mobile_cnt = 0;
		// $total_unique_pc_cnt = 0;
		// $daily_unique_click_query = "SELECT * FROM ".$_gl['click_info_table']." WHERE 1 AND click_date LIKE '%".$daily_date."%' GROUP BY click_ipaddr";
		// $daily_unique_click_res = mysqli_query($my_db, $daily_unique_click_query);
		// $daily_unique_click_count = mysqli_num_rows($daily_unique_click_res);
		while ($click_daily_data = mysqli_fetch_array($click_res))
		{
			$click_name[]	= $click_daily_data['click_name'];
			$click_cnt[]	= $click_daily_data['click_name_cnt'];
			$pc_query		= "SELECT * FROM click_info WHERE 1 ".$mediaWhere." AND click_date LIKE '%".$daily_date."%' AND click_name='".$click_daily_data['click_name']."' AND click_gubun='PC' ";
			$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
			$mobile_query	= "SELECT * FROM click_info WHERE 1 ".$mediaWhere." AND click_date LIKE '%".$daily_date."%' AND click_name='".$click_daily_data['click_name']."' AND click_gubun='MOBILE'";
			$mobile_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
			// $pc_unique_query		= "SELECT * FROM ".$_gl['click_info_table']." WHERE 1 AND click_date LIKE  '%".$daily_date."%' AND click_name='".$click_daily_data['click_name']."' AND click_gubun='PC' GROUP BY click_ipaddr";
			// $pc_unique_count		= mysqli_num_rows(mysqli_query($my_db, $pc_unique_query));
			// $mobile_unique_query	= "SELECT * FROM ".$_gl['click_info_table']." WHERE 1 AND click_date LIKE  '%".$daily_date."%' AND click_name='".$click_daily_data['click_name']."' AND click_gubun='MOBILE' GROUP BY click_ipaddr";
			// $mobile_unique_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_unique_query));
			$pc_cnt[]		= $pc_count;
			$mobile_cnt[]	= $mobile_count;
			// $pc_unique_cnt[]		= $pc_unique_count;
			// $mobile_unique_cnt[]	= $mobile_unique_count;
			// $click_unique_cnt[]	= $pc_unique_count + $mobile_unique_count ;
		}
		$rowspan_cnt =  count($click_name);
		$i = 0;
		foreach($click_name as $key => $val)
		{
?>
										<tr>
											<?
			if ($i == 0)
			{
?>
												<td rowspan="<?=$rowspan_cnt?>">
													<?php echo $daily_date?>				
													<!-- <a id="excelDown" href="excel_download_click.php?date=<?=$daily_date?>&sort=<?=$_REQUEST["targetmedia"]?>">
														<span>엑셀 다운로드</span>
													</a> -->
												</td>
												<?
			}
?>
													<td>
														<?=$val?>
													</td>
													<td>
														<?=number_format($pc_cnt[$i])?>
													</td>
													<td>
														<?=number_format($mobile_cnt[$i])?>
													</td>
													<!-- <td><?=number_format($pc_unique_cnt[$i])?></td>
                    <td><?=number_format($mobile_unique_cnt[$i])?></td> -->
													<!-- <td><?=number_format($click_cnt[$i])?> / <?=number_format($click_unique_cnt[$i])?></td> -->
													<td>
														<?=number_format($click_cnt[$i])?>
													</td>
										</tr>
										<?php
			$total_click_cnt += $click_cnt[$i];
			// $total_unique_click_cnt += $click_unique_cnt[$i];
			$total_mobile_cnt += $mobile_cnt[$i];
			$total_pc_cnt += $pc_cnt[$i];
			// $total_unique_mobile_cnt += $mobile_unique_cnt[$i];
			// $total_unique_pc_cnt += $pc_unique_cnt[$i];
			$i++;
		}
		$pc_total_all += $total_pc_cnt;
		$mobile_total_all += $total_mobile_cnt;
		$all_total += $total_pc_cnt+$total_mobile_cnt;
?>
											<tr bgcolor="skyblue">
												<td colspan="2">합계</td>
												<td>
													<?php echo number_format($total_pc_cnt)?>
												</td>
												<td>
													<?php echo number_format($total_mobile_cnt)?>
												</td>
												<!-- <td><?php echo number_format($total_unique_pc_cnt)?></td>
                    <td><?php echo number_format($total_unique_mobile_cnt)?></td> -->
												<!-- <td><?php echo number_format($total_click_cnt)." / IP기준 유니크 : ".$total_unique_click_cnt ?></td> -->
												<td>
													<?php echo number_format($total_click_cnt)?>
												</td>
											</tr>

											<?
	}
?>
								</tbody>
								<div class="total-wrap" style="float: right; background: lightgrey; padding: 20px; margin-bottom: 10px;">
									<?
					  echo "<span style='display:inline-block; margin-right:10px;'>PC: ".$pc_total_all."</span>";
					  echo "<span style='display:inline-block; margin-right:10px;'>MOBILE: ".$mobile_total_all."</span>";
					  echo "<span style='display:inline-block;'>TOTAL: ".$all_total."</span>";
					  ?>
								</div>
							</table>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<script>
		$('#targetmedia').on('change', function() {
			$('#frm_execute').submit();
		});
	</script>
	</body>

	</html>