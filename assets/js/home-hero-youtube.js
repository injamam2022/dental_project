/**
 * Defer YouTube hero embed until after load (fast FCP/LCP), then autoplay muted loop.
 */
(function () {
	'use strict';
	var cover = document.getElementById('homeHeroYoutubeCover');
	if (!cover) return;
	var embed = cover.getAttribute('data-embed');
	if (!embed) return;

	function mountHeroVideo() {
		if (cover.classList.contains('is-playing')) return;
		var iframe = document.createElement('iframe');
		iframe.className = 'home-hero-youtube-iframe';
		iframe.id = 'homeHeroYoutubeIframe';
		iframe.src = embed;
		iframe.title = 'Dontia Care Clinic — welcome video';
		iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
		iframe.setAttribute('allowfullscreen', '');
		iframe.setAttribute('loading', 'lazy');
		iframe.setAttribute('tabindex', '-1');
		iframe.setAttribute('aria-hidden', 'true');
		cover.innerHTML = '';
		cover.appendChild(iframe);
		cover.classList.add('is-playing');
	}

	var mountScheduled = false;
	function scheduleMount() {
		if (mountScheduled) return;
		mountScheduled = true;
		if ('requestIdleCallback' in window) {
			requestIdleCallback(mountHeroVideo, { timeout: 2200 });
		} else {
			window.setTimeout(mountHeroVideo, 1600);
		}
	}

	if (document.readyState === 'complete') {
		scheduleMount();
	} else {
		window.addEventListener('load', scheduleMount, { once: true });
	}

	document.addEventListener('visibilitychange', function () {
		if (document.hidden || !cover.classList.contains('is-playing')) return;
		var iframe = document.getElementById('homeHeroYoutubeIframe');
		if (iframe) {
			iframe.src = embed;
		}
	});
})();
