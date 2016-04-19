<?php

namespace ImagicalDevs;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;
use pocketmine\level\Level;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;

class Main extends PluginBase {
  
  public function onEnable() {
    $this->registerPluginEvents();
    $this->printOut(C::GREEN."[MagicalAPI] Simple API Enabled!");
    
    $this->makeConfigDir();
    $this->config = new Config($this->getDataFolder(). "config.yml", Config::YAML);
  }
  
  public function onDisable() {
    $this->saveResource("config.yml");
    $this->printOut(C::RED."[MagicalAPI] Simple API Disabled!");
  }
  
  // API Functions
  
  function registerPluginEvents() {
    $ev = $this->getServer()->getPluginManager()->registerEvents($this,$this);
    return $ev;
  }
  
  function printOut() :string {
    $msg = $this->getLogger()->info();
    return $msg;
  }
  
  function getAllPlayers() {
    $allplayers = $this->getServer()->getOnlinePlayers();
    return $allplayers;
  }
  
  function getPlayersInLevel() {
    $players = $this->getLevel()->getPlayers();
    return $players;
  }
  
  function makeConfigDir() {
    $mkdir = @mkdir($this->getDataFolder());
    return $mkdir;
  }
  
  function getXYZ() {
    $xyz = array (
      $this->getX();
      $this->getY();
      $this->getZ();
    );
    return $xyz;
  }
  
}
