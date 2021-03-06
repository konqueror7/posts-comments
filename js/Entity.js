import { createRequest } from './createRequest.js'

class Entity {
  static search(data, callback = f => f) {
    const xhr = createRequest({
      url: '../search.php',
      // url: 'http://glavpunkt.localhost/search.php',
      data: data,
      callback: callback
    })
    return xhr
  }
}

export { Entity }
