/**
 * About page: before/after image sliders + stat counters (scroll-triggered).
 */
(function () {
	'use strict';

	function sizeBeforeAfterClipImg(wrap) {
		var clipImg = wrap.querySelector('.dontia-ba__clip img');
		if (!clipImg) return;
		var w = wrap.offsetWidth;
		if (w > 0) {
			clipImg.style.width = w + 'px';
			clipImg.style.maxWidth = 'none';
		}
	}

	function initBeforeAfter(root) {
		var blocks = (root || document).querySelectorAll('[data-dontia-ba]');
		for (var b = 0; b < blocks.length; b++) {
			(function (wrap) {
				var clip = wrap.querySelector('.dontia-ba__clip');
				var handle = wrap.querySelector('.dontia-ba__handle');
				if (!clip || !handle) return;

				sizeBeforeAfterClipImg(wrap);
				if (typeof window.ResizeObserver !== 'undefined') {
					var ro = new ResizeObserver(function () {
						sizeBeforeAfterClipImg(wrap);
					});
					ro.observe(wrap);
				} else {
					window.addEventListener('resize', function () {
						sizeBeforeAfterClipImg(wrap);
					});
				}

				function setPct(pct) {
					pct = Math.max(8, Math.min(92, pct));
					clip.style.width = pct + '%';
					handle.style.left = pct + '%';
					wrap.setAttribute('data-position', String(Math.round(pct)));
				}

				var dragging = false;

				function fromClientX(clientX) {
					var r = wrap.getBoundingClientRect();
					if (r.width <= 0) return;
					var x = clientX - r.left;
					setPct((x / r.width) * 100);
				}

				handle.addEventListener('mousedown', function (e) {
					e.preventDefault();
					dragging = true;
				});
				document.addEventListener('mousemove', function (e) {
					if (!dragging) return;
					fromClientX(e.clientX);
				});
				document.addEventListener('mouseup', function () {
					dragging = false;
				});

				handle.addEventListener('touchstart', function (e) {
					dragging = true;
					if (e.touches[0]) fromClientX(e.touches[0].clientX);
				}, { passive: true });
				document.addEventListener('touchmove', function (e) {
					if (!dragging || !e.touches[0]) return;
					fromClientX(e.touches[0].clientX);
				}, { passive: true });
				document.addEventListener('touchend', function () {
					dragging = false;
				});

				wrap.addEventListener('click', function (e) {
					if (e.target === handle || handle.contains(e.target)) return;
					fromClientX(e.clientX);
				});
			})(blocks[b]);
		}
	}

	function easeOutQuad(t) {
		return t * (2 - t);
	}

	function animateCounter(el, duration) {
		var to = parseFloat(el.getAttribute('data-to')) || 0;
		var from = parseFloat(el.getAttribute('data-from')) || 0;
		var suffix = el.getAttribute('data-suffix') || '';
		var prefix = el.getAttribute('data-prefix') || '';
		var start = null;

		function frame(now) {
			if (!start) start = now;
			var t = Math.min(1, (now - start) / duration);
			var v = from + (to - from) * easeOutQuad(t);
			var n = Math.round(v);
			el.textContent = prefix + String(n) + suffix;
			if (t < 1) {
				requestAnimationFrame(frame);
			} else {
				el.textContent = prefix + String(Math.round(to)) + suffix;
			}
		}
		requestAnimationFrame(frame);
	}

	function initCounters(root) {
		var section = (root || document).querySelector('.dontia-success-stats');
		if (!section) return;
		var nums = section.querySelectorAll('.dontia-stat-card__number[data-to]');
		if (!nums.length) return;

		var done = false;
		function run() {
			if (done) return;
			done = true;
			for (var i = 0; i < nums.length; i++) {
				animateCounter(nums[i], 2000);
			}
		}

		if ('IntersectionObserver' in window) {
			var io = new IntersectionObserver(function (entries) {
				for (var j = 0; j < entries.length; j++) {
					if (entries[j].isIntersecting) {
						run();
						io.disconnect();
						return;
					}
				}
			}, { threshold: 0.25 });
			io.observe(section);
		} else {
			run();
		}
	}

	function init() {
		initBeforeAfter(document);
		initCounters(document);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
