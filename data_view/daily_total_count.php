<?php
// 설정파일
include_once "../include/autoload.php";

$mnv_f = new mnv_function();
$my_db         = $mnv_f->Connect_MySQL();

include "./head.php";

//	$beforeDay = date("Y-m-d", strtotime($day." -6 day"));
//	print_r($beforeDay);
if(isset($_REQUEST['sDate']) == false) {
	$sDate = date("Y-m-d", strtotime($day." -6 day"));
} else {
	$sDate = $_REQUEST['sDate'];
}

if(isset($_REQUEST['eDate']) == false)
	//		$eDate = "";
	$eDate = date("Y-m-d");
else
	$eDate = $_REQUEST['eDate'];

?>
<script type="text/javascript">
	$(function() {
		$("#sDate").datepicker();
		$("#eDate").datepicker();
	});

	function checkfrm() {
		if ($("#sDate").val() > $("#eDate").val()) {
			alert("검색 시작일은 종료일보다 작아야 합니다.");
			return false;
		}
	}
	function resetDate() {
		$('#sDate').val('<?=date("Y-m-d", strtotime($day." -6 day"))?>');
		$('#eDate').val('<?=date("Y-m-d")?>');
	}
	function outputExcel() {
		location.href = "excel_download_tracking.php?sDate=" + $("#sDate").val() + "&eDate=" + $("#eDate").val();
	}
</script>

<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">캠페인 사이트 요약</h1>
			</div>
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					
					<!-- 필리핀 -->
					<div id="daily_applicant_count_div1" style="display:block">
						<table class="table table-hover" style="position: relative;">
							<thead>
								<tr>
									<th>날짜</th>
									<th>디바이스 구분</th>
									<th>유입</th>
									<th>사행시 참여</th>
									<th>좋아요 참여</th>
								</tr>
							</thead>
							<tbody>
								<?php

	$where = "";

							if ($sDate != "")
//								$where	.= " AND tracking_date BETWEEN '".$sDate." 00:00:00' AND '".$eDate." 23:59:59'";



							$all_total_tracking_cnt = 0;
							$all_total_member_cnt = 0;
							$all_total_like_member_cnt = 0;


							$daily_date_query	= "SELECT tracking_date FROM tracking_info WHERE 1 ".$where." Group by substr(tracking_date,1,10) ORDER BY tracking_date DESC";
							//	print_r($daily_date_query);
							$date_res			= mysqli_query($my_db, $daily_date_query);
							while($date_daily_data = mysqli_fetch_array($date_res))
							{
								$daily_date		= substr($date_daily_data['tracking_date'],0,10);
								$tracking_query	= "SELECT tracking_gubun, COUNT( tracking_gubun ) t_cnt FROM tracking_info WHERE 1 AND tracking_date LIKE  '%".$daily_date."%' GROUP BY tracking_gubun";
								$member_query	= "SELECT mb_gubun, COUNT( mb_gubun ) m_cnt FROM member_info WHERE 1 AND mb_regdate LIKE  '%".$daily_date."%' GROUP BY mb_gubun";
								$like_member_query	= "SELECT mb_like_gubun, COUNT( mb_like_gubun ) m_l_cnt FROM member_info_like WHERE 1 AND mb_like_regdate LIKE  '%".$daily_date."%' GROUP BY mb_like_gubun";
								$tracking_res		= mysqli_query($my_db, $tracking_query);
								$member_res		= mysqli_query($my_db, $member_query);
								$like_member_res		= mysqli_query($my_db, $like_member_query);
								
//								print_r($like_member_query);

								unset($gubun_name);
								unset($tracking_cnt);
								unset($tracking_pc_cnt);
								unset($tracking_mobile_cnt);
								unset($tracking_total_cnt);
								
								unset($member_cnt);
								unset($member_pc_cnt);
								unset($member_mobile_cnt);
								unset($member_total_cnt);
								
								unset($like_member_cnt);
								unset($like_member_pc_cnt);
								unset($like_member_mobile_cnt);
								unset($like_member_total_cnt);


//								$total_tracking_pc_cnt = 0;
//								$total_tracking_mobile_cnt = 0;
								$total_tracking_cnt = 0;
								

								while ($tracking_daily_data = mysqli_fetch_array($tracking_res))
								{
									$gubun_name[]			= $tracking_daily_data['tracking_gubun'];
									$tracking_cnt[]			= $tracking_daily_data['t_cnt'];
									$tracking_pc_query		= "SELECT * FROM tracking_info WHERE 1 AND tracking_date LIKE  '%".$daily_date."%' AND tracking_gubun='PC' ";
									$tracking_pc_count		= mysqli_num_rows(mysqli_query($my_db, $tracking_pc_query));
									$tracking_mobile_query	= "SELECT * FROM tracking_info WHERE 1 AND tracking_date LIKE  '%".$daily_date."%' AND tracking_gubun='MOBILE'";
									$tracking_mobile_count	= mysqli_num_rows(mysqli_query($my_db, $tracking_mobile_query));

									$tracking_pc_cnt[]		= $tracking_pc_count;
									$tracking_mobile_cnt[]	= $tracking_mobile_count;
									$tracking_total_cnt[]	= $tracking_pc_count + $tracking_mobile_count;
//									$all_total_tracking_cnt += $tracking_total_cnt[0];
								}
								
								while ($member_daily_data = mysqli_fetch_array($member_res))
								{
									$member_cnt[]			= $member_daily_data['m_cnt'];
									$member_pc_query		= "SELECT * FROM member_info WHERE 1 AND mb_regdate LIKE  '%".$daily_date."%' AND mb_gubun='PC' ";
									$member_pc_count		= mysqli_num_rows(mysqli_query($my_db, $member_pc_query));
									$member_mobile_query	= "SELECT * FROM member_info WHERE 1 AND mb_regdate LIKE  '%".$daily_date."%' AND mb_gubun='MOBILE'";
									$member_mobile_count	= mysqli_num_rows(mysqli_query($my_db, $member_mobile_query));

									$member_pc_cnt[]		= $member_pc_count;
									$member_mobile_cnt[]	= $member_mobile_count;
									$member_total_cnt[]		= $member_pc_count + $member_mobile_count;
								}
																	   
							   while ($like_member_daily_data = mysqli_fetch_array($like_member_res))
							   {
								   $like_member_cnt[]			= $like_member_daily_data['m_l_cnt'];
								   $like_member_pc_query		= "SELECT * FROM member_info_like WHERE 1 AND mb_like_regdate LIKE  '%".$daily_date."%' AND mb_like_gubun='PC' ";
								   $like_member_pc_count		= mysqli_num_rows(mysqli_query($my_db, $like_member_pc_query));
								   $like_member_mobile_query	= "SELECT * FROM member_info_like WHERE 1 AND mb_like_regdate LIKE  '%".$daily_date."%' AND mb_like_gubun='MOBILE'";
								   $like_member_mobile_count	= mysqli_num_rows(mysqli_query($my_db, $like_member_mobile_query));

								   $like_member_pc_cnt[]		= $like_member_pc_count;
//								   print_r($like_member_pc_cnt);
								   $like_member_mobile_cnt[]	= $like_member_mobile_count;
								   $like_member_total_cnt[]		= $like_member_pc_count + $like_member_mobile_count;
							   }

								$rowspan_cnt =  count($gubun_name);
								$i = 0;
								foreach($gubun_name as $key => $val)
								{
								?>
								<tr class="target">
									<?
									if ($i == 0)
									{
									?>
									<td rowspan="<?=$rowspan_cnt?>">
										<?php echo $daily_date?>

<!--
										<a id="excelDown" href="excel_download_tracking.php?date=<?=$daily_date?>">
											<span>엑셀 다운로드</span>
										</a> 
-->

									</td>
									<?
									}
									?>
									<td>
										<?=$val?>
									</td>
									<td>
									<? 
										if($val == "PC") {
											echo number_format($tracking_pc_cnt[$i]);
											$all_total_tracking_cnt += $tracking_total_cnt[$i];
										} else {
											echo number_format($tracking_mobile_cnt[$i]);
										}
									?>
									</td>
									<td>
									<?
										if($val == "PC") {
											echo number_format($member_pc_cnt[0]);
											$all_total_member_cnt += $member_total_cnt[0];
										} else {
											echo number_format($member_mobile_cnt[0]);
										}
									?>
									</td>
									<td>
									<?
										if($val == "PC") {
//											print_r($i);
											echo number_format($like_member_pc_cnt[0]);
											$all_total_like_member_cnt += $like_member_total_cnt[0];
										} else {
											echo number_format($like_member_mobile_cnt[0]);
										}
									?>
									</td>
									<!-- <td><?=number_format($pc_unique_cnt[$i])?></td>
									<td><?=number_format($mobile_unique_cnt[$i])?></td> -->
									<!-- <?=number_format($media_unique_cnt[$i])?></td> -->
								</tr>
								<?php
//										$total_media_cnt += $total_cnt[$i];
//									 $total_unique_media_cnt += $media_unique_cnt[$i];
//									$total_pc_cnt += $pc_cnt[$i];
									// $total_unique_mobile_cnt += $mobile_unique_cnt[$i];
									// $total_unique_pc_cnt += $pc_unique_cnt[$i];
									$i++;
								}
//								$pc_total_all += $total_pc_cnt;
//								$mobile_total_all += $total_mobile_cnt;
//								$all_total += $total_pc_cnt+$total_mobile_cnt;
								?>
								<tr bgcolor="skyblue" class="date-end">
									<td colspan="2">합계</td>
									<td>
										<?php echo number_format($tracking_total_cnt[0])?>
									</td>
									<td>
										<?php echo number_format($member_total_cnt[0])?>
									</td>
									<td>
										<?php echo number_format($like_member_total_cnt[0])?>
									</td>
									<!-- <td><?php echo number_format($total_unique_pc_cnt)?></td> -->
									<!-- <td><?php echo number_format($total_unique_mobile_cnt)?></td> -->
									<!-- ." / IP기준 유니크 : ".$total_unique_media_cnt  -->
								</tr>

								<?
							}
								?>
							</tbody>
							<div class="total-wrap" style="float: right; background: lightgrey; padding: 20px; margin-bottom: 10px;">
								<?
								echo "<span style='display:inline-block; margin-right:10px;'>유입 토탈: ".$all_total_tracking_cnt."</span>";
								echo "<span style='display:inline-block; margin-right:10px;'>사행시 참여 토탈: ".$all_total_member_cnt."</span>";
								echo "<span style='display:inline-block; margin-right:10px;'>좋아요 참여 토탈: ".$all_total_like_member_cnt."</span>";
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
</body>

</html>