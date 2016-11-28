<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EHACKB 4</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/timetable.css">
    <link rel="stylesheet" href="css/sprekers.css">
    <link rel="stylesheet" href="css/games.css">
    <link rel="stylesheet" href="css/locatie.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/navHandlr.js"></script>
    <script type="text/javascript" src="js/timetable.js"></script>
    <script type="text/javascript" src="js/mobil_menu.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v0.28.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.28.0/mapbox-gl.css" rel="stylesheet" />

</head>

<body>
<header class="nav-down">
    <nav>
        <ul id="mainMenu">
            <div class="left">
                <li><a href="">ehackB4</a></li>
            </div>

            <div class="right">
                <li class="mobil_click"><a href="#intro" class="active">Home</a></li>
                <li class="mobil_click"><a href="#sprekers">Sprekers</a></li>
                <li class="mobil_click"><a href="#games">Games</a></li>
                <li class="mobil_click"><a href="#programma">Programma</a></li>
                <li class="mobil_click"><a href="#locatie">Locatie</a></li>
                <li class="mobil_click"><a href="#registratie">Registratie</a></li>
            </div>

        </ul>
    </nav>
</header>
<main>
    <article id="intro">
        <img src="img/logo.png" alt="EHACKB 4">
        <p>16 &amp; 17 DECEMBER</p>
        <p>GAME | HACK | LEARN | CREATE</p>
    </article>
    <article id="sprekers">
        <div class="sprekers">
            <h2 class="animated fadeInDown">Sprekers</h2>
            <div class="lijstsprekers">
                <section class="spreker">
                    <img src="img/sprekers/inti_de_ceukelaire.png" alt="Casey" class="thumbnail thumbnail-lineup">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Inti De Ceukelaire</h3>
                    <p class="title">Creative Hacking v2</p>
                    <p class="hour">16:45-17:45 - AUDI 4</p>
                    <p class="info">Na het succes van vorig jaar: een tweede portie van de meest opmerkzame lekken die Inti afgelopen jaar tegen kwam op sites als Facebook en Google. Facebook en Google hebben de beste security engineers ter wereld en toch betalen ze elk jaar miljoenen uit aan ethische hackers. Lekken vinden waar honderden anderen overkijken: naast een klein beetje gelukt vergt het een ferme dosis creativiteit. Inti geeft enkele praktische voorbeelden die je in geen enkel boek terugvindt en zal je meesleuren in de denkwereld van een hacker. Leer hoe je met één simpele e-mail een volledig bedrijf kunt hacken (neen: geen ouderwetse phishing), of hoe je via Facebook anonieme cyberstalkers kan ontmaskeren zoals hij deed voor "Opgejaagd" op VIJFtv.

                        Inti de Ceukelaire is oud Multec student (academiejaar 2015-2016) en is securityblogger en ethisch hacker.</p>
                </section>
                <section class="spreker">
                    <img src="img/sprekers/Valery_Vermeulen.png" alt="Casey" class="thumbnail thumbnail-lineup">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Valery Vermeulen</h3>
                    <p class="title">How to make music from (deep) space, wall street or biofeedback</p>
                    <p class="hour">17:45-18:45 - AUDI 1</p>
                    <p class="info">In this presentation, Dr. Valery Vermeulen will give an overview of the several ways he combines his passion for both mathematics and music in several multimedia projects: "EMO-Synth" project, "Krystal Ball," and "Mikromedas." Vermeulen's work within the "EMO-Synth" project revolves around the area of interactive multimedia where automatically generated sound and music systems are directed by the emotional responses of the user. In the "Krystal Ball" project, an interactive multimedia system where the mechanisms that caused the financial credit crisis, stochastic and algorithmic music generation and the work of pioneer I. Xenakis, plays a central role. With his most recent project entitled "Mikromedas," he mainly focusses on the innovative uses of data from space and deep space as new tools shape music composition and performance.

                        Valery Vermeulen is an electronic musician, music producer, mathematician, new media artist, author and a visiting professor at Erasmus University College in Brussels where he teaches "Multimedia Art and Technology." In 2001 he obtained a Ph.D. in pure mathematics at Ghent University (BE), and Between 2001 and 2005 Vermeulen worked at the Institute for Psychoacoustics and Electronic Music at the same university on a research project focusing on the link between music and emotions. Meanwhile, he started writing and recording music in my his production studio. In 2013 he moreover finished a master degree in music composition at the Royal Conservatory of Ghent (BE). Since 2003 Vermeulen has been working on various interactive multimedia projects where the man-machine interaction and crossover between art and science plays a central role. Topics in his work cover a broad range of disciplines including generative art, creative evolutionary systems design, algorithmic sound and image generation, (generative) sound synthesis, affective computing, artificial intelligence, and econometrics.</p>
                </section>
                <section class="spreker">
                    <img src="img/sprekers/Luk_Schoonaert.png" alt="Casey" class="thumbnail thumbnail-lineup">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Luk Schoonaert</h3>
                    <p class="title">IT security: de trends van de laatste jaren</p>
                    <p class="hour">17:45-18:45 - AUDI 4</p>
                    <p class="info">Luk Schoonaert, director of Technology bij Exclusive Networks, komt ons een stand van zaken geven omtrent cybersecurity en de trends van de laatste jaren (cryptolockers, DDOS, Internet of things, …). Hoe kunnen we ons beschermen? Na deze sessie kan je terecht bij zijn collega Steven Eerdekens voor een workshop, waar je aan de slag gaat met Palo Alto firewalls.</p>
                </section>
                <section class="spreker">
                    <img src="img/sprekers/wannes_gennar.png" alt="Casey" class="thumbnail thumbnail-lineup">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Wannes Gennar</h3>
                    <p class="title">Realtime communication in web technologieën</p>
                    <p class="hour">18:45-19:45 - AUDI 1</p>
                    <p class="info">Wannes is een laatstejaarsstudent Dig-X (Toegepaste Informatica), optie Software Engineering aan de Erasmushogeschool. Hij heeft een passie voor software design en web applicaties. Wannes bespreekt de technologieën achter realtime web applicaties, hoe ze zijn opgebouwd, en waarin ze verschillen met de traditionele technologieën.</p>
                </section>
                <section class="spreker">
                    <img src="img/sprekers/hans_ameel.png" alt="Casey" class="thumbnail thumbnail-lineup">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Hans Ameel</h3>
                    <p class="title">temp</p>
                    <p class="hour">18:45-19:45 - AUDI 4</p>
                    <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </section>
                <div class="clear"></div>
            </div>
        </div>
    </article>
    <article id="games">
        <div class="games">
            <h2 class="animated fadeInDown">Games</h2>
            <div class="lijstgames">
                <section class="game">
                    <img src="img/games/lol.jpg" alt="LoL">
                    <a href="#">Doe mee</a>
                    <h3 class="name">League of Legends</h3>
                    <p class="title">Team of 5</p>
                    <p class="hour">20.00 - ...</p>
                    <p class="info">Voor het League of Legends tornooi gaan we werken met een poulesysteem waarbij er 2 poules van 6 teams zijn. Elk team zal eenmaal tegen elk team spelen en de 4 teams die het meeste hebben gewonnen gaan door naar de volgende ronde. In deze ronde zal er met een bracket systeem gewerkt worden voor de 8 overblijvende teams. Als je wint ga je door naar de volgende ronde in de bracket als je verliest is het gedaan. We gebruiken de custom draft game mode voorzien door het spel zelf. Er zullen ook vaak mods en streamers aanwezig zijn in deze games om zo het tornooi vlot te laten verlopen. Who will be the last one standing on the Rift?</p>
                </section>
                <section class="game">
                    <img src="img/games/csgo.png" alt="LoL">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Counter strike : global offensive</h3>
                    <p class="title">Team of 5</p>
                    <p class="hour">20.00 - ...</p>
                    <p class="info">Voor het Counter Strike: Global Offensive starten we met een poulesysteem waarbij er 2 poules van 6 teams zijn. Elk team zal eenmaal tegen elk team spelen en de 4 teams die het meeste hebben gewonnen gaan door naar de volgende ronde. In deze ronde zal er met een bracket systeem gewerkt worden voor de 8 overblijvende teams. Als je wint ga je door naar de volgende ronde in de bracket als je verliest is het gedaan. De games worden gespeeld op servers voorzien door de organisatie.</p>
                </section>
                <section class="game">
                    <img src="img/games/overwatch.png" alt="LoL">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Overwatch</h3>
                    <p class="title">Team of 6</p>
                    <p class="hour">20.00 - ...</p>
                    <p class="info">Toon je vermogen in overwatch en neem het op tegen 5 andere teams om te bewijzen dat jullie dit jaar de kampioen zijn.<p>
                    <p>Regels:</p>
                    <br>
                    <p>Het tornooi wordt opgedeeld in de volgende rondes:</p>
                    <br>
                    <p>Voorrondes: 6 teams spelen tegen elkaar in 5 wedstrijden, best of 1. De gespeelde map wordt door de team-captain gekozen via de OWdraft website, waarvan ze een link krijgen van de overwatchbalie via battlenet. De 4 beste teams gaan door naar de halve finale en de 2 verliezende teams zijn geëlimineerd.</p>
                    <br>
                    <p>Halve finale: Hierin zitten 4 teams. Een team van een groep speelt tegen een ander team van de andere groep. Er worden hier 3 matches gespeeld. Waarbij de 3 maps in het begin worden gekozen via OWdraft. De winnaars worden gekozen met een best of 3 methode.</p>
                    <br>
                    <p>Finale: Hier gaan de 2 overblijvende teams tegen elkaar spelen zoals in de halve finale, met een best of three over de 3 verschillende objectives. De winnaar wint het overwatch toernooi.</p>
                    <br>
                    <p>Killcams worden uitgezet voor de matches.</p>
                </section>
                <section class="game">
                    <img src="img/games/Super_Smash_Bros.png" alt="LoL">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Super Smash Bros</h3>
                    <p class="title">1 player</p>
                    <p class="hour">20.00 - ...</p>
                    <p class="info">

                    <p>• 2 levens, 3 minuten timer (+ sudden death)</p>

                    <p>• Items zijn uitgeschakeld</p>

                    <p>• Geen custom moves</p>

                    <p>• Geen custom equips</p>

                    <p>• Default mii’s zijn toegelaten</p>

                    <p>• Mii’s overzetten is verboden</p>

                    <p>• DLC characters zijn toegelaten</p>

                    <p>• Er wordt niet gewisseld van character tussen verschillende rondes</p>

                    <p>• Alleen “Omega’ maps zijn toegelaten en worden random geselecteerd</p></p>
                </section>
                <section class="game">
                    <img src="img/games/fifa.png" alt="LoL">
                    <a href="#">Doe mee</a>
                    <h3 class="name">FIFA</h3>
                    <p class="title">1 player</p>
                    <p class="hour">20.00 - ...</p>
                    <p class="info">
                    <p>
                        Durf je je talent en skills te komen tonen op het voetbalveld, en als deze goed genoeg zijn kans te maken op een prijs? Dan is ons FIFA17 Toernooi de perfecte opportuniteit voor jou! Registreer je snel omdat er maar slechts 16 deelnemers toegestaan zijn.<p>

                    <p>Lengte van een match:</p>
                    <p>• Achtste Finale: 6’</p>
                    <p>• Vierde Finale: 6’</p>
                    <p>• Halve Finake: 8’</p>
                    <p>• Finale: 8’</p>
                    <p>• Kleine Finale: 8’</p>

                    <p>Het toernooi wordt op PS4 gespeeld. Wanneer een deelnemer verliest wordt hij/zij geëlimineerd. De deelnemers zullen gevraagd worden, door het centrale streaming, te komen opdagen een paar minuten voor de match. Als deze na vijf minuten het einde van de vorige match niet komt opdagen wordt deze geëlimineerd.</p>

                    <p>Elke deelnemer kan het spel maar maximum drie keer pauzeren per match.</p>
                    </p>
                    </p>
                </section>
                <section class="game">
                    <img src="img/games/hearthstone.png" alt="LoL">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Hearthstone</h3>
                    <p class="title">1 player</p>
                    <p class="hour">23.00 - ...</p>
                    <p class="info">
                    <p>Zoals elk jaar wordt er een hearthstone toernooi georganiseerd op EHackB. Toon je “skills” aan je medeleerlingen en geef niet op tot je als laatste overblijft. Laat je zeker niet afschrikken door de tegenstand en probeer zeker zelf ook zo ver mogelijk te raken in de bracket.</p>
                    <br>
                    <p>Elke speler bereidt 3 decks van 3 verschillende classes voor, deze worden niet meer veranderd voor de rest van het toernooi. De decks worden in het standaard formaat gespeeld, dat wil zeggen dat je geen kaarten mag gebruiken uit de "Goblins VS Gnomes" en "Blackrock Mountain". Er worden geen accounts gedeeld, één account kan maar één keer ingeschreven worden. Elke match bestaat uit een best of 5, spelers moeten met alle 3 hun decks een game winnen, de eerste die wint met al zijn decks gaat door naar de volgende ronde. Afhankelijk van de hoeveelheid spelers zal er misschien ook nog een losersbracket zijn. Alle games worden op de Europese servers gespeeld.</p>
                    <br>
                    <p>Inschrijven kan voor en tijdens het event.</p>
                    </p>
                </section>
                <section class="game">
                    <img src="img/games/rocket_league.png" alt="LoL">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Rocket League</h3>
                    <p class="title">1 player</p>
                    <p class="hour">23.00 - ...</p>
                    <p class="info">Denk jij tegen de pro's op te kunnen? Laat dan jouw skills zien op ons 1v1 rocket league toernooi. Het toernooi wordt gespeeld op voorziene computers die plaatsvinden op het evenement zelf. De enige vereiste is dat je zelf een controller meebrengt. Inschrijven kan tijdens het event</p>
                </section>
                </section>
                <section class="game">
                    <img src="img/games/casual.png" alt="LoL">
                    <a href="#">Doe mee</a>
                    <h3 class="name">Casual gaming</h3>
                    <p class="title">Iedereen welkom</p>
                    <p class="hour">20.00 - ...</p>
                    <p class="info">De niet competitieve gamers zijn net als de rest welkom om mee te gamen.</p>
                </section>
                <div class="clear"></div>
            </div>
        </div>
    </article>
    <article id="programma">
        <div class="timetable">
            <h2 class="animated fadeInDown">Programma</h2>

            <section class="tableitem create">
                <h3>Programma</h3>
                <a href="#">Toon programma</a>
                <div class="table">
                    <ul>
                        <li>
                            <p> We starten EhackB dit jaar met enkele externe en interne sprekers die een belangrijke bijdrage leveren aan het drieluik hack, create en game. Er is geen voorkennis vereist om de keynotes bij te wonen. Na de keynotes openen we al onze corners en starten de workshops.</p>
                            <br>
                            <p>In verschillende corners worden opstellingen voorzien die we stap voor stap doorlopen om je wegwijs te maken in de wereld van hedendaagse cybersecurity. De corners worden opgedeeld in verschillende instapniveaus. Is je kennis omtrent programmeren of website-ontwikkeling beperkt, dan doorlopen de begeleiders van de corners samen met jou stap voor stap de tools die echte hackers gebruiken. Zo kan iedereen zich op zijn eigen tempo inwerken in de verschillende hack-technieken. Je eigen laptop of computer meebrengen mag, maar is zeker niet noodzakelijk.</p>
                            <br>
                            <p>Ook de gamers krijgen een mooi programma voorgeschoteld. In totaal worden er 3 competities voorgeschoteld: Counter-Strike: Global Offensive, League of Legends en Overwatch. De competities worden gelivestreamd zodat iedereen alles op de voet kan volgen op twitch. Hiernaast bieden we enkele kleine competities aan. Deze zijn onder andere een Hearthstone competitie, een FIFA toernooi en een Super Smash Bros. Wii U competitie! Voor mensen die niet steeds achter hun pc willen zitten zijn er dit jaar enkele boardgames aanwezig. De niet competitieve gamers zijn net als de rest welkom om mee te gamen.</p>
                            <br>
                            <p>In de create corner laten we de creatieve breinen los op een hoop hardware. Door gebruik te maken van onder andere Arduino’s, motor shields en ander materiaal kunnen deelnemers hun skills meten in robot races, een arena of een leuke voetbalwedstrijd. Voor de developers voorzien we twee hackathons, zowel Unity als Processing, waar leuke prijzen aan vast hangen. De designers kunnen zich dan weer uitleven met ludieke Photoshop en 3D modeling </p>challenges.
                            <br>
                            <br>
                            <p>En last but not least: net zoals vorige editie zullen we weer iets rond Virtual Reality doen. Meer info volgt nog…</p>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="tableitem sprekers">
                <h3>SPREKERS</h3>
                <a href="#">Toon programma</a>
                <div class="table">
                    <ul>
                        <li>
                            <p class="hour">16:45-17:45 - AUDI 4</p>
                            <p class="title">Inti De Ceukelaire</p>
                            <p class="info">Creative Hacking v2</p>
                        </li>
                        <li>
                            <p class="hour">17:45-18:45 - AUDI 1</p>
                            <p class="title">Valery Vermeulen</p>
                            <p class="info">How to make music from (deep) space, wall street or biofeedback</p>
                        </li>
                        <li>
                            <p class="hour">17:45-18:45 - AUDI 4</p>
                            <p class="title">Luk Schoonaert</p>
                            <p class="info">IT security: de trends van de laatste jaren</p>
                        </li>
                        <li>
                            <p class="hour">18:45-19:45 - AUDI 1</p>
                            <p class="title">Wannes Gennar</p>
                            <p class="info">Realtime communication in web technologieën</p>
                        </li>
                        <li>
                            <p class="hour">18:45-19:45 - AUDI 4</p>
                            <p class="title">Hans Ameel</p>
                            <p class="info">Realtime communication in web technologieën</p>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="tableitem gaming">
                <h3>GAMING</h3>
                <a href="#">Toon programma</a>
                <div class="table">
                    <ul>
                        <li>
                            <p class="hour">20.00 - ...</p>
                            <p class="title">League of Legends</p>
                            <p class="info">Game competition</p>
                        </li>
                        <li>
                            <p class="hour">20:00 - ...</p>
                            <p class="title">Counter strike : global offensive</p>
                            <p class="info">Game competition</p>
                        </li>
                        <li>
                            <p class="hour">20:00 - ...</p>
                            <p class="title">Overwatch</p>
                            <p class="info">Game competition</p>
                        </li>
                        <li>
                            <p class="hour">20:00 - ...</p>
                            <p class="title">Super Smash Bros</p>
                            <p class="info">Game competition</p>
                        </li>
                        <li>
                            <p class="hour">20:00 - ...</p>
                            <p class="title">FIFA</p>
                            <p class="info">Game competition</p>
                        </li>
                        <li>
                            <p class="hour">23:00 - ...</p>
                            <p class="title">Heartstone</p>
                            <p class="info">Game competition</p>
                        </li>
                        <li>
                            <p class="hour">23:00 - ...</p>
                            <p class="title">Rocket League</p>
                            <p class="info">Game competition</p>
                        </li>
                        <li>
                            <p class="hour">From start to finish</p>
                            <p class="title">All games</p>
                            <p class="info">Casual gaming</p>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </article>
    <article id="locatie" class="element">
        <div class="contentLocatie">
            <h2>Locatie</h2>
            <section class="walk">
                <img class="descriptionIMG" src="img/fiets.png" alt="Fiets">
                <h3>stappen/fietsen</h3>
                <h4>Stappen</h4>
                <p>
                    De Nijverheidskaai 170 bevindt zich aan het kanaal Brussel - Charleroi, naast de slachthuizen in Anderlecht.
                </p>
                <h4>Trappen</h4>
                <p>
                    Met de fiets gebruik je het best de "flat track" routes. De routes vind je hier en de map hier. Als je geen fiets hebt, kan je er altijd één huren bij Villo of Blue Bike.
                </p>
            </section>
            <section class="public">
                <img class="descriptionIMG" src="img/metro.png" alt="Fiets">
                <h3>openbaar vervoer</h3>
                <h4>Trein</h4>
                <p>
                    Campus Kaai is snel bereikbaar vanaf het Zuidstation dankzij metrolijnen 2 en 6. Afstappen in metrostation Delacroix.
                </p>
                <h4>Metro</h4>
                <p>
                    Delacroix: lijn 2 en lijn 6.
                </p>
                <h4>Bus en tram</h4>
                <p>
                    Trams 31 en 81 vanaf Brussel-Zuid. Bus 46 vanaf De Brouckère of Washuis. Voor meer informatie over de tram en bus in Brussel kan je terecht op de website van de MIVB. Meer informatie over de bussen van De Lijn vind je op de website.
                </p>
            </section>
            <section class="car">
                <img class="descriptionIMG" src="img/auto.png" alt="Fiets">
                <h3>met de auto</h3>
                <p>
                    Parkeren kan gemakkelijk voor of achter de campus. De binnenparking tussen A & B zijn dit jaar ook toegankelijk. (Beperkte & onbewaakte parking)
                </p>
            </section>
            <section class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.426741251489!2d4.320680115506062!3d50.84178146697132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c40f049f7b89%3A0xecdcd9475f72a831!2sQuai+de+l&#39;Industrie+170%2C+1070+Anderlecht!5e0!3m2!1sen!2sbe!4v1480283794112"
                        width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </section>
        </div>
    </article>
    <article id="registratie">
        secRegister
    </article>
</main>
<footer class="footer" role="contentinfo">
    <div class="footer-logo">
        <img src="img/spon/cisco_meraki.jpg" alt="cisco">
        <img src="img/spon/dell_blue_rgb.jpg" alt="dell">
        <img src="img/spon/EN_Logo_New_Font_WTE-2.png" alt="exnet">
        <img src="img/spon/innoviris-brussels-empowering-research.png" alt="innov">
        <img src="img/spon/logo-av-apps.png" alt="av"><br>
        <img src="img/spon/MME_logo-groot.png" alt="mme">
        <img src="img/spon/Redcorp_logo.png" alt="redc">
        <img src="img/spon/signpost.jpg" alt="sign">
        <img src="img/spon/sopra-banking-software.png" alt="sop">
        <img src="img/spon/switchpoint-logo-color-no_border-final.jpg" alt="switch">
    </div>
    <div class="footer-links">
        <ul>
            <li>
                <h3>Links</h3></li>
            <li><a href="https://www.facebook.com/EhackB/">Facebook</a></li>
            <li><a href="https://www.facebook.com/events/180649519046917/">Facebook Event</a></li>
            <li><a href="https://twitter.com/hashtag/ehackb">Twitter</a></li>
        </ul>
        <ul>
            <li>
                <h3>Content</h3></li>
            <li><a href="#intro" class="active">Home</a></li>
            <li><a href="#sprekers">Sprekers</a></li>
            <li><a href="#games">Games</a></li>
            <li><a href="#programma">Programma</a></li>
            <li><a href="#locatie">Locatie</a></li>
            <li><a href="#registratie">Registratie</a></li>

        </ul>
        <ul>
            <li>
                <h3>Sponsors</h3></li>
            <li><a href="http://www.innoviris.be/">innoviris brussels</a></li>
            <li><a href="http://www.signpost.be">Signpost</a></li>
            <li><a href="http://www.web-switchpoint.com">Switchpoint</a></li>
        </ul>
    </div>

    <hr>

    <p class="disc"><img src="img/spon/LOGO.png" alt="logo"><br></p>
</footer>
</body>

</html>