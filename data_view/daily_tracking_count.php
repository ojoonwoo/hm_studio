<?php
	// 설정파일
	include_once "../include/autoload.php";

	$mnv_f = new mnv_function();
	$my_db         = $mnv_f->Connect_MySQL();
/*
	if (isset($_SESSION['ss_mb_id']) == false)
	{
		//header('Location: index.php');
		echo "<script>location.href='index.php'</script>";
		exit;
	}
*/
	include "./head.php";

	if(isset($_REQUEST['sDate']) == false) {
		$sDate = date("Y-m-d", strtotime($day." -3 day"));
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
//		function outputExcel() {
//			location.href = "excel_download_tracking.php?sDate=" + $("#sDate").val() + "&eDate=" + $("#eDate").val();
//		}
	</script>

  <div id="page-wrapper">
    <div class="container-fluid">
    <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">캠페인 사이트 유입자 수 PC / Mobile</h1>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <div id="daily_applicant_count_div1" style="display:block">
              <table class="table table-hover">
                <thead>
                  <tr><th>날짜</th><th>utm_source</th><th>utm_medium</th><th>utm_campaign</th><th>utm_content</th><th>PC</th><th>MOBILE</th><th>UNIQUE</th></tr>
                </thead>
				  <div class="date-picker-wrap" style="float: left; margin-top: 18px;">
					  <form name="frm_execute" method="POST" onsubmit="return checkfrm()">
						  <input type="hidden" name="pg" value="<?=$pg?>">
						  <!--
<select name="search_type">
<option value="mb_name" <?php if($search_type == "mb_name"){?>selected<?php }?>>이름</option>
<option value="mb_phone" <?php if($search_type == "mb_phone"){?>selected<?php }?>>전화번호</option>
</select>
-->
						  <!--					  <input type="text" name="search_txt" value="<?php echo $search_txt?>">-->
						  <input type="text" id="sDate" class="date-input" name="sDate" value="<?=$sDate?>"> ~ <input type="text" id="eDate" class="date-input" name="eDate" value="<?=$eDate?>">
						  <input type="submit" value="검색">
						  <button type="button" onclick="resetDate()">기간 초기화</button>
						  <!-- <button type="button" onclick="outputExcel()">엑셀로 내보내기</button> -->
						  <!--
<a href="javascript:void(0)" id="excel_download_list">
<span>엑셀 다운로드</span>
</a> 
-->
					  </form>
				  </div>
                <tbody>
<?php
	$where = "";
	if ($sDate != "")
		$where	.= " AND tracking_date BETWEEN '".$sDate." 00:00:00' AND '".$eDate." 23:59:59'";
							
	$pc_total_all = 0;
	$mobile_total_all = 0;
	$unique_total = 0;
	$all_total = 0;
	$daily_date_query	= "SELECT substr(tracking_date,1,10) FROM tracking_info WHERE 1 ".$where." Group by substr(tracking_date,1,10) ORDER BY tracking_date DESC";
	$date_res			= mysqli_query($my_db, $daily_date_query);

	while($date_daily_data = mysqli_fetch_array($date_res))
	{
		$daily_date		= substr($date_daily_data['tracking_date'],0,10);
		$media_query	= "SELECT tracking_source, tracking_medium, tracking_campaign, tracking_content, COUNT(*) media_cnt FROM tracking_info WHERE 1 AND tracking_date LIKE  '%".$daily_date."%' GROUP BY tracking_source, tracking_medium, tracking_campaign, tracking_content";
		$media_res		= mysqli_query($my_db, $media_query);
		$media_cnt		= mysqli_num_rows($media_res);
		// $unique_query	= "SELECT * FROM member_info WHERE 1 AND mb_regdate LIKE  '%".$daily_date."%' GROUP BY mb_ipaddr";
		// $unique_count	= mysqli_num_rows(mysqli_query($my_db, $unique_query));
		// unset($media_name);
		// unset($media_cnt);
		// unset($pc_cnt);
		// unset($mobile_cnt);
		// unset($unique_cnt);
		$total_mobile_cnt = 0;
		$total_pc_cnt = 0;
		$total_unique_cnt = 0;
		// while ($media_daily_data = mysqli_fetch_array($media_res))
		// {
		// 	$media_name[]	= $media_daily_data['mb_media'];
		// 	$media_cnt[]	= $media_daily_data['media_cnt'];
		// 	$pc_query		= "SELECT * FROM member_info WHERE 1 AND mb_regdate LIKE  '%".$daily_date."%' AND mb_media='".$media_daily_data['mb_media']."' AND mb_gubun='PC'";
		// 	$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
		// 	$mobile_query	= "SELECT * FROM member_info WHERE 1 AND mb_regdate LIKE  '%".$daily_date."%' AND mb_media='".$media_daily_data['mb_media']."' AND mb_gubun='MOBILE'";
		// 	$mobile_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
		// 	// $unique_query	= "SELECT * FROM ".$_gl['design_info_table']." WHERE 1 AND design_regdate LIKE  '%".$daily_date."%' AND design_media='".$media_daily_data['design_media']."' GROUP BY design_ipaddr";
		// 	// $unique_count	= mysqli_num_rows(mysqli_query($my_db, $unique_query));
		// 	$pc_cnt[]		= $pc_count;
		// 	$mobile_cnt[]	= $mobile_count;
		// 	// $unique_cnt[]	= $unique_count;

		// }
		// $rowspan_cnt =  count($media_name);
		$i = 0;
		while ($media_data = mysqli_fetch_array($media_res))
		{
			$pc_query		= "SELECT * FROM tracking_info WHERE 1 AND tracking_date LIKE  '%".$daily_date."%' AND tracking_source='".$media_data['tracking_source']."' AND tracking_medium='".$media_data['tracking_medium']."' AND tracking_campaign='".$media_data['tracking_campaign']."' AND tracking_content='".$media_data['tracking_content']."' AND tracking_gubun='PC'";
			$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
			$mobile_query	= "SELECT * FROM tracking_info WHERE 1 AND tracking_date LIKE  '%".$daily_date."%' AND tracking_source='".$media_data['tracking_source']."' AND tracking_medium='".$media_data['tracking_medium']."' AND tracking_campaign='".$media_data['tracking_campaign']."' AND tracking_content='".$media_data['tracking_content']."' AND tracking_gubun='MOBILE'";
			$mobile_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
			$unique_query	= "SELECT * FROM tracking_info WHERE 1 AND tracking_rdate LIKE  '%".$daily_date."%' AND tracking_source='".$media_data['tracking_source']."' AND tracking_medium='".$media_data['tracking_medium']."' AND tracking_campaign='".$media_data['tracking_campaign']."' AND tracking_content='".$media_data['tracking_content']."' GROUP BY tracking_ipaddr";
			$unique_count	= mysqli_num_rows(mysqli_query($my_db, $unique_query));
?>
                  <tr>
<?
		if ($i == 0)
		{
?>										
										<td rowspan="<?=$media_cnt?>">
											<?php echo $daily_date?>
											<!-- <a id="excelDown" href="excel_download_member.php?date=<?=$daily_date?>">
												<span>엑셀 다운로드</span>
											</a> -->
										</td>
<?
		}
?>										
                    <td><?=$media_data["tracking_source"]?></td>
                    <td><?=$media_data["tracking_medium"]?></td>
                    <td><?=$media_data["tracking_campaign"]?></td>
                    <td><?=$media_data["tracking_content"]?></td>
                    <td><?=number_format($pc_count)?></td>
                    <td><?=number_format($mobile_count)?></td>
                    <td><?=number_format($unique_count)?></td>
                  </tr>
<?php
			$total_unique_cnt += $unique_count;
			$total_mobile_cnt += $mobile_count;
			$total_pc_cnt += $pc_count;
			$i++;
		}
		$pc_total_all += $total_pc_cnt;
		$mobile_total_all += $total_mobile_cnt;
		// $unique_total_all += $total_unique_cnt;			
		// $all_total += $total_pc_cnt+$total_mobile_cnt;
?>
                  <tr bgcolor="skyblue">
                    <td colspan="5">합계</td>
                    <td><?php echo number_format($total_pc_cnt)?></td>
                    <td><?php echo number_format($total_mobile_cnt)?></td>
                    <td><?php echo number_format($total_unique_cnt)?></td>
                    <!-- <td><?php echo number_format($total_media_cnt)?></td> -->
                  </tr>

<?
	}
	$unique_all_query	= "SELECT * FROM member_info WHERE 1 Group by mb_phone";
	$unique_all_res			= mysqli_query($my_db, $unique_all_query);
	$unique_total_all		= mysqli_num_rows($unique_all_res);

?>
                </tbody>
				<div class="total-wrap" style="float: right; background: lightgrey; padding: 20px; margin-bottom: 10px;">
				  <?
				  echo "<span style='display:inline-block; margin-right:10px;'>PC: ".$pc_total_all."</span>";
				  echo "<span style='display:inline-block; margin-right:10px;'>MOBILE: ".$mobile_total_all."</span>";
				  echo "<span style='display:inline-block; margin-right:10px;'>UNIQUE: ".$unique_total_all."</span>";
				  // echo "<span style='display:inline-block;'>TOTAL: ".$all_total."</span>";
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
