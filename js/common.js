document.querySelectorAll('[data-gtm-click]').forEach((e) => {
    e.addEventListener('click', (event) => {
        if (typeof gtag !== 'function') {
            return;
        }
        event.preventDefault();
        const href = e.getAttribute('href');
        gtag('event', e.getAttribute('data-gtm-click'), {
            'link_classes': e.className,
            'link_id': e.id,
            'link_text': e.textContent || '',
            'link_url': href || '',
            'event_callback': () => {
                if (href) {
                    location.href = href;
                }
            },
            'event_timeout': 500
        });
    }, { passive: false });
});

document.querySelectorAll('a[href^="https://wangel.aioilight.space"]').forEach((e) => {
    e.addEventListener('click', (event) => {
        if (typeof gtag !== 'function') {
            return;
        }
        event.preventDefault();
        const href = e.getAttribute('href');
        gtag('event', 'click_internal', {
            'link_classes': e.className,
            'link_id': e.id,
            'link_text': e.textContent || '',
            'link_url': href || '',
            'event_callback': () => {
                if (href) {
                    location.href = href;
                }
            },
            'event_timeout': 500
        });
    }, { passive: false });
});