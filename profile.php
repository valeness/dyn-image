<?php

create_image();
exit();

function create_image()
{

//Edit in the Character Name here. Keep the quotes. In this case, the 
//character would be Test Character
$tag = "Username";

//This includes the loot sheet. Open it up in a text editor to see what 
//each item is. Loot is stored in variables like $item1
include 'loot.php';

//This is the Armor. Each piece of equipment is stored in a file. The 
//file is named after it's initials in All Caps. The folder directory is
//named for what slot it fulfills. For example, "//1" is Reinforced 
//Leather Cap. It's file is RLC.php of directory "01 head". All you need
//to edit is the 2-3 capital letters between the last '/' and '.php'
//If the character has no item in that slot, just name it the slot.php.
//For example, the waist slot is filled with waist.php. These are sheets
//with the correct variables set to 0.
//1
include 'codex/01 head/TLH.php';
//2
include 'codex/02 shoulder/RLP.php';
//3
include 'codex/03 chest/RLC.php';
//4
include 'codex/04 gauntlet/gauntlet.php';
//5
include 'codex/05 waist/waist.php';
//6
include 'codex/06 greaves/TLP.php';
//7
include 'codex/07 feet/TLB.php';
//8o
include 'codex/08 rings/ringo.php';
//8t
include 'codex/08 rings/ringt.php';
//9
include 'codex/09 bracelet/bracelet.php';
//10
include 'codex/10 weapon/BLS.php';
//11
include 'codex/11 shield/WLS.php';
//12
include 'codex/12 special/AL.php';

//Base Stats
//Easy Enough, just edit the integers to the corresponding $variable. Do
//not use quotes
$Level = 10;
	$attack = 421;
	$accuracy = 212;
	$agility = 500;
	$defense = 240;
	$evasion = 420;
	$intelligence = 999;
	$strength = 9001;
	$spirit = 2;

//Prefferred Stat
//Edit within the quotes. The preferred stat MUST be typed in with the 
//first letter capital. Like a proper noun, or else the check and if
//statements won't work and the sheet won't display the bonus.
$pref = "Strength";

//Money
//Just set this as their 'g'. Don't use quotes, just make sure their is 
//a space between the '=' and the number.
$col = 9001;

//This actually creates the image. All 'ImageStrings' must go after this
$image = imagecreatefromgif('SAO HUD.gif');

//Set colors. To create a new one, just copy and paste:
//$white = ImageColorAllocate($image, 255, 255, 255);
//Change '$white' to the name of the color you want to make.
//Leave everything else the same, except the 3 numbers. They are the 
//Red, Green, and Blue values respectively. Google the RGB value of the 
//color you want.
$white = ImageColorAllocate($image, 255, 255, 255);
$black = ImageColorAllocate($image, 0, 0, 0);

$font = 'sao.ttf';

//Name
//This just draws the username. Does not need to be edited.
imagettftext($image, 15, 0, 35, 150, $black, $font, "Username: $tag");

//Base Stats
//Just draws the statistics. Does not need to be edited.
imagettftext($image, 10, 0, 25, 450, $black, $font, "Level: $Level");
imagettftext($image, 10, 0, 35, 470, $black, $font, "Attack: $attack");
imagettftext($image, 10, 0, 35, 490, $black, $font, "Accuracy: $accuracy");
imagettftext($image, 10, 0, 35, 510, $black, $font, "Agility: $agility");
imagettftext($image, 10, 0, 35, 530, $black, $font, "Defense: $defense");
imagettftext($image, 10, 0, 35, 550, $black, $font, "Evasion: $evasion");
imagettftext($image, 10, 0, 35, 570, $black, $font, "Intelligence: $intelligence");
imagettftext($image, 10, 0, 35, 590, $black, $font, "Strength: $strength");
imagettftext($image, 10, 0, 35, 610, $black, $font, "Spirit: $spirit");

//Set Profession
//Just edit the '$prof' variable, the 'if' statements will do the rest.
//Like the Preferred stat, make sure the first letter of each profession
//is capitalized.
$prof = "Blacksmith";
if ($prof == "Blacksmith")
{
	$armorsmithing = 5;
	$weaponsmithing = 3;
	imagettftext($image, 10, 0, 25, 650, $black, $font, "Armorsmithing: $armorsmithing");
	imagettftext($image, 10, 0, 25, 670, $black, $font, "Weaponsmithing: $weaponsmithing");
}

elseif ($prof == "Bard")
{
	$rhythm = 3;
	$speechcraft = 4;
	imagettftext($image, 10, 0, 25, 650, $black, $font, "Rhythm: $rhythm");
	imagettftext($image, 10, 0, 25, 670, $black, $font, "Speechcraft: $speechcraft");
}

else
{
}

//Calculate Experience
//This calculates the experience curve. Do not edit.
$exp = $Level + (63 * $Level);

//Display Experience
imagettftext($image, 10, 0, 25, 690, $black, $font, "Experience: $exp");

//Display Prefferred Stat
imagettftext($image, 10, 0, 25, 710, $black, $font, "Pref Stat: $pref");

//Display Money
imagettftext($image, 10, 0, 25, 730, $black, $font, "Money: $col");

//Calculate Bonuses
//Does not need to be edited. Everything is being calculated from the 
//input Armor Pages.
$attb = $attack1 + $attack2 + $attack3 + $attack4 + $attack5 + $attack6 + 
        $attack7 + $attack8o + $attack8t + $attack9 + $attack10 + 
        $attack11 + $attack12 + $attack13;
$accb = $accuracy1 + $accuracy2 + $accuracy3 + $accuracy4 + $accuracy5 + 
        $accuracy6 + $accuracy7 + $accuracy8o + $accuracy8t + $accuracy9 + 
        $accuracy10 + $accuracy11 + $accuracy12;
$agib = $agility1 + $agility2 + $agility3 + $agility4 + $agility5 + 
        $agility6 + $agility7 + $agility8o + $agility8t + $agility9 + 
        $agility10 + $agility11 + $agility12;
$defb = $defense1 + $defense2 + $defense3 + $defense4 + $defense5 + 
        $defense6 + $defense7 + $defense7 + $defense8o + $defense8t + 
        $defense9 + $defense10 + $defense11 + $defense12;
$evab = $evasion1 + $evasion2 + $evasion3 + $evasion4 + $evasion5 + 
        $evasion6 + $evasion7 + $evasion8o + $evasion8t + $evasion9 + 
        $evasion10 + $evasion11 + $evasion12;
$intb = $intelligence1 + $intelligence2 + $intelligence3 + 
        $intelligence4 + $intelligence5 + $intelligence6 + 
        $intelligence7 + $intelligence8o + $intelligence8t + 
        $intelligence9 + $intelligence10 + $intelligence11 + 
        $intelligence12;
$strb = $strength1 + $strength2 + $strength3 + $strength4 + 
        $strength5 + $strength6 + $strength7 + $strength8o + 
        $strength8t + $strength9 + $strength10 + $strength11 + 
        $strength12;
$spib = $spirit1 + $spirit2 + $spirit3 + $spirit4 + $spirit5 + 
        $spirit6 + $spirit7 + $spirit8o + $spirit8t + $spirit9 + 
        $spirit10 + $spirit11 + $spirit12;
$armorg = $price1 + $price2 + $price3 + $price4 + $price5 + $price6 + 
          $price7 + $price8o + $price8t + $price9 + $price10 + 
          $price11 + $price12;

//Bonuses
//Draws armor bonuses
imagettftext($image, 10, 0, 90, 470, $black, $font, "+ $attb");
imagettftext($image, 10, 0, 100, 490, $black, $font, "+ $accb");
imagettftext($image, 10, 0, 90, 510, $black, $font, "+ $agib");
imagettftext($image, 10, 0, 95, 530, $black, $font, "+ $defb");
imagettftext($image, 10, 0, 92, 550, $black, $font, "+ $evab");
imagettftext($image, 10, 0, 115, 570, $black, $font, "+ $intb");
imagettftext($image, 10, 0, 100, 590, $black, $font, "+ $strb");
imagettftext($image, 10, 0, 85, 610, $black, $font, "+ $spib");

//Display Profession
imagettftext($image, 10, 0, 25, 630, $black, $font, "Profession: $prof");


//Armor Monetary Worth
//Adds all the prices of the armor and stores it in variable '$armorg' 
//then displays it on the far right of the sheet.
imagettftext($image, 10, 0, 535, 369, $black, $font, "Armor Value: $armorg g");

//Armor
//This draws all the armor readouts. Do not edit.
//Head
imagettftext($image, 10, 0, 715, 45, $black, $font, "Head");
imagettftext($image, 10, 0, 745, 45, $black, $font, "$price1 g");
imagettftext($image, 10, 0, 715, 65, $black, $font, "$name1");

//Shoulder
imagettftext($image, 10, 0, 715, 105, $black, $font, "Shoulder");
imagettftext($image, 10, 0, 765, 105, $black, $font, "$price2 g");
imagettftext($image, 10, 0, 715, 125, $black, $font, "$name2");

//Chest
imagettftext($image, 10, 0, 715, 165, $black, $font, "Chest");
imagettftext($image, 10, 0, 750, 165, $black, $font, "$price3 g");
imagettftext($image, 10, 0, 715, 185, $black, $font, "$name3");

//Gauntlets
imagettftext($image, 10, 0, 715, 225, $black, $font, "Gauntlets");
imagettftext($image, 10, 0, 770, 225, $black, $font, "$price4 g");
imagettftext($image, 10, 0, 715, 245, $black, $font, "$name4");

//Waist
imagettftext($image, 10, 0, 715, 340, $black, $font, "Waist");
imagettftext($image, 10, 0, 750, 340, $black, $font, "$price5 g");
imagettftext($image, 10, 0, 715, 360, $black, $font, "$name5");

//Greaves
imagettftext($image, 10, 0, 715, 395, $black, $font, "Greaves");
imagettftext($image, 10, 0, 760, 395, $black, $font, "$price6 g");
imagettftext($image, 10, 0, 715, 412, $black, $font, "$name6");

//Feet
imagettftext($image, 10, 0, 715, 450, $black, $font, "Feet");
imagettftext($image, 10, 0, 760, 450, $black, $font, "$price7 g");
imagettftext($image, 10, 0, 715, 470, $black, $font, "$name7");

//Rings
imagettftext($image, 10, 0, 715, 505, $black, $font, "Rings");
imagettftext($image, 10, 0, 750, 505, $black, $font, "$price8o g");
imagettftext($image, 10, 0, 775, 505, $black, $font, "$price8t g");
imagettftext($image, 10, 0, 715, 520, $black, $font, "$name8o");
imagettftext($image, 10, 0, 715, 535, $black, $font, "$name8t");

//Bracelet
imagettftext($image, 10, 0, 715, 565, $black, $font, "Bracelet");
imagettftext($image, 10, 0, 765, 565, $black, $font, "$price9 g");
imagettftext($image, 10, 0, 715, 585, $black, $font, "$name9");

//Weapon
imagettftext($image, 10, 0, 715, 280, $black, $font, "Weapon");
imagettftext($image, 10, 0, 760, 280, $black, $font, "$price10 g");
imagettftext($image, 10, 0, 715, 300, $black, $font, "$name10");

//Other Hand / Shield
imagettftext($image, 10, 0, 715, 625, $black, $font, "Other Hand / Shield");
imagettftext($image, 10, 0, 815, 625, $black, $font, "$price11 g");
imagettftext($image, 10, 0, 715, 645, $black, $font, "$name11");

//Special
imagettftext($image, 10, 0, 715, 685, $black, $font, "Special");
imagettftext($image, 10, 0, 760, 685, $black, $font, "$price12 g");
imagettftext($image, 10, 0, 715, 705, $black, $font, "$name12");

//Inventory
//This is where you will edit in items. Check the loot sheet, 'loot.php',
//for which item variable is what. And then add a new line of:
imagettftext($image, 10, 0, 500, 460, $black, $font, "$item1 x4");
imagettftext($image, 10, 0, 500, 475, $black, $font, "$item2 x2");
imagettftext($image, 10, 0, 500, 490, $black, $font, "$item3 x3");
imagettftext($image, 10, 0, 500, 520, $black, $font, "$item4 x2");
imagettftext($image, 10, 0, 500, 535, $black, $font, "$item5 x5");

//Checks to see what is inthe $pref variable, and then reads out and 
//and applies the preferred stat bonus respectively.
if ($pref == "Attack")
{
	$prefb = $attack / 10;
	imagettftext($image, 10, 0, 110, 470, $black, $font, "+ $prefb");
}

elseif ($pref == "Accuracy")
{
	$prefb = $accuracy / 10;
	imagettftext($image, 10, 0, 120, 490, $black, $font, "+ $prefb");
}

elseif ($pref == "Agility")
{
	$prefb = $agility / 10;
	imagettftext($image, 10, 0, 110, 490, $black, $font, "+ $prefb");
}

elseif ($pref == "Defense")
{
	$prefb = $defense / 10;
	imagettftext($image, 10, 0, 115, 490, $black, $font, "+ $prefb");
}

elseif ($pref == "Evasion")
{
	$prefb = $evasion / 10;
	imagettftext($image, 10, 0, 112, 490, $black, $font, "+ $prefb");
}

elseif ($pref == "Intelligence")
{
	$prefb = $intelligence / 10;
	imagettftext($image, 10, 0, 135, 490, $black, $font, "+ $prefb");
}

elseif ($pref == "Strength")
{
	$prefb = $strength / 10;
	imagettftext($image, 10, 0, 125, 490, $black, $font, "+ $prefb");
}

elseif ($pref == "Spirit")
{
	$prefb = $spirit / 10;
	imagettftext($image, 10, 0, 105, 490, $black, $font, "+ $prefb");
}

//Tells the browser it's an image, do not edit.
header("Content-Type: image/jpeg");

imagepng($image);

ImageDestroy($image);

}

?>
