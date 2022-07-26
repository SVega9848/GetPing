<?php

namespace SVega9848\GetPing\Core;

use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;
use pocketmine\plugin\PluginBase;
use SVega9848\GetPing\Commands\PingCommand;

class Main extends PluginBase implements Listener {

	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register("getping", new PingCommand($this));
        $this->saveResource("messages.yml");
	}
}
