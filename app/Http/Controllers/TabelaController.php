<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Str;

class TabelaController extends Controller
{
    public function tabela_brasileiro()
    {
        $rows = $this->getTabelaBrasileirao();
        $rodadasContent = $this->getRodadasContent();  // Captura o conteúdo da div específica
        return view('tabela', compact('rows', 'rodadasContent')); // Passa a div para a view
    }

    public function selecionarTime(Request $request)
    {
        $teamIndex = $request->input('team');
        $teamName = $request->input('teamName');
        return response()->json(['message' => 'Time selecionado com sucesso!', 'team' => $teamIndex, 'teamName' => $teamName]);
    }

    public function showTeam($teamName)
    {
        $teamName = str_replace('_', ' ', $teamName);
        $rows = $this->getTabelaBrasileirao();
        $rodadasContent = $this->getRodadasContent();  // Captura o conteúdo da div específica
        return view('tabela', compact('rows', 'teamName', 'rodadasContent'));
    }

    public function corrigirPalavra($palavra)
    {
        return Str::ascii($palavra);
    }

    public function getTabelaBrasileirao()
    {
        $client = new Client(['verify' => false]);
        $response = $client->get('https://www.gazetaesportiva.com/campeonatos/brasileiro-serie-a/');
        $html = (string) $response->getBody();
        $crawler = new Crawler($html);
        $rows = [];

        $crawler->filter('table tr')->each(function ($row) use (&$rows) {
            $rowData = [];
            $row->filter('td')->each(function ($cell) use (&$rowData) {
                $rowData[] = $this->corrigirPalavra($cell->text());
            });
            $rows[] = $rowData;
        });

        return $rows;
    }

    public function getRodadasContent()
{
    $client = new Client(['verify' => false]);
    $response = $client->get('https://www.gazetaesportiva.com/campeonatos/brasileiro-serie-a/');
    $html = (string) $response->getBody();
    $crawler = new Crawler($html);

    // Captura o conteúdo da rodada atual (ajuste o seletor conforme necessário)
    $rodadasContent = $crawler->filter('div.mostrarRodada ul.table__games')->each(function (Crawler $node) {
        return $node->html();
    });

    // Retorna o conteúdo do <ul> encontrado
    if (count($rodadasContent) > 0) {
        $content = $rodadasContent[0];

        // Substitui as URLs das imagens pelas imagens locais
        $content = $this->substituirImagens($content);

        return $content;
    }

    return null;
}

private function substituirImagens($content)
{

    $map = [
        'Atlético-MG' => 'Atletico-MG.png',
        'Cuiabá' => 'Cuiaba.png',
        'Grêmio' => 'Gremio.png',
        'Bahia' => 'Bahia.png',
        'Red Bull Bragantino' => 'Red Bull Bragantino.png',
        'Fortaleza' => 'Fortaleza.png',
        'Fluminense' => 'Fluminense.png',
        'Corinthians' => 'Corinthians.png',
        'Criciúma' => 'Criciuma.png',
        'Vasco' => 'Vasco.png',
        'Botafogo' => 'Botafogo.png',
        'Internacional' => 'Internacional.png',
        'São Paulo' => 'São Paulo.png',
        'Juventude' => 'Juventude.png',
        'Flamengo' => 'Flamengo.png',
        'Cruzeiro' => 'Cruzeiro.png',
        'Vitória' => 'Vitoria.png',
        'Atlético-GO' => 'Atlético GO.png',
        'Palmeiras' => 'Palmeiras.png',
        'Athletico-PR' => 'Athletico-PR.png'
    ];

    // Caminho base das imagens na pasta public
    $baseUrl = asset('images'); // Isso cria a URL correta para a pasta public/images

    // Substitui as URLs das imagens no conteúdo pelo nome dos times
    foreach ($map as $teamName => $image) {
        $content = preg_replace('/<img[^>]+src="[^"]*"[^>]*alt="' . preg_quote($teamName, '/') . '"[^>]*>/', '<img src="' . $baseUrl . '/' . $image . '" class="img-fluid game-img" style="height: 50px; width: auto;">', $content);
    }

    return $content;
}
}
