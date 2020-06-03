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

* Incluir a Trait no model User (User.php) conforme abaixo:
```php
 
use EPSJV\Acl\Traits\HasPapeis;

class User extends Authenticatable
{
    use HasPapeis;
    
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


Veja tudo sobre a utilização de [AUTHORIZATIONS](hhttps://laravel.com/docs/6.x/authorization).

Para mais informações sobre o laravel, consulte a [documentação oficial](https://laravel.com/docs/) 6.x do Laravel.

#### Licença
MIT
