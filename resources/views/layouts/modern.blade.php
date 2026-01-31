<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliária Imotec - @yield('title', 'Sistema Moderno')</title>
    <link rel="stylesheet" href="{{ asset('css/modern-style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @yield('extra-css')
</head>
<body>
    <!-- Header Moderno -->
    <header class="modern-header">
        <div class="header-container">
            <div class="logo-section">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="60" height="60">
                <h1>Imobiliária Imotec</h1>
            </div>
            <nav>
                <ul class="nav-menu">
                    @yield('navigation')
                </ul>
            </nav>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Moderno -->
    <footer class="modern-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Sobre Nós</h3>
                <p>A Imobiliária Imotec é líder em soluções imobiliárias, oferecendo os melhores imóveis para venda e aluguel.</p>
            </div>
            <div class="footer-section">
                <h3>Links Rápidos</h3>
                <ul>
                    <li><a href="/cliente">Imóveis</a></li>
                    <li><a href="/pesquisar">Pesquisar</a></li>
                    <li><a href="/comprados">Minhas Compras</a></li>
                    <li><a href="/reservas">Minhas Reservas</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contato</h3>
                <ul>
                    <li>📧 contato@imotec.ao</li>
                    <li>📱 +244 923 456 789</li>
                    <li>📍 Luanda, Angola</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Redes Sociais</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Imobiliária Imotec. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Scripts -->
    @yield('scripts')
    <script>
        // Script para favoritos (localStorage)
        document.addEventListener('DOMContentLoaded', function() {
            const favoriteButtons = document.querySelectorAll('.favorite-btn');
            const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
            
            favoriteButtons.forEach(btn => {
                const propertyId = btn.dataset.id;
                if (favorites.includes(propertyId)) {
                    btn.classList.add('active');
                    btn.innerHTML = '❤️';
                } else {
                    btn.innerHTML = '🤍';
                }
                
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const index = favorites.indexOf(id);
                    
                    if (index > -1) {
                        favorites.splice(index, 1);
                        this.classList.remove('active');
                        this.innerHTML = '🤍';
                    } else {
                        favorites.push(id);
                        this.classList.add('active');
                        this.innerHTML = '❤️';
                    }
                    
                    localStorage.setItem('favorites', JSON.stringify(favorites));
                });
            });
        });
    </script>
</body>
</html>
