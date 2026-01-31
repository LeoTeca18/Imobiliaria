# 🔧 Documentação Técnica - Imobiliária Imotec

## Índice
1. [Modelos de Dados](#modelos-de-dados)
2. [Controllers](#controllers)
3. [Rotas](#rotas)
4. [Views](#views)
5. [JavaScript e Interatividade](#javascript-e-interatividade)
6. [Estilização](#estilização)

---

## 📊 Modelos de Dados

### Clientes
**Arquivo:** `app/Models/Clientes.php`

```php
protected $fillable = [
    'email',
    'senha',
    'nome',
    'contacto',
    'tipo',
    'pedido',
];
```

**Campos:**
- `email`: Email do cliente (único)
- `senha`: Senha do cliente (hash)
- `nome`: Nome completo
- `contacto`: Telefone de contato
- `tipo`: Tipo de cliente (comprador/proprietário)
- `pedido`: Status do pedido

---

### Apartamentos
**Arquivo:** `app/Models/apartamentos.php`

```php
protected $fillable = [
    'area',
    'bairro',
    'preco',
    'anoConstrucao',
    'topologia',
    'apartamento',
    'edificio',
    'andar',
    'id_cliente',
    'estado',
    'nome',
    'img',
    'descrição',
];
```

**Relacionamentos:**
```php
public function cliente() {
    return $this->belongsTo(clientes::class, 'id_cliente');
}
```

---

### Vivendas
**Arquivo:** `app/Models/vivendas.php`

```php
protected $fillable = [
    'area',
    'bairro',
    'preco',
    'anoConstrucao',
    'qtdQuarto',
    'tipo',
    'id_cliente',
    'estado',
    'nome',
    'img',
    'descrição',
];
```

---

### Terrenos
**Arquivo:** `app/Models/terrenos.php`

```php
protected $fillable = [
    'area',
    'bairro',
    'preco',
    'id_cliente',
    'estado',
    'nome',
    'img',
    'descrição',
];
```

---

### Compras
**Arquivo:** `app/Models/compras.php`

Registra transações de compra de imóveis.

---

### Alugueres
**Arquivo:** `app/Models/alugueres.php`

Registra contratos de aluguel.

---

### Reservas
**Arquivo:** `app/Models/reservas.php`

Gerencia reservas de imóveis por clientes.

---

### Visitas
**Arquivo:** `app/Models/visitas.php`

Agenda visitas a imóveis.

---

## 🎮 Controllers

### HomeController
**Arquivo:** `app/Http/Controllers/HomeController.php`

**Métodos principais:**

```php
// Listar imóveis em destaque na página inicial
public function listarDestaques()

// Processar login
public function login(Request $request)

// Processar logout
public function logout()

// Cadastro de novo cliente
public function store(Request $request)
```

---

### ClienteController
**Arquivo:** `app/Http/Controllers/ClienteController.php`

**Métodos principais:**

```php
// Listar todos os imóveis disponíveis
public function listarDestaques()

// Pesquisar imóveis com filtros
public function pesquisar(Request $request)

// Exibir detalhes de um imóvel
public function exibirDetalhes($id)

// Comprar imóvel
public function compra(Request $request, $id)

// Alugar imóvel
public function alugar(Request $request, $id)

// Fazer reserva
public function Areserva(Request $request, $id)

// Agendar visita
public function Avisita(Request $request, $id)
```

---

### FavoritosController ⭐ (NOVO)
**Arquivo:** `app/Http/Controllers/FavoritosController.php`

**Métodos:**

```php
// Exibir página de favoritos
public function index()

// Adicionar imóvel aos favoritos
public function adicionar(Request $request)

// Remover imóvel dos favoritos
public function remover(Request $request)
```

**Validações:**
```php
$request->validate([
    'imovel_id' => 'required|integer',
    'tipo' => 'required|in:apartamento,terreno,vivenda'
]);
```

---

### ComparacaoController 🔍 (NOVO)
**Arquivo:** `app/Http/Controllers/ComparacaoController.php`

**Métodos:**

```php
// Exibir página de comparação
public function index(Request $request)

// API para comparação
public function apiComparacao(Request $request)
```

**Exemplo de uso da API:**
```javascript
fetch('/api/comparacao', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': token
    },
    body: JSON.stringify({
        ids: ['apartamento-1', 'vivenda-2', 'terreno-3']
    })
})
```

---

### DashboardController 📊 (NOVO)
**Arquivo:** `app/Http/Controllers/DashboardController.php`

**Métodos:**

```php
// Exibir dashboard com estatísticas
public function index()

// API para estatísticas
public function apiEstatisticas()
```

**Estatísticas retornadas:**
- Total de imóveis disponíveis
- Vendidos no mês
- Alugados no mês
- Reservas ativas
- Total de clientes

---

### FuncionarioController
**Arquivo:** `app/Http/Controllers/FuncionarioController.php`

Gerencia funcionalidades para funcionários (negociantes e gestores).

---

### AdministradorController
**Arquivo:** `app/Http/Controllers/AdministradorController.php`

Gerencia funcionalidades administrativas do sistema.

---

## 🛣️ Rotas

### Rotas Gerais
```php
Route::get('/', [HomeController::class, 'listarDestaques']);
Route::get('/login', function () { return view('geral/login'); });
Route::post('login', [HomeController::class, 'login']);
Route::post('logout', [HomeController::class, 'logout']);
Route::get('/cadastro', [CadastroController::class, 'cadastro']);
```

### Rotas de Cliente
```php
Route::get('/cliente', [ClienteController::class, 'listarDestaques']);
Route::get('/pesquisar', [ClienteController::class, 'pesquisar']);
Route::get('/info/{id}', [ClienteController::class, 'exibirDetalhes']);
Route::put('/cliente/{id}/compra', [ClienteController::class, 'compra']);
Route::put('/cliente/{id}/alugar', [ClienteController::class, 'alugar']);
Route::put('/cliente/{id}/Areserva', [ClienteController::class, 'Areserva']);
Route::put('/cliente/{id}/Avisita', [ClienteController::class, 'Avisita']);
```

### Rotas de Favoritos ⭐ (NOVAS)
```php
Route::get('/favoritos', [FavoritosController::class, 'index']);
Route::post('/favoritos/adicionar', [FavoritosController::class, 'adicionar']);
Route::delete('/favoritos/remover', [FavoritosController::class, 'remover']);
```

### Rotas de Comparação 🔍 (NOVAS)
```php
Route::get('/comparar', [ComparacaoController::class, 'index']);
Route::post('/api/comparacao', [ComparacaoController::class, 'apiComparacao']);
```

### Rotas de Dashboard 📊 (NOVAS)
```php
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/api/estatisticas', [DashboardController::class, 'apiEstatisticas']);
```

### Rotas de Proprietário
```php
Route::get('/proprietario/iniP', [ClienteController::class, 'listarImoveisP']);
Route::get('/proprietario/vendidosP', [ClienteController::class, 'imoveisVendidos']);
Route::get('/proprietario/alugadosP', [ClienteController::class, 'imoveisAlugados']);
```

### Rotas de Funcionário (Negociante)
```php
Route::get('/negociante/iniN', [FuncionarioController::class, 'listarImoveis']);
Route::get('/negociante/vendidosN', [FuncionarioController::class, 'imoveisVendidos']);
Route::get('/negociante/reservasN', [FuncionarioController::class, 'imoveisReservados']);
```

### Rotas de Funcionário (Gestor)
```php
Route::get('/gestor/iniG', [FuncionarioController::class, 'listarProprietarios']);
Route::put('/gestor/{id}/validar-pedido', [FuncionarioController::class, 'validarPedido']);
```

### Rotas de Administrador
```php
Route::middleware(['auth'])->group(function () {
    Route::get('/ADM/clientes', [AdministradorController::class, 'listarClientes']);
    Route::get('/ADM/iniA', [AdministradorController::class, 'listarAgencias']);
    Route::get('/ADM/imoveis', [AdministradorController::class, 'listarImoveis']);
});
```

---

## 🎨 Views

### Layout Moderno
**Arquivo:** `resources/views/layouts/modern.blade.php`

Layout base para todas as páginas com:
- Header responsivo
- Navegação moderna
- Footer completo
- Scripts para favoritos
- Meta tags para SEO

**Seções disponíveis:**
- `@yield('title')` - Título da página
- `@yield('navigation')` - Itens de navegação
- `@yield('content')` - Conteúdo principal
- `@yield('scripts')` - Scripts adicionais
- `@yield('extra-css')` - CSS adicional

---

### Página Inicial do Cliente (Moderna)
**Arquivo:** `resources/views/cliente/iniC-modern.blade.php`

**Componentes:**
1. Hero Section com busca
2. Filtros avançados
3. Dashboard com estatísticas
4. Cards de propriedades
5. Botão de favoritos
6. Ações rápidas (comprar, reservar, visitar)

---

### Página de Favoritos
**Arquivo:** `resources/views/cliente/favoritos.blade.php`

**Funcionalidades:**
- Lista de imóveis favoritos
- Carregamento dinâmico via JavaScript
- Integração com localStorage
- Remoção de favoritos
- Estado vazio personalizado

---

### Página de Comparação
**Arquivo:** `resources/views/cliente/comparacao.blade.php`

**Funcionalidades:**
- Comparação lado a lado
- Características detalhadas
- Opção de impressão
- Exportação para PDF (em desenvolvimento)

---

## ⚡ JavaScript e Interatividade

### Sistema de Favoritos

**localStorage:**
```javascript
// Estrutura de dados
{
  "favorites": ["apartamento-1", "vivenda-2", "terreno-3"]
}
```

**Funções principais:**

```javascript
// Adicionar favorito
function addFavorite(id) {
    let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
    if (!favorites.includes(id)) {
        favorites.push(id);
        localStorage.setItem('favorites', JSON.stringify(favorites));
    }
}

// Remover favorito
function removeFavorite(id) {
    let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
    favorites = favorites.filter(fav => fav !== id);
    localStorage.setItem('favorites', JSON.stringify(favorites));
}

// Verificar se é favorito
function isFavorite(id) {
    const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
    return favorites.includes(id);
}
```

---

### Sistema de Pesquisa

```javascript
function searchProperties() {
    const location = document.getElementById('search-location').value;
    const type = document.getElementById('search-type').value;
    
    let url = '/pesquisar?';
    if (location) url += 'location=' + encodeURIComponent(location) + '&';
    if (type) url += 'type=' + type;
    
    window.location.href = url;
}
```

---

### Filtros Avançados

```javascript
function applyFilters() {
    const params = new URLSearchParams();
    
    const priceMin = document.getElementById('price-min').value;
    const priceMax = document.getElementById('price-max').value;
    const bedrooms = document.getElementById('bedrooms').value;
    const area = document.getElementById('area').value;
    const neighborhood = document.getElementById('neighborhood').value;
    
    if (priceMin) params.append('price_min', priceMin);
    if (priceMax) params.append('price_max', priceMax);
    if (bedrooms) params.append('bedrooms', bedrooms);
    if (area) params.append('area', area);
    if (neighborhood) params.append('neighborhood', neighborhood);
    
    window.location.href = '/pesquisar?' + params.toString();
}
```

---

### Carregamento de Favoritos

```javascript
async function loadFavorites() {
    const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
    
    if (favorites.length === 0) {
        showEmptyState();
        return;
    }

    try {
        const response = await fetch('/api/comparacao', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getCSRFToken()
            },
            body: JSON.stringify({ ids: favorites })
        });

        const imoveis = await response.json();
        renderProperties(imoveis);
    } catch (error) {
        console.error('Erro ao carregar favoritos:', error);
    }
}
```

---

## 🎨 Estilização

### CSS Moderno
**Arquivo:** `public/css/modern-style.css`

#### Variáveis CSS
```css
:root {
    --primary-color: #2563eb;
    --secondary-color: #f59e0b;
    --accent-color: #10b981;
    --dark-color: #1f2937;
    --light-color: #f9fafb;
    --danger-color: #ef4444;
    --border-radius: 12px;
    --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
```

#### Classes Principais

**Header:**
```css
.modern-header
.header-container
.logo-section
.nav-menu
```

**Hero:**
```css
.hero-section
.hero-content
.search-box
```

**Cards:**
```css
.property-card
.property-card-image
.property-card-content
.property-badge
.favorite-btn
```

**Filtros:**
```css
.filters-section
.filters-grid
.filter-group
```

**Dashboard:**
```css
.dashboard-stats
.stat-card
.stat-icon
.stat-content
```

**Botões:**
```css
.btn-primary
.btn-secondary
.btn-outline
```

#### Responsividade
```css
@media (max-width: 768px) {
    /* Mobile styles */
    .property-grid {
        grid-template-columns: 1fr;
    }
    
    .search-box {
        flex-direction: column;
    }
}
```

#### Animações
```css
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.property-card {
    animation: fadeInUp 0.6s ease-out;
}
```

---

## 🔐 Segurança

### CSRF Protection
Todas as requisições POST, PUT e DELETE requerem token CSRF:

```html
<meta name="csrf-token" content="{{ csrf_token() }}">
```

```javascript
headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
}
```

### Validação de Dados

```php
$request->validate([
    'email' => 'required|email|unique:users',
    'senha' => 'required|min:6',
    'nome' => 'required|string|max:255',
]);
```

### Sanitização
Laravel sanitiza automaticamente os inputs via middleware.

---

## 📦 Dependências

### Composer (PHP)
```json
{
    "require": {
        "php": "^8.0",
        "laravel/framework": "^9.0",
        "laravel/sanctum": "^3.0"
    }
}
```

### NPM (JavaScript)
```json
{
    "devDependencies": {
        "vite": "^4.0",
        "laravel-vite-plugin": "^0.7"
    }
}
```

---

## 🧪 Testes

### Executar Testes
```bash
php artisan test
```

### Criar Teste
```bash
php artisan make:test FavoritosTest
```

---

## 📊 Performance

### Cache
```php
// Cachear listagem de imóveis
Cache::remember('imoveis-destaque', 3600, function () {
    return Apartamentos::where('estado', 0)->take(10)->get();
});
```

### Eager Loading
```php
// Evitar N+1 queries
$apartamentos = Apartamentos::with('cliente')->get();
```

### Indexação de Banco de Dados
```sql
CREATE INDEX idx_estado ON apartamentos(estado);
CREATE INDEX idx_preco ON apartamentos(preco);
CREATE INDEX idx_bairro ON apartamentos(bairro);
```

---

**© 2026 Imobiliária Imotec - Documentação Técnica**
