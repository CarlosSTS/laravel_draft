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

Route::get('/time', [App\Http\Controllers\MainController::class, 'currentTime']);

Route::get('/date', [App\Http\Controllers\MainController::class, 'currentDate']);
```

### Explicação

- `Route::get()` → Define uma rota do tipo GET.
- `/welcome` → Caminho da URL.
- `MainController::class` → Controller responsável pela requisição.
- `welcome` → Método do controller que será executado.

### URLs geradas

```text
GET http://SEU_IP/api/welcome
GET http://SEU_IP/api/time
GET http://SEU_IP/api/date
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

---

## 📥 Re'cebendo Dados da Requisição

O Laravel disponibiliza o objeto `Request''''` para acessar os dados enviados pelo cliente.'

Exemplo:

```php
public function sum(Request $request)
{
    $value1 = $request->input('value1');
    $value2 = $request->input('value2');

    $sum = $value1 + $value2;

    return response()->json([
        'message' => "{$value1} + {$value2} = {$sum}"
    ]);
}
```

Com `input()` é possível acessar valores enviados na requisição.

---

## 📤 Retornando Respostas JSON

Para respostas da API foi utilizado:

```php
response()->json()
```

Exemplo:

```php
return response()->json([
    'message' => 'API is running!'
]);
```

Esse formato facilita a comunicação entre frontend e backend.

---

## 🔀 Parâmetros na URL

Também é possível receber valores diretamente pela rota.

Exemplo:

```php
Route::get('/greet/{name}', [MainController::class, 'greetClient']);
```

Controller:

```php
public function greetClient($name)
{
    return response()->json([
        'message' => 'Hello, ' . ucfirst($name)
    ]);
}
```

URL:

```text
GET /api/greet/Carlos
```

---

## 💾 Manipulação de Arquivos

Para armazenamento simples sem banco de dados foi utilizada a pasta `storage`.

Salvar conteúdo:

```php
file_put_contents(
    storage_path('contacts.txt'),
    $content,
    FILE_APPEND
);
```

Ler conteúdo:

```php
fopen()
fgets()
json_decode()
```

Remover conteúdo:

```php
unlink()
```

---

## 📂 Organização do Fluxo

Neste projeto o fluxo segue:

```text
Rota
↓
Controller
↓
Processamento
↓
Resposta JSON
```

As rotas recebem a requisição e direcionam para os métodos responsáveis.

---

## ✅ Rotas Implementadas

```text
GET  /api/status

GET  /api/welcome
GET  /api/time
GET  /api/date

GET  /api/greet/{name}

POST /api/sum

POST /api/store-contact
GET  /api/get-contacts
GET  /api/clear-contacts
```

## Collection

Importe a collection localizada em:

```text
docs/api-collection.json
```

Crie uma variável global para definir a URL base da API:

```json
{
    "base_url": "http://localhost:8000"
}
```

Depois utilize a variável nas requisições:

```text
{{base_url}}/api/welcome
```
