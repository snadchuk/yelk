document.addEventListener('DOMContentLoaded', function () {
    const teamSlider = document.querySelectorAll('div[data-slider]');
    const divElement = document.querySelector('.our-team__container');
    const dataCntValue = divElement.getAttribute('data-slider-cnt');
    const dataCntValueInt = parseInt(dataCntValue, 10);

    Array.from(teamSlider).forEach(slider => {
        const teamSlider = tns({
            container: slider,
            items: dataCntValueInt,
            slideBy: 'page',
            loop: false,
            nav: false,
            navPosition: 'bottom',
            controls: true,
            speed: 400,
            mouseDrag: true,
            responsive: {
                576: {
                    items: dataCntValueInt,
                },
                768: {
                    items: dataCntValueInt,
                    gutter: 10,
                },
                1024: {
                    items: dataCntValueInt,
                    gutter: 10,
                }
            }
        });
    });
});

