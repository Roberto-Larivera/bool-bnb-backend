## Utilizzo Repo Backend
- clonare repo
- creare db
- trasferimento in branch 'develop'
- terminale: `composer install`
- terminale: `npm install`
- copiare il file '.env.example' e rinominarlo in '.env' * e non rinominarlo direttamente senza fare il copia (come ha fatto il sign. Monopoli)
    - riempire i dati di .env ++++++ aggiungere a `APP_FRONTEND_URL=` la rotta del server FRONTEND. * Se si starta prima i due server di laravel e come terzo quello di vue non bisogna aggiungere questo dato.
- generare la key su terminale: `php artisan key:generate`
- fare da terminale: `php artisan migrate --seed`
- ognuno di noi ha email e password associate: nome@email.it | password // es: `roberto@email.it - password`
- le icone di FontsAsome in Laravel non si usano con la sintassi di vue ma con `<i class="fa-solid fa-cart-shopping"></i>`
- scrivere al terminale: `php artisan storage:link`
### Per modifiche e aggiunte si lavora con dei brench creati es: `feat/example`, e non su Master e Develop