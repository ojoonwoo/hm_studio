
$(function(){
	
	var $win = $(window),
		$doc = $(document),
		$html = $('html'),
		$body = $('body');
	
	window.hm_studio = {};
	
	var locationArray = location.href.split('/');
	var currentLocation = locationArray[locationArray.length-1].split('.')[0];
    
	hm_studio.popup = {
		bind : function(){
			$doc
				.on('click', '[data-popup]', function(e){
				var $this = $(this),
					$html = $('html'),
					val = $this.attr('data-popup');

				if (val.match('@close')){
					hm_studio.popup.close($this.closest('.popup'));
				} else {
					if($this.attr('data-dynamic-flag')) {
						hm_studio.popup.contentChange($(val), $this.data());
					} else {
						hm_studio.popup.show($(val));
					}
				}

				if ($this.is('a')){
					e.preventDefault();
				}
			})
				.on('click', '[data-popup-close]', function(e){
				var $this = $(this),
					val = $this.attr('data-popup-close');

				hm_studio.popup.close($(val));

				if ($this.is('a')){
					e.preventDefault();
				}
			});
		},
		show : function($popup){
			if ($popup.length){
				var $wrap = $popup.parent(),
					$html = $('html');


				if (!$wrap.hasClass('popup-wrap')){
					$popup.wrap('<div class="popup-wrap"></div>');
					$wrap = $popup.parent();
				}

				if (!$wrap.hasClass('is-opened')){
					$wrap
						.stop().fadeIn(10, function(){
						$popup.trigger('afterPopupOpened', $wrap);
					})
						.addClass('is-opened');
				}

				if (!$html.hasClass('popup-opened')){
					$html.addClass('popup-opened');
				}

				$popup.trigger('popupOpened', $wrap);
			}
		},
		close : function($popup){
			if ($popup.length){
				var $wrap = $popup.parent(),
					$html = $('html');

				$wrap.stop().fadeOut(10, function(){
					$wrap.removeClass('is-opened');

					if (!$('.popup-wrap.is-opened').length){
						$html.removeClass('popup-opened');
					}

					//					$popup.trigger('afterpopupClosed', $wrap);
				});

				$popup.trigger('popupClosed', $wrap);
			}
		},
		contentChange: function($popup, datas) {
			if(datas.popup == '#popup-picture-detail') {
				var startIdx = Math.floor(datas.sourceOwner.length/2);
				var ModifiedNameArr = datas.sourceOwner.split("");
				var sliceLength = (datas.sourceOwner.length >= 5) ? 2 : 1;
				ModifiedNameArr.splice(startIdx, 1, '*');
				if(sliceLength>1) {
					ModifiedNameArr.splice(startIdx+1, 1, '*');
				}
				var outputName = ModifiedNameArr.join("");
				var imgUrl = datas.sourceUrl,
					desc = datas.sourceDesc,
					tag = datas.sourceTag.split(','),
					name = outputName;

				$popup.find('#verify-img').attr('src', imgUrl);
				$popup.find('.name').text(name);
				$popup.find('.tag > span:first-child').text('#'+tag[0]);
				$popup.find('.tag > span:last-child').text('#'+tag[1]);
				$popup.find('.desc').text(desc);
			}
			hm_studio.popup.show($popup);
		}
	};
	hm_studio.popup.bind();
});