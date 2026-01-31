# 📘 Sistema Imobiliária Imotec - Documentação Completa

## 📋 Índice
1. [Visão Geral](#visão-geral)
2. [Requisitos do Sistema](#requisitos-do-sistema)
3. [Instalação](#instalação)
4. [Arquitetura](#arquitetura)
5. [Funcionalidades](#funcionalidades)
6. [Guia de Uso](#guia-de-uso)
7. [API Reference](#api-reference)
8. [Manutenção](#manutenção)

---

## 🎯 Visão Geral

O **Sistema Imobiliária Imotec** é uma plataforma completa desenvolvida em Laravel para gestão de imóveis, permitindo a administração de vendas, alugueres, reservas e visitas de propriedades.

### Principais Características
- ✅ Interface moderna e responsiva
- ✅ Sistema de gestão completo de imóveis (Apartamentos, Vivendas, Terrenos)
- ✅ Gestão de clientes, proprietários e funcionários
- ✅ Sistema de favoritos
- ✅ Comparação de imóveis
- ✅ Dashboard com estatísticas
- ✅ Filtros avançados de pesquisa
- ✅ Sistema de reservas e agendamento de visitas

---

## 💻 Requisitos do Sistema

### Requisitos Mínimos
- **PHP**: >= 8.0
- **Composer**: >= 2.0
- **Node.js**: >= 14.x
- **MySQL**: >= 5.7 ou MariaDB >= 10.3
- **Apache/Nginx**: Servidor web

### Extensões PHP Necessárias
```
- BCMath
- Ctype
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
```

---

## 🚀 Instalação

### Passo 1: Instalar Dependências PHP
```bash
composer install
```

### Passo 2: Instalar Dependências JavaScript
```bash
npm install
```

### Passo 3: Configurar Ambiente
```bash
# Copiar arquivo de configuração
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

### Passo 4: Configurar Banco de Dados
Edite o arquivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=imobiliaria_db
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### Passo 5: Executar Migrações
```bash
php artisan migrate
```

### Passo 6: Compilar Assets
```bash
npm run dev
# ou para produção:
npm run build
```

### Passo 7: Iniciar Servidor
```bash
php artisan serve
```

Acesse: `http://localhost:8000`

---

## 🏗️ Arquitetura

### Estrutura de Diretórios

```
Imobiliaria/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AdministradorController.php
│   │   │   ├── ClienteController.php
│   │   │   ├── FuncionarioController.php
│   │   │   ├── HomeController.php
│   │   │   ├── FavoritosController.php        # NOVO
│   │   │   ├── ComparacaoController.php       # NOVO
│   │   │   └── DashboardController.php        # NOVO
│   │   └── Middleware/
│   └── Models/
│       ├── Administrador.php
│       ├── Clientes.php
│       ├── Funcionario.php
│       ├── apartamentos.php
│       ├── vivendas.php
│       ├── terrenos.php
│       ├── compras.php
│       ├── alugueres.php
│       ├── reservas.php
│       └── visitas.php
├── public/
│   ├── css/
│   │   ├── style.css
│   │   └── modern-style.css               # NOVO
│   └── img/
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── home.blade.php
│       │   └── modern.blade.php           # NOVO
│       ├── cliente/
│       │   ├── iniC.blade.php
│       │   ├── iniC-modern.blade.php      # NOVO
│       │   ├── favoritos.blade.php        # NOVO
│       │   ├── comparacao.blade.php       # NOVO
│       │   └── dashboard.blade.php        # NOVO
│       ├── ADM/
│       └── funcionario/
└── routes/
    └── web.php
```

### Padrão MVC
O sistema segue o padrão **Model-View-Controller (MVC)**:
- **Models**: Representam as entidades do banco de dados
- **Views**: Interface do usuário (Blade templates)
- **Controllers**: Lógica de negócio e controle de fluxo

---

## ⚡ Funcionalidades

### 1. Sistema de Autenticação
- Login de clientes, funcionários e administradores
- Cadastro de novos usuários
- Logout seguro

### 2. Gestão de Imóveis
#### Tipos de Imóveis:
- **Apartamentos**: Topologia, andar, edifício, área
- **Vivendas**: Quantidade de quartos, tipo (geminado/isolado), área
- **Terrenos**: Área, localização

#### Operações:
- Listagem com filtros avançados
- Visualização detalhada
- Compra
- Aluguel
- Reserva
- Agendamento de visita

### 3. Sistema de Favoritos ⭐ (NOVO)
- Adicionar/remover imóveis dos favoritos
- Persistência via localStorage
- Visualização de lista de favoritos
- Acesso rápido aos imóveis salvos

### 4. Comparação de Imóveis 🔍 (NOVO)
- Comparar até 3 imóveis lado a lado
- Visualização de características comparativas
- Exportação de comparação
- Impressão de comparação

### 5. Dashboard Interativo 📊 (NOVO)
- Estatísticas em tempo real
- Total de imóveis disponíveis
- Vendas do mês
- Clientes ativos
- Gráficos e métricas

### 6. Filtros Avançados
- Filtro por preço (mínimo e máximo)
- Filtro por número de quartos
- Filtro por área
- Filtro por bairro
- Filtro por tipo de imóvel

### 7. Pesquisa Inteligente
- Busca por localização
- Busca por características
- Resultados em tempo real

---

## 📖 Guia de Uso

### Para Clientes

#### Pesquisar Imóveis
1. Na página inicial, use a barra de pesquisa
2. Selecione localização e tipo de imóvel
3. Use filtros avançados para refinar a busca
4. Clique em "Pesquisar"

#### Adicionar aos Favoritos
1. Encontre o imóvel desejado
2. Clique no ícone de coração 🤍
3. O imóvel ficará salvo em "Favoritos"

#### Comparar Imóveis
1. Selecione até 3 imóveis
2. Clique em "Comparar Imóveis"
3. Visualize as características lado a lado

#### Realizar Compra
1. Encontre o imóvel desejado
2. Clique em "Ver Detalhes"
3. Revise todas as informações
4. Clique em "Comprar"

---

## 🔌 API Reference

### Endpoints Disponíveis

#### Estatísticas
```http
GET /api/estatisticas
```
Retorna estatísticas gerais do sistema

**Resposta:**
```json
{
  "total_imoveis": 150,
  "vendidos_mes": 12,
  "alugados_mes": 8,
  "reservas_ativas": 25,
  "clientes_total": 342
}
```

#### Comparação de Imóveis
```http
POST /api/comparacao
Content-Type: application/json

{
  "ids": ["apartamento-1", "terreno-5", "vivenda-3"]
}
```

---

## 🛠️ Manutenção

### Backup do Banco de Dados

```bash
# Criar backup
mysqldump -u usuario -p imobiliaria_db > backup.sql

# Restaurar backup
mysql -u usuario -p imobiliaria_db < backup.sql
```

### Limpar Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Atualizar Sistema

```bash
# Atualizar dependências
composer update
npm update

# Recompilar assets
npm run build

# Executar migrações pendentes
php artisan migrate
```

### Performance

#### Otimizar para Produção
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev
```

---

## 🐛 Solução de Problemas

### Erro: "Class not found"
```bash
composer dump-autoload
```

### Erro: "Permission denied"
```bash
chmod -R 775 storage bootstrap/cache
```

### Assets não carregam
```bash
npm run build
php artisan storage:link
```

---

## 📝 Notas de Versão

### Versão 2.0 (Janeiro 2026) - NOVA
- ✅ Interface moderna e responsiva
- ✅ Sistema de favoritos
- ✅ Comparação de imóveis
- ✅ Dashboard com estatísticas
- ✅ Filtros avançados
- ✅ Melhorias de UX/UI

### Versão 1.0 (Anterior)
- Sistema básico de gestão de imóveis
- Autenticação de usuários
- CRUD de imóveis

---

## 📞 Contato

- **Email**: contato@imotec.ao
- **Telefone**: +244 923 456 789
- **Endereço**: Luanda, Angola

---

**© 2026 Imobiliária Imotec - Sistema de Gestão Imobiliária**
