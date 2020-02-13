<?
    include_once "../include/autoload.php";

    $mnv_f 			= new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $mobileYN      = $mnv_f->MobileCheck();
    // $obYN          = $mnv_f->BrowserCheck();
    // $IEYN          = $mnv_f->IECheck();
    // $SafariYN          = $mnv_f->SafariCheck();
    // print_r($_SERVER["HTTP_USER_AGENT"]);
    // $_SESSION['ss_adkey']	= $adkey;

	// $userIP		= $mnv_f->getIP();
	$siteURL = parse_url($mnv_f->siteURL());
    if ($mobileYN == "MOBILE")
    {
		if(isset($siteURL['query'])) {
			echo "<script>location.href='../m/en/?".$siteURL['query']."';</script>";
		} else {
			echo "<script>location.href='../m/en/';</script>";
		}
    }else{
		$saveMedia     = $mnv_f->SaveMedia();
		$rs_tracking   = $mnv_f->InsertTrackingInfo($mobileYN);
		// print_r($rs_tracking);
    }
?>
<!DOCTYPE html>
<html lang="en" class="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<meta property="og:title" content="Hyundai Motorstudio – Explore the possibilities" />
		<meta property="og:url" content="http://www.hyundaimotorstudio.co.kr/en/" />
		<meta property="og:image" content="http://www.hyundaimotorstudio.co.kr/images/share_img.jpg" />
		<meta property="og:description" content="Possibilities? Who doesn’t have’em? But have you explored and discovered? Explore the Possibilities Hyundai Motorstudio" />
		<title>HYUNDAI MOTOR STUDIO</title>
		<link type="image/icon" rel="shortcut icon" href="http://www.hyundaimotorstudio.co.kr/images/favi_HMS.ico" />
		<link rel="stylesheet" href="../css/reset.css">
		<link rel="stylesheet" href="../css/font.css">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
		<link rel="stylesheet" href="../lib/videojs/videojs.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="../lib/jquery-3.3.1.min.js"></script>
		<script src="../js/main.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script type="text/javascript" src="../js/clipboard.min.js"></script>
		<script src="../lib/videojs/videojs.js"></script>
		<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131000832-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-131000832-1');
		</script>
	</head>

	<body>
		<div class="wrap">
			<div class="header-wrap">
				<div class="inner">
					<h1 class="header-logo">
						<a href="/en/">
							<img src="../images/logo.svg" alt="HYUNDAI MOTORSTUDIO">
						</a>
					</h1>
					<div class="action-wrap">
						<div class="lang-box">
							<a href="../?<?=$siteURL['query']?>" onclick="click_tracking('영문/한국어사이트');gtag('event','언어변경',{'event_category':'언어변경','event_label':'kr'});">KR</a>
							<span>/</span>
							<a href="javascript:void(0)" class="is-active" onclick="click_tracking('영문/영어사이트');gtag('event','언어변경',{'event_category':'언어변경','event_label':'en'});">EN</a>
						</div>
						<div class="js-burger-trigger"></div>
						<div id="gnb" class="burger-ui">
							<div class="line _1"></div>
							<div class="line _2"></div>
							<div class="line _3"></div>
						</div>
						<div class="burger-close">
							<div class="line _1"></div>
							<div class="line _2"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="menu-layer">
				<div class="spread-layer">
					<div class="row">
						<a href="javascript:void(0)" onclick="movePage(1);click_tracking('영문/이동 CAMPAIGN FILM');gtag('event','메뉴이동',{'event_category':'메뉴이동','event_label':'campaign film'});">CAMPAIGN FILM</a>
					</div>
					<div class="row">
						<a href="javascript:void(0)" onclick="movePage(2);click_tracking('영문/이동 EVENT');gtag('event','메뉴이동',{'event_category':'메뉴이동','event_label':'event'});">EVENT</a>
					</div>
					<div class="row">
						<a href="javascript:void(0)" onclick="movePage(3);click_tracking('영문/이동 EXPLORE THE POSSIBILITIES');gtag('event','메뉴이동',{'event_category':'메뉴이동','event_label':'explore the possibilities'});">EXPLORE THE POSSIBILITIES</a>
					</div>
					<div class="row">
						<a href="javascript:void(0)" onclick="movePage(4);click_tracking('영문/이동 HYUNDAI MOTORSTUDIO');gtag('event','메뉴이동',{'event_category':'메뉴이동','event_label':'hyundai motorstudio'});">HYUNDAI MOTORSTUDIO</a>
					</div>
					<div class="row share">
						<a href="javascript:void(0)" class="fb" onclick="click_tracking('영문/공유 페이스북');sns_share('fb');gtag('event','공유',{'event_category':'메인공유','event_label':'페이스북'});"></a>
						<a href="javascript:void(0)" class="kt" onclick="click_tracking('영문/공유 카카오톡');sns_share('kt');gtag('event','공유',{'event_category':'메인공유','event_label':'카카오톡'});"></a>
						<a href="javascript:void(0)" class="ks" onclick="click_tracking('영문/공유 카카오스토리');sns_share('ks');gtag('event','공유',{'event_category':'메인공유','event_label':'카카오스토리'});"></a>
						<a href="javascript:void(0)" class="url" id="copyUrl" onclick="click_tracking('영문/공유 URL');gtag('event','공유',{'event_category':'메인공유','event_label':'URL 복사'});"></a>
					</div>
				</div>
			</div>
			<div class="section1-wrap">
				<div class="inner">
					<div class="video-thumb-layer">
						<div class="wrapper">
							<div class="title-wrap">
								<h1>Explore</h1>
								<h1>the possibilities</h1>
								<!-- <h3>당신의 가능성을 실험하라</h3> -->
							</div>
							<div class="button-wrap">
								<button type="button" class="btn-watch" onclick="viewVideo();click_tracking('영문/풀 영상 보기');gtag('event','영상재생',{'event_category':'메인영상재생','event_label':'메인영상재생'});">
                                    <p>Watch</p>
									<p>Full Version</p>
								</button>
								<div class="btn-video-share">
									<div class="share-list">
										<a href="javascript:void(0)" onclick="sns_yt_share('fb');click_tracking('영문/공유 유튜브 페이스북');gtag('event','공유',{'event_category':'유튜브공유','event_label':'페이스북'});">
											<img src="../images/FB_icon.png" alt="">
										</a>
										<a href="javascript:void(0)" onclick="sns_yt_share('kt');click_tracking('영문/공유 유튜브 카카오톡');gtag('event','공유',{'event_category':'유튜브공유','event_label':'카카오톡'});">
											<img src="../images/kakaot_icon.png" alt="">
										</a>
										<a href="javascript:void(0)" onclick="sns_yt_share('ks');click_tracking('영문/공유 유튜브 카카오스토리');gtag('event','공유',{'event_category':'유튜브공유','event_label':'카카오스토리'});">
											<img src="../images/kakaos_icon.png" alt="">
										</a>
										<a href="javascript:void(0)" id="copyYtUrl" onclick="click_tracking('영문/공유 유튜브 URL');gtag('event','공유',{'event_category':'유튜브공유','event_label':'URL 복사'});">
											<img src="../images/URL_icon.png" alt="">
										</a>
									</div>
									<button type="button" class="share-toggle">
										<img src="../images/shareicon_PC.png" alt="">
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="video-layer">
						<video id="video_html5_api" class="video-js" preload="auto" data-setup='{}'>
							<source src='../images/hyundaimotorstudio_eng.mp4' type='video/mp4' />
						</video>
					</div>
				</div>
			</div>
			<div class="section2-wrap">
				<div class="inner">
					<div class="title-wrap">
						<div class="title">
							<h1>EVENT</h1>
						</div>
						<div class="sub-title">
                            <span>It’s time to explore your possibilities!</span>
                            <span>We invite you to explore the possibilities at</span>
                            <span>Hyundai Motorstudio Seoul/Moscow/Beijing</span>
						</div>
					</div>
					<div class="how">
                        <h3>To Participate</h3>
						<h4 class="sub-1">1.Capture the moment where you explore the possibilities</h4>
						<h4 class="sub-2">2.Add hashtags of one of three cities Hyundai Motorstudio is located<span class="hashtags">#seoul #moscow #beijing</span></h4>
						<h4 class="sub-3">3.Post pics or vids on Instagram <b>publicly</b> with the essential hashtags<span class="hashtags">#explorethepossibilities #hyundaimotorstudio</span></h4>
						<div class="underline"></div>
						<h4>Example</h4>
						<h4 class="hashtags">#explorethepossibilities #hyundaimotorstudio #seoul</h4>
					</div>
					<button type="button" id="copyHashtag" onclick="click_tracking('영문/복사 해시태그');gtag('event','해시태그복사',{'event_category':'해시태그복사','event_label':'해시태그복사'});">Copy essential hashtags</button>
					<div class="prize">
						<div class="_1">
							<h3 class="tt"><b>Winner</b><br>Flight tickets to Hyundai Motorstudio<br>(5 Persons / 2 tickets per person)</h3>
							<!-- <span>Flight tickets to one of three</span>
							<span>Hyundai Motorstudio cities</span>
							<span>(2 tickets per person)</span> -->
							<div class="img-wrap">
								<img src="../images/prize_img_1.png" alt="">
							</div>
							<!-- <span style="font-size:15px;line-height:16px">* Flight schedule is limited to from February 11st to June 1st.<br>Further information and instruction will be followed.</span> -->
						</div>
						<div class="_2">
							<h3 class="tt"><b>2nd Place</b><br>iPad Pro<br>(3 Persons)</h3>
							<div class="img-wrap">
								<img src="../images/prize_img_2.jpg" alt="">
							</div>
							<span>* 12.9 iPad Pro WiFi + Cellular 256GB</span>
						</div>
						<div class="_3" style="margin-top:10px">
							<h3 class="tt"><b>3rd Place</b><br>Starbucks Gift Certificate<br>(30 Persons)</h3>
							<div class="img-wrap">
								<img src="../images/prize_img_3.png" alt="">
							</div>
							<span>*Korean market only</span>
						</div>
						<div class="_4" style="margin-top:10px">
							<!-- <h3 class="tt"><b>Consolation Prize</b><br>An invitation for the main exhibit<br>@ Hyundai Motorstudio GOYANG<br> (100 Persons / 2 tickets per person)</h3> -->
							<h3 class="tt"><b>Consolation Prize</b><br>Invitation ticket for the main exhibit<br>@ Hyundai Motorstudio GOYANG<br> (100 Persons / 2 tickets per person)</h3>
							<!-- <span>An invitation for the main exhibit</span>
							<span>@ Hyundai Motorstudio GOYANG</span>
							<span>(2 tickets per person)</span> -->
							<div class="img-wrap">
								<img src="../images/prize_img_4.jpg" alt="">
							</div>
						</div>
						<div class="underline"></div>
					</div>
					<div class="date-winner">
						<h3 class="tt">Entry Period</h3>
						<h4>2018.12.18(TUE) ~ 2019.01.20(SUN)</h4>
					</div>
					<div class="winner-ann">
						<h3 class="tt">Winners Announcement</h3>
						<span style="margin-bottom: 11px;">After 2019.1.28(MON)</span>
						<span>* Winners will be notified via direct message from</span>
						<span>the official Hyundai Motorstudio Instagram account (@hyundaimotorstudio)</span>
					</div>
					<button class="check-winner-btn" data-popup="#popup-winner-list">
						Check Out Winners
					</button>
					<div class="instagram">
<!--
						<div class="guide">
							Entries will be displayed on this web site, updated every weekday at 1PM (KST)
						</div>
-->
						<!-- 어트랙트 API 적용해야 할 부분 -->
<!--
						<script type="text/javascript">
							(function(d, s) {
								var j, e = d.getElementsByTagName(s)[0], h = "https://cdn.attractt.com/embed/dist/js/tower/tower.min.js";
								if (typeof AttracttTower === "function" || e.src === h) { return; }
								j = d.createElement(s);
								j.src = h;
								j.async = true;
								e.parentNode.insertBefore(j, e);
							})(document, "script");
						</script>
						<div class="insta-area">
							<div class="attractt-container" data-idx="0" data-code="Gh1lNqbvXUKBnab" data-board="grid"></div>
						</div>
-->
						<div class="notice">
							<h3>Official Rules</h3>
							<div class="text-wrap">
								<h4>· Potential winner(s) will be notified via direct message & he/she will have 5 days from notification to respond to Sponsor.
									(a) to abide by these rules & decisions of Hyundai Motors (“Sponsor”);
									(b) to release, discharge & hold harmless Sponsor from any & all injuries, liability,
									losses & damages of any kind to persons, including death, or property resulting from entrant’s participation in the contest or the acceptance or use of any prize;
									and (c) to be financially responsible for any and all expenses, costs arising out of or resulting from the use of any prize.</h4>
								<h4>· Flight schedule is limited to from February 11st to June 1st.Further information and instruction will be followed.</h4>
								<h4>· All contest details all prize details(including flight ticket) are at Sponsor’s sole discretion.</h4>
								<h4>· Entry must be entrant’s original work and not be offensive, hateful, inappropriate or disparage.</h4>
								<h4>· Entry must not defame or violate or infringe upon the rights of any person or entity.</h4>
								<h4>· Persons who abuse any aspect of the contest or Sponsor’s social media account. or who are in violation of these rules, as solely determined by Sponsor, will be disqualified & all associated entries will be void.</h4>
								<h4>· Entrants may submit multiple entries, but Sponsor reserves the right to limit one prize per person.</h4>
								<h4>· Winners must not substitute, assign or transfer prize to others.</h4>
								<h4>· Winners are responsible for all federal, state & local taxes for prizes over KOR \ 50,000.</h4>
								<h4>· Potential winner(s) will be notified via direct message & he/she will have 5 days from notification to respond to Sponsor.</h4>
							</div>
							<div class="fadeOut"></div>
						</div>
						<button type="button" class="notice-more" onclick="click_tracking('영문/유의사항 더보기');gtag('event','유의사항토글',{'event_category':'유의사항토글','event_label':'유의사항토글'});">+</button>
						<div class="underline"></div>
					</div>
					<div class="contents">
						<div class="block _1">
							<div class="row _1">
								<div class="col _left">
									<div class="desc">
										<div class="wrap">
											<h3>EXPERIENCE</h3>
                                            <h4>Look, listen and feel.</h4>
            								<h4>Experience yourself to discover the possibilities.</h4>
										</div>
									</div>
								</div>
								<div class="col _right">
									<div class="image-1">
										<img src="../images/experience_image2.png" alt="">
									</div>
								</div>
							</div>
							<div class="row _2">
								<div class="col _left">
									<div class="image-2">
										<img src="../images/experience_image1.png" alt="">
									</div>
								</div>
								<div class="col _right">
									<div class="image-3">
										<img src="../images/experience_image3.png" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="block _2">
							<div class="row _1">
								<div class="col _left">
									<div class="image-1">
										<img src="../images/experiment_image1.png" alt="">
									</div>
								</div>
								<div class="col _right">
									<div class="desc">
										<div class="wrap">
											<h3>EXPERIMENT</h3>
                                            <h4>A great change is made by small tries.</h4>
                                            <h4>Don’t fear. Simply experiment.</h4>
										</div>
									</div>
									<div class="image-2">
										<img src="../images/experiment_image2.png" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="block _3">
							<div class="row _1">
								<div class="col _left">
									<div class="image-1">
										<img src="../images/explore_image1.png" alt="">
									</div>
									<div class="desc">
										<div class="wrap">
											<h3>EXPLORE</h3>
                                            <h4>At Hyundai Motorstudio,</h4>
                                            <h4>experience, experiment and explore your possibilities.</h4>
										</div>
									</div>
								</div>
								<div class="col _right">
									<div class="image-2">
										<img src="../images/explore_image2.png" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="slider">
						<div class="title">
							<img src="../images/logo.svg" alt="">
						</div>
						<div class="sub-title">
							<h3>A creative, experimental space for new mobility culture</h3>
						</div>
						<div class="studio-slide">
							<div class="prev">
								<button type="button" class="prev-btn">
									<img src="../images/arrow_prev.png" alt="">
								</button>
							</div>
							<div class="slider-area">
                                <div>
									<a href="http://motorstudio.hyundai.com/goyang/at/info.do" target="_blank" onclick="click_tracking('영문/슬라이더 고양스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_고양','event_label':'거점이동_고양'});">
										<img src="../images/studio_slide1.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.com/kr/ko/brand/motorstudio/seoul/overview.html" target="_blank" onclick="click_tracking('영문/슬라이더 서울스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_서울','event_label':'거점이동_서울'});">
										<img src="../images/studio_slide2.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.com/kr/ko/brand/motorstudio/hanam" target="_blank" onclick="click_tracking('영문/슬라이더 하남스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_하남','event_label':'거점이동_하남'});">
										<img src="../images/studio_slide3.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.com/kr/ko/brand/motorstudio/digital" target="_blank" onclick="click_tracking('영문/슬라이더 디지털스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_디지털','event_label':'거점이동_디지털'});">
										<img src="../images/studio_slide4.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.com/kr/ko/brand/motorstudio/beijing" target="_blank" onclick="click_tracking('영문/슬라이더 베이징스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_베이징','event_label':'거점이동_베이징'});">
										<img src="../images/studio_slide5.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.ru/motorstudio_moscow" target="_blank" onclick="click_tracking('영문/슬라이더 모스크바스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_모스크바','event_label':'거점이동_모스크바'});">
										<img src="../images/studio_slide6.jpg" alt="">
									</a>
								</div>
							</div>
							<div class="next">
								<button type="button" class="next-btn">
									<img src="../images/arrow_next.png" alt="">
								</button>
							</div>
						</div>
						<div class="desc" id="desc_txt">
                            <h2>Hyundai Motorstudio GOYANG</h2>
							<h4 class="_1">We invite you on a new automotive journey</h4>
							<h4 class="_2">with experiences you can see, hear and touch.</h4>
						</div>
					</div>
					<button type="button" id="btn-go-top">
						<img src="../images/btn_top.png" alt="">
					</button>
				</div>
			</div>
			<div class="footer-wrap">
				<div class="logo">
					<img src="../images/logo_grey.png" alt="HYUNDAI MOTORSTUDIO">
				</div>
				<div class="right-wrap">
					<div class="official">
						<a href="https://www.facebook.com/hyundaimotorstudio/" target="_blank" class="fb" onclick="click_tracking('영문/외부링크 오피셜페이스북');gtag('event','아웃링크',{'event_category':'오피셜페이스북','event_label':'오피셜페이스북'});">
							<img src="../images/official_fb.png" alt="">
						</a>
						<a href="https://www.instagram.com/hyundai_motorstudio/" target="_blank" class="insta" onclick="click_tracking('영문/외부링크 오피셜인스타그램');gtag('event','아웃링크',{'event_category':'오피셜인스타그램','event_label':'오피셜인스타그램'});">
							<img src="../images/official_insta.png" alt="">
						</a>
						<a href="https://www.youtube.com/user/AboutHyundai" target="_blank" class="youtube" onclick="click_tracking('영문/외부링크 오피셜유튜브');gtag('event','아웃링크',{'event_category':'오피셜유튜브','event_label':'오피셜유튜브'});">
							<img src="../images/official_youtube.png" alt="">
						</a>
						<a href="https://www.youtube.com/user/HyundaiWorldwide" target="_blank" class="youtube-global" onclick="click_tracking('영문/외부링크 글로벌유튜브');gtag('event','아웃링크',{'event_category':'오피셜글로벌유튜브','event_label':'오피셜글로벌유튜브'});">
							<img src="../images/official_youtube_global.png" alt="">
						</a>
						<a href="https://story.kakao.com/ch/hyundai" target="_blank" class="ks" onclick="click_tracking('영문/외부링크 오피셜카카오스토리');gtag('event','아웃링크',{'event_category':'오피셜카카오스토리','event_label':'오피셜카카오스토리'});">
							<img src="../images/official_ks.png" alt="">
						</a>
					</div>
					<div class="copyright">
						COPYRIGHT ⓒ HYUNDAI MOTOR COMPANY.ALL RIGHTS RESERVED.
					</div>
				</div>
			</div>
		</div>
<?
	include_once "./popup.html";
?>
		<script>
			Kakao.init('4c427a5ce63de0aa9cd687ca856d3ab8');
			var studioSlider = $('.slider-area');
			studioSlider.on('init', function() {
				arrowPositioning();
			});
			$(document).ready(function() {
				studioSlider.slick({
					slidesToShow: 3,
	//				slidesToScroll: 1,
					dots: false,
					arrows: false,
					draggable: false,
	//				swipe: true,
	//				touchMove: true,
					speed: 500,
					cssEase: 'ease-in',
					centerMode: true,
					ceterPadding: '7px',
                });
                $("#btn-view-more").html("MORE");
			});
			function arrowPositioning() {
				var leftPosition = (studioSlider.width()/2)-($('.slick-center').width()/2+15);
				var rightPosition = (studioSlider.width()/2)-($('.slick-center').width()/2+15);
				$('.studio-slide .prev').css({
					left: leftPosition
				});
				$('.studio-slide .next').css({
					right: rightPosition
				});
			}
			$(window).on('resize', function() {
				arrowPositioning();
			});
			$(".prev-btn").on("click", function() {
				studioSlider.slick("slickPrev");
			});
			$(".next-btn").on("click", function() {
				studioSlider.slick("slickNext");
			});
			$('#btn-go-top').on('click', function() {
				$('html, body').animate({
					scrollTop: 0
				}, 1000);
			});
			studioSlider.on('afterChange', function(event, slick, currentSlide) {
				switch (currentSlide) {
                    case 0:
                        $("#desc_txt h2").html("Hyundai Motorstudio GOYANG");
                        $("#desc_txt ._1").html("We invite you on a new automotive journey");
                        $("#desc_txt ._2").html("with experiences you can see, hear and touch.");
                        break;
                    case 1:
                        $("#desc_txt h2").html("Hyundai Motorstudio SEOUL");
                        $("#desc_txt ._1").html("We talk car culture beyond transportation.");
                        $("#desc_txt ._2").html("We create a new automotive lifestyle.");
                        break;
                    case 2:
                    $("#desc_txt h2").html("Hyundai Motorstudio HANAM");
                        $("#desc_txt ._1").html("We invite you to explore and experience");
                        $("#desc_txt ._2").html("the future vision of mobility.");
                        break;
                    case 3:
                    $("#desc_txt h2").html("Hyundai Motorstudio DIGITAL");
                        $("#desc_txt ._1").html("We encourage you to witness the beginning of");
                        $("#desc_txt ._2").html("the new car experience in a virtual world.");
                        break;
                    case 4:
                    $("#desc_txt h2").html("Hyundai Motorstudio BEIJING");
                        $("#desc_txt ._1").html("We communicate with customers");
                        $("#desc_txt ._2").html("through creative thinking and art.");
                        break;
                    case 5:
                    $("#desc_txt h2").html("Hyundai Motorstudio MOSCOW");
                        $("#desc_txt ._1").html("We welcome you to a space where inspiration");
                        $("#desc_txt ._2").html("and innovation unfold.");
                        break;
				}
			});

			$("#copyHashtag").on("click", function() {
				var textarea = document.createElement('textarea');
				textarea.textContent = '#explorethepossibilities #hyundaimotorstudio';
				document.body.appendChild(textarea);

				var selection = document.getSelection();
				var range = document.createRange();
				//  range.selectNodeContents(textarea);
				range.selectNode(textarea);
				selection.removeAllRanges();
				selection.addRange(range);

				console.log('copy success', document.execCommand('copy'));
				selection.removeAllRanges();

				document.body.removeChild(textarea);
				alert("Hashtags Copied");
			});

			$("#copyUrl").on("click", function() {
				var textarea = document.createElement('textarea');
				textarea.textContent = 'http://www.hyundaimotorstudio.co.kr/en/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=url';
				document.body.appendChild(textarea);

				var selection = document.getSelection();
				var range = document.createRange();
				//  range.selectNodeContents(textarea);
				range.selectNode(textarea);
				selection.removeAllRanges();
				selection.addRange(range);

				console.log('copy success', document.execCommand('copy'));
				selection.removeAllRanges();

				document.body.removeChild(textarea);
				alert("URL Copied");
			});
		
			$("#copyYtUrl").on("click", function() {
				var textarea = document.createElement('textarea');
				textarea.textContent = 'https://www.youtube.com/watch?v=4Qol9zfQ61w';
				document.body.appendChild(textarea);

				var selection = document.getSelection();
				var range = document.createRange();
				//  range.selectNodeContents(textarea);
				range.selectNode(textarea);
				selection.removeAllRanges();
				selection.addRange(range);

				console.log('copy success', document.execCommand('copy'));
				selection.removeAllRanges();

				document.body.removeChild(textarea);
				alert("Youtube Link Copied");
			});
			$('.js-burger-trigger').on('click', function() {
				$('body').toggleClass('menu-open');
			});
			function movePage(section) {
				$('body').removeClass('menu-open');
				switch(section) {
					case 1 :
						$('html, body').animate({scrollTop: 0}, 1000);
					break;
					case 2 :
						$('html, body').animate({scrollTop: $('.section2-wrap').offset().top - 57}, 1000);
					break;
					case 3 :
						$('html, body').animate({scrollTop: $('.section2-wrap .contents').offset().top -67}, 1000);
					break;
					case 4 :
						$('html, body').animate({scrollTop: $('.section2-wrap .slider').offset().top - 100}, 1000);
					break;
				}
			}
			
			var options = {};

			var player = videojs('video_html5_api', options, function onPlayerReady() {
				videojs.log('Your player is ready!');

				// In this context, `this` is the player that was created by Video.js.
				// this.play();
				// this.isFullscreen(true);
				this.loop(true);
				// this.videoWidth($(window).width());
				this.controls(true);
				// this.fluid(true);
				// How about an event listener?
				this.on('ended', function() {
					// videojs.log('Awww...over so soon?!');
				});
			});
			function viewVideo() {
				$(".video-thumb-layer").hide();
				$(".video-layer").show().css('z-index', 1);
				player.play();			
			}

			function toggleVideo() {
				if (player.paused()) {
					player.play();
					videojs.log('Your player is play!');
				} else {
					player.pause();
					videojs.log('Your player is pause!');
				}
			}
//			$('.video-layer').on('click', function() {
//				// player.trigger('click');
//				if (player.paused()) {
//					player.play();
//					videojs.log('Your player is play!');
//				} else {
//					player.pause();
//					videojs.log('Your player is pause!');
//				}
//
//			});

			function click_tracking(click_name)
			{
				$.ajax({
					type   : "POST",
					async  : false,
					url    : "../main_exec.php",
					data:{
						"exec" 			: "insert_click_info",
						"click_name"	: click_name
					}
				});
			}
			var moreFlag = 0;
			$('.notice-more').on('click', function() {
				if (moreFlag == 0) {
					$(".fadeOut").remove();
					$(".instagram .text-wrap").css("height","100%");
					$(this).html("-");
					moreFlag = 1;
				}else{
					$(".instagram .text-wrap").append("<div class='fadeOut'></div>");
					$(".instagram .text-wrap").css("height","90px");
					$(this).html("+");
					moreFlag = 0;
				}
			});

			function sns_share(media) {
				switch (media) {
					case "fb" :
						var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.hyundaimotorstudio.co.kr/en/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=facebook'),'sharer','toolbar=0,status=0,width=600,height=325');
					break;
					case "ks" :
						Kakao.Story.share({
							url: 'http://www.hyundaimotorstudio.co.kr/en/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaostory',
							text: 'Possibilities? Who doesn’t have’em? But have you explored and discovered?\nExplore the Possibilities\nHyundai Motorstudio'
						});
					break;
					case "kt" :
						Kakao.Link.sendDefault({
							objectType: 'feed',
							content: {
								title: "Hyundai Motorstudio – Explore the possibilities",
								description: "Possibilities? Who doesn’t have’em? But have you explored and discovered?\nExplore the Possibilities\nHyundai Motorstudio",
								imageUrl: "http://www.hyundaimotorstudio.co.kr/images/share_kt_img.png",
								link: {
									mobileWebUrl: 'http://www.hyundaimotorstudio.co.kr/m/en/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaotalk',
									webUrl: 'http://www.hyundaimotorstudio.co.kr/en/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaotalk'
								}
							},
							buttons: [
								{
									title: 'Hyundai Motorstudio',
									link: {
										mobileWebUrl: 'http://www.hyundaimotorstudio.co.kr/m/en/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaotalk',
										webUrl: 'http://www.hyundaimotorstudio.co.kr/en/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaotalk'
									}
								}
							],
							success: function(res) {
								console.log("success");
								console.log(res);
							},
							fail: function(res) {
								console.log("fail");
								console.log(res);
							},
							callback: function() {
								// shareEnd();
							}
						});
					break;
					case "url" :
						var textarea2 = document.createElement('textarea');
						textarea2.textContent = 'http://www.hyundaimotorstudio.co.kr/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=url';
						document.body.appendChild(textarea2);

						var selection = document.getSelection();
						var range = document.createRange();
						//  range.selectNodeContents(textarea);
						range.selectNode(textarea2);
						selection.removeAllRanges();
						selection.addRange(range);

						selection.removeAllRanges();

						document.body.removeChild(textarea2);
						alert("URL이 복사되었습니다");
					break;
				}
			}
			function sns_yt_share(media) {
				switch (media) {
					case "fb" :
						var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('https://www.youtube.com/watch?v=4Qol9zfQ61w'),'sharer','toolbar=0,status=0,width=600,height=325');
					break;
					case "ks" :
						Kakao.Story.share({
							url: 'https://www.youtube.com/watch?v=4Qol9zfQ61w',
							text: 'Possibilities? Who doesn’t have’em? But have you explored and discovered?\nExplore the Possibilities\nHyundai Motorstudio'
						});
					break;
					case "kt" :
						Kakao.Link.sendDefault({
							objectType: 'feed',
							content: {
								title: "Hyundai Motorstudio – Explore the possibilities",
								description: "Possibilities? Who doesn’t have’em? But have you explored and discovered?\nExplore the Possibilities\nHyundai Motorstudio",
								imageUrl: "http://www.hyundaimotorstudio.co.kr/images/share_kt_img.png",
								link: {
									mobileWebUrl: 'https://www.youtube.com/watch?v=4Qol9zfQ61w',
									webUrl: 'https://www.youtube.com/watch?v=4Qol9zfQ61w'
								}
							},
							buttons: [
								{
									title: 'Hyundai Motorstudio',
									link: {
										mobileWebUrl: 'https://www.youtube.com/watch?v=4Qol9zfQ61w',
										webUrl: 'https://www.youtube.com/watch?v=4Qol9zfQ61w'
									}
								}
							],
							success: function(res) {
								console.log("success");
								console.log(res);
							},
							fail: function(res) {
								console.log("fail");
								console.log(res);
							},
							callback: function() {
								// shareEnd();
							}
						});
					break;
					case "url" :
						var textarea2 = document.createElement('textarea');
						textarea2.textContent = 'http://www.hyundaimotorstudio.co.kr/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=url';
						document.body.appendChild(textarea2);

						var selection = document.getSelection();
						var range = document.createRange();
						//  range.selectNodeContents(textarea);
						range.selectNode(textarea2);
						selection.removeAllRanges();
						selection.addRange(range);

						selection.removeAllRanges();

						document.body.removeChild(textarea2);
						alert("URL이 복사되었습니다");
					break;
				}
			}

			$('.share-toggle').off().on('click', function() {
				$('.btn-video-share .share-list').toggleClass('visible');
			});
			
			$(document).ready(function() {
				// hm_studio.popup.show($('#popup-winner-list'));
			});
			$(document).on('popupOpened', function(popup) {
				if(popup.target.id == 'popup-winner-list') {
					$.each(winnerList, function(idx, val) {
						winnerList[idx].sort(compStringIgnoreCase);
					});
					$('#popup-winner-list .list-box .inner').empty();
					for(var i=0; i<winnerList[1].length; i++) {
						$('#popup-winner-list .list-box .inner').append("<span>"+replaceAsterisk(winnerList[1][i], 2)+"</span>")
					}
					function compStringIgnoreCase(a, b) {
						if (a.toLowerCase() < b.toLowerCase()) return -1;
						if (b.toLowerCase() < a.toLowerCase()) return 1;
						return 0;
					}
				}
			});
			$('#popup-winner-list .tab').on('click', function() {
				var $this = $(this);
				var idx = $(this).attr('data-idx');
				if($this.parent().hasClass('is-active'))
					return;

				// 탭 상태변화
				$this.parent().siblings().removeClass('is-active');
				$this.parent().addClass('is-active');

				// 등수 콘텐츠 변경
				$('#popup-winner-list .list-box .inner').empty();
				for(var i=0; i<winnerList[idx].length; i++) {
					$('#popup-winner-list .list-box .inner').append("<span>"+replaceAsterisk(winnerList[idx][i], 2)+"</span>")
				}
			});
			var winnerList = {
				"1": [
					"dorothy_ys",
					"0slikelife",
					"gundigi",
					"eeg_g",
					"flower_kjs"
				],
				"2": [
					"2in5in5",
					"cosmotic1214",
					"kirukk"
				],
				"3": [
					'dudwns13',
					'padammin',
					'cream.berry24',
					'sky_gazer_8',
					'__hoyanara__1231',
					'jeon_jeon2',
					'kim.heeyeon_becky',
					'_minchic_',
					'_yunanim',
					'mysoo5743',
					'Jun-45',
					'butterfly84fly',
					'hantastic.lee',
					'hongjuhyeon9496',
					'bibarot83',
					'joongpro',
					'archiensunmong',
					'Y_universeee',
					'coral0820',
					'5n_ki',
					'Skyblueberry7',
					'kimseonsaengnim',
					'byeoljhan',
					'hyeree_cha',
					'jayjaehan_kim',
					'realmook_97',
					'Corsa_882',
					'cutiegoldfish',
					'seungryol',
					'_sorrrrra'
				],
				"4": [
					'hohomom0821',
					'binni337',
					'eismfj',
					'elenawj_hong',
					'cometomecometome',
					'hyoni00208',
					'wwww0619',
					'sangyeol_jeon',
					'_dingsun_',
					'yusonika',
					'hermosojoe',
					'kunho.yoo',
					'soaksnf',
					'deagle_awp',
					'choieng82',
					'kyeomi14',
					'j_ggyu',
					'pancake.photo',
					'izigner',
					'im__kej',
					'bonnieworld94',
					'ssolarism',
					'ckhky',
					'sshifeed',
					'hyoni.style',
					'travel_ynwa',
					'chococho578',
					'star_light0807',
					'youn___',
					'ccy20000',
					'mas.quer.ade',
					'treegraseo2018',
					'royal__yy',
					'bigsmc',
					'jun0403072019',
					'kes850913',
					'alsrb789',
					'Woowoo.89',
					'rlagodyddl1234',
					'z1.moon',
					'happy.han1',
					'roeun8',
					'e0ezin',
					'gakugo',
					'wooyeongshin',
					'janghomun',
					'nonie21',
					'sghxon',
					'instar._.j',
					'fridayfrietag',
					'giwony_company',
					'elisacho',
					'ssongsister',
					'roycequan',
					'happy_jeung',
					'jinsu0131',
					'vanseojin',
					'kimjuyeon9707',
					'diver_longdaarii',
					'speak_your_mind__champions',
					'gsl4865',
					'siyoung1315',
					'ssolmi_net',
					'daehobikeceo',
					'malakhroim',
					'laypark1',
					'_yiyiyi_111',
					'pinkyaa777',
					'xkdis01',
					'byeolllll',
					'woepad',
					'kim2132',
					'happy_jthj',
					'byu312',
					'eksdhd01',
					'nyang_vv',
					'reddyo99',
					'sukchuloh',
					'greengreenoo',
					'dohyungs',
					'dragon0528',
					'shinya17s',
					'atelier_202',
					'zhddl1233',
					'hellogra__',
					'eunjung0950599',
					'thekznzl03',
					'1013grace',
					'love_minchan',
					'hunz157',
					'njellsol1',
					'ruddlf1624',
					'kcmoon73',
					'geehoongwon',
					'0928terry',
					'baggan18',
					'unnuni3',
					'naksoojung',
					'hyungjin___',
					'creka_1108'
				]
			}
			function replaceAsterisk(str, len) {
				if(str.length<2) {
					return;
				}
				var strLen = str.length,
					position = Math.floor(strLen/2),
					targetStrArr = str.split("");

				if(strLen<6) {
					position = str.length;
					targetStrArr.splice(position, len, '*');
				} else {
					targetStrArr.splice(position, len, '*','*');
				}
				var	res = targetStrArr.join("");

				return res;
			}
		</script>
	</body>

</html>