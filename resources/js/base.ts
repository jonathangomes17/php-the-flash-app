import {docReady, on, all, hasClass, removeClass, addClass} from "./infrastructure/dom";

docReady(() => {
    on(all('.js__dropdown'), 'click', (element: Element) => {
        let elDropdown = element.nextElementSibling

        hasClass(elDropdown, 'dropdown--active')
            ? removeClass(elDropdown, 'dropdown--active')
            : addClass(elDropdown, 'dropdown--active');
    })
})
