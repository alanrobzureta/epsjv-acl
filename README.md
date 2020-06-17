# EPSJV Acl Laravel


## Descrição

laravel-acl é um pacote criado para facilitar o processo de criação das regras de controle de acesso baseado em papéis de usuários, possibilitando o controle de acesso de usuários com multipos papéis.


## Requisitos
* [PHP](https://php.net) 5.6+
* [Laravel](https://laravel.com/) 5.2+


## Instalação 

+ Execute o seguinte comando:
```php
composer require epsjv/acl
```

* Baseado em uma instalação limpa abra o arquivo `config/app.php` navegue até a seção `providers` e insira no final
```php
 EPSJV\Acl\Providers\ServiceProvider::class,
 ``` 
 
* Publicar:
```php
 php artisan vendor:publish --provider="EPSJV\Acl\Providers\ServiceProvider"
```
* Registrar as Seeds básicas de permissões no database/seeds/DatabaseSeeder.php:
```php
public function run()
{
        // $this->call(UsersTableSeeder::class);
        $this->call(AclPapelTableSeeder::class);
        $this->call(AclPermissaoTableSeeder::class);
        $this->call(AclPapelUserTableSeeder::class);
        $this->call(AclPapelPermissaoTableSeeder::class);
}
```

* Executar o seguinte comando para rodar a seed:
```php
 php artisan migrate --seed
```

* Abra o arquivo App\Providers\AuthServiceProvider.php da aplicação para configurar conforme abaixo:
```php
namespace App\Providers;

use EPSJV\Acl\Traits\MakeAuthorizations; // Importar a Trait MakeAuthorizations do pacote
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    use MakeAuthorizations;
    
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => 'EPSJV\Acl\Policies\UserPolicy', // Registrar a policy
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
       $this->makeAuthorizations(); // Invocar o método makeAuthorizations
    }
}

```

* Incluir as Traits "HasPapeis" e "WithPapeis" no model User (User.php) conforme abaixo:
```php
 
use EPSJV\Acl\Traits\HasPapeis;
use EPSJV\Acl\Traits\WithPapeis;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasPapeis, WithPapeis;
    
}
```

> O pacote conta com uma estrutura de dados pronta e simples para trabalhar as permissões e os papéis de usuário.


## Como utilizar
A forma de utilização é a mesma de qualquer outra regra pré-existente, pois para o controle de acesso, basta usar os próprios métodos fornecidos pelo laravel para isso: GATES e POLICIES.


Você pode projeger suas rotas das seguintes formas:

Proteção das Rotas:

```php
    /**
     * Verifica se a permission encontrada está contida na lista de permissions associada ao papel do usuário
     *
     * @param Permissao $permissao
     * @return true
     * 
     * @example rota - Para usar na rota, basta chamar uma middleware, passando a chave 'can' e o nome da permission que deseja autorizar
     * 
     *           Route::get('edit/{curso}', 'CursoController@edit')->name('curso.edit')->middleware('can:editar_curso');
     *
     */

```


Proteção dos Controllers:

```php
    /**
     * Verifica se a permission encontrada está contida na lista de permissions associada ao papel do usuário
     *
     * @param Permissao $permissao
     * @return true
     * 
     * @example controller - Para usar no controller, basta chamar o método authorize no início de cada action, passando o nome da permission e o $model
     * 
     *           public function edit(Curso $curso)
     *           {
     *                  $this->authorize('editar_curso', $curso);
     *           }
    */

```


Proteção das Views:

```php
    /**
     * Verifica se a permission encontrada está contida na lista de permissions associada ao papel do usuário
     *
     * @param Permissao $permissao
     * @return true
     * 
     * @example view - Para usar na view blade, é necessário envolver o trecho de código que deseja autorizar 
     *              com o nome da permission usando a facade @can ou @cannot    
     * 
     *          @can('editar_curso', $cursos) 
     *                  {{-- código aqui --}}
     *          @endcan
     */

```

## E se eu quiser carregar uma sessão com o papel?
A implementação desse pacote é para um cenário onde são carregados todos os papéis e permissões associados ao usuário. Porém você pode implementar sua própria lógica para carregar um papel por acesso. 

Um exemplo dessa implementação pode ser feito da seguinte forma:

1) Dentro do Diretório "app" da sua aplicação, crie uma pasta chamada "Traits".

2) Dentro dessa nova pasta, crie uma Trait chamada MakeAuthorizations.php com o seguinte conteudo:

```php
    <?php

namespace App\Traits;

use App\User;
use EPSJV\Acl\Permissao;
use Illuminate\Support\Facades\Gate;

trait MakeAuthorizations
{
    public function makeAuthorizations()
    {
        $permissoes = Permissao::with('papeis')->get();
        
        foreach ($permissoes as $permissao) {
            Gate::define($permissao->nome, function(User $user) use ($permissao) {                                        
                return $permissao->papeis->pluck('id')->contains(session('session_papel_id'));  
            });            
        }
    }
    
}

```

3) No AuhServiceProvider de sua aplicação, altere o import da Trait para passar a utilizar Trait criada ao invés da Trait do pacote:

 - Substituir em App\Providers\AuhServiceProvider.php:
```php

use EPSJV\Acl\Traits\MakeAuthorizations;

```
 - para:
```php

use App\Traits\MakeAuthorizations;

```

#

Veja tudo sobre a utilização de [AUTHORIZATIONS](hhttps://laravel.com/docs/6.x/authorization).

Para mais informações sobre o laravel, consulte a [documentação oficial](https://laravel.com/docs/) 6.x do Laravel.

#### Licença
MIT
