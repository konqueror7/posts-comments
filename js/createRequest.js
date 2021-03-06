const createRequest = async (options = {}) => {
  let {
    url,
    data,
    callback
  } = options;

  try {
    let response = await fetch(url, {
      method: 'POST',
      body: data,
    });
    if (response.ok) {
      let json_response = await response.json();
      callback.call(this, null, json_response);
    } else {
      console.log("Ошибка HTTP: " + response.status);
    }
  } catch (e) {
    console.log(e);
    callback.call(this, e, null);
  }
}

export { createRequest }
