<?php

namespace App\Actions;

class DailyEntry
{
    public function parseData(string $data): array
    {
        $data   = trim($data);
        $gameId = $this->getGameId($data);
        $score  = $this->getScore($data);
        $detail = $this->getDetail($data);

        return [$gameId, $score, $detail];
    }

    /**
     * @getGameId(): Retorna o game id no formato "#81"
     *
     * Primeiro extrai o valor entre # e primeiro espaço em branco, retornando somente o número
     * Na sequência concatena com # para evitar problemas com as demais regras
     */
    public function getGameId(string $data): string
    {
        return '#' . str($data)->betweenFirst('#', ' ')->toString();
    }

    /**
     * @getScore(): extrai o score de uma string e retorna no formato 1/6 sendo um string
     *
     * Primeiro divido a string $data em um collection usando o @explode("/");
     *
     * O @reduce() percorre cada item com uma coleção e produz um novo resultado para a próxima iteração.
     * Cada resultado da última iteração é passado pelo primeiro parâmetro $carry. O segundo parâmetro do
     * @reduce() é o valor padrão para $carry na primeira rodada de iteração (valor em branco ' ').
     *
     * Se $iteration é igual a 0, é porque está analizando a primeira parte do array/collection. Então
     * o @afterLast() retorna o restante de uma string após a última ocorrência de um determinado valor,
     * que nesse caso foi o espaço em branco passado como parêmetro, então retorna a primeira string que
     * encontrar depois do último espaço em branco.
     *
     * Após o retorno da primeira iteração, a variável $carry já possui a primeira string retornada quando
     * $iteration era 0.
     *
     * Na sequência, $iteration = 1, portanto está analizando a segunda parte do array/collection. Nesse
     * momento, irá retornar o valor de $carry concatenado com '/' seguido da string a ser retornada pelo
     * @afterLast(). Esse método se refere para obter a parte de uma string antes da primeira ocorrência
     * de um determinado valor, que nesse caso foi o espaço em branco passado como parêmetro, então retorna
     * a primeira string antes do primeiro espaço em branco da sequência a ser analisada.
     */
    public function getScore(string $data): string
    {
        return str(str($data)->explode('/')->reduce(function ($carry, $value, $iteration) {
            if ($iteration == 0) {
                return str($value)->afterLast(' ')->toString();
            }

            return $carry . '/' . str($value)->before(' ')->toString();
        }, ''))->replace('*', '');
    }

    // Retorna somente o gráfico excluindo os texto passados em $data
    public function getDetail(string $data): string
    {
        $detail = explode(PHP_EOL, $data);
        unset($detail[0]);
        unset($detail[1]);
        
        return trim(implode(PHP_EOL, $detail));
    }
}
