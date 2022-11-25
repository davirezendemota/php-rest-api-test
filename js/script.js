const host = `edsa-workspace/php_rest_api`

const $fetchBtn = document.getElementById("fetch")
const $response = document.getElementById("response")

async function Fetch() {

  // console.log(window.location.host)
  
  $waiting = document.createElement("h1")
  $waiting.innerHTML = 'waiting...'

  $response.appendChild($waiting)

  await fetch(`api/post/read.php`)
    .then(res => res.json())
    .then(json => {
      $response.innerHTML = JSON.stringify(json)
    })
    
}

$fetchBtn.addEventListener('click', Fetch)