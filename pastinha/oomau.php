 <?
 class Soldado {
        private $tipo;
        private $escudo;
        private $vida = 100;
        private $bonus_ataque;
        private $arma;
        public function Soldado($tipo, $escudo, $bonus_ataque = 0, $arma = null) {
            $this->tipo = $tipo;
            $this->escudo = $escudo;
            $this->bonus_ataque = $bonus_ataque;
            $this->arma = $arma;
        }
        public function ObterTipo () { return $this->tipo;}
        public function ObterEscudo () { return $this->escudo;}
        public function ObterVida () { return $this->vida;}
        public function ObterBonus_Ataque () { return $this->bônus_ataque;}
       
        public function ObterArma () { 
            if ($this->EstouArmado() === 'Sim') {
                return $this->arma->ObterNome();
            } else {
                return 'Nenhuma';
            }
        }
        public function MudarTipo ($tipo) { return $this->tipo = $tipo;}
        public function MudarEscudo ($escudo) { return $this->escudo = $escudo;}
        public function MudarVida ($vida) { return $this->vida = $vida;}
        public function MudarBonus_Ataque ($bonus) { return $this->bonus_ataque = $bonus;}
        public function MudarArma ($arma) { return $this->arma = $arma;}
        // public function EstouVivo() { return $this->vida > 0 ? 'true' : 'false';}
        public function EstouVivo() { 
            return $this->vida > 0 ? 'Sim' : 'Não';
        }
        public function Ataque($adversario, $tiros) {
            $PassarBonusPara0e1 = 100;
            $DanoSofrido = $this->arma->dano * $tiros * ($this->bonus_ataque / $PassarBonusPara0e1);
            $DanoSofrido = $DanoSofrido - (($PassarBonusPara0e1 - $adversario->escudo) / $PassarBonusPara0e1);
            $adversario->vida -= $DanoSofrido;
            if ($adversario->vida <= 0) {
                $adversario->vida = 0;
                $this->bonus_ataque += 0.05; 
            }
        }
        public function Dormir() { if ($this.EstouVivo()) { return $this->vida += 10;}}
        public function EstouArmado() { 
            return $this->arma != null ? 'Sim' : 'Não';
        }
    }
    $PrimeiroSoldado = new Soldado('fuzileiro', 40, 15, $MinhaPrimeiraArma);
    echo '<br><br>Primeiro Soldado<br>';
    echo '<br>Vida: ' . $PrimeiroSoldado->ObterVida();
    echo '<br>Tipo: ' . $PrimeiroSoldado->ObterTipo();
    echo '<br>Escudo: ' . $PrimeiroSoldado->ObterEscudo();
    echo '<br>Bônus de Ataque: ' . $PrimeiroSoldado->ObterBonus_Ataque();
    echo '<br>Arma: ' . $PrimeiroSoldado->ObterArma();
    echo '<br>Estou vivo? ' . $PrimeiroSoldado->EstouVivo();
    $SegundoSoldado = new Soldado('guerrilheiro', 25, 30);
    echo '<br><br>Segundo Soldado<br>';
    echo '<br>Vida: ' . $SegundoSoldado->ObterVida();
    echo '<br>Tipo: ' . $SegundoSoldado->ObterTipo();
    echo '<br>Escudo: ' . $SegundoSoldado->ObterEscudo();
    echo '<br>Bônus de Ataque: ' . $SegundoSoldado->ObterBonus_Ataque();
    echo '<br>Arma: ' . $SegundoSoldado->ObterArma();
    echo '<br>Estou vivo? ' . $SegundoSoldado->EstouVivo();

























    class Arma {
        private $nome;
        private $municao;
        private $dano;
        private $preco;
        public function Arma($nome, $preco, $dano, $municao = 0) {
            $this->nome = $nome;
            $this->preco = $preco;
            $this->dano = $dano;
            $this->municao = $municao;
        }
        public function ObterNome () { return $this->nome;}
        public function ObterPreco () { return $this->preco;}
        public function ObterDano () { return $this->dano;}
        public function ObterMunicao () { return $this->municao;}
        public function MudarNome($nome) { $this->nome = $nome;}
        public function MudarPreco($preco) { $this->preco = $preco;}
        public function MudarDano($dano) { $this->dano = $dano;}
        public function Atira($quantidade) {
            if ($quantidade > $this->municao) {
                 $this->municao = 0;
            } else {
                $this->municao -= $quantidade;
            }
        }
        public function MaisMunicao($quantidade) {
            $this->municao += $quantidade;
        }
    }











?>