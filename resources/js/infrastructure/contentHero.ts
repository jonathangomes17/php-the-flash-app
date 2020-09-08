import {el, html} from './dom'

import {TBreadcrumbItem} from "../types/Breadcrumb";

export function breadcrumbHero(items: TBreadcrumbItem[]) {

    let breadcrumb = el('.theflashapp-breadcrumb')

    let breadcrumbHtml = ''

    items.forEach((item, index) => {
        let itemOption = `<span> ${item.description} </span>`

        let separator = items.length === (index + 1)
            ? ''
            : `<span class="theflashapp-breadcrumb__separator"> / </span>`

        if (item.link) {
            itemOption = `
                <span>
                    <span class="theflashapp-breadcrumb__item">
                      <a href="${item.link}" class="theflashapp-breadcrumb__link"> ${itemOption} </a>
                    </span>
    
                    ${separator}
                </span>
            `
        } else {
            itemOption = `<span> ${item.description} </span> ${separator}`
        }

        breadcrumbHtml = breadcrumbHtml.concat(itemOption)
    })

    html(breadcrumb, breadcrumbHtml)
}

export function additionalInfoHero(markup: string, title?: string) {
    let additionalInfo = el('#content-hero-additional-info')

    if (title) {
        //@ts-ignore
        document.querySelector('head > title').innerHTML = title + ' | The Flash App'
    }

    html(additionalInfo, markup)
}

export function actionsHero(markup: string) {
    let actions = el('#content-hero-actions')

    html(actions, markup)
}
