'use strict';

const Vinali = Vinali || {};

Vinali.Industry = (() => {
    const tabActive = 'industry__switch-tab--active';
    const contentActive = 'industry__switch-content__copy--active';
    let tabs;
    let currentTab;
    let content;
    let currentContent;

    const _addActiveClasses = (index) => {
        tabs[index].classList.add(tabActive);
        content[index].classList.add(contentActive);
    };

    const _removeActiveClasses = (index) => {
        tabs[index].classList.remove(tabActive);
        content[index].classList.remove(contentActive);
    };

    const _handleTabClick = (evt) => {
        const tab = parseInt(evt.target.dataset.tab, 10);
        const remove = tab === 0 ? 1: 0;

        _removeActiveClasses(remove);
        _addActiveClasses(tab);
    };

    const _init = () => {
        const industrySwitch = document.querySelector('.industry__switch');

        if (!industrySwitch) {
           return;
        }

        tabs = [...industrySwitch.querySelectorAll('.industry__switch-tab')];
        content = [...industrySwitch.querySelectorAll('.industry__switch-content__copy')];

        tabs.forEach((tab) => {
            tab.addEventListener('click', _handleTabClick);
        });

        _addActiveClasses(0);
    };
    
    return {
        init: _init
    };
})();

(()=>{
    Vinali.Industry.init();
})();