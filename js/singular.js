const observeOptions = {
    root: null,
    rootMargin: "0px 0px -50% 0px",
    threshold: 0
};

const targets = document.querySelectorAll("article :is(h2, h3, h4, h5, h6).wp-block-heading");

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            activateLink(entry.target);
        }
    });
}, observeOptions);

targets.forEach(t => {
    observer.observe(t);
});

function activateLink(element) {
    const currentActiveLink = document.querySelector(".simpletoc-list a.current");

   if (currentActiveLink !== null) {
    currentActiveLink.classList.remove("current");
   }

   const newActiveLink = document.querySelector(".simpletoc-list a[href=\"#" + element.id + "\"]");
   if (newActiveLink !== null) {
    newActiveLink.classList.add("current");
   }
}

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