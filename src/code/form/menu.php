<?php

namespace code\form;

use jojoe77777\FormAPI\SimpleForm;
use pocketmine\player\Player;

class menu extends SimpleForm{
    public static function open(Player $ply){
        $form = new SimpleForm(
            function (Player $ply, $data){
                if($data != null){
                    switch($data){
                        case 0:
                            break;
                        case 1:
                            break;
                        case 2:
                            break;
                    }
                }else{
                    $ply->sendMessage("Action non détectée");
                }
            }
        );
        $form->setTitle("Menu du HUB");
        $form->setContent("Choisissez un mode de jeu ");
        $form->addButton("§c| UHC");
        $form->addButton("§b| Blitz");
        $form->addButton("| Retour");
        $ply->sendForm($form);
    }
}