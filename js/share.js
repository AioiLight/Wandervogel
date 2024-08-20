const shareData = {
    title: 'Wangel',
    text: document.title,
    url: location.href,
};

const btn = document.querySelector('#sharing');

btn.addEventListener('click', async () => {
    try {
        navigator.share(shareData);
        gtag('event', 'share_button', {
            'page_location': shareData.url,
            'page_title': shareData.text
        });
    } catch(err) {}
});