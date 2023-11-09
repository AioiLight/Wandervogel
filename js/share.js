const shareData = {
    title: 'Wangel',
    text: document.querySelector(".post-title").textContent,
    url: location.href,
};

const btn = document.querySelector('#sharing');

btn.addEventListener('click', async () => {
try {
    await navigator.share(shareData);
} catch(err) {
}
});