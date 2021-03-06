'use strict'
import { Entity } from './Entity.js'

const searchForm = document.forms.search_form
const searchResult = document.querySelector('.search-result')

searchForm.addEventListener('submit', (event) => {
  event.preventDefault()
  const searcFormData = new FormData(searchForm)
  Entity.search(
    searcFormData,
    (err, response) => {
      if (response && response.success === true) {
        render(response.result)
      } else {
        searchResult.innerHTML = ''
      }
    }
  )
  searchForm.reset()
})

function render( results ) {
  searchResult.innerHTML = ''
  for (let key in results) {
    searchResult.innerHTML += renderItem(results[key]);
  }
}

function renderItem(item) {
  let {
    post_title,
    body
  } = item
  return `
    <div class="search-result-item">
      <h2>${post_title}</h2>
      <p>${body}</p>
    </div>
  `
}
