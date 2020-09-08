import {docReady} from "../../infrastructure/dom";

import {
    breadcrumbHero,
    additionalInfoHero,
    actionsHero
} from "../../infrastructure/contentHero";

docReady(() => {
    breadcrumbHero([
        {link: '/', description: 'Página inicial'},
        {description: 'Exemplo'}
    ])

    additionalInfoHero(`<h1>Título da página de exemplo</h1>`, 'Título Head')

    actionsHero('<button>Confirmar </button>')
})
