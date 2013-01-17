<?PHP
require_once '../include/db_connectTweak.php';
db_connect("light");
require_once '../include/lib.php';
require_once '../include/top.php';
require_once '../i_lib.php';
mysql_set_charset('utf8');

$where="where (next_version = 'b' or next_version = 'B' or next_version = 'k' or next_version = 'K' or next_version = 'v' or next_version = 'V' or next_version = 'w' or next_version = 'W' or next_version = 'd' or next_version = 'D') and (word rlike '^[A-Z0-9]{2,}$' or word rlike '^[A-Z0-9][a-z]{1,}[A-Z0-9]{1,}.*$' or word rlike '^([a-zA-Z0-9]{1,}[.]){1,}$')";
$query="select count(id) as todo from words_list ".$where;
$result = mysql_query($query) or die (mysql_error());
$todo='0';
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
  $todo = $row['todo'];
}
$query="select id,word,next_version,woordtype,aantekeningen from words_list ".$where." limit 1024";
$result = mysql_query($query) or die (mysql_error());
$num = mysql_num_rows($result);
$offset = rand(1, $num);
$count = 0;
$id = '';
$woord = '';
$woordstatus = '';
$woordtype = '';
$aantekeningen = '';
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
    $count++;
    if ($count == $offset) {
        $id = $row['id'];
        $woord = $row['word'];
	$woordstatus = $row['next_version'];
	$woordtype = $row['woordtype'];
        $aantekeningen = $row['aantekeningen'];
        break;
    }
}
if (strcmp($woordstatus, 'k') == 0) {
  $woordstatus = 'Gepland om als gekeurd basiswoord in collectie op te nemen.';
} elseif (strcmp($woordstatus, 'K') == 0) {
  $woordstatus = 'Als gekeurd basiswoord in collectie opgenomen.';
} elseif (strcmp($woordstatus, 'b') == 0) {
  $woordstatus = 'Gepland om als ongekeurd basiswoord in collectie op te nemen.';
} elseif (strcmp($woordstatus, 'B') == 0) {
  $woordstatus = 'Als ongekeurd basiswoord in collectie opgenomen.';
} elseif (strcmp($woordstatus, 'f') == 0) {
  $woordstatus = 'Gepland om als ongekeurde flexievorm in collectie op te nemen.';
} elseif (strcmp($woordstatus, 'F') == 0) {
  $woordstatus = 'Als ongekeurde flexievorm in collectie opgenomen.';
} elseif (strcmp($woordstatus, 'v') == 0) {
  $woordstatus = 'Gepland om als gekeurd basiswoord in collectie op te nemen. Verwarrend voor spellingcontrole.';
} elseif (strcmp($woordstatus, 'V') == 0) {
  $woordstatus = 'Als gekeurd basiswoord in collectie opgenomen. Verwarrend voor spellingcontrole.';
} elseif (strcmp($woordstatus, 'w') == 0) {
  $woordstatus = 'Gepland om als ongekeurd basiswoord in collectie op te nemen. Verwarrend voor spellingcontrole.';
} elseif (strcmp($woordstatus, 'W') == 0) {
  $woordstatus = 'Als ongekeurd basiswoord in collectie opgenomen. Verwarrend voor spellingcontrole.';
} elseif (strcmp($woordstatus, 'u') == 0) {
  $woordstatus = 'Gepland om als ongekeurde flexievorm in collectie op te nemen. Verwarrend voor spellingcontrole.';
} elseif (strcmp($woordstatus, 'U') == 0) {
  $woordstatus = 'Als ongekeurde flexievorm in collectie opgenomen. Verwarrend voor spellingcontrole.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
        </title>
        <link rel="stylesheet" href="jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet" href="my.css" />
        <style>
            /* App custom styles */
        </style>
        <script src="jquery.min.js">
        </script>
        <script src="jquery.mobile-1.2.0.min.js">
        </script>
        <script src="my.js">
        </script>
    </head>
<?PHP echo $num;?>
    <body>
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="false">
                        <h3>
                            Afkortingen classificeren
                        </h3>
                        Het is hier mogelijk om <a href="index.php" data-transition="fade">bijdragen</a> te leveren aan OpenTaal omtrent <a target="_blank" href="https://nl.wikipedia.org/wiki/Afkotring">afkortingen</a>. TODO Dit zijn woorden waarvan de letters los gespeld worden. Een dergelijk woord wordt ook wel <a target="_blank" href="https://nl.wikipedia.org/wiki/Acroniem">acroniem</a> genoemd en bevat meestal hoofdletters. Enkele voorbeelden zijn CBS, INL en MRI. Woorden die normaal worden uitgesproken heten letterwoorden. Voorbeelden hiervan zijn havo, NAVO en OpenStreetMap. Merk op dat dit niets te maken heeft met de hoofdletters of de afkomst van een <a target="_blank" href="https://nl.wikipedia.org/wiki/Afkorting">afkorting</a>. Omdat het hier om de uitspraak gaat zijn de getallen in <a target="_blank" href="">Romeinse cijfers</a>, zoals XIV en MMXIII, ook letterwoorden. Er bestaan ook mengvormen zoals XS4ALL en cd-rom. Dit geldt ook voor <a target="_blank" href="https://nl.wikipedia.org/wiki/Nederlandse_samenstelling">Samenstellingen</a> zoals PvdA-voorzitter. Let op, soms kan het zijn dat er verschillende uitspraken zijn. Dat is meestal het geval als er ook verschillende beteknissen zijn. Een voorbeeld is XXX dat een initiaalwoord is in de context van XXX-syndroom en dat ook een letterwoord is als het getal 30 in Romeinse cijfers. Een ander voorbeeld is V voor Volt en vijf. Er zijn dus verschillende instinkers zoals ook <a target="_blank" href="https://nl.wikipedia.org/wiki/BOB">BOB</a>, de Wet BOB (<em>b-o-b</em>).
                    </div>
                </div>
Te doen: <?PHP echo $todo;?>
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="<?PHP if (strcmp($woordtype, '') || strcmp($aantekeningen, '')) {echo 'false';} else {echo 'true';}?>">
                        <h3><?PHP echo $woord;?></h3>
                        <strong>status:</strong> <?PHP echo $woordstatus;?>
			<?PHP if (strcmp($woordtype, '')) {echo ' <strong>type</strong>: '.$woordtype;}?>
			<?PHP if (strcmp($aantekeningen, '')) {echo ' <strong>aantekening</strong>: '.$aantekeningen;}?>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="https://nl.wikipedia.org/wiki/<?PHP echo $woord;?>"><img src="images/wikipedia.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="https://nl.wiktionary.org/wiki/<?PHP echo $flexievorm;?>"><img src="images/wiktionary.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href='https://google.nl/#hl=nl&q="<?PHP echo $woord;?>"'><img src="images/google.png"></a>
                    </div>
                </div>
                        <form action="initiaalwoord.php" method="POST">
<div id="checkboxes1" data-role="fieldcontain">
<input id="checkbox1" name="inengerezin" type="checkbox">
<label for="checkbox1">In engere zin</label>
<input id="checkbox2" name="symbool" type="checkbox">
<label for="checkbox2">Symbool</label>
<input id="checkbox3" name="initiaalvorm" type="checkbox">
<label for="checkbox3">Initialwoord</label>
<input id="checkbox4" name="letterwoord" type="checkbox">
<label for="checkbox4">Letterwoord</label>
<input id="checkbox5" name="verkorting" type="checkbox">
<label for="checkbox5">Verkorting</label>
<input id="checkbox6" name="mengvorm" type="checkbox">
<label for="checkbox6">Mengvorm</label>
</div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <form action="initiaalwoord.php" method="POST">
                        <input data-theme="b" value="Sla over" type="submit" />
                        </form>
                    </div>
                    <div class="ui-block-b">
                        <input data-theme="b" value="Dien in" type="submit" />
                    </div>
                </div>
                </form>
                <div data-role="collapsible-set" data-theme="e" data-content-theme="e">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Fout melden
                        </h3>
                        <form action="initiaalwoord.php" method="POST">
                        Het woord <?PHP echo $flexievorm;?> is fout omdat dit
                        <div data-role="fieldcontain">
                                <input name="woord" id="id" placeholder="" value=" <?PHP echo $id;?>" type="hidden" />
                                <input name="base" id="opmerking" placeholder="" value="" type="text" />
                        </div>
                        <input data-theme="e" value="Meld fout" type="submit" />
                        </form>
                    </div>
            </div>
        </div>
        <script>
            //App custom javascript
        </script>
    </body>
</html>
