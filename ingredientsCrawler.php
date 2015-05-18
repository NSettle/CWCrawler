<?php
// error_reporting(E_ERROR);

function busca($word)
{	

	$url = "https://ajax.googleapis.com/ajax/services/search/images?" .
       "v=1.0&q=".urlencode($word)."&start=1&rsz=1&as_filetype=jpg";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$body = curl_exec($ch);
	curl_close($ch);

	$json = json_decode($body);

	$json_string = json_encode($json->{'responseData'}->{'results'}[0]->{'url'}, JSON_PRETTY_PRINT);

	return $json->{'responseData'}->{'results'}[0]->{'url'};
	
}

$myDrinks = "Black tea;Black Vodka;Black Walnut Bitters;Blackberries;Blackberry Brandy;Blackberry Liqueur;Blackcurrant Cordial;Blackcurrant Juice;Blackcurrant Sourz;Blue Alize;Blue Curacao;Blue Taboo;Blueberries;Blueberry Juice;Blueberry Schnapps;Blueberry Vodka;Bols Blue Curacao;Bols Genever;Bombay Sapphire Gin;Bourbon;Brandy;Cachaca;Calvados;Camomile Tea;Campari;Canada Dry;Canadian Club Whisky;Canadian Whiskey;Cape Velvet;Captain Morgan's Spiced Rum;Captain Morgan's Tattoo;Caramel Infused Vodka;Caramel Syrup;Cardamom;Cardamom pods;Cardamom Syrup;Caribbean Rum;Cariel Vanilla Vodka;Carrot Juice;Cava;Cayenne Pepper;Cazadores Anejo Tequila;Celery;Celery Bitters;Celery Salt;Chambord;Champagne;Chardonnay;Chartreuse;Cherry;Cherry Brandy;Cherry Corkys;Cherry Juice;Cherry Lambrini;Cherry Liqueur;Cherry Marnier;Cherry Sourz;Cherry Syrup;Cherry Vodka;Cherry Whiskey;Cherryade;Chestnut Liqueur;Chilli peppers;Chivas Regal;Chocolate;Chocolate Bitters;Chocolate Chip Cookie Syrup;Chocolate Ice Cream;Chocolate Liqueur;Chocolate Milk;Chocolate Sauce;Chocolate Schnapps;Chocolate Syrup;Cider;Cinnamon;Cinnamon Liqueur;Cinnamon Schnapps;Cinnamon syrup;Cinnamon Whiskey;Citron Vodka;Clamato;Clementine Juice;Cloves;Club Lemon;Cocchi di Torino;Cocoa Powder;Coconut;Coconut Cream;Coconut liqueur;Coconut Milk;Coconut Rum;Coconut Syrup;Coconut Water Syrup;Coffee;Coffee Beans;Coffee Ice Cream;Coffee Liqueur;Cognac;Creme De Cacao Dark;Creme De Cacao White;Creme De Cassis;Creme de Fraises;Creme De Framboise;Creme De Menthe;Creme de Mure;Creme de Noyaux;Creme de Peche;Créme de Pomme;Creme De Violette;Crown Royal;Crown Royal Black;Cucumber;Cynar;Damson Gin;Dark Chocolate Powder;Dark Rum;De Kuyper Peachtree;Demarera Sugar;Desiccated Coconut;Dewar's Scotch whisky;Diet Coke;Disaronno Amaretto;DOM Benedictine;Dooleys;Double Cream;Dr. Pepper;Drambuie;Dry Cider;Dry Gin;Dry Vermouth;Dry White Wine;Dubonnet;Dubonnet Rouge;Earl grey tea;Early Grey Gomme Syrup;Egg white;Egg yolk;Eggnog;Elderflower Cordial;Elderflower Liqueur;Elderflower syrup;Energy Drink;Espresso Coffee;Everclear;Falernum;Fanta Fruit Twist;Fee Brothers Plum Bitters;Fentiman's Victorian Rose Lemonada Soda;Fernet Branca Bitters;Fernet Branca Liqueur;Finlandia Vodka;Fizzy Orange Drink;Fluffed marshmallow vodka;Frangelico;French Vermouth;Friji Chocolate Milkshake;Frosty Jack's White Cider;frozen peaches;Fulton's Harvest Pumpkin Pie Liqueur;G'Vine;Galliano;Genever Gin;Gin;Ginger;Ginger Ale;Ginger Beer;Ginger bitters;Ginger bread syrup;Ginger liqueur;Ginger Syrup;Ginger Wine;Gingerbread;Godiva White Chocolate Liqueur;Gold Rum;Goldschlager;Goldstrike;Gomme syrup;Gordon's Gin;Goslings Black Seal Rum;Grain Alcohol;Grand Marnier;Grape Juice;Grape Pucker;Grape sodapop;Greenhook Ginsmiths Beach Plum Liqueur;Grenadine;Grey Goose L'Orange Vodka;Grey Goose Vodka;Ground Coffee Beans;Guava Juice;Guinness;Half And Half;Havana Club 7 Anos;Havana Club Rum;Hendricks Gin;Hennessy Cognac;Hennessy V.S;Herradura Plata Tequila;Honey;Honey liqueur;Honey syrup;Hot Chocolate;Hot Damn;Ice Tea;Icing Sugar;Irish Mist;Irish Whiskey;Irn Bru;Jack Daniels;Jagermeister;Jamaican Rum;Jameson Whiskey;Jans Herbal Liqueur;Jasmine tea;Jelly;Jim Beam;Johnnie Walker Black Label;Jose Cuervo;Kahlua;Kamms & Sons;Ketel One Citroen;Ketel One Vodka;King Peter Vodka;Kirsch;Kiwi;Kiwi Liquor;Kummel;La Fe Absinthe;Lager;Lavender Syrup;Lemon;Lemon balm;Lemon bitters;Lemon Cordial;Lemon ice cream;Lemon Juice;Lemon Lime Soda;Lemon Liqueur;Lemon Sorbet;Lemon Squash;Lemon syrup;Lemon Vodka;Lemonade;Lemongrass and chili beer;Licor 43;Light Beer;Lilet Blanc;Lime;Lime Bitters;Lime Coke;Lime Cordial;Lime Juice;Lime Margarita Mix;Lime Popsicle;Lime Vodka;Limeade;Limoncello;London Dry Gin;Lucozade;Lychee Juice;Lychee Liqueur;Madeira;Magners Cider;Maker's Mark Bourbon;Malibu;Malibu Mango Rum;Malibu Passionfruit Rum;Maraschino Cherry Juice;Maraschino cherry liqueur;Margarita Mix;Marie Brizard Grand Orange;Marmalade;Martin Miller's Gin;Martini;Martini Bianco Vermouth;Martini Dry;Martini Gold;Martini Rosso;Mascarpone;Melon;Mezcal;Midori;Mike's Hard Berry;Milk;Milk Chocolate Powder;Mint Leaves;Mint Liqueur;Mint Schnapps;Mint Syrup;Monkey Shoulder Scotch Whiskey;Mountain Dew;Napoleon Courvoisier Cognac;Natural Yoghurt;Natural Yoghurt Liqueur;Newcastle Brown Ale;Noily Prat;Non-alcoholic Apple Cider;Nutella;Nutmeg;Old Tom Gin;Olive Juice;Olives;Onion;Orange;Orange + Cranberry J20;Orange Bitters;Orange Blossom Water;Orange Cordial;Orange Curacao;Orange Flower Water;Orange Gin;Orange Juice;Orange Liqueur;Orange Reef;Orange Syrup;Orange Vodka;Oreo Cookie;Orgeat Syrup;Ouzo;Overproof Rum;Papaya juice;Parfait Amour;Passionfruit;Passionfruit Juice;Passionfruit Liqueur;Passionfruit Puree;Passionfruit Syrup;Passoa;Pastis;Peach;Peach Bitters;Peach Juice;Peach Liqueur;Peach Nectar;Peach Puree;Peach Schnapps;Peach Vodka;Pear;Pear Juice;Pineapple;Pineapple Juice;Pineapple Rum;Pineapple Sourz;Pink Champagne;Pink Grapefruit Juice;Pink Lemonade;Pink peppercorn;Pisang Ambon;Pisco;Plum Bitters;Plymouth Gin;Poire William;Pomegranate;Pomegranate Juice;Pomegranate Syrup;Popcorn;Port;Powerade;Pravda Vodka;Prosecco;Pumpkin Puree;Raki;Raspberry;Raspberry Cordial;Raspberry Juice;Raspberry Lemonade;Raspberry Liqueur;Raspberry Puree;Raspberry Sambuca;Raspberry Schnapps;Raspberry Sourz;Raspberry Syrup;Raspberry Vodka;Razzmatazz;Red Alize;Red Bull;Red Grape Juice;Red Port;Red Sour Puss;Red Vermouth;Red Wine;Remy Martin VSOP;Rhubarb bitters;Ribena;Rootbeer;Rootbeer Schnapps;Rose Syrup;Rose Vodka;Rose Water;Rose Wine;Rose's Lime Juice;Rosemary Syrup;Ruby Port;Rum;Rum & Raisin Ice Cream;Rumchata;Rumplemintz;Russian Standard Vodka;Rye Whiskey;Sagatiba Velha;Sailor Jerry's;Saison Beer;Sake;Salt;Sambuca;Sambuca (Black);Sambuca (White);Schweppes Bitter Lemon;Scotch Whisky;Seagrams 7 Whiskey;Sharbat;Sherry Dry;Sherry Sweet;Smirnoff Vodka;Soda Water;Sour Apple;Sour Apple Pucker;Sour Apple Schnapps;Sour Mix;Sour Puss;Sour Puss - Raspberry;Sour Puss Blue;Southern Comfort;Soy sauce;Sparkling Water;Sparkling White Wine;Special Brew;Spiced pumpkin syrup;Spiced Rum;Sprite;St Germain Elderflow Liqueur;Steamed Milk;Stoli Blueberry;Stoli Raspberry;Stolichnaya Vanilla;Stolichnaya Vodka;Stones Ginger Wine;Stout;Strawberry;Strawberry Bols;Strawberry Juice;Strawberry Liqueur;Strawberry Milkshake;Strawberry Puree;Strawberry Schnapps;Strawberry Syrup;Strawberry Vanilla Ice Cream;Strawberry Vodka;Strega Liqueur;Stroh Rum (80% Alcohol);Strongbow Cider;Sugar;Sugar Syrup;Swedish Punsch;Sweet Red Vermouth;Sweet Vermouth;Sweetened Condensed Milk;Tabasco Sauce;Taboo;Talisker Malt;Talisker Storm;Tangerine Juice;Tanqueray Gin;Tennants Beer;Tequila;Tequila Blanco;Tequila Blu Reposado;Tequila Oro;Tequila Reposado;Tequila Rose;Tequila Rose Strawberry Cream;Tequila Silver;The Wild Geese Whiskey;Three Olives Cherry Vodka;Three Olives Pomegranate Vodka;Tia Maria;Tizer;Tom Gin;Tomato Juice;Tonic Water;Triple Sec;Tropical Juice;Tropical Sourz;Ugli Fruit Juice;UV Blue;Vanilla Coke;Vanilla Essence;Vanilla Ice Cream;Vanilla Liqueur;Vanilla pod;Vanilla Schnapps;Vanilla Syrup;Vanilla Vodka;Velvet Falernum;Vermouth;Vimto;Whipped Cream;Whipped Cream Vodka;Whiskey;Whisky;White Balsamic Vinegar;White Cider;White Cranberry and Apple Juice;White Cranberry Juice;White Grape Juice;White Rum;White Vermouth;White Wine;Wild Turkey - American Honey;Wild Turkey Bourbon;WKD;WKD Blue;WKD Clear;WKD Iron Brew;WKD Red;Woods 100 Dark Rum;Worcestershire Sauce;Wray and Newphew Overproof rum;Wyborowa Vodka;X Rated Fusion Liqueur;Yellow Chartreuse;Yellow Plum Brandy;Yohimbe Extract;Yukon Jack;";
$myArray = explode(";", $myDrinks);


$array = json_decode(fread(fopen("json.js", "r"), filesize("json.js")));

$perReload = 5;

$page = $_GET['p'];

// foreach ($myArray as $key => $nome) {
$c = 0;

for ($i=($page*$perReload); $i<count($myArray); $i++) {

	array_push($array, array('name'=>$myArray[$i], 'image'=>busca($myArray[$i], 0),'id'=>$i));

	$c++;

	if ($c == $perReload) {
		break;
	}
}

$str = json_encode($array);
echo $str;

// $fp = fopen("json.js", "w");
file_put_contents("json.js", $str);
// fclose($fp);


if ($c == 0) {
	echo "<h1>Sucesso!</h1>";
}
else {
	echo "<script>
		setTimeout(function() {
			location.href='?p=".($page+1)."';
		}, 1000);
		</script>";

}

?>
