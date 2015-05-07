<?php

namespace ExamplePlugin;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class MainClass extends PluginBase implements Listener{

	public function onLoad(){
		$this->getLogger()->info(TextFormat::WHITE . "loaded!");
	}

	public function onEnable(){
		$this->getLogger()->info(TextFormat::DARK_GREEN . "Enabled successfully.");
    }

	public function onDisable(){
		$this->getLogger()->info(TextFormat::DARK_RED . "disabled!");
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "pr":
				$sender->sendMessage("<PR> Version 1.0.0 by @KyleTheHack3r");
				return true;
			default:
				return false;
		}
	}

	/**
	 * @param PlayerRespawnEvent $event
	 *
	 * @priority        NORMAL
	 * @ignoreCancelled false
	 */
	public function onSpawn(PlayerRespawnEvent $event){
		Server::getInstance()->broadcastMessage($event->getPlayer()->getDisplayName() . " has just spawned.");
	}
}
