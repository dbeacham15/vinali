'use strict';

const Vinali = Vinali || {};

Vinali.About = (() => {
    const activeClass = 'about-carousel__item--active';
    const outClass = 'about-carousel__item--out';
    const indicatorActive = 'about-carousel__indicator--active';

    let indicators = [];
    let items;
    let carousel;
    let carouselHeight = 0;
    let currentCarouselIndex = 0;

    const toggleInNewSlide = () => {
        items[currentCarouselIndex].classList.remove(outClass);
        items[currentCarouselIndex].classList.add(activeClass);
        indicators[currentCarouselIndex].classList.add(indicatorActive)
    
        setTimeout(() => {
             items[currentCarouselIndex].classList.add(outClass);
             items[currentCarouselIndex].classList.remove(activeClass);
             indicators[currentCarouselIndex].classList.remove(indicatorActive)
             currentCarouselIndex = currentCarouselIndex === items.length - 1 ? 0 : currentCarouselIndex + 1;
        
             toggleInNewSlide();
        }, 4000);
    };



    const playCarousel = () => {
        
    };

    const setup = () => {
        const indicatorContainer = document.createElement('div');
        indicatorContainer.classList.add('about-carousel__indicators');
        indicatorContainer.classList.add('railed');

        for (let i = 0; i < items.length; i++) {
            const item = items[i];
            const indicator = document.createElement('span');
            indicator.classList.add('about-carousel__indicator');
            indicatorContainer.appendChild(indicator);
            indicators.push(indicator);

            if (item.clientHeight > carouselHeight) {
                carouselHeight = item.clientHeight;
            }
        }
        
        carousel.appendChild(indicatorContainer);
        carousel.style.height = `${carouselHeight}px`;

        toggleInNewSlide();
    };

    const _init = () => {
        carousel = document.querySelector('.about-carousel');

        if (!carousel) {
            return;
        }

        items = [...carousel.querySelectorAll('.about-carousel__item')];
        setup();
    };
    
    return {
        init: _init
    };
})();

(()=> {
    Vinali.About.init();
})();