<?
    include_once "../../include/autoload.php";

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
    if ($mobileYN == "PC")
    {
		if(isset($siteURL['query'])) {
			echo "<script>location.href='../../en/?".$siteURL['query']."';</script>";
		} else {
			echo "<script>location.href='../../en/';</script>";
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
	<title>HYUNDAI MOTOR STUDIO</title>
	<style class="vjs-styles-defaults">
      .video-js {
        width: 300px;
        height: 150px;
      }

      .vjs-fluid {
        padding-top: 56.25%
      }
	</style>
	<style class="vjs-styles-dimensions">
      .video-dimensions {
        width: 300px;
        height: 300px;
      }

      .video-dimensions.vjs-fluid {
        padding-top: 56.25%;
      }
	</style>
	<link type="image/icon" rel="shortcut icon" href="http://www.hyundaimotorstudio.co.kr/images/favi_HMS.ico" />
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/font.css">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<link rel="stylesheet" href="../../lib/videojs/videojs.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../../lib/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script type="text/javascript" src="../../js/clipboard.min.js"></script>
	<script src="../../lib/videojs/videojs.js"></script>
	<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
</head>

<body>
	<div class="wrap">
		<div class="header-wrap">
			<div class="inner">
				<h1 class="header-logo">
					<a href="/">
						<img src="../images/logo.svg" alt="HYUNDAI MOTORSTUDIO">
					</a>
				</h1>
			</div>
			<div class="action-wrap">
				<div class="lang-box">
					<a href="../"  onclick="click_tracking('한국어사이트')">KR</a>
					<span>/</span>
					<a href="javascript:void(0)" class="is-active" onclick="click_tracking('영어사이트')">EN</a>
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
		<div class="menu-layer">
			<div class="spread-layer">
				<div class="row">
					<a href="javascript:void(0)" onclick="movePage(1);click_tracking('이동 CAMPAIGN FILM')">CAMPAIGN FILM</a>
				</div>
				<div class="row">
					<a href="javascript:void(0)" onclick="movePage(2);click_tracking('이동 EVENT')">EVENT</a>
				</div>
				<div class="row">
					<a href="javascript:void(0)" onclick="movePage(3);click_tracking('이동 EXPLORE THE POSSIBILITIES')">EXPLORE THE POSSIBILITIES</a>
				</div>
				<div class="row">
					<a href="javascript:void(0)" onclick="movePage(4);click_tracking('이동 HYUNDAI MOTORSTUDIO')">HYUNDAI MOTORSTUDIO</a>
				</div>
				<div class="row share">
					<a href="javascript:void(0)" class="fb" onclick="click_tracking('공유 페이스북');sns_share('fb')"></a>
					<a href="javascript:void(0)" class="kt" onclick="click_tracking('공유 카카오톡');sns_share('kt')"></a>
					<a href="javascript:void(0)" class="ks" onclick="click_tracking('공유 카카오스토리');sns_share('ks')"></a>
					<a href="javascript:void(0)" class="url" onclick="click_tracking('공유 URL');sns_share('url')"></a>
				</div>
			</div>
		</div>
		<div class="section1-wrap">
			<div class="inner">
				<div class="video-thumb-layer">
					<div class="wrapper">
						<div class="title-wrap">
							<h1>Explore</h1>
							<h1>the</h1>
							<h1>possibilities</h1>
							<!-- <h3>당신의 가능성을 실험하라</h3> -->
						</div>
						<div class="button-wrap">
							<button type="button" onclick="click_tracking('보기 풀영상');viewVideo();">
								<p>Watch</p>
								<p>Full version</p>
							</button>
						</div>
					</div>
				</div>
				<div class="video-layer">
					<video id="video_html5_api" class="video-js" preload="auto" data-setup='{}' onclick="toggleVideo();">
						<source src='../images/hyundaimotorstudio.mp4' type='video/mp4' />
					</video>
					<!-- <video class="video-js vjs-default-skin" controls preload="auto" width="400" height="300" data-setup="{}">
						<source src='../images/hyundaimotorstudio.mp4' type='video/mp4' />
					</video> -->
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
						<span>Experience. Experiment. Explore.</span>
						<span>Possibilities are nothing until discovered.</span>
						<span>Show the world the moment you explore your possibilities</span>
						<span>and share your moments on Instagram!</span>
						<span>For those who inspire the most to explore the possibilities,</span>
						<span>a journey to Hyundai Motorstudio awaits!</span>
					</div>
					<div class="date-winner">
						<h3>Date</h3>
						<h4 class="h4-first">2018.12.19 (wen) – 2019.1.12 (sat)</h4>
						<h3>Winner</h3>
						<h4>2019.1.18 (fri)</h4>
					</div>
					<div class="prize">
						<div class="_1">
							<img src="../images/prize_beijing.png" alt="">
							<span class="first">Hyundai Motorstudio</span>
							<span>BEIJING</span>
							<span>1st (5person)</span>
						</div>
						<div class="_2">
							<img src="../images/prize_moscow.png" alt="">
							<span class="first">Hyundai Motorstudio</span>
							<span>MOSCOW</span>
							<span>1st (5person)</span>
						</div>
						<div class="_3">
							<img src="../images/prize_giftcard.png" alt="">
							<span class="first">Hyundai Department 50,000WON GIFTCARD</span>
							<span>2nd (15person)</span>
						</div>
					</div>
					<div class="how">
						<h3>To Participate</h3>
						<h4 class="h4-first">1. Capture the moment</h4>
						<h4 class="blank">you explore the possibilities.</h4>
						<h4>2. Post pics or vids on Instagram with</h4>
						<h4>#HyundaiMotorStudio</h4>
						<h4>#explore_the_possibilities</h4>
						<button type="button" id="copyHashtag" onclick="click_tracking('복사 해시태그')">Copy Hashtags</button>
					</div>
					<div class="instagram">
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
							<h4>· 참여방법을 지키지 않은 참여작, 비공개 계정,</h4>
							<h4>부정한 방법으로 참여시(좋아요, 팔로워 구매) 당첨 선발에서 제외됩니다</h4>
							<h4>· 최종 당첨자는 내부 기준에 의해 선발됩니다</h4>
							<h4>· 5만원 이상의 경품 당첨 시 제세공과금 22% 납부 진행 후</h4>
							<h4>수령이 진행됩니다</h4>
							<h4>· 현대 모터스튜디오 당첨자는 추후 활동이 있음을 미리 안내드립니다</h4>
						</div>
						<div class="underline"></div>
					</div>
					<div class="contents">
						<div class="_1">
							<div class="image-1">
								<img src="../images/experience_image1.png" alt="">
							</div>
							<div class="desc">
								<h3>EXPERIENCE</h3>
								<h4>Look around. See it for yourself.</h4>
								<h4>Find out your possibilities.</h4>
								<h4>So, step out and</h4>
								<h4>experience.</h4>
							</div>
							<div class="image-2">
								<img src="../images/experience_image2.png" alt="">
							</div>
							<div class="underline"></div>
						</div>
						<div class="_2">
							<div class="image-1">
								<img src="../images/experiment_image1.png" alt="">
							</div>
							<div class="desc">
								<h3>EXPERIMENT</h3>
								<h4>Experiments will tell you who you are.</h4>
								<h4>By experiments, you will expand your possibilities.</h4>
								<h4>When you do more, you can be more.</h4>
								<h4>Do some more experiments.</h4>
							</div>
							<div class="image-2">
								<img src="../images/experiment_image2.png" alt="">
							</div>
							<div class="underline"></div>
						</div>
						<div class="_3">
							<div class="image-1">
								<img src="../images/explore_image1.png" alt="">
							</div>
							<div class="desc">
								<h3>EXPLORE</h3>
								<h4>Get out of your comfort zone.</h4>
								<h4>Explore the unexplored. Know the unknown.</h4>
								<h4>Experience, experiment and explore at</h4>
								<h4>Hyundai Motorstudio.</h4>
							</div>
							<div class="image-2">
								<img src="../images/explore_image2.png" alt="">
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
									<img src="../images/studio_slide1.jpg" alt="">
								</div>
								<div>
									<img src="../images/studio_slide2.jpg" alt="">
								</div>
								<div>
									<img src="../images/studio_slide3.jpg" alt="">
								</div>
								<div>
									<img src="../images/studio_slide4.jpg" alt="">
								</div>
								<div>
									<img src="../images/studio_slide5.jpg" alt="">
								</div>
								<div>
									<img src="../images/studio_slide6.jpg" alt="">
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
						<img src="../images/btn_top.jpg" alt="">
					</button>
				</div>
			</div>
		</div>
		<div class="footer-wrap">
			<div class="logo">
				<span>HYUNDAI</span>
				<span>MOTORSTUDIO</span>
			</div>
			<div class="official">
				<a href="https://www.facebook.com/hyundaimotorstudio/" target="_blank" class="fb" onclick="click_tracking('외부링크 오피셜페이스북')">
                    <img src="../images/share_fb.png" alt="">
                </a>
				<a href="https://www.instagram.com/hyundai_motorstudio/" target="_blank" class="insta" onclick="click_tracking('외부링크 오피셜인스타그램')">
                    <img src="../images/share_insta.png" alt="">
                </a>
				<a href="https://www.youtube.com/user/HyundaiWorldwide" target="_blank" class="youtube" onclick="click_tracking('외부링크 오피셜유튜브')">
                    <img src="../images/share_youtube.png" alt="">
                </a>
				<a href="https://story.kakao.com/ch/hyundai" target="_blank" class="ks" onclick="click_tracking('외부링크 오피셜카카오스토리')">
                    <img src="../images/share_ks.png" alt="">
                </a>
			</div>
			<div class="underline"></div>
			<div class="copyright">
				<img src="../images/copyright.png" alt="">
			</div>
		</div>
	</div>
	<script>
		Kakao.init('cf559a1b4265e66761ca6acfa705948f');
		// $(document).load(function(){
		// 	$("#video_html5_api").height($(window).height());
		// });
		var slider = $('.slider-area').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			draggable: false,
			swipe: true,
			touchMove: true,
			speed: 500,
			cssEase: 'ease-in',
		});
		$(".prev-btn").on("click", function() {
			slider.slick("slickPrev");
		});
		$(".next-btn").on("click", function() {
			slider.slick("slickNext");
		});

		slider.on('afterChange', function(event, slick, currentSlide) {
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
			textarea.textContent = '#HyundaiMotorStudio #explore_the_possibilities';
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
		
		$('.js-burger-trigger').on('click', function() {
			$('body').toggleClass('menu-open');
		});
		$('#btn-go-top').on('click', function() {
			$('html, body').animate({
				scrollTop: 0
			}, 1000);
		});

		function movePage(section) {
			$('body').removeClass('menu-open');
			switch(section) {
				case 1 :
					$('html, body').animate({scrollTop: $('.section1-wrap').offset().top}, 1000);
				break;
				case 2 :
					$('html, body').animate({scrollTop: $('.section2-wrap').offset().top - 57}, 1000);
				break;
				case 3 :
					$('html, body').animate({scrollTop: $('.section2-wrap .contents').offset().top -67}, 1000);
				break;
				case 4 :
					$('html, body').animate({scrollTop: $('.section2-wrap .slider').offset().top - 57}, 1000);
				break;
			}
		}

		function click_tracking(click_name)
		{
			$.ajax({
				type   : "POST",
				async  : false,
				url    : "../../main_exec.php",
				data:{
					"exec" 			: "insert_click_info",
					"click_name"	: click_name
				}
			});
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
			$(".video-layer").show();
			// player.play();			
		}
		$('.section1-wrap .inner').on('click', function() {
			// player.trigger('click');
			if ($(".video-thumb-layer").css("display") == "none")
			{
				if (player.paused()) {
					player.play();
					videojs.log('Your player is play!');
				} else {
					player.pause();
					videojs.log('Your player is pause!');
				}
			}

		});

		function sns_share(media) {
			switch (media) {
				case "fb" :
					var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.hyundaimotorstudio.co.kr'+flag+'&govideo='+flag),'sharer','toolbar=0,status=0,width=600,height=325');
				break;
				case "ks" :
				break;
				case "kt" :
					Kakao.Link.sendDefault({
						objectType: 'feed',
						content: {
							// title: '불만족스러웠던 기존의 시카 제품들, 해결되지 않던 당신의 피부 고민!\n\n바이오더마의 특허 다프 성분과 안탈지신 기술을 담아 오랜 연구 끝에 탄생한 바이오더마 포마드로 A/S 받으세요!',
							title: kt_title,
							description: kt_desc,
							// description: '#케익 #딸기 #삼평동 #카페 #분위기 #소개팅',
							imageUrl: "http://www.hyundaimotorstudio.co.kr/images/share_kt_img.jpg",
							link: {
								mobileWebUrl: 'http://www.hyundaimotorstudio.co.kr/m/',
								webUrl: 'http://www.hyundaimotorstudio.co.kr/'
							}
						},
						buttons: [
							{
								title: '현대모터스튜디오',
								link: {
									mobileWebUrl: 'http://www.hyundaimotorstudio.co.kr/m/',
									webUrl: 'http://www.hyundaimotorstudio.co.kr/'
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
				break;
			}
		}
</script>
</body>

</html>