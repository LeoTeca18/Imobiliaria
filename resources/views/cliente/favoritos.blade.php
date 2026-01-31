@extends('layouts.modern')

@section('title', 'Meus Favoritos')

@section('navigation')
    <li><a href="{{ route('cliente.imoveis') }}">Início</a></li>
    <li><a href="{{ route('pesquisar.imovel') }}">Pesquisar</a></li>
    <li><a href="/comprados">Comprados</a></li>
    <li><a href="/reservas">Reservas</a></li>
    <li><a href="/favoritos" style="color: var(--primary-color);">❤️ Favoritos</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn-outline" style="padding: 0.7rem 1.5rem;">Sair</button>
        </form>
    </li>
@endsection

@section('content')
    <div class="properties-container" style="margin-top: 2rem;">
        <h2 class="section-title">Meus Imóveis Favoritos ❤️</h2>
        
        <div id="favorites-list" class="property-grid">
            <!-- Os favoritos serão carregados dinamicamente via JavaScript -->
        </div>

        <div id="empty-favorites" style="display: none; text-align: center; padding: 4rem 2rem;">
            <div style="font-size: 4rem; margin-bottom: 1rem;">💔</div>
            <h3>Nenhum favorito ainda</h3>
            <p style="color: #6b7280; margin-bottom: 2rem;">Adicione imóveis aos favoritos para vê-los aqui!</p>
            <a href="{{ route('cliente.imoveis') }}" class="btn-primary">Explorar Imóveis</a>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadFavorites();
    });

    async function loadFavorites() {
        const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        const favoritesList = document.getElementById('favorites-list');
        const emptyFavorites = document.getElementById('empty-favorites');

        if (favorites.length === 0) {
            emptyFavorites.style.display = 'block';
            return;
        }

        // Fazer requisição para buscar dados dos imóveis favoritos
        try {
            const response = await fetch('/api/comparacao', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content || ''
                },
                body: JSON.stringify({ ids: favorites })
            });

            const imoveis = await response.json();

            favoritesList.innerHTML = '';
            imoveis.forEach(imovel => {
                const card = createPropertyCard(imovel);
                favoritesList.innerHTML += card;
            });

            // Re-adicionar event listeners aos botões de favorito
            document.querySelectorAll('.favorite-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    removeFavorite(this.dataset.id);
                });
            });

        } catch (error) {
            console.error('Erro ao carregar favoritos:', error);
            favoritesList.innerHTML = '<p style="color: red;">Erro ao carregar favoritos. Tente novamente.</p>';
        }
    }

    function createPropertyCard(imovel) {
        const features = getFeatures(imovel);
        
        return `
            <div class="property-card">
                <div class="property-card-image">
                    <img src="/img/${imovel.img}" alt="${imovel.nome}">
                    <span class="property-badge">${imovel.tipo}</span>
                    <button class="favorite-btn active" data-id="${imovel.id}">❤️</button>
                </div>
                <div class="property-card-content">
                    <h3>${imovel.nome}</h3>
                    <p class="property-location">${imovel.bairro || 'Luanda'}</p>
                    
                    <div class="property-features">
                        ${features}
                    </div>
                    
                    <p class="property-price">${formatPrice(imovel.preco)} Kz</p>
                    
                    <div class="property-actions">
                        <a href="/info/${imovel.id}" class="btn-primary">Ver Detalhes</a>
                        <button class="btn-secondary" onclick="comprarImovel('${imovel.id}')">Comprar</button>
                        <button class="btn-outline" onclick="reservarImovel('${imovel.id}')">Reservar</button>
                        <button class="btn-outline" onclick="agendarVisita('${imovel.id}')">Agendar Visita</button>
                    </div>
                </div>
            </div>
        `;
    }

    function getFeatures(imovel) {
        let features = `
            <div class="feature-item">
                <span>📐</span>
                <span>${imovel.area || 'N/A'} m²</span>
            </div>
        `;

        if (imovel.tipo === 'Apartamento') {
            features += `
                <div class="feature-item">
                    <span>🛏️</span>
                    <span>${imovel.topologia || 'N/A'}</span>
                </div>
                <div class="feature-item">
                    <span>🏢</span>
                    <span>Andar ${imovel.andar || 'N/A'}</span>
                </div>
            `;
        } else if (imovel.tipo === 'Vivenda') {
            features += `
                <div class="feature-item">
                    <span>🛏️</span>
                    <span>${imovel.qtdQuarto || 0} Quartos</span>
                </div>
                <div class="feature-item">
                    <span>🏡</span>
                    <span>${imovel.tipo_vivenda || 'Geminado'}</span>
                </div>
            `;
        }

        return features;
    }

    function formatPrice(price) {
        return new Intl.NumberFormat('pt-AO', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(price);
    }

    function removeFavorite(id) {
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        favorites = favorites.filter(fav => fav !== id);
        localStorage.setItem('favorites', JSON.stringify(favorites));
        
        // Recarregar a lista
        loadFavorites();
        
        alert('Imóvel removido dos favoritos!');
    }

    function comprarImovel(id) {
        // Implementar lógica de compra
        alert('Funcionalidade de compra em desenvolvimento');
    }

    function reservarImovel(id) {
        if (confirm('Deseja reservar este imóvel?')) {
            alert('Reserva realizada com sucesso!');
        }
    }

    function agendarVisita(id) {
        const data = prompt('Digite a data desejada para a visita (DD/MM/AAAA):');
        if (data) {
            alert('Visita agendada com sucesso para ' + data);
        }
    }
</script>
@endsection
