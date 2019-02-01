<?
    include_once "./include/autoload.php";

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
			echo "<script>location.href='./m/?".$siteURL['query']."';</script>";
		} else {
			echo "<script>location.href='./m/';</script>";
		}
    }else{
		$saveMedia     = $mnv_f->SaveMedia();
		$rs_tracking   = $mnv_f->InsertTrackingInfo($mobileYN);
		// print_r($rs_tracking);
    }
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<meta property="og:title" content="현대 모터스튜디오 - Explore the possibilities." />
		<meta property="og:url" content="http://www.hyundaimotorstudio.co.kr" />
		<meta property="og:image" content="http://www.hyundaimotorstudio.co.kr/images/share_img.jpg" />
		<meta property="og:description" content="가능성 없는 사람이 어딨어? 중요한 건, 그것을 발견하는가, 못 하는가. Explore the possibilities. 현대 모터스튜디오" />
		<title>현대모터스튜디오</title>
		<link type="image/icon" rel="shortcut icon" href="http://www.hyundaimotorstudio.co.kr/images/favi_HMS.ico" />
		<link rel="stylesheet" href="./css/reset.css">
		<link rel="stylesheet" href="./css/font.css">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
		<link rel="stylesheet" href="./lib/videojs/videojs.css">
		<link rel="stylesheet" href="./css/style.css">
		<script src="./lib/jquery-3.3.1.min.js"></script>
		<script src="./js/main.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script type="text/javascript" src="./js/clipboard.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js?r=9009"></script>
		<script src="./lib/videojs/videojs.js"></script>
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
						<a href="/">
							<img src="./images/logo.svg" alt="HYUNDAI MOTORSTUDIO">
						</a>
					</h1>
					<div class="action-wrap">
						<div class="lang-box">
							<a href="javascript:void(0)" class="is-active" onclick="click_tracking('국문/한국어사이트');gtag('event','언어변경',{'event_category':'언어변경','event_label':'kr'});">KR</a>
							<span>/</span>
							<a href="./en/?<?=$siteURL['query']?>" onclick="click_tracking('국문/영어사이트');gtag('event','언어변경',{'event_category':'언어변경','event_label':'en'});">EN</a>
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
						<a href="javascript:void(0)" onclick="movePage(1);click_tracking('국문/이동 CAMPAIGN FILM');gtag('event','메뉴이동',{'event_category':'메뉴이동','event_label':'campaign film'});">CAMPAIGN FILM</a>
					</div>
					<div class="row">
						<a href="javascript:void(0)" onclick="movePage(2);click_tracking('국문/이동 EVENT');gtag('event','메뉴이동',{'event_category':'메뉴이동','event_label':'event'});">EVENT</a>
					</div>
					<div class="row">
						<a href="javascript:void(0)" onclick="movePage(3);click_tracking('국문/이동 EXPLORE THE POSSIBILITIES');gtag('event','메뉴이동',{'event_category':'메뉴이동','event_label':'explore the possibilities'});">EXPLORE THE POSSIBILITIES</a>
					</div>
					<div class="row">
						<a href="javascript:void(0)" onclick="movePage(4);click_tracking('국문/이동 HYUNDAI MOTORSTUDIO');gtag('event','메뉴이동',{'event_category':'메뉴이동','event_label':'hyundai motorstudio'});">HYUNDAI MOTORSTUDIO</a>
					</div>
					<div class="row share">
						<a href="javascript:void(0)" class="fb" onclick="click_tracking('국문/공유 페이스북');sns_share('fb');gtag('event','공유',{'event_category':'메인공유','event_label':'페이스북'});"></a>
						<a href="javascript:void(0)" class="kt" onclick="click_tracking('국문/공유 카카오톡');sns_share('kt');gtag('event','공유',{'event_category':'메인공유','event_label':'카카오톡'});"></a>
						<a href="javascript:void(0)" class="ks" onclick="click_tracking('국문/공유 카카오스토리');sns_share('ks');gtag('event','공유',{'event_category':'메인공유','event_label':'카카오스토리'});"></a>
						<a href="javascript:void(0)" class="url" id="copyUrl" onclick="click_tracking('국문/공유 URL');gtag('event','공유',{'event_category':'메인공유','event_label':'URL 복사'});"></a>
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
								<h3>당신의 가능성을 탐험하라</h3>
							</div>
							<div class="button-wrap">
								<button type="button" class="btn-watch" onclick="viewVideo();click_tracking('국문/풀 영상 보기');gtag('event','영상재생',{'event_category':'메인영상재생','event_label':'메인영상재생'});">
									<p>Watch</p>
									<p>Full Version</p>
								</button>
								<div class="btn-video-share">
									<div class="share-list">
										<a href="javascript:void(0)" onclick="sns_yt_share('fb');click_tracking('국문/공유 유튜브 페이스북');gtag('event','공유',{'event_category':'유튜브공유','event_label':'페이스북'});">
											<img src="./images/FB_icon.png" alt="">
										</a>
										<a href="javascript:void(0)" onclick="sns_yt_share('kt');click_tracking('국문/공유 유튜브 카카오톡');gtag('event','공유',{'event_category':'유튜브공유','event_label':'카카오톡'});">
											<img src="./images/kakaot_icon.png" alt="">
										</a>
										<a href="javascript:void(0)" onclick="sns_yt_share('ks');click_tracking('국문/공유 유튜브 카카오스토리');gtag('event','공유',{'event_category':'유튜브공유','event_label':'카카오스토리'});">
											<img src="./images/kakaos_icon.png" alt="">
										</a>
										<a href="javascript:void(0)" id="copyYtUrl" onclick="click_tracking('국문/공유 유튜브 URL');gtag('event','공유',{'event_category':'유튜브공유','event_label':'URL 복사'});">
											<img src="./images/URL_icon.png" alt="">
										</a>
									</div>
									<button type="button" class="share-toggle" data-popup="#popup-winner-list">
										<img src="./images/shareicon_PC.png" alt="">
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="video-layer">
						<video id="video_html5_api" class="video-js" preload="auto" data-setup='{}'>
							<source src='./images/hyundaimotorstudio_kr.mp4' type='video/mp4' />
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
							<span>나만의 가능성 탐험 이벤트!</span>
							<span>현대 모터스튜디오 서울/모스크바/베이징으로 여러분을 초대합니다</span>
						</div>
					</div>
					<div class="how">
						<h3>참여방법</h3>
						<h4 class="sub-1">1.일상 속 나만의 가능성을 발견한 영상 또는 사진 찍기</h4>
						<h4 class="sub-2">2.가고 싶은 현대 모터스튜디오 도시 1곳 해시태그 하기<span class="hashtags">#서울 #모스크바 #베이징</span></h4>
						<h4 class="sub-3">3.필수 해시태그와 함께 <b>“전체공개”</b> 포스팅 하기<span class="hashtags">#가능성탐험 #현대모터스튜디오</span></h4>
						<div class="underline"></div>
						<h4>해시태그 예시</h4>
						<h4 class="hashtags">#가능성탐험 #현대모터스튜디오 #모스크바</h4>
					</div>
					<button type="button" id="copyHashtag" onclick="click_tracking('국문/복사 해시태그');gtag('event','해시태그복사',{'event_category':'해시태그복사','event_label':'해시태그복사'});">필수 해시태그 복사하기</button>
					<div class="prize">
						<div class="_1">
							<!-- <h3 class="tt"><b>1등</b><br>항공권 (5인/1인2매)</h3> -->
							<h3 class="tt"><b>1등</b><br>가고 싶은 현대 모터스튜디오로 향하는<br>항공권 (5명/1인2매)</h3>
							<!-- <span>가고 싶은 현대 모터스튜디오로 향하는</span>
							<span>항공권 (1인 2매)</span> -->
							<div class="img-wrap">
								<img src="./images/prize_img_1.png" alt="">
							</div>
							<!-- <span style="font-size:13px;line-height:16px">* 1등 항공권 당첨의 경우, 항공 일정은 2019년 2월 11일 이후 출국,<br>2019년 6월 1일 내 귀국해야 하며, 항공권 발급 관련하여 별도 안내가 있을 예정입니다.</span> -->
						</div>
						<div class="_2">
							<h3 class="tt" style="margin-bottom:46px"><b>2등</b><br>아이패드 프로 (3명)</h3>
							<div class="img-wrap">
								<img src="./images/prize_img_2.jpg" alt="">
							</div>
							<span>* 12.9형 iPad Pro WiFi + Cellular 256GB</span>
						</div>
						<div class="_3" style="margin-top:10px">
							<h3 class="tt" style="margin-bottom:46px"><b>3등</b><br>스타벅스 5만원 상품권 (30명)</h3>
							<div class="img-wrap">
								<img src="./images/prize_img_3.png" alt="">
							</div>
							<span>* 한국에서만 사용 가능</span>
						</div>
						<div class="_4" style="margin-top:10px">
							<!-- <h3 class="tt"><b>참가상</b><br>고양 상설전시 관람권(100명/1인2매)</h3> -->
							<h3 class="tt"><b>참가상</b><br>현대 모터스튜디오 고양<br>상설 전시 관람권 (100명 /1인2매)</h3>
							<!-- <span>현대 모터스튜디오 고양</span>
							<span>상설전시 관람권 (1인 2매)</span> -->
							<div class="img-wrap">
								<img src="./images/prize_img_4.jpg" alt="">
							</div>
						</div>
						<div class="underline"></div>
					</div>
					<div class="date-winner">
						<h3 class="tt">응모기간</h3>
						<h4>2018.12.18(화) ~ 2019.1.20(일)</h4>
					</div>
					<div class="winner-ann">
						<h3 class="tt">당첨자 발표</h3>
						<span style="margin-bottom: 11px;">2019.1.28(월) 이후 발표</span>
						<span>* 당첨자는 현대 모터스튜디오 공식 인스타그램 계정</span>
						<span>(@hyundaimotorstudio)에서 개별 DM을 드릴 예정입니다</span>
					</div>
					<div class="instagram">
						<div class="guide">
							참여하신 인스타그램 컨텐츠는 매일 오후 1시에 일괄 업데이트됩니다 (주말, 공휴일 제외)
						</div>
						<!-- 어트랙트 API 적용해야 할 부분 -->
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
						<div class="notice">
							<h3>유의사항</h3>
							<div class="text-wrap">
								<h4>· 이벤트 내용, 기간, 경품내용, 당첨자 발표일 등은 당사 사정에 의해 예고 없이 변동 또는 지연될 수 있습니다</h4>
								<h4>· 1등 항공권 당첨의 경우, 항공 일정은 2019년 2월 11일 이후 출국, 2019년 6월 1일 내 귀국해야 하며, 항공권 발급 관련하여 별도 안내가 있을 예정입니다</h4>
								<h4>· 현대자동차는 공지한 경품 외 여행 중 발생하는 비용은 지불하지 않으며 여행 중 발생한 사고에 대해 책임 지지 않습니다</h4>
								<h4>· 참여방법을 지키지 않은 참여작, 타인 작품 도용, 비공개 계정, 개인정보 도용 및 부정한 방법으로 참여한 경우 당첨작 선발에서 제외됩니다</h4>
								<h4>· 이벤트는 중복 참여가 가능하나 중복 당첨 (휴대폰 번호 기준)은 허용하지 않으며, 경품의 타인 양도 및 양수를 금지합니다</h4>
								<h4>· 5만원 초과 경품에 대한 제세공과금(22%)은 당첨자 본인 부담입니다</h4>
								<h4>· 잘못된 개인정보의 입력으로 당첨자 발표 후 5일간 당첨자와 연락이 되지 않는 경우 당첨 취소 됩니다</h4>
								<h4>· 만 14세 미만은 이벤트 참여가 불가하며 당첨자 선정 시 제외될 수 있습니다</h4>
								<h4>· 포스팅 된 영상 및 사진은 추후 현대자동차의 마케팅 용도로 활용될 수 있습니다</h4>
							</div>
							<div class="fadeOut"></div>
						</div>
						<button type="button" class="notice-more" onclick="click_tracking('국문/유의사항 더보기');gtag('event','유의사항토글',{'event_category':'유의사항토글','event_label':'유의사항토글'});">+</button>
						<div class="underline"></div>
					</div>
					<div class="contents">
						<div class="block _1">
							<div class="row _1">
								<div class="col _left">
									<div class="desc">
										<div class="wrap">
											<h3>EXPERIENCE</h3>
											<h4>보고, 듣고, 느끼며</h4>
											<h4>생각보다 더욱 대단한 나를 경험하라</h4>
										</div>
									</div>
								</div>
								<div class="col _right">
									<div class="image-1">
										<img src="./images/experience_image2.png" alt="">
									</div>
								</div>
							</div>
							<div class="row _2">
								<div class="col _left">
									<div class="image-2">
										<img src="./images/experience_image1.png" alt="">
									</div>
								</div>
								<div class="col _right">
									<div class="image-3">
										<img src="./images/experience_image3.png" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="block _2">
							<div class="row _1">
								<div class="col _left">
									<div class="image-1">
										<img src="./images/experiment_image1.png" alt="">
									</div>
								</div>
								<div class="col _right">
									<div class="desc">
										<div class="wrap">
											<h3>EXPERIMENT</h3>
											<h4>작은 시도가 큰 변화의 시작이 될 수 있기에</h4>
											<h4>과감하게 실험하라</h4>
										</div>
									</div>
									<div class="image-2">
										<img src="./images/experiment_image2.png" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="block _3">
							<div class="row _1">
								<div class="col _left">
									<div class="image-1">
										<img src="./images/explore_image1.png" alt="">
									</div>
									<div class="desc">
										<div class="wrap">
											<h3>EXPLORE</h3>
											<h4>현대 모터스튜디오 속에서</h4>
											<h4>경험과 실험을 통해 가능성을 탐험하라</h4>
										</div>
									</div>
								</div>
								<div class="col _right">
									<div class="image-2">
										<img src="./images/explore_image2.png" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="slider">
						<div class="title">
							<img src="./images/logo.svg" alt="">
						</div>
						<div class="sub-title">
							<h3>창의적인 실험 공간</h3>
						</div>
						<div class="studio-slide">
							<div class="prev">
								<button type="button" class="prev-btn">
									<img src="./images/arrow_prev.png" alt="">
								</button>
							</div>
							<div class="slider-area">
								<div>
									<a href="http://motorstudio.hyundai.com/goyang/at/info.do" target="_blank" onclick="click_tracking('국문/슬라이더 고양스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_고양','event_label':'거점이동_고양'})">
										<img src="./images/studio_slide1.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.com/kr/ko/brand/motorstudio/seoul/overview.html" target="_blank" onclick="click_tracking('국문/슬라이더 서울스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_서울','event_label':'거점이동_서울'});">
										<img src="./images/studio_slide2.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.com/kr/ko/brand/motorstudio/hanam" target="_blank" onclick="click_tracking('국문/슬라이더 하남스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_하남','event_label':'거점이동_하남'});">
										<img src="./images/studio_slide3.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.com/kr/ko/brand/motorstudio/digital" target="_blank" onclick="click_tracking('국문/슬라이더 디지털스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_디지털','event_label':'거점이동_디지털'});">
										<img src="./images/studio_slide4.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.com/kr/ko/brand/motorstudio/beijing" target="_blank" onclick="click_tracking('국문/슬라이더 베이징스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_베이징','event_label':'거점이동_베이징'});">
										<img src="./images/studio_slide5.jpg" alt="">
									</a>
								</div>
								<div>
									<a href="https://www.hyundai.ru/motorstudio_moscow" target="_blank" onclick="click_tracking('국문/슬라이더 모스크바스튜디오');gtag('event','아웃링크',{'event_category':'거점이동_모스크바','event_label':'거점이동_모스크바'});">
										<img src="./images/studio_slide6.jpg" alt="">
									</a>
								</div>
							</div>
							<div class="next">
								<button type="button" class="next-btn">
									<img src="./images/arrow_next.png" alt="">
								</button>
							</div>
						</div>
						<div class="desc" id="desc_txt">
							<h2>현대 모터스튜디오 고양</h2>
							<h4>자동차를 보고 듣고 느끼는 새로운 여행으로 초대합니다</h4>
						</div>
					</div>
					<button type="button" id="btn-go-top">
						<img src="./images/btn_top.png" alt="">
					</button>
				</div>
			</div>
			<div class="footer-wrap">
				<div class="logo">
					<img src="./images/logo_grey.png" alt="HYUNDAI MOTORSTUDIO">
				</div>
				<div class="right-wrap">
					<div class="official">
						<a href="https://www.facebook.com/hyundaimotorstudio/" target="_blank" class="fb" onclick="click_tracking('국문/외부링크 오피셜페이스북');gtag('event','아웃링크',{'event_category':'오피셜페이스북','event_label':'오피셜페이스북'});">
							<img src="./images/official_fb.png" alt="">
						</a>
						<a href="https://www.instagram.com/hyundai_motorstudio/" target="_blank" class="insta" onclick="click_tracking('국문/외부링크 오피셜인스타그램');gtag('event','아웃링크',{'event_category':'오피셜인스타그램','event_label':'오피셜인스타그램'});">
							<img src="./images/official_insta.png" alt="">
						</a>
						<a href="https://www.youtube.com/user/AboutHyundai" target="_blank" class="youtube" onclick="click_tracking('국문/외부링크 오피셜인스타그램');gtag('event','아웃링크',{'event_category':'오피셜유튜브','event_label':'오피셜유튜브'});">
							<img src="./images/official_youtube.png" alt="">
						</a>
						<a href="https://www.youtube.com/user/HyundaiWorldwide" target="_blank" class="youtube-global" onclick="click_tracking('국문/외부링크 글로벌유튜브');gtag('event','아웃링크',{'event_category':'오피셜글로벌유튜브','event_label':'오피셜글로벌유튜브'});">
							<img src="./images/official_youtube_global.png" alt="">
						</a>
						<a href="https://story.kakao.com/ch/hyundai" target="_blank" class="ks" onclick="click_tracking('국문/외부링크 오피셜카카오스토리');gtag('event','아웃링크',{'event_category':'오피셜카카오스토리','event_label':'오피셜카카오스토리'});">
							<img src="./images/official_ks.png" alt="">
						</a>
					</div>
					<div class="copyright">
						COPYRIGHT ⓒ HYUNDAI MOTOR COMPANY.ALL RIGHTS RESERVED.
					</div>
				</div>
			</div>
		</div>
<?
	include_once "popup.html";
?>
		<script>
			Kakao.init('cf559a1b4265e66761ca6acfa705948f');
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
						$("#desc_txt h2").html("현대 모터스튜디오 고양");
						$("#desc_txt h4").html("자동차를 보고 듣고 느끼는 새로운 여행으로 초대합니다");
						break;
					case 1:
						$("#desc_txt h2").html("현대 모터스튜디오 서울");
						$("#desc_txt h4").html("자동차를 넘어 문화를 이야기합니다");
						break;
					case 2:
						$("#desc_txt h2").html("현대 모터스튜디오 하남");
						$("#desc_txt h4").html("현대자동차의 무한 가능성과 혁신적 시도가 펼쳐집니다");
						break;
					case 3:
						$("#desc_txt h2").html("현대 모터스튜디오 디지털");
						$("#desc_txt h4").html("현대자동차를 가상으로 경험할 수 있습니다");
						break;
					case 4:
						$("#desc_txt h2").html("현대 모터스튜디오 베이징");
						$("#desc_txt h4").html("창의적인 생각과 예술을 통해 고객과 소통합니다");
						break;
					case 5:
						$("#desc_txt h2").html("현대 모터스튜디오 모스크바");
						$("#desc_txt h4").html("새로운 시도와 영감이 하나가 됩니다");
						break;
				}
			});

			$("#copyHashtag").on("click", function() {
				var textarea = document.createElement('textarea');
				textarea.textContent = '#가능성탐험 #현대모터스튜디오';
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
				alert("해시태그가 복사되었습니다");
			});

			$("#copyUrl").on("click", function() {
				var textarea = document.createElement('textarea');
				textarea.textContent = 'http://www.hyundaimotorstudio.co.kr/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=url';
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
				alert("URL이 복사되었습니다");
			});
		
			$("#copyYtUrl").on("click", function() {
				var textarea = document.createElement('textarea');
				textarea.textContent = 'https://www.youtube.com/watch?v=Ip7YqP2pc9w';
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
				alert("유튜브 링크가 복사되었습니다");
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
			
			function click_tracking(click_name)
			{
				$.ajax({
					type   : "POST",
					async  : false,
					url    : "./main_exec.php",
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
						var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.hyundaimotorstudio.co.kr/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=facebook'),'sharer','toolbar=0,status=0,width=600,height=325');
					break;
					case "ks" :
						Kakao.Story.share({
							url: 'http://www.hyundaimotorstudio.co.kr/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaostory',
							text: '가능성 없는 사람이 어딨어? 중요한 건, 그것을 발견하는가, 못 하는가.\nExplore the possibilities.\n\n현대 모터스튜디오'
						});
					break;
					case "kt" :
						Kakao.Link.sendDefault({
							objectType: 'feed',
							content: {
								title: "현대 모터스튜디오 - Explore the possibilities.",
								description: "가능성 없는 사람이 어딨어? 중요한 건, 그것을 발견하는가, 못 하는가.\nExplore the possibilities.\n\n현대 모터스튜디오",
								imageUrl: "http://www.hyundaimotorstudio.co.kr/images/share_kt_img.png",
								link: {
									mobileWebUrl: 'http://www.hyundaimotorstudio.co.kr/m/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaotalk',
									webUrl: 'http://www.hyundaimotorstudio.co.kr/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaotalk'
								}
							},
							buttons: [
								{
									title: '현대모터스튜디오',
									link: {
										mobileWebUrl: 'http://www.hyundaimotorstudio.co.kr/m/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaotalk',
										webUrl: 'http://www.hyundaimotorstudio.co.kr/?utm_medium=self&utm_source=share&utm_campaign=&utm_content=kakaotalk'
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
						var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('https://www.youtube.com/watch?v=Ip7YqP2pc9w'),'sharer','toolbar=0,status=0,width=600,height=325');
					break;
					case "ks" :
						Kakao.Story.share({
							url: 'https://www.youtube.com/watch?v=Ip7YqP2pc9w',
							text: '가능성 없는 사람이 어딨어? 중요한 건, 그것을 발견하는가, 못 하는가.\nExplore the possibilities.\n\n현대 모터스튜디오'
						});
					break;
					case "kt" :
						Kakao.Link.sendDefault({
							objectType: 'feed',
							content: {
								title: "현대 모터스튜디오 - Explore the possibilities.",
								description: "가능성 없는 사람이 어딨어? 중요한 건, 그것을 발견하는가, 못 하는가.\nExplore the possibilities.\n\n현대 모터스튜디오",
								imageUrl: "http://www.hyundaimotorstudio.co.kr/images/share_kt_img.png",
								link: {
									mobileWebUrl: 'https://www.youtube.com/watch?v=Ip7YqP2pc9w',
									webUrl: 'https://www.youtube.com/watch?v=Ip7YqP2pc9w'
								}
							},
							buttons: [
								{
									title: '현대모터스튜디오',
									link: {
										mobileWebUrl: 'https://www.youtube.com/watch?v=Ip7YqP2pc9w',
										webUrl: 'https://www.youtube.com/watch?v=Ip7YqP2pc9w'
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
		</script>
	</body>

</html>