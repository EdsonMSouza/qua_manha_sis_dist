const axios = require('axios')

const data = {
  'type': 'login',
  'user': 'edson.melo',
  'password': 'edson123'
}

axios.post('https://www.edsonmelo.com.br/api_rest/user.php', data)
  .then((res) => {
    console.log(`Status: ${res.status}`);
    console.log('Body:', res.data, '\n')

    // Percorre os dados retornados
    for (let item in res.data) {
      console.log(item, ':', res.data[item]);
    }

  }).catch((err) => {
    console.error(err)
  });