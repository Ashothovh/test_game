<?php 

include_once("Tank.php");
include_once("Soldier.php");
include_once("Rocket.php");
include_once("StringGenerator.php");

class Game
{
    private array $players;

    public function __construct()
    {
        $this->players = [new A(), new B(), new C()];
    }

    public function start(): void
    {
        // Generate two strings for the two players
        $generator = new StringGenerator(3, 3);  // We are putting here the count
        [$string1, $string2] = $generator->generateStrings();

        echo " <br> Starting game with: <br> Player 1: $string1 <br> Player 2: $string2 <br>";

        // var_dump(str_split($string1)); die();

        // split enq anum arrayi hertakanutyun@ voroshelu hamar
        $turnOrder1 = str_split($string1); // Player 1
        $turnOrder2 = str_split($string2); // Player 2

        // Loop until one player remains alive, one will die
        while (count(array_filter($this->players, fn($p) => $p->isAlive())) > 1) {
            foreach ($turnOrder1 as $x) {
                if (count(array_filter($this->players, fn($p) => $p->isAlive())) <= 1) {
                    break;
                }
                $this->takeTurn($x);
            }

            foreach ($turnOrder2 as $y) {
                if (count(array_filter($this->players, fn($p) => $p->isAlive())) <= 1) {
                    break;
                }
                $this->takeTurn($y);
            }
        }

        $this->declareWinner();
    }


    private function takeTurn(string $char): void
    {
        $attacker = $this->getPlayerByName($char);
        if (!$attacker || !$attacker->isAlive()) {
            return;
        }

        // listn enq get anum alive playerneri
        $targets = array_filter($this->players, fn($p) => $p->isAlive() && $p !== $attacker);
        if (empty($targets)) {
            return;
        }

        // Randomly select a target
        $target = $targets[array_rand($targets)];
        $attacker->fire($target);
        $attacker->recover();
    }

    private function getPlayerByName(string $name): ?Player
    {
        foreach ($this->players as $player) {
            if ($player->getName() === $name) {
                return $player;
            }
        }
        return null;
    }

    private function declareWinner(): void
    {
        $alivePlayers = array_filter($this->players, fn($p) => $p->isAlive());
        if (count($alivePlayers) === 1) {
            $winner = reset($alivePlayers);
            echo "Winner: {$winner->getName()} with health: {$winner->getHealth()} <br>";
        } else {
            echo "No winner!";
        }
    }
}

// Start the game
$game = new Game();
$game->start();