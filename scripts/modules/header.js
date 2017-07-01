'use strict';

const Vinali = Vinali || {};

Vinali.Header = (() => {
    const _init = () => {
        const header = document.querySelector('header');
        const menuIcon = document.querySelector('.header__menu-icon');
        
        menuIcon.addEventListener('click', () => {
            header.classList.toggle('menu-open');
        });
    };
    
    return {
        init: _init
    };
})();

(()=>{
    Vinali.Header.init();
})();