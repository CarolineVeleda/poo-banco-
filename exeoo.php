<?php
/*Faça as classes referentes a um jogo de estratégia e guerra. 
Realize testes das suas implementações. Evite colocar as classes no 
mesmo arquivo.
1) Classe: Arma
Atributos: nome, munição (quantidade), dano, preço
Construtor que receba no mínimo o nome preço e dano e opcionalmente a munição (caso
não informada considere zero)
Métodos:
- getters e setters para nome, preço e dano
- atira(quantidade)
- addMunicao (qunatidade)
Testes: Crie diferentes armas e atire e adicione munição. Caso não passe os parâmetros,
altere os atributos após a criação. Faça alguns aniversários, emagrecimentos, engordes e
crescimentos e imprima os valores parciais.
*/
class Arma{
    private $nome;
    public $municao;
    private $dano;
    private $preço;
    public function Arma($nome="", $municao=0, $dano=0, $preco=0){
        $this->nome = $nome;
        $this->municao = $municao;
        $this->dano = $dano;
        $this->preco = $preco;
    } 
    public function getnome(){
        return $this -> nome;
    }
    public function setnome($a){
        return $this -> nome=$a;
    }
    public function getpreco(){
        return $this -> preco;
    }
    public function setpreco($a){
        return $this -> preco=$a;
    }
    public function getdano(){
        return $this -> dano;
    }
    public function setdano($a){
        return $this -> dano=$a;
    }
    public function atira ($tiros){
        return $this-> municao-=$tiros;
    }
    public function addmunicao($a){
        return $this->municao+=$a;
    }
}
/*
2) Classe: soldado
Atributos: tipo, escudo (percentual de dano evitado), vida (quantidade de vida, começa
com 100), bônus ataque (começa com 0), arma (objeto do tipo arma)
Métodos:
- construtores e getters e setters
- vivo (retorna booblean se vida vida maior que 0)
- ataca (soldado adversário, número de tiros): é multiplicado o número de tiros pelo dano da arma, o dano é multiplicado pelo bônus de ataque (um número entre 0 e 1). Por último
o dano é diminuído do escudo. Por exemplo caso o escudo seja 70% o dano é multiplicado
por 0,3 (30%). O dano resultante decrementa a vida do soldado adversário. Caso o dano
seja maior que a vida a vida fica zerada (o soldado morre), se isso acontecer o atacante
incrementa seu bônus de ataque e 0,05.
- dorme (a vida é recuperada em 10 pontos caso o soldado esteja vivo)
- trocaArma (arma)
- armado: retorna se o soldado esta armado ou não
Testes: Crie 2 soldados, armas e faça um atacar o outro 3 vezes. Teste se após cada
ataque estão vivos. Troque a arma de cada um e realize mais 2 ataques...
*/
class Soldado{
    private $tipo;
    private $escudo;
    private $vida;
    private $bonusataque;
    private $arma;
    public function soldado ($tipo="", $escudo=0, $vida=0, $bonusataque=0, $arma=""){
        $this->tipo = $tipo;
        $this->escudo = $escudo;
        $this->vida = $vida;
        $this->bonusataque = $bonusataque;
        $this->arma = $arma;
    }
    public function setvida(){
        return $this->vida; 
    }
    public function getvida(){
        return $this-> vida;
    }
    public function setescudo(){
        return $this-> escudo;
    }
    public function getescudo(){
        return $this-> escudo;
    }
    
    public function gettipo(){
        return $this-> tipo;
    }
    public function settipo(){
        return $this-> tipo;
    }
    public function setarma(){
        return $this-> arma;
    }
    public function getarma(){
        return $this-> arma;
    }
    public function ataca($inimigo,$tiros){
        
        $dano=$this->arma->dano*$this.atira($tiros) * $tiros;
        
        
        //$dano= $dano-(1-($inimigo->escudo))/100;
        //$this->arma->dano *$tiros * ($this->bonusataque);
        //$inimigo->vida= $inimigo->vida-$dano;
        if ($inimigo->vida<=0){
            $inimigo->vida=0;
            $this->bonusataque+=0.05;
        }
        return $dano;
                
    }
    public function dorme(){
        if($this->vida>0){
            return $this->vida+=10;
        }
    }
    public function trocaarma($armanova){
        return $this->arma=$armanova;
    }
    
    public function armado(){
        return isset($this->arma);
        /*if ($this->arma == "" or null){
            $r= "Estou sem arma!";
        }
        else{
            $r="Estou armado!";
        }
        return $r;*/
    }

    
    
    }
$armas1 = new Arma("arma amiga",20,200,2000);
echo "nome: ".$armas1->getnome()."<br>";
echo "dano: ".$armas1->getdano()."<br>";
echo "preco R$: ".$armas1->getpreco()."<br>";
echo "nova munição: ".$armas1-> addmunicao(50)."<br>";
echo "Municao: ".$armas1-> atira(4)."<br>"."<br>"."<br>";


$armas2 = new Arma("ak47",570,120,5500);
echo "nome: ".$armas2->getnome()."<br>";
echo "dano: ".$armas2->getdano()."<br>";
echo "preco R$: ".$armas2->getpreco()."<br>";
echo "nova munição: ".$armas2-> addmunicao(15)."<br>";
echo "Municao: ".$armas2->atira(5)."<br>"."<br>"."<br>";


$soldado1=new Soldado("fuzileiro",70,100,30,"fuzil");
echo "tipo: ".$soldado1->gettipo()."<br>";
echo "escudo: ".$soldado1->getescudo()."<br>";
echo "Estado: ".$soldado1->armado()."<br>";
echo "vida regenerada: ".$soldado1->dorme()."<br>"."<br>"."<br>";

$soldado2 = new Soldado("sniper",30,100,1,null);
echo "tipo: ".$soldado2->gettipo()."<br>";
echo "escudo: ".$soldado2->getescudo()."<br>";
echo "Estado: ".$soldado2->armado()."<br>";
echo "Arma: ".$soldado2->trocaarma("faca")."<br>";
echo "Ataca: ".$soldado2->ataca($soldado1,6)."<br>";
echo "vida regenerada: ".$soldado2->dorme()."<br>"."<br>"."<br>";




/*Classe: Tropa
Atributos: nome, lista de soldados, quantidade de alimentos, dinheiro
Métodos:
-construtor com nome, quantidade de alimentos e dinheiro,
-getter e setter do nome e quantidade de alimentos.
-recruta (soldado)
-demite (soldado)
-come: cada soldado da tropa come 10 de alimentos desde que tenha alimentos, caso não
tenha o soldado sofre 5 de dano
-compraComida: decremente em 10 o dinheiro e incremente em 100 a comida
-compraArma(arma, soldado) equipa um soldado e decrementa o dinheiro
-getSoldado(posição da lista)
-getStatus(): retorne uma string com o status da tropa (incluindo os dados dos soldados)
(obs: pense em uma solução alternativa ao getStatus, que transforme o objeto em string,
dica: método __toString)
Testes: crie uma uma tropa, recrute soldados*/



class Tropa{

    private $nome;
    private $quant_alimentos;
    private $dinheiro;
    private $soldados;

    public function tropa($nome="",$quant_alimentos=0,$dinheiro=0){
        $this->nome=$nome;
        $this->quant_alimentos=$quant_alimentos;
        $this->dinheiro=$dinheiro;
        $this->soldados=array();
    }

    public function setnome(){
        return $this->nome;
    }
    
    public function getnome(){
        return $this->nome;
    }
    
    public function setquant_alimentos(){
        return $this->quant_alimentos;
    }
    
    public function getquant_alimentos(){
        return $this->quant_alimentos;
    }

    public function setdinheiro(){
        return $this->dinheiro;
    }

    public function getdinheiro(){
        return $this->dinheiro;
    }

    public function recruta($novosoldado){
        return $soldados = array_push($this->soldados,$novosoldado); 
        
    }

    public function demite($tchausoldado){
        array_search($tchausoldado, $this->soldados);
    }

}





?>