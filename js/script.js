'use strict'

const searchForm = document.forms.search_form
const searchResult = document.querySelector('.search-result')
console.log(searchResult)
let resultArray = []

const createRequest = async (options = {}) => {
  let {
    url,
    data,
    callback
  } = options

  try {
    let response = await fetch(url, {
      method: 'POST',
      body: data,
    })
    if (response.ok) {
      let json_response = await response.json()
      callback.call(this, null, json_response)
    } else {
      console.log("Ошибка HTTP: " + response.status)
    }
  } catch (e) {
    console.log(e)
    callback.call(this, e, null)
  }
}

searchForm.addEventListener('submit', (event) => {
  event.preventDefault()
  const searcFormData = new FormData(searchForm)
  createRequest({
    url: 'http://glavpunkt.localhost/search.php',
    data: searcFormData,
    callback: (err, response) => {
      if (response && response.success === true) {
        render(response.result)
      } else {
        searchResult.innerHTML = ''
      }
    }
  })
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
