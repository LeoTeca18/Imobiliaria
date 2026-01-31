@extends('layouts.modern')

@section('title', 'Comparar Imóveis')

@section('navigation')
    <li><a href="{{ route('cliente.imoveis') }}">Início</a></li>
    <li><a href="{{ route('pesquisar.imovel') }}">Pesquisar</a></li>
    <li><a href="/favoritos">❤️ Favoritos</a></li>
    <li>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn-outline" style="padding: 0.7rem 1.5rem;">Sair</button>
        </form>
    </li>
@endsection

@section('content')
    <div class="properties-container" style="margin-top: 2rem;">
        <h2 class="section-title">Comparar Imóveis</h2>
        
        <div class="comparison-container">
            @if(count($imoveis) > 0)
                <div class="comparison-grid">
                    @foreach($imoveis as $imovel)
                        <div class="comparison-item">
                            <img src="{{ asset('img/' . $imovel->img) }}" alt="{{ $imovel->nome }}" style="width: 100%; border-radius: 8px; margin-bottom: 1rem;">
                            <h3>{{ $imovel->nome }}</h3>
                            
                            <div class="comparison-feature">
                                <strong>Tipo:</strong>
                                <span>{{ $imovel->tipo }}</span>
                            </div>
                            
                            <div class="comparison-feature">
                                <strong>Preço:</strong>
                                <span style="color: var(--primary-color); font-weight: 700;">{{ number_format($imovel->preco, 2, ',', '.') }} Kz</span>
                            </div>
                            
                            <div class="comparison-feature">
                                <strong>Área:</strong>
                                <span>{{ $imovel->area ?? 'N/A' }} m²</span>
                            </div>
                            
                            <div class="comparison-feature">
                                <strong>Bairro:</strong>
                                <span>{{ $imovel->bairro ?? 'N/A' }}</span>
                            </div>
                            
                            @if($imovel->tipo == 'Apartamento')
                                <div class="comparison-feature">
                                    <strong>Topologia:</strong>
                                    <span>{{ $imovel->topologia ?? 'N/A' }}</span>
                                </div>
                                
                                <div class="comparison-feature">
                                    <strong>Andar:</strong>
                                    <span>{{ $imovel->andar ?? 'N/A' }}</span>
                                </div>
                                
                                <div class="comparison-feature">
                                    <strong>Edifício:</strong>
                                    <span>{{ $imovel->edificio ?? 'N/A' }}</span>
                                </div>
                            @elseif($imovel->tipo == 'Vivenda')
                                <div class="comparison-feature">
                                    <strong>Quartos:</strong>
                                    <span>{{ $imovel->qtdQuarto ?? 'N/A' }}</span>
                                </div>
                                
                                <div class="comparison-feature">
                                    <strong>Tipo:</strong>
                                    <span>{{ $imovel->tipo ?? 'Geminado' }}</span>
                                </div>
                            @endif
                            
                            <div style="margin-top: 1rem;">
                                <a href="{{ route('imovel.detalhes', $imovel->id) }}" class="btn-primary" style="width: 100%; text-align: center;">Ver Detalhes</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div style="margin-top: 2rem; text-align: center;">
                    <button class="btn-outline" onclick="window.print()">🖨️ Imprimir Comparação</button>
                    <button class="btn-outline" onclick="exportPDF()">📄 Exportar PDF</button>
                </div>
            @else
                <div style="text-align: center; padding: 4rem 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">🔍</div>
                    <h3>Nenhum imóvel para comparar</h3>
                    <p style="color: #6b7280; margin-bottom: 2rem;">Selecione imóveis para comparar suas características</p>
                    <a href="{{ route('cliente.imoveis') }}" class="btn-primary">Explorar Imóveis</a>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function exportPDF() {
        alert('Funcionalidade de exportação PDF em desenvolvimento');
        // Implementar com biblioteca como jsPDF ou DOMPDF
    }
</script>

@section('extra-css')
<style>
    @media print {
        .modern-header, .modern-footer, button {
            display: none;
        }
        
        .comparison-container {
            box-shadow: none;
        }
    }
</style>
@endsection
@endsection
