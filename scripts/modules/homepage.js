'use strict';

const Vinali = Vinali || {};

Vinali.Homepage = (() => {
    let current = 0;
    let hero;
    let items = [];
    let indicators = [];
    let currentIndicatorProgress;
    let intervalMethod;

    const _playSlide = () => {
        const interval = 250;
        const limit = 6000;
        const startTime = new Date().getTime();
        const progress = indicators[current].querySelector('.homepage__hero-indicator-progress');
        
        items[current].classList.add('homepage__hero-item--active');
        progress.classList.add('homepage__hero-indicator-progress--active');
        
        intervalMethod = setInterval(() => {
            const currentTime = new Date().getTime();

            if (currentTime - startTime > limit) {
                clearInterval(intervalMethod);
                items[current].classList.remove('homepage__hero-item--active');
                
                progress.classList.remove('homepage__hero-indicator-progress--active');
                progress.style.width = '0';
                current = (current >= items.length - 1) ? 0 : current + 1;
                
                _playSlide();
                return;
            }
            
            const percentage = ((currentTime - startTime) / limit * 100);
            progress.style.width = `${percentage}%`;
        }, interval);
    };

    const _setupIndicators = () => {
        const indicatorContainer = hero.querySelector('.homepage__hero-indicators');

        for (let i = 0; i < items.length; i++) {
             const indicator = document.createElement('div');
             const indicatorProgress = document.createElement('span');
            
             indicatorProgress.classList.add('homepage__hero-indicator-progress');
             indicator.appendChild(indicatorProgress);
             indicator.classList.add('homepage__hero-indicator');
             indicator.dataset.item = i; 
             indicatorContainer.appendChild(indicator);

             if (window.innerWidth < 1024) {
                indicator.style.width = (100 / items.length) + 'vw';
             }

             indicators.push(indicator);
        }

        _playSlide();
    };

    const _init = () => {
        hero = document.querySelector('.homepage__hero');
      
        if (!hero) {
            return;
        }
        
        items = [...hero.querySelectorAll('.homepage__hero-item')];
        items[0].classList.add('homepage__hero-item--active');
       
        _setupIndicators();

        //Home Page Blocks
        const blockContents = [...document.querySelectorAll('.homepage__block-title')];
        
        for (let i = 0; i < blockContents.length; i++) {
            blockContents[i].addEventListener('click', () => {
                blockContents[i].parentNode.classList.toggle('homepage__block-content--active');
            });
        }
    };
    
    return {
        init: _init
    };
})();

(()=>{
    Vinali.Homepage.init();
})();