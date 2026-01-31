# 🚀 Guia Rápido - Imobiliária Imotec

## ⚡ Início Rápido

### 1. Instalação (5 minutos)
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

Acesse: `http://localhost:8000`

---

## 🎯 Novas Funcionalidades (Versão 2.0)

### ✨ Interface Moderna
- Design responsivo e moderno
- Cores vibrantes e gradientes
- Animações suaves
- Cards elegantes

### ❤️ Sistema de Favoritos
**Como usar:**
1. Clique no coração 🤍 em qualquer imóvel
2. Acesse "Favoritos" no menu
3. Gerencie seus imóveis salvos

**Código:**
```html
<button class="favorite-btn" data-id="apartamento-1">🤍</button>
```

### 🔍 Comparação de Imóveis
**Como usar:**
1. Navegue para `/comparar?ids=apartamento-1,vivenda-2`
2. Veja características lado a lado
3. Imprima ou exporte

**API:**
```javascript
fetch('/api/comparacao', {
    method: 'POST',
    body: JSON.stringify({ ids: ['apartamento-1', 'vivenda-2'] })
});
```

### 📊 Dashboard Estatístico
- Total de imóveis disponíveis
- Vendas do mês
- Clientes ativos
- Métricas em tempo real

**Acesse:** `/dashboard`

### 🎨 Filtros Avançados
- Preço (mínimo/máximo)
- Número de quartos
- Área em m²
- Bairro
- Tipo de imóvel

---

## 📁 Arquivos Importantes

### Novos Arquivos Criados

#### CSS
```
public/css/modern-style.css
```
Interface moderna e responsiva

#### Controllers
```
app/Http/Controllers/FavoritosController.php
app/Http/Controllers/ComparacaoController.php
app/Http/Controllers/DashboardController.php
```

#### Views
```
resources/views/layouts/modern.blade.php
resources/views/cliente/iniC-modern.blade.php
resources/views/cliente/favoritos.blade.php
resources/views/cliente/comparacao.blade.php
```

#### Rotas Atualizadas
```
routes/web.php
```

#### Documentação
```
README.md (atualizado)
DOCUMENTACAO_TECNICA.md (novo)
GUIA_RAPIDO.md (este arquivo)
```

---

## 🎨 Customização Rápida

### Cores
Edite `public/css/modern-style.css`:
```css
:root {
    --primary-color: #2563eb;     /* Azul */
    --secondary-color: #f59e0b;   /* Laranja */
    --accent-color: #10b981;      /* Verde */
}
```

### Logo
Substitua `public/img/logo.png`

### Textos
Edite `resources/views/layouts/modern.blade.php`

---

## 🔧 Comandos Úteis

### Desenvolvimento
```bash
# Iniciar servidor
php artisan serve

# Compilar assets (modo desenvolvimento)
npm run dev

# Watch mode (recompila automaticamente)
npm run watch
```

### Produção
```bash
# Compilar para produção
npm run build

# Otimizar aplicação
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Manutenção
```bash
# Limpar cache
php artisan cache:clear

# Recarregar autoload
composer dump-autoload

# Executar migrações
php artisan migrate
```

---

## 📱 Rotas Principais

### Cliente
- `/` - Página inicial
- `/cliente` - Dashboard do cliente
- `/pesquisar` - Pesquisa de imóveis
- `/favoritos` - Lista de favoritos
- `/comparar` - Comparar imóveis
- `/info/{id}` - Detalhes do imóvel
- `/comprados` - Imóveis comprados
- `/reservas` - Minhas reservas
- `/visita` - Minhas visitas

### Proprietário
- `/proprietario/iniP` - Dashboard
- `/proprietario/adicionar` - Adicionar imóvel
- `/proprietario/vendidosP` - Imóveis vendidos
- `/proprietario/alugadosP` - Imóveis alugados

### Funcionário (Negociante)
- `/negociante/iniN` - Dashboard
- `/negociante/vendidosN` - Vendas
- `/negociante/reservasN` - Reservas

### Administrador
- `/ADM/iniA` - Dashboard admin
- `/ADM/clientes` - Gestão de clientes
- `/ADM/imoveis` - Gestão de imóveis

---

## 💡 Dicas Rápidas

### 1. Favoritos Persistem no Browser
Os favoritos são salvos no localStorage do navegador, não no servidor.

### 2. CSRF Token
Todas as requisições POST/PUT/DELETE precisam do token CSRF:
```html
<meta name="csrf-token" content="{{ csrf_token() }}">
```

### 3. Responsividade
O design é mobile-first. Teste em diferentes dispositivos.

### 4. Performance
Use cache para listagens grandes:
```php
Cache::remember('key', 3600, function () {
    return Model::all();
});
```

### 5. Debug
Ative o modo debug no `.env`:
```env
APP_DEBUG=true
```

---

## 🐛 Resolução Rápida de Problemas

### Problema: CSS não carrega
```bash
npm run build
php artisan cache:clear
```

### Problema: Rotas não funcionam
```bash
php artisan route:clear
php artisan route:cache
```

### Problema: Erro 500
```bash
# Verifique os logs
tail -f storage/logs/laravel.log

# Verifique permissões
chmod -R 775 storage bootstrap/cache
```

### Problema: Banco de dados não conecta
1. Verifique `.env`
2. Certifique-se que o banco existe
3. Execute `php artisan config:clear`

---

## 📚 Próximos Passos

### Para Desenvolvedores
1. Leia [DOCUMENTACAO_TECNICA.md](DOCUMENTACAO_TECNICA.md)
2. Familiarize-se com a estrutura MVC
3. Explore os controllers e models
4. Teste as APIs

### Para Usuários
1. Cadastre-se no sistema
2. Explore as funcionalidades
3. Adicione imóveis aos favoritos
4. Compare diferentes propriedades
5. Faça uma reserva ou compra

---

## 🎓 Recursos de Aprendizado

### Laravel
- [Documentação Oficial](https://laravel.com/docs)
- [Laracasts](https://laracasts.com)

### Frontend
- [CSS Grid Guide](https://css-tricks.com/snippets/css/complete-guide-grid/)
- [JavaScript ES6+](https://javascript.info)

---

## 📞 Suporte

**Email:** suporte@imotec.ao  
**Telefone:** +244 923 456 789  
**Endereço:** Luanda, Angola

---

## ✅ Checklist de Implantação

### Desenvolvimento
- [ ] Instalar dependências
- [ ] Configurar .env
- [ ] Executar migrações
- [ ] Compilar assets
- [ ] Testar todas as rotas

### Produção
- [ ] Configurar servidor web
- [ ] Configurar banco de dados
- [ ] Configurar HTTPS
- [ ] Otimizar aplicação (cache)
- [ ] Configurar backups automáticos
- [ ] Testar performance
- [ ] Configurar monitoramento

---

**© 2026 Imobiliária Imotec**  
**Versão 2.0 - Sistema Moderno de Gestão Imobiliária**
