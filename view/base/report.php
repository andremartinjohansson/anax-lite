    <main class="main">
        <article class="article-main">
            <h1>Redovisningar</h1>
            <p>Här ligger alla redoviningar för kusen oophp.</p>
            <h2>Kmom01</h2>
            <p>Detta blev ett ganska omfattande kursmoment med rätt många uppgiften,
            övningar och annat material som skulle gås igenom. Resultatet för mig blev
            att jag valde att inte koda igenom övningarna då de hade tagit för
            mycket av min tid. Det var tillräckligt för mig att gå noga läsa igenom
            övningarna för att friska upp minnet (php20 och oophp20). Personligen
            tycker jag det blev för mycket i detta första kursmoment, och som jag ser
            i redovisningstråden såhär på söndag eftermiddag så tycker många detsamma.
            Det var precis jag hann med att göra uppgifterna, och då har jag suttit
            hela helgen. Jag hade ingen tid att läsa igenom atriklarna eller annat
            läsmaterial, utan det blev direkt på övningarna och sen uppgifterna.
            Jag hade väldigt gärna haft lite mer tid på mig för att noga gå igenom
            allting och ta in allt nytt - för mig tog det mer än 20 timmar att
            göra detta kursmoment och det är inte inklusive läsning. Så min personliga
            åsikt är att ni bör dela upp det bättre och överdriva med uppgifter i
            första kursmomentet där man också måste installera labbmiljö för båda kurserna.
            <br><br>
            Guessuppgiften fick ingen style, då jag hade lite problem med att få
            sessions att fungera (på grund av egen dumhet). Det var en nyttigt uppgift
            för att friska upp minnet och komma igång med PHP igen. Jag gjorde inget
            speciellt, bara följde strukturen som stod i uppgiften (så som jag har
            tolkat det i alla fall). Det är inget mästerverk men det fungerar.
            <br><br>
            Till Anax-lite valde jag att jobba med Makefiler och LESS som vi gjorde
            i designkursen, då jag gillar design och vill försöka hålla igång med
            LESS och Makefiler. Det känns nyttigt att ha koll på och det är dessutom
            kul att göra designen helt från scratch. Även om den än så länge inte
            är speciellt grym då jag inte hade mycket tid att lägga på det just i
            detta kursmoment. Jag kopierade över Makefilen från designkursen och
            installerade paketen från npm som behövs för att kopilera LESS.
            <br><br>
            Jag gjorde alla extrauppgifterna för Anax-lite (inte navbaren) då
            jag faktiskt redan hade gjort dem när jag först kollade. Jag har
            lagt till så att Cimage används för bilder. En view byline skapades
            som används på About-sidan. En flash-view som används på alla sidor
            under navbaren och en testsida som jag använde för att testa den nya
            navbar1.<br><br>
            Min navbar1 används nu på alla sidor och den är egentligen inget speciellt.</p>
            <h4>Hur känns det att hoppa rakt in i klasser med PHP, gick det bra?</h4>
            <p>Kände lite "omg hur tusan kodar man med PHP" i början men det
            kändes bra sen. När vi kommer direkt från oo-python så känns det
            naturligt att jobba med klasser och objekt, så just det var inga problem
            alls att komma igång med. Jag märkte hur lätt det blev att komma igång
            med PHP igen efter att ha gått igenom övningarna. Kändes som att allt
            jag behövde göra var att skumma igenom dem och sen var man inne i
            PHP-kodning igen.</p>
            <h4>Berätta om dina reflektioner kring ramverk, anax-lite och din me-sida.</h4>
            <p>Tyckte det var trevligt att få göra ramverket och inte få det helt
            färdigt. Man får bättre koll på hur det fungerar, hur det är uppdelat och
            var man ska lägga sin kod. Jag hade dock gärna gått in och analyserat
            filerna i ramverket lite mer och gjort egna ändraingar/förbättringar,
            men som sagt så var det ganska ont om tid så det får bli i kommande moment.
            Men Anax-lite verkar bra och lätt att ha med att göra, och det var
            mycket kul att komma igång med även om det tog sin lilla tid.
            <br><br>
            Alla krav är implementerade, första sidan, about, report finns plus
            testsidan och en route "/status" som jag gjorde i övningen, som returnerar
            ett JSON-objekt. "Diverse detaljer om ditt system" är inte väldigt specifikt,
            så jag bara antog att det är samma som i övningen.
            <br><br>
            Navbaren gjorde jag från en key-value array som loopas igenom och lagrar
            html-koden i en variabel som jag använder i vyn. För att sätta en
            active klass skickar jag bara med en variabel från routern - det var
            inget speciellt krav på just detta så jag har tid att förbättra det i
            senare kursmoment.<br><br>
            Som sagt gjorde jag designen med LESS. Det är inget mästerverk men
            jag ser det som något vi kan jobba på genom hela kursen - så det finns
            tid för förbättringar sen. Dock är jag nöjd med den stilen jag har just
            nu. Testa lite andra färger än vad jag brukar, ett litet annorlunda tema.
            Det blev snyggt och enkelt tycker jag. I allmänhet är jag hittills
            mycket nöjd med min me-sida, speciellt med tanke på tidspressen.</p>
            <h4>Gick det bra att komma igång med MySQL, har du liknande erfarenheter sedan tidigare?</h4>
            <p>Det gick bra, inga konstigheter. Jag gjorde till uppgift 9, men
            vilket kanske är lite mer än en tredjedel. Kände att jag hade bra koll
            på det och kom ihåg mycket från SQL labben vi hade i htmlphp. Jag kommer
            ihåg mycket från den vilket gjorde det super lätt att komma igng med
            MySQL i Workbench. Annars har jag ingen erfarenhet med MySQL.<br><br>
            Jag valde att jobba i localhost då jag har varit iväg lite och inte
            alltid suttit på ett stadigt nätverk, så det kändes säkrast att köra
            i localhost. Kanske gör om det snabbt på BTHs server nästa vecka då
            jag tycker det känns bättre när man kör mot en riktig server. Man känner
            sig lite coolare då.</p>
            <h2>Kmom02</h2>
            <h4>Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?</h4>
            <p>Det var lite svårt att hänga med först, men känner att jag börjar
            få koll på hur man kan jobba inne och utanför ramverket. En fördel med att
            integrera något i ramverket är att koden kan användas direkt i vyerna -
            t.ex. jag valde att lägga mitt Session-objekt i index.php som låter mig
            använda sessionen i alla mina vyer hur jag vill, vilket är väldigt smidigt.
            Så när det gäller kod som kan återanvändas i många eller alla vyer så kan
            det vara en okej idé att lägga den i ramverket. Annars är det kanske bättre
            att lägga det utanför.<br><br>
            Jag har skrivet en hel del php direkt i mina vyer men egentligen vill
            jag fortsätta att hålla mina vyer så rena som möjligt - alltså att de bara
            innehåller informationen som ska presenteras och inte skapa information.
            När jag får mer tid tänker jag flyttade tillbaka den koden från vyerna till
            t.ex. config-filer eller liknande. Jag har bara inte haft tid för det än,
            men det är så jag vill ha det.<br><br>
            Men på grund av detta är jag inte riktigt igång med "var kan jag lägga koden",
            så jag har inte mycket mer att säga om just detta.</p>
            <h4>Hur väljer du att organisera dina vyer?</h4>
            <p>Jag har än så länge inte lagt mycket tid och tanke bakom detta.
            Alla mina vyer ligger under view/views utan några andra mappar. Igen,
            detta är en sån sak jag inte riktigt haft tid att greja med, då all
            tid går till det som uppgifterna kräver. Jag har dessutom valt att inte
            skapa navbar1 eller navbar2 mappar då jag bara uppdaterar min navbar och
            det finns ingen anlending att spara en gammal navbar. Dock försöker
            använda så få vyer som möjligt - t.ex. använder jag bara en vy till
            alla mina session routes, då jag tycker det blir bättre och renare.
            Session innehåller inte så mycket information att alla routes behöver
            egna vyer, speciellt när många routes bara redirectar tillbaka.<br><br>
            Men om vi börjar jobba mer med undersidor så kommer jag börja skapa
            fler mappar för vyerna, men för tillfället känner jag att det är inte helt
            nödvändigt. Om en mapp ska skapas ska den kunna innehåller fler än en
            vy för att det ska kännas nödvändigt, tycker jag.</p>
            <h4>Berätta om hur du löste integreringen av klassen Session.</h4>
            <p>Som sagt skapade jag session-objektet i frontkontrollern så den
            kan nås via $app. Jag valde också att start sessionen direkt i frontkontrollern
            så den alltid är startad i all vyer. Själva Session-klassen ligger under
            src/Session/Session.php och jag tog hjälp av övningen för att skapa
            den.<br><br>
            Sessionen testas med hjälp av session.php. Vad session.php visar beror
            på routen, då detta är min enda vy för hela session-uppgiften. Jag skapade
            en session.php under route som innehåller mina routes for sessions undersidor.
            Direkt i routern haterar jag destroy, set, get, dump och annat av session,
            och även redirects via $app->response->redirect. På så sätt behöver jag
            bara en vy som uppdaterar sin information beroende på route. Det finns
            inte mycket anledning till fler vyer.</p>
            <h4>Berätta om hur du löste uppgiften med Tärningsspelet 100/Månadskalendern, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?</h4>
            <p>Jag valde att göra månadskalendern då det kändes mest användbart.
            Håller det enkelt med två klasser, Calendar och Month. Calendar tar
            emot två parametrar, $month och $year, och utifrån dem skapas månaden
            som sedan används för att skapa kalendern för den månaden. Jag skapar
            alltså Calendar-objektet direkt i vyn calendar.php. Månaden och året som
            skapas är nuvarande by default, men om man klickar på knapparna
            "Next month", "Next year" i vyn används GET för att öka värdet på månaden.
            Och det värdet skickas då med när Calendar-objektet skapas igen när sidan
            laddas om. Om månad går från December till Januari eller på andra hållet
            så ändras också året.
            <br><br>
            Så Calendar-klassen innehåller ett Month-objekt, och jobbar huvudsakligen
            med att skapa HTML för själva kalendern. Month-klassen innehåller all
            information om månaden, och har även koll på föregående månad för att
            skriva ut datum för den i kalendern (med en annan färg och lite mindre
            font, då de tillhör en annan månad). Jag hade nite denna strukturen från
            början, för jag hade allting i Calendar först. Men jag tyckte det blev
            lite rörigt och det blev mycket bättre om jag skapade månaden i en egen
            klass. Jag tog mycket hjälp av internet för själva koden som skapar
            datum osv men jag har skapat min egen kod och struktur som jag är nöjd med.
            <br><br>
            Så egenligen planerade jag inte koden från början då jag inte helt visste
            hur jag skulle skriva koden. Så jag jobbade med att organisera koden
            under tiden jag jobbade. Jag är inte helt nöjd med hur jag löste det,
            men jag höll det enkelt och gjorde vad jag kunde med den begränsade
            tid jag hade. Så med tanke på det är jag nöjd.</p>
            <h4>Några tankar kring SQL så här långt?</h4>
            <p>Inte mycket att säga, det har gått bra än så länge. Jag har gjort
            till och med uppgift 12 och har inte haft några problem alls. Mycket
            känns igen från HTMLPHP kursen men det är väldigt nyttigt att ha
            en rejäl genomgång av det igen.</p>
            <h2>Kmom03</h2>
            <h4>Hur kändes det att jobba med PHP PDO, SQL och MySQL?</h4>
            <p>Lite rörigt i början men annars kul och inga särskilda problem. Har
            länge viljat börja med MySQL så det är absolut kul att komma igång med,
            speciellt när vi får använda det till ett inloggningssystem. PDO och
            SQLite har vi tidigare använt i PHP så det kändes bekvämt att jobba med
            databaser i PHP allmänt. Det kluriga var att få till det i ramverket
            genom klasser osv.</p>
            <h4>Reflektera kring koden du skrev för att lösa uppgifterna, klasser, formulär, integration Anax Lite?</h4>
            <p>Det blev många vyer då jag följde övningen till stor del i början,
            och det gillar jag inte riktigt. Jag hade säkert kunna skippa några vyer
            och lägga den koden direkt i routern eller liknande. Men det får bli vid
            senare tillfälle då det inte verkar finnas någon tid till det nu.
            <br><br>
            Det blev då också många nya routes så jag skapade två nya mappar under
            route, "admin" och "users". Jag delade upp mina vyer på samma sätt -
            då har jag koll på exakt vad som är admin-gränssnittet och inte. Blir
            lätt att hantera tycker jag.
            <br><br>
            Till uppgifterna skapade jag tå nya klasser, en för koppling till
            Databas och en för hantering av användare. Blev nöjd med det då det
            blev en bra uppdelning av koden och gör det mycket lättare att hantera
            datan i databasen. Users klassen använder sig av databasobjektet för
            kommunicera med databasen genom $app.
            <br><br>
            Vyerna fick dock ändå ganska mycket PHP-kod, och jag hade gärna jobbat
            på detta - finslipat lite - men det finns helt enkelt inte tid till det
            vilket är tråkigt... Bland annat blev det lite rörigt med alla formulär
            som ska hanteras genom processingsidor. Jag visste inte riktigt hur jag
            skulle göra det bättre men det får bli någonting jag tittar närmre på
            under kursens gång.
            <br><br>
            Jag nöjde mig med en tabell i databasen med begränsat antal kolumner
            (namn, lösen, roll). Men det blir ju bra till det vi har gjort hittills.
            Rollen kan vara "user" eller "admin" - det är alltså där man ser om
            en användare är admin eller inte. Om en användare är rollen "admin"
            så finns en länk på deras profil, "Admin page" som tar en till
            en tabell med alla användare. Och därifrån kan administratören redigera
            användarnas namn, lösenord, roll och även lägga till och ta bort användare.
            Jag använder mig av en cookie för att spara användarens roll, och den
            visas högst uppe på profilsidan.
            <br><br>
            Vill ni komma åt admin-sidorna kan ni logga in med "admin" username
            och "admin" lösenord. Han ger er tillgång till gränssnittet.</p>
            <h4>Känner du dig hemma i ramverket, dess komponenter och struktur?</h4>
            <p>Jo, det tycker jag nu. Absolut. Jag gillar verkligen sättet vi kan
            jobba med $app både i klasser och vyer, det underlättar otroligt mycket.
            Och själva strukturen känner jag mig hemma i ny. Det är inget problem
            att hitta saker eller veta vart man ska lägga sin kod. Känns so att
            allting har sin plats och det känns bra.</p>
            <h4>Hur bedömmer du svårighetsgraden på kursens inledande kursmoment, känner du att du lär dig något/bra saker?</h4>
            <p>Svårighetsgraden i sig har varit helt okej. Det är belastningen som
            gör det lite jobbigare. Det är väldigt mycket som ska göras på ganska
            lite tid. Inte bara ska vi koda uppgifterna utan koden ska vara snygg,
            bra uppdelad och webbsidan ska vara stylad och se fin ut. Själva grejerna
            kanske inte verkar vara så stora i sig, men när vi ska lägga in dem
            på vår sida så tillkommer en hel del jobb. Det blir för mycket helt enkelt.
            För min del blir det bara värre när det är så mycket som ska hinnas med,
            man får prioritera och lägga vissa saker åt sidan istället för att kanske
            fördjupa sig lite i det man gör och få bättre förståelse för det. Jag
            känner att jag lär mig saker och det är bra saker, men jag lär mig inte
            så mycket som jag skulle vilja eller som kanske är tanken. Det blir stressigt
            vilket oftast betyder att koden blir slarvig. Det är tråkigt när man
            vill spendera lite mer tid på att finslipa och kanske fördjupa sig lite
            i det man gör, men inte kan på grund av tidsbrist. I dessa första
            kursmomenten har det också funnits massiva övningar som ska jobbas
            igenom och 3-4 uppgifter on top of that. Vet inte riktigt hur ni tänkte
            där men det blir för mycket helt enkelt.</p>
            <h2>Kmom04</h2>
            <p>Text kommer här.</p>
            <h2>Kmom05</h2>
            <p>Text kommer här.</p>
            <h2>Kmom06</h2>
            <p>Text kommer här.</p>
            <h2>Kmom07/10</h2>
        </article>
    </main>
