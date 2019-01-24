require('jquery-visible');

jQuery(document).ready(() => {
	// Wrap embedded objects and force them into 16:9
	$('#container iframe, #container embed, #container video').not('.ignore-ratio').wrap('<div class="video-container" />');

	// HEADER: Responsive Nav Toggle
	$('#responsive-nav-toggle').click(e => {
		const $this = $(e.currentTarget);
		$this.toggleClass('is-active');
	});

	// HEADER: onScroll functions
	$(window).on('load resize scroll', () => {
		const scroll = $(window).scrollTop();
		if(scroll > 40) {
			$('#header').addClass('is-scrolled');
		} else {
			$('#header').removeClass('is-scrolled');
		}
	});

	// MODULES: Parallax
	$(window).on('load resize scroll', () => {
		const d_scroll = $(window).scrollTop();
		const w_height = $(window).height();
		$('.animate-parallax').each((i, e) => {
			const $this = $(e);
			const $thisBg = $this.find('.module-bg');
			const p_position = $this.offset().top;
			const e_height = $this.outerHeight();
			const ebg_height = $this.find('.module-bg').outerHeight();
			const bg_diff = ebg_height - e_height;
			const dhit_in = p_position - w_height;
			const dhit_out = p_position + e_height;
			const dhit_read = p_position - w_height - d_scroll;
			// Boolean hit Check
			if (dhit_read <= 0 && d_scroll <= dhit_out) {
				const per_scrolled = (d_scroll - dhit_in) / (dhit_out - dhit_in);
				const offset = (bg_diff * per_scrolled);
				$thisBg.css('transform', `translateY(-${offset}px)`);
			}
		});
	});

	// MODULES: Animate onScreen
	$(window).on('load resize scroll', () => {
		$('.animate-on-enter').each((i, el) => {
			const $this = $(el);
			if ($this.visible(true)) {
				$this.addClass('is-visible');
			}
		});
		$('.animate-on-leave').each((i, el) => {
			const $this = $(el);
			if (!$this.visible(true)) {
				$this.removeClass('is-visible');
			}
		});
	});

	// MODULE: Hero Slider
	const heroPhotoCount = $('.hero-single').length;
	if(heroPhotoCount > 1) {
		$('.hero-photos > li:gt(0)').hide();
		setInterval(() => {
			$('.hero-photos > li:first')
			.fadeOut(1333)
			.next()
			.fadeIn(1333)
			.end()
			.appendTo('.hero-photos');
		}, 4444);
	}

	// MODULE: Staff
	$('.staff-more').click((e) => {
		e.preventDefault();
		const $this = $(e.currentTarget);
		$this.closest('.staff-data').find('.staff-bio').slideToggle();
	});

	// MODULE: Footer Signup Hover/Focus change
	$(window).load(() => {
		$('.ctct-form-element').each((i,e) => {
			const $this = $(e);
			$this.on('focus', () => {
				$this.parent('.ctct-form-field').find('.ctct-form-label').addClass('is-active');
			});
			$this.on('blur', () => {
				if($this.val().length == 0) {
					$this.parent('.ctct-form-field').find('.ctct-form-label').removeClass('is-active');
				}
			});
			if($this.val() != '') {
				$this.parent('.ctct-form-field').find('.ctct-form-label').addClass('is-active');
			}
		});
	});
});
