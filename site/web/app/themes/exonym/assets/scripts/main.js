require('jquery-visible');

jQuery(document).ready(() => {
	// Wrap embedded objects and force them into 16:9
	$('#container iframe, #container embed, #container video').not('.ignore-ratio').wrap('<div class="video-container" />');

	// HEADER: Responsive Nav Toggle
	$('#responsive-nav-toggle').click(e => {
		e.preventDefault();
		const $this = $(e.currentTarget);
		$this.toggleClass('is-active');
		$('body').toggleClass('nav-active');
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
	$(window).on('ready load resize scroll', () => {
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

	// FUNCTION: Simple Slider
	function slider(parent, single, type = 'fade', transition, stay) {
		const slideCount = $(single).length;
		if(slideCount > 1) {
			$(`${parent} > li:gt(0)`).hide();
			setInterval(() => {
				if(type == 'fade') {
					$(`${parent} > li:first`)
					.fadeOut(transition)
					.next()
					.fadeIn(transition)
					.end()
					.appendTo(parent)
					.addClass('is-active');
				} else if(type == 'slide') {
					$(`${parent} > li:first`)
					.slideUp(transition)
					.next()
					.slideDown(transition)
					.end()
					.appendTo(parent);
				}
			}, stay);
		}
	}

	// MODULE: Hero Slider
	slider('.hero-photos', '.hero-single', 'fade', 1333, 4444);

	// MODULE: Testimonials Slider
	slider('.testimonials-wrap', '.testimonial', 'slide', 1000, 10000);

	// MODULE: Staff
	$('.staff-more').click((e) => {
		e.preventDefault();
		const $this = $(e.currentTarget);
		$this.closest('.staff-data').find('.staff-bio').slideToggle();
	});

	// MODULE: Footer Signup Hover/Focus change
	$(window).on('ready load click', () => {
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

	// ARCHIVE: 52 Club Filtering
	$('.club-year').click((e) => {
		$('.club-data, .club-year, #club-search').removeClass('is-active');
		$('#club-search input').val('');
		const $this = $(e.currentTarget);
		const target = $this.attr('id');
		$this.addClass('is-active');
		$(`.club-data[data-year="${target}"]`).addClass('is-active');
	});

	// FUNCTION: Search Posts
	function searchPosts(field, data, filters = null) {
		$(field).keyup((e) => {
			const $this = $(e.currentTarget);
			const filter = $this.val();
			if(filters != null) {
				$(filters).removeClass('is-active');
			}
			if(filter.length >= 1) {
				$this.parent().addClass('is-active');
			} else {
				$this.parent().removeClass('is-active');
			}
			$(data).each((i,e) => {
				const $data = $(e);
				if($data.text().search(new RegExp(filter, 'i')) < 0) {
					$data.removeClass('is-active');
				} else {
					$data.addClass('is-active');
				}
			});
		});
	}

	// ARCHIVE: 52 Club Search
	searchPosts('#club-search input', '.club-data', '.club-year');

	// ARCHIVE: Fallen Search
	searchPosts('#fallen-search input', '.fallen-single');

	// MODULE: Contact Page Form Labels
	$('.form-element input, .form-element select, .form-element textarea').each((i,e) => {
		const $this = $(e);
		$this.on('focus', () => {
			$this.closest('.form-element').find('label').addClass('is-active');
		});
		$this.on('blur', () => {
			if($this.val().length == 0) {
				$this.closest('.form-element').find('label').removeClass('is-active');
			}
		});
		if($this.val() != '') {
			$this.closest('.form-element').find('label').addClass('is-active');
		}
	});
});
