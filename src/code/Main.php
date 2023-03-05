<?php

namespace code;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\ItemIds;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use code\form\menu;

class Main extends PluginBase implements Listener{
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("le plugin est lancé");
    }

    public function onDisable(): void
    {
        $this->getLogger()->info("plugin desactive");
    }

    public function onCommand(CommandSender $ply, Command $cmd, string $label, array $args): bool
    {
        $commandname = $cmd->getName();
        if($commandname == "ping")
        {
            if($ply instanceof Player)
            {
                $ply->sendMessage("Pong");
            }
        }
        if($commandname == "opentest"){
            if($ply instanceof Player)
            {
                menu::open($ply);
            }
        }
        return true;
    }

    public function onInteract(PlayerInteractEvent $event): bool
    {
        $ply = $event->getPlayer();
        $item = $event->getItem();
        if($item->getId() == ItemIds::COMPASS)
        {
            if($item->getName() == "Menu"){
                menu::open($ply);
            }
        }
        return true;
    }
}