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

    // Filtra a div 'mostrarRodada' que corresponde à rodada atual e captura o <ul> dentro dela
    $rodadasContent = $crawler->filter('div.mostrarRodada ul.table__games')->each(function (Crawler $node) {
        return $node->html();
    });

    // Retorna o primeiro <ul> encontrado (que deve corresponder à rodada atual)
    return count($rodadasContent) > 0 ? $rodadasContent[0] : null;
}
}
