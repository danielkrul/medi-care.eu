<?php
	$title = 'MediCare | O projektu';

	include 'inc/header.php';
	$selectedPage = 'about';
?>

<body>
	<div id="page">
		<div id="inner">
			<?php 
				include 'inc/menu.php';
			?>

			<div id="content">
			<div class="text">
				<h2>O projektu</h2>
<p>MediCare je nositelné zařízení, které se ergonomickým páskem umisťuje na paži, kde sensory, které jsou integrované v pásku, snímají biologická data. Konkrétně tepovou frekvenci, saturaci krve kyslíkem, vlhkost pokožky (= úroveň pocení) a polohu (akceleraci a gyroskop).</p>
<p>V hlavní krabičce MediCare jsou umístěny dva Li-Pol akumulátory (jeden hlavní a druhý záložní),které poskytují dlouhodobou výdrž. Dále je obsažen GSM modul SIM 800L, který je využíván pro GSM datovou komunikaci přes GPRS do internetu, kde data ukládá v InnoDB MySQL databázi.</p>
<p>Původně jsme plánovali využít Bluetooth s NFC tagem, ale smyslem IoT má být dostupnost
kdekoliv, což GSM splňuje perfektně. Vzhledem k použití GPRS datové komunikace není celková
spotřeba o moc vyšší, než jsme předpokládali.</p>
<p>Dalším údajem, který se pravidelně zasílá, jsou GPS souřadnice uživatele. Kvůli šetření baterie využíváme toho faktu, že z GSM modulu se dá triangulací získat GPS souřadnice zařízení. Přesnost je sice menší, ale jakmile se přepne zařízení do jednoho z nouzových módů, tak dojde k aktivaci
samostatného GPS modulu.
Všechny tyto údaje se zpracovávají na MCU, který zjistí, zda nenastala kupříkladu srdeční slabost,
kolaps či arytmie. Jakmile se objeví jeden z těchto problémů okamžitě se aktivuje GSM přenos a
informace se pošlou na server, který potom upozorňuje na problém výstražným dialogovým oknem.
Zároveň se dá aktivovat ruční nouzový mód, kdy stačí zmáčknout tlačítko na boku zařízení.
Díky tomuto řešení znají povolané osoby aktuální zdravotní stav pacienta společně s jeho polohou.</p>
<p>Nesmírně důležitý je gyroskop a akcelerometr kvůli pádům. Gyroskop zjistí v jaké poloze je
uživatel a akcelerometr zase jak rychle se do této polohy dostal (např.: stojící člověk spadl dopředu
určitou rychlostí...).
Jakmile jsou data zpracovány, tak dojde k jejich odeslání na server, a poté k úspání GSM modulu k
šetření baterie. Dále také aktivujeme interní oscilátor u MCU, což také sníží celkovou spotřebu.
Tento cyklus se opakuje každých 30 minut. Čím je interval kratší, tím má zařízení větší spotřebu.</p>
<h2>Technické řešení</h2>
Náš projekt se skládá z několika součástí
<ul>
	<li>Krabička (obal)</li>
	<li>Krabičku jsme vyvinuli a vytiskli na 3D tiskárně. Má pevnou a odolnou konstrukci.</li>
	<li>Pásek</li>
	<li>Pásek jsme ušili na šicím stroji s použitím suchého zipu (kvůli různým tloušťkám paže)
a prodyšného a pružného materiálu.</li>
</ul>
<p>Srdcem celého projektu je MCU Atmel Atmega 328P, který byla pro naše použití nejvhodnější.
Nahráli jsme do ní Arduino bootloader a naprogramovali pomocí Arduino IDE. (Díky přítomnosti
GSM by bylo použití ESP modulu zbytečné)
MCU komunikuje pomocí AT příkazů po softwarově emulované sériové lince s GSM modulem,
který mu zároveň vrací výsledky AT příkazů.</p>
<p>K MCU jsou připojeny také senzory na pásku. Konkrétně:</p>
• Teplotní senzor Dallas DS18B20
• Senzor srdečního tepu a saturace MAX30100
• 2 kovové plošky pro měření odporu pokožky (= vlhkost)
• Gyroskop, magnetometr a akcelerometr MPU9260
<p>Pro tyto senzory využíváme u MCU sběrnice OneWire, analogové vstupy (měření stavu baterie a
vlhkosti pokožky) a I2C pro MAX30100 a MPU9260
MCU společně s potřebnými součástkami jsme osadili do nakresleného a vyleptaného plošného
spoje, který jsme následně umístili do krabičky.
Spotřeba MediCare za hodinu provozu je max. 0.035 W pro 15 minut dlouhý interval zasílání informací. Celková kapacita akumulátorů činí 8.14
Wh, což činí jednoduchým výpočtem výdrž 10 dní a pro půlhodinový interval až 20 dní.</p>
<h2>Použití</h2>
<p>MediCare má velice jednoduchou aplikaci. Každé jeho zařízení má unikátní vyrobní ID, které stačí
zaregistrovat v mobilní nebo webové aplikaci, která Vás již povede. Při registraci je třeba taktéž
vyplnit věk a pohlaví kvůli vztahům mezi srdečními obtížemi a pohlavím společně s věkem.
Následně se stačí přihlásit do administrace, kde již jsou zprůměrované údaje ze senzorů společně s
Google mapou polohy uživatele. Tyto údaje se dynamicky každou půlhodinu aktualizují ze serveru.
Pásek poté stačí jen připevnit na ruku...</p>
<p>V případě vybití baterie stačí klasickým microUSB kabelem připojit zařízení ke zdroji a začne se
dobíjet. V závislosti podle zdroje trvá dobíjení okolo 2 – 3 hodin.</p>
<h2>Webová a mobilní aplikace</h2>
<p>MediCare je dostupné hlavně na webovém rozhraní, které se dá ovládat samozřejmě i z jakéhokoliv
mobilního zařízení. Zároveň jsme vyvinuli nativní Android aplikaci s názvem MediCare Monitor,
která je určena pro OS Android 4.0 a vyšší.</p>
<a href="/MediCareMonitor.apk" target="">Odkaz na aplikaci</a>
	</div>
			</div>
		</div>
		<?php
			include 'inc/foot.php'; 
		?>
	</div>
</body>
</html>