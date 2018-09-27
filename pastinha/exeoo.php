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


class Soldado extends Arma{

    private $tipo;
    private $escudo;
    private $vida;
    private $bonusataque;
    private $arma;


    public function soldado ($tipo="", $escudo=0, $vida=0, $bonusataque=0, $arma=""){
        $this->tipo = $tipo;
        $this->escudo = $escudo/100;
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

    public function ataca($inimigo,$tiros){
        
        $danosofrido=$this->arma->dano *$tiros * ($this->bonusataque/100);
        $danosofrido= $danosofrido-(100-$inimigo->escudo)/100;
        $inimigo->vida-=$danosofrido;
        if ($inimigo->vida<=0){
            $inimigo->vida=0;
            $this->bonusataque+=0.05;
        }
                
    }

    public function dorme(){
        if($this->vida>0){
            return $this->vida+=10;
        }
    }

    public function trocaarma($arma){
        $this->arma=$arma;
    }

    public function armado(){
        if ($this->arma == "" or null){
            $r= "nem to armadokkk";
        }
        else{
            $r="to armadãoKKKKKJJmmm11";
        }
        return $r;
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




$soldadinhogostoso=new Soldado("fuzileirinho",70,100,30,"escarlate de orr");

echo "tipo: ".$soldadinhogostoso->gettipo()."<br>";
echo "escudo: ".$soldadinhogostoso->getescudo()."<br>";
echo "dano: ".$soldadinhogostoso->armado()."<br>";
echo "vida regenerada: ".$soldadinhogostoso->dorme()."<br>"."<br>"."<br>";



?>

