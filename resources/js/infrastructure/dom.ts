
export function docReady(fn) {
  if (document.readyState === 'complete' || document.readyState === 'interactive') {
    setTimeout(fn, 1)
  } else {
    document.addEventListener('DOMContentLoaded', fn)
  }
}

export function el(selector) {
  return document.querySelector(selector)
}

export function all(selector) {
  return document.querySelectorAll(selector)
}

export function findEl(element: Element, selector: string): any {
    return element.querySelector(selector)
}

export function findAll(element: Element, selector: string): any {
    return element.querySelectorAll(selector)
}

export function each(element: NodeList, callback: CallableFunction) {
    return Array.prototype.slice.call(element).forEach((row, index) => callback(row, index))
}

export function addClass(currentEl, cssClass) {
  if (Symbol.iterator in Object(currentEl)) {
    Array.prototype.slice.call(currentEl).forEach((el) => el.classList.remove(cssClass))
    return
  }

  currentEl.classList.add(cssClass)
}

export function appendChild(currentEl, html) {
    currentEl.appendChild(html)
}

export function html(currentEl, content) {
    if (content !== undefined){
        if (currentEl.constructor === NodeList) {
            Array.prototype.slice.call(currentEl).forEach(el => {
                el.innerHTML = content;
            });
        } else {
            currentEl.innerHTML = content;
        }
    }

    return currentEl.innerHTML;
}

export function on(currentEl: NodeList | any, listener: string, callback: CallableFunction) {
  if (currentEl.constructor === NodeList) {
    Array.prototype.slice.call(currentEl).forEach((elRow) => {
      elRow.addEventListener(
        listener,
        (e) => {
          e.stopPropagation()
          e.preventDefault()
          e.stopImmediatePropagation()

          return callback(e.target, e)
        },
        false,
      )
    })

    return
  }

  currentEl.addEventListener(listener, (event) => callback(currentEl, event))
}

export function find(currentEl, className) {
  let childNodes = currentEl.childNodes

  if (childNodes.constructor === NodeList) {
    //@ts-ignore
    let filteredEl = [...childNodes].filter((el) => {
      console.log(el.className)
      return String(el.className).includes(className) === true ? el : false
    })[0]

    return filteredEl === undefined ? false : el(filteredEl)
  }

  return false
}


//
// export function empty(currentEl) {
//     if (currentEl.tagName === 'INPUT') {
//         value(currentEl, '');
//     } else if (currentEl.tagName === 'SELECT') {
//         //resetSelected(currentEl);
//     } else {
//         html(currentEl,'');
//     }
// }
//
// // export function resetSelected(currentEl) {
// //     Array.prototype.slice.call(currentEl.children)
// //         .map(item => el(item).removeAttr("selected"));
// // }
//
export function getAttr(currentEl, attrName) {
  return currentEl.getAttribute(attrName)
}
//
// export function getContent(currentEl) {
//     return currentEl.textContent;
// }
//
// export function getParent(currentEl) {
//     return el(currentEl.parentNode);
// }
//

export function getSibling(currentEl: Element) {
    return currentEl.nextSibling;
}

export function hasClass(currentEl, className) {
  return currentEl.classList.contains(className)
}

export function removeClass(currentEl, cssClass) {
  if (Symbol.iterator in Object(currentEl)) {
    Array.prototype.slice.call(currentEl).forEach((el) => el.classList.remove(cssClass))
    return
  }

  currentEl.classList.remove(cssClass)
}

//
// export function removeAllClasses(currentEl) {
//     currentEl.removeAttribute('class')
// }
//
export function removeAttr(currentEl, attrName) {
    currentEl.removeAttribute(attrName);
}

export function setAttr(currentEl, attrName, value) {
    currentEl.setAttribute(attrName, value);
}

export function value(currentEl, content) {
    if (!currentEl) return

    if (content !== undefined) {
        if (currentEl.constructor === NodeList) {
            Array.prototype.slice.call(currentEl).forEach(el => {
                el.value = content;
            });
        } else {
            currentEl.value = content;
        }

        return;
    }

    return currentEl.value;
}

export function setSelected(selectEl: HTMLSelectElement, optionSelected: string) {
    for (var i = 0; i < selectEl.options.length; i++) {
        if (selectEl.options[i].value === optionSelected) {
            selectEl.options[i].selected = true
        }
    }
}

//
// // export function loading(content) {
// //     const isDisabled = getAttr('disabled');
// //
// //     if (isDisabled) {
// //         removeAttr('disabled').html(this.content);
// //         this.content = null;
// //         return;
// //     }
// //
// //     this.content = this.getContent();
// //     this.setAttr('disabled', 'disabled').html('<div class="loader"></div>');
// // }

export function findByEvent(event, className) {
  const path = event.path || (event.composedPath && event.composedPath())

  const currentEl = path.find((el) => String(el.className).includes(className))

  return currentEl ? currentEl : false
}
