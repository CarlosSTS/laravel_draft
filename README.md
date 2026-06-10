# 📚 Aprendizados Laravel

## 🛣️ Rotas

O arquivo de rotas define os endpoints da aplicação.

### Arquivo padrão

Por padrão, o Laravel utiliza o arquivo:

```php
routes/web.php
```

Entretanto, em projetos que funcionam apenas como API (sem interface visual para o usuário), é comum utilizar:

```php
routes/api.php
```

### Exemplo

Se existir uma rota para listar usuários em `routes/api.php`:

```php
Route::get('/users', [UserController::class, 'index']);
```

Ela ficará disponível em:

```text
http://SEU_IP/api/users
```

> O prefixo `/api` é adicionado automaticamente para as rotas definidas em `api.php`.

---

## 🎮 Criando Controllers

Para criar um controller, execute:

```bash
php artisan make:controller ControllerName
```

O arquivo será criado em:

```text
app/Http/Controllers/ControllerName.php
```

Após criar o controller, registre suas rotas no arquivo:

```php
routes/api.php
```

---

## 🔗 Associando Rotas aos Controllers

A sintaxe básica de uma rota é:

```php
Route::metodo('/caminho', [Controller::class, 'metodoDoController']);
```

### Exemplo

```php
Route::get('/welcome', [App\Http\Controllers\MainController::class, 'welcome']);

Route::get('/current-time', [App\Http\Controllers\MainController::class, 'currentTime']);

Route::get('/current-date', [App\Http\Controllers\MainController::class, 'currentDate']);
```

### Explicação

- `Route::get()` → Define uma rota do tipo GET.
- `/welcome` → Caminho da URL.
- `MainController::class` → Controller responsável pela requisição.
- `welcome` → Método do controller que será executado.

### URLs geradas

```text
GET http://SEU_IP/api/welcome
GET http://SEU_IP/api/current-time
GET http://SEU_IP/api/current-date
```

---

## 📌 Fluxo Básico

1. Criar um controller.

```bash
php artisan make:controller UserController
```

2. Criar os métodos dentro do controller.

```php
class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Lista de usuários'
        ]);
    }
}
```

3. Registrar a rota.

```php
Route::get('/users', [UserController::class, 'index']);
```

4. Acessar a URL.

```text
http://SEU_IP/api/users
```
