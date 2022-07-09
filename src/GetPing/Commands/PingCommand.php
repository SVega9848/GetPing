<?php

namespace GetPing\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\CommandException;
use GetPing\Core\Main;
use pocketmine\lang\Translatable;
use pocketmine\network\NetworkSessionManager;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\network\mcpe\NetworkSession;
use pocketmine\utils\TextFormat;

class PingCommand extends Command {

    private $main;

    public function __construct(Main $main)
    {

        $this->main = $main;
        parent::__construct("ping", "Allows you to get your ping!", "Use /ping");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender->hasPermission("getping.cmd")) {
            if($sender instanceof Player) {
                $config = new Config($this->main->getDataFolder(). "/messages.yml", Config::YAML);
                $ping = $sender->getNetworkSession()->getPing();
                $sender->sendMessage(TextFormat::colorize(str_replace("{PING}", "$ping", $config->get("pingmessage"))));
            }
        }
    }
}