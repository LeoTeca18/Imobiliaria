@extends('layouts.modern')

@section('title', 'Página Inicial')

@section('navigation')
    <li><a href="{{ route('cliente.imoveis') }}">Início</a></li>
    <li><a href="{{ route('pesquisar.imovel') }}">Pesquisar</a></li>
    <li><a href="/comprados">Comprados</a></li>
    <li><a href="/reservas">Reservas</a></li>
    <li><a href="/visita">Visitas</a></li>
    <li><a href="/alugadosC">Alugados</a></li>
    <li><a href="/favoritos">❤️ Favoritos</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn-outline" style="padding: 0.7rem 1.5rem;">Sair</button>
        </form>
    </li>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Encontre o Imóvel dos Seus Sonhos</h1>
            <p>Milhares de propriedades disponíveis para venda e aluguel</p>
            
            <div class="search-box">
                <input type="text" id="search-location" placeholder="Localização (ex: Talatona, Morro Bento)">
                <select id="search-type">
                    <option value="">Tipo de Imóvel</option>
                    <option value="apartamento">Apartamento</option>
                    <option value="vivenda">Vivenda</option>
                    <option value="terreno">Terreno</option>
                </select>
                <button class="btn-primary" onclick="searchProperties()">Pesquisar</button>
            </div>
        </div>
    </section>

    <!-- Filtros Avançados -->
    <div class="properties-container">
        <div class="filters-section">
            <h3>Filtros Avançados</h3>
            <div class="filters-grid">
                <div class="filter-group">
                    <label>Preço Mínimo</label>
                    <input type="number" id="price-min" placeholder="0 Kz">
                </div>
                <div class="filter-group">
                    <label>Preço Máximo</label>
                    <input type="number" id="price-max" placeholder="1.000.000 Kz">
                </div>
                <div class="filter-group">
                    <label>Quartos</label>
                    <select id="bedrooms">
                        <option value="">Qualquer</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Área (m²)</label>
                    <input type="number" id="area" placeholder="Min 50m²">
                </div>
                <div class="filter-group">
                    <label>Bairro</label>
                    <select id="neighborhood">
                        <option value="">Todos</option>
                        <option value="talatona">Talatona</option>
                        <option value="morro-bento">Morro Bento</option>
                        <option value="benfica">Benfica</option>
                        <option value="maianga">Maianga</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>&nbsp;</label>
                    <button class="btn-primary" style="width: 100%;" onclick="applyFilters()">Aplicar Filtros</button>
                </div>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon blue">🏠</div>
                <div class="stat-content">
                    <h4>Imóveis Disponíveis</h4>
                    <p>{{ $totalImoveis ?? 0 }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">✓</div>
                <div class="stat-content">
                    <h4>Vendidos Este Mês</h4>
                    <p>{{ $vendidosMes ?? 0 }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange">👥</div>
                <div class="stat-content">
                    <h4>Clientes Ativos</h4>
                    <p>{{ $clientesAtivos ?? 0 }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon red">⭐</div>
                <div class="stat-content">
                    <h4>Avaliação Média</h4>
                    <p>4.8</p>
                </div>
            </div>
        </div>

        <!-- Propriedades em Destaque -->
        <h2 class="section-title">Propriedades em Destaque</h2>
        <div class="property-grid">
            @if(isset($terreno) && $terreno)
            <div class="property-card">
                <div class="property-card-image">
                    <img src="{{ asset('img/' . $terreno->img) }}" alt="{{ $terreno->nome }}">
                    <span class="property-badge">Terreno</span>
                    <button class="favorite-btn" data-id="terreno-{{ $terreno->id }}">🤍</button>
                </div>
                <div class="property-card-content">
                    <h3>{{ $terreno->nome }}</h3>
                    <p class="property-location">{{ $terreno->bairro ?? 'Luanda' }}</p>
                    
                    <div class="property-features">
                        <div class="feature-item">
                            <span>📐</span>
                            <span>{{ $terreno->area ?? 'N/A' }} m²</span>
                        </div>
                        <div class="feature-item">
                            <span>📍</span>
                            <span>{{ $terreno->bairro ?? 'N/A' }}</span>
                        </div>
                    </div>
                    
                    <p class="property-price">{{ number_format($terreno->preco, 2, ',', '.') }} Kz</p>
                    
                    <div class="property-actions">
                        <a href="{{ route('imovel.detalhes', $terreno->id) }}" class="btn-primary">Ver Detalhes</a>
                        <form method="POST" action="{{ route('compra', ['id' => $terreno->id]) }}" style="margin: 0;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-secondary">Comprar</button>
                        </form>
                        <button class="btn-outline" onclick="reservarImovel({{ $terreno->id }})">Reservar</button>
                        <button class="btn-outline" onclick="agendarVisita({{ $terreno->id }})">Agendar Visita</button>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($apartamento) && $apartamento)
            <div class="property-card">
                <div class="property-card-image">
                    <img src="{{ asset('img/' . $apartamento->img) }}" alt="{{ $apartamento->nome }}">
                    <span class="property-badge">Apartamento</span>
                    <button class="favorite-btn" data-id="apartamento-{{ $apartamento->id }}">🤍</button>
                </div>
                <div class="property-card-content">
                    <h3>{{ $apartamento->nome }}</h3>
                    <p class="property-location">{{ $apartamento->bairro ?? 'Luanda' }}</p>
                    
                    <div class="property-features">
                        <div class="feature-item">
                            <span>🛏️</span>
                            <span>{{ $apartamento->topologia ?? 'N/A' }}</span>
                        </div>
                        <div class="feature-item">
                            <span>📐</span>
                            <span>{{ $apartamento->area ?? 'N/A' }} m²</span>
                        </div>
                        <div class="feature-item">
                            <span>🏢</span>
                            <span>Andar {{ $apartamento->andar ?? 'N/A' }}</span>
                        </div>
                    </div>
                    
                    <p class="property-price">{{ number_format($apartamento->preco, 2, ',', '.') }} Kz</p>
                    
                    <div class="property-actions">
                        <a href="{{ route('imovel.detalhes', $apartamento->id) }}" class="btn-primary">Ver Detalhes</a>
                        <form method="POST" action="{{ route('compra', ['id' => $apartamento->id]) }}" style="margin: 0;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-secondary">Comprar</button>
                        </form>
                        <button class="btn-outline" onclick="reservarImovel({{ $apartamento->id }})">Reservar</button>
                        <button class="btn-outline" onclick="agendarVisita({{ $apartamento->id }})">Agendar Visita</button>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($vivenda) && $vivenda)
            <div class="property-card">
                <div class="property-card-image">
                    <img src="{{ asset('img/' . $vivenda->img) }}" alt="{{ $vivenda->nome }}">
                    <span class="property-badge">Vivenda</span>
                    <button class="favorite-btn" data-id="vivenda-{{ $vivenda->id }}">🤍</button>
                </div>
                <div class="property-card-content">
                    <h3>{{ $vivenda->nome }}</h3>
                    <p class="property-location">{{ $vivenda->bairro ?? 'Luanda' }}</p>
                    
                    <div class="property-features">
                        <div class="feature-item">
                            <span>🛏️</span>
                            <span>{{ $vivenda->qtdQuarto ?? 'N/A' }} Quartos</span>
                        </div>
                        <div class="feature-item">
                            <span>📐</span>
                            <span>{{ $vivenda->area ?? 'N/A' }} m²</span>
                        </div>
                        <div class="feature-item">
                            <span>🏡</span>
                            <span>{{ $vivenda->tipo ?? 'Geminado' }}</span>
                        </div>
                    </div>
                    
                    <p class="property-price">{{ number_format($vivenda->preco, 2, ',', '.') }} Kz</p>
                    
                    <div class="property-actions">
                        <a href="{{ route('imovel.detalhes', $vivenda->id) }}" class="btn-primary">Ver Detalhes</a>
                        <form method="POST" action="{{ route('compra', ['id' => $vivenda->id]) }}" style="margin: 0;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-secondary">Comprar</button>
                        </form>
                        <button class="btn-outline" onclick="reservarImovel({{ $vivenda->id }})">Reservar</button>
                        <button class="btn-outline" onclick="agendarVisita({{ $vivenda->id }})">Agendar Visita</button>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('pesquisar.imovel') }}" class="btn-primary">Ver Todos os Imóveis</a>
            <a href="/comparar" class="btn-outline" style="display: inline-block; margin-left: 1rem;">Comparar Imóveis</a>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function searchProperties() {
        const location = document.getElementById('search-location').value;
        const type = document.getElementById('search-type').value;
        
        let url = '/pesquisar?';
        if (location) url += 'location=' + encodeURIComponent(location) + '&';
        if (type) url += 'type=' + type;
        
        window.location.href = url;
    }

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

    function reservarImovel(id) {
        if (confirm('Deseja reservar este imóvel?')) {
            fetch(`/cliente/${id}/Areserva`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                alert('Reserva realizada com sucesso!');
                location.reload();
            })
            .catch(error => {
                alert('Erro ao fazer reserva. Tente novamente.');
            });
        }
    }

    function agendarVisita(id) {
        const data = prompt('Digite a data desejada para a visita (DD/MM/AAAA):');
        if (data) {
            alert('Visita agendada com sucesso para ' + data);
            // Implementar lógica de agendamento
        }
    }
</script>
@endsection
