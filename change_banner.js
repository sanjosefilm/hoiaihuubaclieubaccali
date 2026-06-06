// Banner slideshow - vanilla JavaScript, no jQuery needed
(function () {
    'use strict';

    function initBanner() {
        var items = document.querySelectorAll('#imageShow li');
        if (!items.length) return;

        var currentIndex = 0;

        // Reset all items
        items.forEach(function (li) {
            li.classList.remove('current', 'previous');
            li.style.opacity = '0';
        });
        items[0].classList.add('current');
        items[0].style.opacity = '1';

        setInterval(function () {
            var prevIndex = currentIndex;
            currentIndex = (currentIndex + 1) % items.length;

            var curItem = items[prevIndex];
            var nextItem = items[currentIndex];

            nextItem.style.opacity = '0';
            nextItem.classList.add('current');
            curItem.classList.remove('current');
            curItem.classList.add('previous');

            // Fade in next
            var start = null;
            var duration = 1500;
            function fadeIn(ts) {
                if (!start) start = ts;
                var progress = Math.min((ts - start) / duration, 1);
                nextItem.style.opacity = progress.toString();
                if (progress < 1) {
                    requestAnimationFrame(fadeIn);
                } else {
                    curItem.classList.remove('previous');
                    curItem.style.opacity = '0';
                }
            }
            requestAnimationFrame(fadeIn);
        }, 3000);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initBanner);
    } else {
        initBanner();
    }
}());
