<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EHACKB 4</title>
    <link rel="stylesheet" href="ehackb/css/style.css">
    <link rel="stylesheet" href="ehackb/css/timetable.css">
    <link rel="stylesheet" href="ehackb/css/sprekers.css">
    <link rel="stylesheet" href="ehackb/css/games.css">
    <link rel="stylesheet" href="ehackb/css/locatie.css">
    <link rel="stylesheet" href="ehackb/css/footer.css">
    <link rel="stylesheet" href="ehackb/css/registratie.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="ehackb/js/navHandlr.js"></script>
    <script type="text/javascript" src="ehackb/js/timetable.js"></script>
    <script type="text/javascript" src="ehackb/js/mobil_menu.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v0.28.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.28.0/mapbox-gl.css" rel="stylesheet"/>

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
                <li>
                    @if(Auth::user())
                        <a href="{{url('/show')}}">Mijn Profiel</a>
                    @else
                        <a href="{{url('/login')}}">Inloggen</a>
                    @endif
                </li>
            </div>
        </ul>
    </nav>
</header>
<main>
    <article id="intro">
        <img src="ehackb/img/logo.png" alt="EHACKB 4">
        <p>16 &amp; 17 DECEMBER</p>
        <p>HACK | LEARN | CREATE | GAME</p>
    </article>
    <article id="sprekers">
        <div class="sprekers">
            <h2 class="animated fadeInDown">Sprekers</h2>
            <div class="lijstsprekers">
                <section class="spreker">
                    <img src="ehackb/img/sprekers/inti_de_ceukelaire.jpg" alt="Inti" class="thumbnail thumbnail-lineup">
                    <a class="doemee" href="{{url('/registercasual')}}">Doe mee</a>
                    <h3 class="name">Inti De Ceukelaire</h3>
                    <p class="title">Creative Hacking v2</p>
                    <p class="hour">16:45-17:45 - AUDI 4</p>
                    <div class="scrolloverflow">
                        <p class="info">Na het succes van vorig jaar: een tweede portie van de meest opmerkzame lekken die Inti
                            afgelopen jaar tegen kwam op sites als Facebook en Google. Facebook en Google hebben de beste security
                            engineers ter wereld en toch betalen
                            ze elk jaar miljoenen uit aan ethische hackers. Lekken vinden waar honderden anderen overkijken: naast een
                            klein beetje gelukt vergt het een ferme dosis creativiteit. Inti geeft enkele praktische voorbeelden die
                            je in geen
                            enkel boek terugvindt en zal je meesleuren in de denkwereld van een hacker. Leer hoe je met één simpele
                            e-mail een volledig bedrijf kunt hacken (neen: geen ouderwetse phishing), of hoe je via Facebook anonieme
                            cyberstalkers
                            kan ontmaskeren zoals hij deed voor "Opgejaagd" op VIJFtv. Inti de Ceukelaire is oud Multec student
                            (academiejaar 2015-2016) en is securityblogger en ethisch hacker.</p>
                    </div>
                    <div class="scrollindicator">
                        Scroll me
                    </div>
                </section>
                <section class="spreker">
                    <img src="ehackb/img/sprekers/valery_vermeulen.png" alt="Valery" class="thumbnail thumbnail-lineup">
                    <a class="doemee" href="{{url('/registercasual')}}">Doe mee</a>
                    <h3 class="name">Valery Vermeulen</h3>
                    <p class="title">How to make music from (deep) space, wall street or biofeedback</p>
                    <p class="hour">17:45-18:45 - AUDI 1</p>
                    <div class="scrolloverflow">
                        <p class="info">In this presentation, Dr. Valery Vermeulen will give an overview of the several ways he
                            combines his passion for both mathematics and music in several multimedia projects: "EMO-Synth" project,
                            "Krystal Ball," and "Mikromedas."
                            Vermeulen's work within the "EMO-Synth" project revolves around the area of interactive multimedia where
                            automatically generated sound and music systems are directed by the emotional responses of the user. In
                            the "Krystal
                            Ball" project, an interactive multimedia system where the mechanisms that caused the financial credit
                            crisis, stochastic and algorithmic music generation and the work of pioneer I. Xenakis, plays a central
                            role. With his
                            most recent project entitled "Mikromedas," he mainly focusses on the innovative uses of data from space
                            and deep space as new tools shape music composition and performance. Valery Vermeulen is an electronic
                            musician, music
                            producer, mathematician, new media artist, author and a visiting professor at Erasmus University College
                            in Brussels where he teaches "Multimedia Art and Technology." In 2001 he obtained a Ph.D. in pure
                            mathematics at Ghent
                            University (BE), and Between 2001 and 2005 Vermeulen worked at the Institute for Psychoacoustics and
                            Electronic Music at the same university on a research project focusing on the link between music and
                            emotions. Meanwhile,
                            he started writing and recording music in my his production studio. In 2013 he moreover finished a master
                            degree in music composition at the Royal Conservatory of Ghent (BE). Since 2003 Vermeulen has been working
                            on various
                            interactive multimedia projects where the man-machine interaction and crossover between art and science
                            plays a central role. Topics in his work cover a broad range of disciplines including generative art,
                            creative evolutionary
                            systems design, algorithmic sound and image generation, (generative) sound synthesis, affective computing,
                            artificial intelligence, and econometrics.</p>
                    </div>
                    <div class="scrollindicator">
                        Scroll me
                    </div>
                </section>
                <section class="spreker">
                    <img src="ehackb/img/sprekers/Luk_Schoonaert.png" alt="Luk" class="thumbnail thumbnail-lineup">
                    <a class="doemee" href="{{url('/registercasual')}}">Doe mee</a>
                    <h3 class="name">Luk Schoonaert</h3>
                    <p class="title">IT security: de trends van de laatste jaren</p>
                    <p class="hour">17:45-18:45 - AUDI 4</p>
                    <div class="scrolloverflow">
                        <p class="info">Luk Schoonaert, director of Technology bij Exclusive Networks, komt ons een stand van zaken
                            geven omtrent cybersecurity en de trends van de laatste jaren (cryptolockers, DDOS, Internet of things,
                            …). Hoe kunnen we ons beschermen?
                            Na deze sessie kan je terecht bij zijn collega Steven Eerdekens voor een workshop, waar je aan de slag
                            gaat met Palo Alto firewalls.</p>
                    </div>
                </section>
                <section class="spreker">
                    <img src="ehackb/img/sprekers/wannes_gennar.png" alt="Wannes" class="thumbnail thumbnail-lineup">
                    <a class="doemee" href="{{url('/registercasual')}}">Doe mee</a>
                    <h3 class="name">Wannes Gennar</h3>
                    <p class="title">Realtime communication in web technologieën</p>
                    <p class="hour">18:45-19:45 - AUDI 1</p>
                    <div class="scrolloverflow">
                        <p class="info">Wannes is een laatstejaarsstudent Dig-X (Toegepaste Informatica), optie Software Engineering
                            aan de Erasmushogeschool. Hij heeft een passie voor software design en web applicaties. Wannes bespreekt
                            de technologieën achter realtime
                            web applicaties, hoe ze zijn opgebouwd, en waarin ze verschillen met de traditionele technologieën.</p>
                    </div>
                </section>
                <section class="spreker">
                    <img src="ehackb/img/sprekers/hans_ameel.png" alt="Hans" class="thumbnail thumbnail-lineup">
                    <a class="doemee" href="{{url('/registercasual')}}">Doe mee</a>
                    <h3 class="name">Hans Ameel</h3>
                    <p class="title">Contactless hacking</p>
                    <p class="hour">18:45-19:45 - AUDI 4</p>
                    <div class="scrolloverflow">
                        <p class="info">
                            Docent aan de Howest
                            <br/><br/>
                            Overzicht security concepten, Risk / Vulnerabilities
                            <br/><br/>
                            Voorbeelden over uitgevoerde analyses in de ICS (industrial control systems) omgevingen (PLC's, industrie)
                            <br/><br/>
                            Voorbeelden over contactloze communicatie, NFC, rfID, Sub-GHz toepassingen</p>
                    </div>
                </section>
                <section class="spreker">
                    <img src="ehackb/img/sprekers/jonathan.jpg" alt="Jonathan" class="thumbnail thumbnail-lineup">
                    <a class="doemee" href="{{url('/registercasual')}}">Doe mee</a>
                    <h3 class="name">Jonathan Van Beneden</h3>
                    <p class="title">Virtual reality development</p>
                    <p class="hour">18:45-19:45 - AUDI 5</p>
                    <div class="scrolloverflow">
                        <p class="info">Vroeg je je ooit al af hoe je aan Virtual Reality development begint? Wat de Do’s en Dont’s
                            zijn? Welke tools je hiervoor kan gebruiken? In deze sessie duiken we een beetje dieper in de Unity3D
                            engine en de integratie van de
                            Oculus Rift. Aan de hand van live coding demo’s wordt er getoond hoe je aan de slag kan gaan om je eigen
                            VR applicaties te bouwen en te optimaliseren voor een leuke user experience.</p>
                    </div>
                </section>

                <section class="spreker">
                    <img src="ehackb/img/sprekers/malik_mesellem.jpg" alt="Malik" class="thumbnail thumbnail-lineup">
                    <a class="doemee" href="{{url('/registercasual')}}">Doe mee</a>
                    <h3 class="name">Malik Mesellem</h3>
                    <p class="title">bWAPP, a buggy web application</p>
                    <p class="hour">20:00-... Zaal (Keynote + Workshop)</p>
                    <div class="scrolloverflow">
                        <p class="info">
                            Malik Mesellem is een IT security professional met meer dan 15 jaar ervaring. Hij heeft een passie voor ethisch hacken, penetration tests, en windows –en web application beveiligingslekken. Hij heeft al enkele jaren zijn eigen bedrijf, MME BVBA, dat gespecialiseerd is in ondermeer security audits en security training. Hij geeft ook les en is de ontwikkelaar van bWAPP. bWAPP, of buggy web application is een open source web applicatie dat bewust "onveilig" werd gemaakt. Hij gebruikt het ondermeer als ondersteuning voor zijn lessen. Er zitten enorm veel beveiligingslekken in, ondermeer alles uit de OWASP top 10.<br />
                            <br />
                            In de workshop zal hij studenten laten kennis maken met de OWASP top 10. Hieraan gaat een kleine keynote vooraf die ook in de grote zaal doorgaat. Ben je klaar om aan de slag te gaan?<br />
                            <br />
                            Als je je eigen laptop meebrengt, zorg dan voor de laatste versie van Kali Linux. Er worden ook pc’s voorzien door de EHACKB organisatie.<br />
                        </p>
                    </div>
                    <div class="scrollindicator">
                        Scroll me
                    </div>
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
                    <img src="ehackb/img/games/lol.jpg" alt="LoL">
                    <a class="doemee" href="{{url('/register')}}">Doe mee</a>
                    <h3 class="name">League of Legends</h3>
                    <p class="title">Team of 5</p>
                    <p class="hour">20.00 - ...</p>
                    <div class="scrolloverflow">
                        <p class="info">Voor het League of Legends tornooi werken we met een poulesysteem waarbij er 2 poules van 6 teams zijn. Elk team zal eenmaal tegen alle teams binnen zijn poule spelen. De top 4 van elke poule zullen doorstoten naar de volgende ronde.
                            Na de poules zullen de teams in een single elimination (bracket-systeem) tegen elkaar in een best-of-1 match spelen tot en met de finale.
                            Voor het toernooi zullen wij gebruik maken van de <a href="http://cdn.leagueoflegends.com/prized-events/Tournament+Rules+Beta.pdf">Riot Rules</a> en vragen elke deelnemer zich te houden aan de <a href="http://gameinfo.euw.leagueoflegends.com/en/game-info/get-started/summoners-code/">Summoners code</a>.
                            Elke speler zal zich moeten registreren op het <a href="http://events.euw.leagueoflegends.com/events/231212">Riot event</a> website om kans te maken op de prijzen.</p>
                    </div>
                    <div class="scrollindicator">
                        Scroll me
                    </div>
                </section>
                <section class="game">
                    <img src="ehackb/img/games/csgo.png" alt="cs">
                    <a class="doemee" href="{{url('/register')}}">Doe mee</a>
                    <h3 class="name">Counter-strike Global Offensive</h3>
                    <p class="title">Team of 5</p>
                    <p class="hour">20.00 - ...</p>
                    <div class="scrolloverflow">
                        <p class="info">Voor het Counter Strike: Global Offensive starten we met een poulesysteem waarbij er 2
                            poules van 6 teams zijn. Elk team zal eenmaal tegen elk team spelen en de 4 teams die het meeste hebben
                            gewonnen gaan door naar de volgende
                            ronde. In deze ronde zal er met een bracket systeem gewerkt worden voor de 8 overblijvende teams. Als je
                            wint ga je door naar de volgende ronde in de bracket als je verliest is het gedaan. De games worden
                            gespeeld op servers
                            voorzien door de organisatie.</p>
                    </div>
                    <div class="scrollindicator">
                        Scroll me
                    </div>
                </section>
                <section class="game">
                    <img src="ehackb/img/games/overwatch.png" alt="overwatch">
                    <a class="doemee" href="{{url('/register')}}">Doe mee</a>
                    <h3 class="name">Overwatch</h3>
                    <p class="title">Team of 6</p>
                    <p class="hour">20.00 - ...</p>
                    <div class="scrolloverflow">
                        <p class="info">Toon je vermogen in overwatch en neem het op tegen 5 andere teams om te bewijzen dat jullie
                            dit jaar de kampioen zijn.<br><br> Regels:
                            <br><br> Het tornooi wordt opgedeeld in de volgende rondes:
                            <br><br> Voorrondes: 6 teams spelen tegen elkaar in 5 wedstrijden, best of 1. De gespeelde map wordt door
                            de team-captain gekozen via de OWdraft website, waarvan ze een link krijgen van de overwatchbalie via
                            battlenet.
                            De 4 beste teams gaan door naar de halve finale en de 2 verliezende teams zijn geëlimineerd.
                            <br><br> Halve finale: Hierin zitten 4 teams. Een team van een groep speelt tegen een ander team van de
                            andere groep. Er worden hier 3 matches gespeeld. Waarbij de 3 maps in het begin worden gekozen via
                            OWdraft. De winnaars
                            worden gekozen met een best of 3 methode.
                            <br><br> Finale: Hier gaan de 2 overblijvende teams tegen elkaar spelen zoals in de halve finale, met een
                            best of three over de 3 verschillende objectives. De winnaar wint het overwatch toernooi.
                            <br><br> Killcams worden uitgezet voor de matches.</p>
                    </div>
                    <div class="scrollindicator">
                        Scroll me
                    </div>
                </section>
                <section class="game">
                    <img src="ehackb/img/games/Super_Smash_Bros.png" alt="smb">
                    <a class="doemee" href="{{url('/register')}}">Doe mee</a>
                    <h3 class="name">Super Smash Bros</h3>
                    <p class="title">1 player</p>
                    <p class="hour">20.00 - ...</p>
                    <div class="scrolloverflow">
                        <ul class="info">

                            <p>Je kiest 1 character uit een grote verzameling van Nintendo characters om jezelf naar de top te
                                vechten.</p><br/>

                            <p>Regels:<br/>
                                Het toernooi bestaat uit 2 rondes, de eliminatie- en de finaleronde</p><br/>

                            <p>Indien er een speler niet komt opdagen wordt zijn match uitgesteld tot het einde van de ronde, komt hij
                                dan nog niet opdagen betekent het een directe diskwalificatie.
                                Controllers zullen ter beschikking gesteld worden. Uit eigen veiligheid is het aangeraden om je eigen
                                controller mee te nemen. Er wordt ook genoeg tijd voorzien om de settings van je controller in te
                                stellen (indien dit moet gebeuren).</p><br/>

                            <p>Eliminatiefase:<br/>
                                Er zijn twee groepen van 8 personen. Alle spelers binnen de groep vechten voor eerste en tweede plaats.
                                Deze eerste twee stoten dan door naar de finalefase.</p><br/>

                            <p>Finalefase:
                                Eerste en tweede plaats van beide groepen gaan door naar de finalefase om uit te vechten wie de
                                uiteindelijk winnaar wordt. Als prijs zijn er twee amiibo’s beschikbaar. De winnaar mag kiezen welke
                                amiibo hij/zij wilt. De tweede plaats wint de overige amiibo.</p>
                        </ul>
                    </div>
                </section>
                <section class="game">
                    <img src="ehackb/img/games/fifa.png" alt="fifa">
                    <a class="doemee" href="{{url('/register')}}">Doe mee</a>
                    <h3 class="name">FIFA</h3>
                    <p class="title">1 player</p>
                    <p class="hour">20.00 - ...</p>
                    <div class="scrolloverflow">
                        <p class="info">Durf je je talent en skills te komen tonen op het voetbalveld, en als deze goed genoeg zijn
                            kans te maken op een prijs? Dan is ons FIFA17 Toernooi de perfecte opportuniteit voor jou! Registreer je
                            snel omdat er maar slechts
                            16 deelnemers toegestaan zijn.
                            <br><br>Lengte van een match:</p>
                        <ul class="info">
                            <li>- Achtste Finale: 6’</li>
                            <li>- Achtste Finale: 6’</li>
                            <li>- Vierde Finale: 6’</li>
                            <li>- Halve Finale: 8’</li>
                            <li>- Finale: 8’</li>
                            <li>- Kleine Finale: 8’</li>
                        </ul>
                        <br>
                        <p class="info">
                            Het toernooi wordt op PS4 gespeeld. Wanneer een deelnemer verliest wordt hij/zij geëlimineerd. De
                            deelnemers zullen gevraagd worden, door het centrale streaming, te komen opdagen een paar minuten voor de
                            match. Als deze na vijf minuten het einde van de
                            vorige match niet komt opdagen wordt deze geëlimineerd.
                            <br><br> Elke deelnemer kan het spel maar maximum drie keer pauzeren per match.
                        </p>
                    </div>
                    <div class="scrollindicator">
                        Scroll me
                    </div>
                </section>
                <section class="game">
                    <img src="ehackb/img/games/hearthstone.png" alt="heartstone">
                    <a class="doemee" href="{{url('/register')}}">Doe mee</a>
                    <h3 class="name">Hearthstone</h3>
                    <p class="title">1 player</p>
                    <p class="hour">23.00 - ...</p>
                    <div class="scrolloverflow">
                        <p class="info">
                            Zoals elk jaar wordt er een hearthstone toernooi georganiseerd op EHackB. Toon je “skills” aan je
                            medeleerlingen en geef niet op tot je als laatste overblijft. Laat je zeker niet afschrikken door de
                            tegenstand en probeer zeker zelf ook zo ver mogelijk
                            te raken in de bracket.
                            <br><br> Elke speler bereidt 3 decks van 3 verschillende classes voor, deze worden niet meer veranderd
                            voor de rest van het toernooi. De decks worden in het standaard formaat gespeeld, dat wil zeggen dat je
                            geen kaarten
                            mag gebruiken uit de "Goblins VS Gnomes" en "Blackrock Mountain". Er worden geen accounts gedeeld, één
                            account kan maar één keer ingeschreven worden. Elke match bestaat uit een best of 5, spelers moeten met
                            alle 3 hun decks
                            een game winnen, de eerste die wint met al zijn decks gaat door naar de volgende ronde. Afhankelijk van de
                            hoeveelheid spelers zal er misschien ook nog een losersbracket zijn. Alle games worden op de Europese
                            servers gespeeld.
                            <br><br> Inschrijven kan voor en tijdens het event.
                        </p>
                    </div>
                    <div class="scrollindicator">
                        Scroll me
                    </div>
                </section>
                <section class="game">
                    <img src="ehackb/img/games/rocket_league.png" alt="rl">
                    <a class="locked" disabled>Ter plekke</a>
                    <h3 class="name">Rocket League</h3>
                    <p class="title">1 player</p>
                    <p class="hour">23.00 - ...</p>
                    <div class="scrolloverflow">
                        <p class="info">Denk jij tegen de pro's op te kunnen? Laat dan jouw skills zien op ons 1v1 rocket league
                            toernooi. Het toernooi wordt gespeeld op voorziene computers die plaatsvinden op het evenement zelf. De
                            enige vereiste is dat je zelf
                            een controller meebrengt. Inschrijven kan tijdens het event</p>
                    </div>
                </section>
                <section class="game">
                    <img src="ehackb/img/games/casual.png" alt="casual">
                    <a class="doemee" href="{{url('/registercasual')}}">Doe mee</a>
                    <h3 class="name">Casual gaming</h3>
                    <p class="title">Iedereen welkom</p>
                    <p class="hour">20.00 - ...</p>
                    <div class="scrolloverflow">
                        <p class="info">De niet competitieve gamers zijn net als de rest welkom om mee te gamen.</p>
                    </div>
                </section>
                <div class="clear"></div>
            </div>
        </div>
    </article>
    <article id="programma">
        <div class="timetable">
            <h2 class="animated fadeInDown">Programma</h2>

            <section class="tableitem create">
                <h3>PROGRAMMA</h3>
                <a href="#">Toon programma</a>
                <div class="table">
                    <ul>
                        <li>
                            <p> We starten EhackB dit jaar met enkele externe en interne sprekers die een belangrijke bijdrage leveren
                                aan het drieluik hack, create en game. Er is geen voorkennis vereist om de keynotes bij te wonen. Na de
                                keynotes openen
                                we al onze corners en starten de workshops.</p>
                            <br>
                            <p>In verschillende corners worden opstellingen voorzien die we stap voor stap doorlopen om je wegwijs te
                                maken in de wereld van hedendaagse cybersecurity. De corners worden opgedeeld in verschillende
                                instapniveaus. Is je
                                kennis omtrent programmeren of website-ontwikkeling beperkt, dan doorlopen de begeleiders van de corners
                                samen met jou stap voor stap de tools die echte hackers gebruiken. Zo kan iedereen zich op zijn eigen
                                tempo inwerken
                                in de verschillende hack-technieken. Je eigen laptop of computer meebrengen mag, maar is zeker niet
                                noodzakelijk.</p>
                            <br>
                            <p>Ook de gamers krijgen een mooi programma voorgeschoteld. In totaal worden er 3 competities
                                voorgeschoteld: Counter-Strike: Global Offensive, League of Legends en Overwatch. De competities worden
                                gelivestreamd zodat iedereen
                                alles op de voet kan volgen op twitch. Hiernaast bieden we enkele kleine competities aan. Deze zijn
                                onder andere een Hearthstone competitie, een FIFA toernooi en een Super Smash Bros. Wii U competitie!
                                Voor mensen die
                                niet steeds achter hun pc willen zitten zijn er dit jaar enkele boardgames aanwezig. De niet
                                competitieve gamers zijn net als de rest welkom om mee te gamen.</p>
                            <br>
                            <p>In de create corner laten we de creatieve breinen los op een hoop hardware. Door gebruik te maken van
                                onder andere Arduino’s, motor shields en ander materiaal kunnen deelnemers hun skills meten in robot
                                races, een arena
                                of een leuke voetbalwedstrijd. Voor de developers voorzien we twee hackathons, zowel Unity als
                                Processing, waar leuke prijzen aan vast hangen. De designers kunnen zich dan weer uitleven met ludieke
                                Photoshop en 3D modeling
                            </p>challenges.
                            <br>
                            <br>
                            <p>Net zoals op de vorige editie zal er ook wat te doen zijn rond Virtual Reality. Ga hiervoor zeker eens
                                langs op de Create stand.</p>
                            <br>
                            <p>En last but not least: er is natuurlijk ook catering voorzien, inclusief een gezellige bar mét een
                                streekbiertje, en dit alles aan studentvriendelijke prijzen</p>
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
                            <p class="info">Contactless hacking</p>
                        </li>
                        <li>
                            <p class="hour">18:45-19:45 - AUDI 5</p>
                            <p class="title">Jonathan Van Beneden</p>
                            <p class="info">Virtual reality development</p>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="tableitem workshops">
                <h3>WORKSHOPS</h3>
                <a href="#">Toon programma</a>
                <div class="table">
                    <ul>
                        <li>
                            <p class="hour">Steven Eerdekens (Exclusive Networks)</p>
                            <p class="title">IT security: de trends van de laatste jaren</p>
                            <p class="info">Na de keynote van Luk Schoonaert kan je terecht bij zijn collega Steven Eerdekens voor een
                                workshop, waar je aan de slag gaat met Palo Alto firewalls. In deze Ultimate Test Drive Next-Generation
                                Firewall ga je aan de slag met Palo Alto’s cutting edge firewalls. Door het volgen van stap-voor-stap
                                instructies kan je een aantal praktische cases van configuratie doorlopen en dit op een heel
                                toegankelijke wijze! Typische problematieken die in bedrijven voorkomen kan je leren oplossen in deze
                                corner, waaronder beheer van sociale media, evasive applications (P2P, Tor), malware en URL filtering.
                                Een sterke aanrader voor iedereen met interesse in networking security!</p>
                        </li>
                        <li>
                            <p class="hour">Malik Mesellem (MME)</p>
                            <p class="title">bWAPP</p>
                            <p class="info">Malik Mesellem is an IT security professional with over 15 years of experience. Malik has
                                always had a passion for Ethical Hacking and Penetration Testing... obsessed with Windows and Web
                                Application (in)Security.<br/>
                                <br/>
                                In 2010, he started his own company, MME BVBA. MME is specialized in Security Audits, User Awareness
                                Campaigns, Vulnerability Assessments, Penetration Testing and Security Training.<br/>
                                <br/>
                                Malik gives master classes, lectures, and workshops on conferences and for several institutions. He is
                                an OWASP ZAP evangelist and used to be a mentor for the SANS Institute, mentoring the SANS 'SEC560 -
                                Network Penetration Testing and Ethical Hacking' course.<br/>
                                <br/>
                                Malik is also the founder and developer of bWAPP…<br/>
                                <br/>
                                bWAPP, or a buggy web application, is a free and open source deliberately insecure web application. It
                                helps security enthusiasts, developers and students to discover and to prevent web vulnerabilities.
                                bWAPP prepares one to conduct successful penetration testing and ethical hacking projects.<br/>
                                <br/>
                                What makes bWAPP so unique? Well, it has over 100 web vulnerabilities! It covers all major known web
                                bugs, including all risks from the OWASP Top 10 project. It has 100.000+ downloads worldwide.<br/>
                                <br/>
                                In this workshop, students will be introduced to the OWASP Top 10 risks. Ready to attack?!?<br/>
                                <br/>
                                <u>Prerequisites:</u> laptop with the latest version of Kali Linux (already installed and working). This
                                will be provided by the EHACKB organisation. More information:<br/><br/><a href="http://www.mmebvba.be">http://www.mmebvba.be</a><br/><br/>
                            </p>
                        </li>
                        <li>
                            <p class="title">Modem en router hacking</p>
                            <p class="info">In de modem en router hacking corner kan je kennis maken met een aantal gesofisticeerde
                                hacks op computerhardware. We hebben daarvoor enkele zeer getalenteerde hackers ter beschikking: wie de
                                Koppen-reportage over white-hat hacking heeft gezien zal zich vast nog de Telenet-modem hack herinneren.
                                Het zijn deze hackers die op EHACKB uitleg komen geven hoe je modems, routers en andere hardware kan
                                beginnen hacken. Get ready for some serious hardware hacking...</p>
                        </li>
                        <li>
                            <p class="title">Create</p>
                            <p class="info">In de create corner laten we de creatieve breinen los op een hoop hardware. Door gebruik
                                te maken van onder andere Arduino’s, motor shields en ander materiaal kunnen deelnemers hun skills meten
                                in robot races, een arena of een leuke voetbalwedstrijd. Voor de developers voorzien we twee hackathons,
                                zowel Unity als Processing, waar leuke prijzen aan vast hangen. De designers kunnen zich dan weer
                                uitleven met ludieke Photoshop en 3D modeling challenges.</p>
                        </li>
                        <li>
                            <p class="hour">Christophe Swolfs</p>
                            <p class="title">Introductie tot Polymer (setup + kleine demo app bouwen)</p>
                            <p class="info">Christophe is student Dig-X (Toegepaste Informatica) aan de Erasmushogeschool. Hij heeft
                                echter hieraan voorafgaand al een opleiding gevolgd: Digital Arts &amp; Entertainment aan Howest in
                                Kortrijk. Deze opleiding is vooral gericht op videogames. Het grafische aspect, front-end development,
                                gebruikerservaring, en vloeiende animaties zijn aspecten die hem als programmeur erg interesseren.
                                Polymer is dus een ideale library voor hem.<br/>
                                <br/>
                                Polymer is eigenlijk meer dan enkel een HTML library. Het laat je toe om eigen HTML elementen te creëren
                                met een eigen ingebakken lay-out of gedrag wat toch enigszins een andere aanpak is dan de traditionele
                                javascript libraries.<br/>
                                <br/>
                                Tijdens de workshop Polymer starten we met het opzetten van de ontwikkelingsomgeving. Vervolgens hacken
                                we dus elk onze eigen HTML componenten bij elkaar om in geen tijd een moderne website te creëren.</p>
                        </li>
                        <li>
                            <p class="hour">Frederic Vleminckx</p>
                            <p class="title">CTF-game</p>
                            <p class="info">Frederic is onderzoeker binnen het SeCloud project, en verbonden aan het kenniscentrum
                                “Design & Technology for Mobile & Wearable” van het departement Design & Technologie van de
                                Erasmushogeschool.</p>
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
                            <p class="title">Counter strike Global Offensive</p>
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
                <img class="descriptionIMG" src="ehackb/img/fiets.png" alt="Fiets">
                <h3>stappen<br>fietsen</h3>
                <div class="loccontainer">
                    <h4>Stappen</h4>
                    <p>
                        De Nijverheidskaai 170 bevindt zich aan het kanaal Brussel - Charleroi, naast de slachthuizen in Anderlecht.
                    </p>
                    <h4>Trappen</h4>
                    <p>
                        Met de fiets gebruik je het best de "flat track" routes. De routes vind je hier en de map hier. Als je geen
                        fiets hebt, kan je er altijd één huren bij Villo of Blue Bike.
                    </p>
                </div>
            </section>
            <section class="public">
                <img class="descriptionIMG" src="ehackb/img/metro.png" alt="Fiets">
                <h3>openbaar<br>vervoer</h3>
                <div class="loccontainer">
                    <h4>Trein</h4>
                    <p>Campus Kaai is snel bereikbaar vanaf het Zuidstation dankzij metrolijnen 2 en 6. Afstappen in metrostation
                        Delacroix.</p>
                    <h4>Metro</h4>
                    <p>Delacroix: lijn 2 en lijn 6.</p>
                    <h4>Bus en tram</h4>
                    <p>Trams 31 en 81 vanaf Brussel-Zuid. Bus 46 vanaf De Brouckère of Washuis. Voor meer informatie over de tram
                        en bus in Brussel kan je terecht op de website van de MIVB. Meer informatie over de bussen van De Lijn vind
                        je op de website.</p>
                </div>
            </section>
            <section class="car">
                <img class="descriptionIMG" src="ehackb/img/auto.png" alt="Fiets">
                <h3>auto</h3><br>
                <div class="loccontainer">
                    <p>Parkeren kan gemakkelijk voor of achter de campus. De binnenparking tussen A & B zijn dit jaar ook
                        toegankelijk. (Beperkte & onbewaakte parking)</p>
                </div>
            </section>
            <section class="map">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.426741251489!2d4.320680115506062!3d50.84178146697132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3c40f049f7b89%3A0xecdcd9475f72a831!2sQuai+de+l&#39;Industrie+170%2C+1070+Anderlecht!5e0!3m2!1sen!2sbe!4v1480283794112"
                        width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </section>
        </div>
    </article>
    <article id="registratie">
        <div class="contentRegister">
            <h2><a href="{{url('/registercasual')}}">Registreer hier!</a></h2>
        </div>
    </article>
</main>
<footer class="footer" role="contentinfo">
    <div class="footer-links">
        <ul>
            <li>
                <h3>Links</h3><br></li>
            <li><a href="https://www.facebook.com/EhackB/">Facebook</a></li>
            <li><a href="https://www.facebook.com/events/180649519046917/">Facebook Event</a></li>
            <li><a href="https://twitter.com/hashtag/ehackb">Twitter</a></li>
        </ul>
        <ul>
            <li>
                <h3>Content</h3><br></li>
            <li><a href="#intro" class="active">Home</a></li>
            <li><a href="#sprekers">Sprekers</a></li>
            <li><a href="#games">Games</a></li>
            <li><a href="#programma">Programma</a></li>
            <li><a href="#locatie">Locatie</a></li>
            <li><a href="#registratie">Registratie</a></li>

        </ul>
        <ul>
            <li>
                <h3>Sponsors <br>
                    Master Tier</h3></li>
            <li><a href="http://www.agoria.be/">Agoria</a></li>
            <li><a href="http://www.innoviris.be/">innoviris brussels</a></li>
            <li><a href="http://www.signpost.be">Signpost</a></li>
            <li><a href="http://www.web-switchpoint.com">Switchpoint</a></li>
        </ul>
    </div>

    <hr>

    <p class="disc"><img src="ehackb/img/spon/LOGO.png" alt="logo"><br></p>
    <div class="footer-logo">
        <p>Met dank aan onze sponsors</p>
        <img src="ehackb/img/spon/logo-agoria.png" alt="agoria">
        <img src="ehackb/img/spon/cisco_meraki.jpg" alt="cisco">
        <img src="ehackb/img/spon/dell_blue_rgb.jpg" alt="dell">
        <img src="ehackb/img/spon/EN_Logo_New_Font_WTE-2.png" alt="exnet">
        <img src="ehackb/img/spon/innoviris-brussels-empowering-research.png" alt="innov">
        <img src="ehackb/img/spon/kazi.jpg" alt="kazi">
        <img src="ehackb/img/spon/logo-av-apps.png" alt="av"><br>
        <img src="ehackb/img/spon/MME_logo-groot.png" alt="mme">
        <img src="ehackb/img/spon/Redcorp_logo.png" alt="redc">
        <img src="ehackb/img/spon/signpost.jpg" alt="sign">
        <img src="ehackb/img/spon/sopra-banking-software.png" alt="sop">
        <img src="ehackb/img/spon/switchpoint-logo-color-no_border-final.jpg" alt="switch">
    </div>
</footer>
<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(["setDomains", ["*.hack.ehb.be", "*.ehackb.be"]]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function () {
        var u = "//www.arco.me/piwik/";
        _paq.push(['setTrackerUrl', u + 'piwik.php']);
        _paq.push(['setSiteId', '1']);
        var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
        g.type = 'text/javascript';
        g.async = true;
        g.defer = true;
        g.src = u + 'piwik.js';
        s.parentNode.insertBefore(g, s);
    })();
</script>
<noscript><p><img src="//www.arco.me/piwik/piwik.php?idsite=1" style="border:0;" alt=""/></p></noscript>
<!-- End Piwik Code -->
</body>

</html>
