<?php
use hungergames\lib\utils\Msg;
use hungergames\obj\HungerGames;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
class WinMessage extends \hungergames\api\scripts\HGAPIScript
{
    /**
     * @var Config
     */
    private $c;

    public function __construct()
    {
        parent::__construct("WinMessage", "1.0", "xBeastMode");
    }

    public function onLoad()
    {
        $this->c = $this->createConfig("WinMessage.yml", ["message" => "&a%player% won on game %game%"]);
    }

    public function onPlayerWinGame(Player $p, HungerGames $game)
    {
        $m = str_replace(["%player%", "%game"], [$p->getName(), $game->getName()], $this->c->get("message"));
        Server::getInstance()->broadcastMessage(Msg::color($m));
    }
}