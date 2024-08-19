<style>
    .cell-top-four {
        background-color: hsl(217, 72%, 45%, 0.5) !important;
        color: #fff;
    }
    .cell-middle-two {
        background-color: rgba(208, 112, 38, 0.5) !important;
        color: #fff;
    }
    .cell-middle-seven {
        background-color: hsla(136, 72%, 43%, 0.5) !important;
        color: #fff;
    }
    .cell-bottom-four {
        background-color: hsl(6, 80%, 46%, 0.5) !important;
        color: #fff;
    }
    .color-box {
        width: 15px;
        height: 15px;
        display: inline-block;
        vertical-align: middle;
        margin-right: 5px;
    }
    .highlight {
        background-color: rgba(255, 255, 20, 0.493) !important;
    }
</style>
<div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary text-center">
    <div class="col-lg-12 px-0">
        <h1 class="display-4 fst-italic">Classificação Brasileirão Serie A</h1>
    </div>
</div>
<div class="row g-5">
    <div class="col-md-12">
        <article class="blog-post">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th colspan="2">TIMES</th>
                            <th>PONTOS</th>
                            <th>JOGOS</th>
                            <th>VITÓRIAS</th>
                            <th>EMPATES</th>
                            <th>DERROTAS</th>
                            <th>GP</th>
                            <th>GC</th>
                            <th>SG</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $index => $row)
                            @if ($index != 0)
                                <tr id="team-{{ $index }}" data-time="{{ trim($row[1]) }}" onclick="selectTeam('{{ $index }}', '{{ trim($row[1]) }}')">
                                    <td class="@if ($index >= 1 && $index <= 4) cell-top-four
                                    @elseif($index >= 5 && $index <= 6)
                                        cell-middle-two
                                    @elseif($index >= 7 && $index <= 12)
                                        cell-middle-seven       
                                    @elseif($index > 16) cell-bottom-four @endif @if (isset($teamName) && $teamName == trim($row[1])) highlight @endif">
                                        {{ $index }}
                                    </td>
                                    <td class="@if (isset($teamName) && $teamName == trim($row[1])) highlight @endif">
                                        <img src="images/{{ trim($row[1]) }}.png"
                                            style="height: 25px; vertical-align: middle; margin-right: 5px;">
                                    </td>
                                    <td class="@if (isset($teamName) && $teamName == trim($row[1])) highlight @endif text-start">
                                        @if (trim($row[1]) == 'Sao Paulo')
                                            São Paulo
                                        @elseif(trim($row[1]) == 'Cuiaba')
                                            Cuiabá
                                        @elseif(trim($row[1]) == 'Atletico-MG')
                                            Atlético-MG
                                        @elseif(trim($row[1]) == 'Atletico-GO')
                                            Atlético-GO
                                        @elseif(trim($row[1]) == 'Vitoria')
                                            Vitória
                                        @elseif(trim($row[1]) == 'Gremio')
                                            Grêmio
                                        @elseif(trim($row[1]) == 'Criciuma')
                                            Criciúma
                                        @else
                                            {{ trim($row[1]) }}
                                        @endif
                                    </td>
                                    @foreach ($row as $cell_index => $cell)
                                        @if ($cell_index != 1)
                                            <td class="@if (isset($teamName) && $teamName == trim($row[1])) highlight @endif">{{ $cell }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    <tfoot class="table-dark">
                        <tr>
                            <td colspan="3">
                                <div class="color-box" style="background-color:#2161c7"></div>
                                Libertadores
                            </td>
                            <td colspan="3">
                                <div class="color-box" style="background-color:#d07026"></div>
                                Pré-Libertadores
                            </td>
                            <td colspan="3">
                                <div class="color-box" style="background-color:#1fbe4a"></div>
                                Sul-Americana
                            </td>
                            <td colspan="4">
                                <div class="color-box" style="background-color:#d42a18"></div>
                                Rebaixamento
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Adicione aqui o campo para rodadas -->
            @if($rodadasContent)
            <div class="card mt-4">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="card-title">Resultado</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        {!! preg_replace('/<img([^>]+)>/', '<img$1 class="img-fluid game-img" style="height: 50px; width: auto;">', $rodadasContent) !!}
                    </ul>
                </div>
            </div>
        @else
            <p>Não foi possível carregar as informações da rodada.</p>
        @endif
        


        </article>
    </div>
</div>