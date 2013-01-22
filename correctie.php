<?PHP
require_once '../include/db_connectTweak.php';
db_connect("light");
require_once '../include/lib.php';
require_once '../include/top.php';
require_once '../i_lib.php';
mysql_set_charset('utf8');

$where="where (next_version = 'x' or next_version = 'X')";
$query="select count(id) as todo from words_list ".$where;
$result = mysql_query($query) or die (mysql_error());
$todo = '0';
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
  $todo = $row['todo'];
}
$query="select id,word,alternatief,next_version,woordtype,aantekeningen from words_list ".$where." limit 1024";
$result = mysql_query($query) or die (mysql_error());
$num = mysql_num_rows($result);
$offset = rand(1, $num);
$count = 0;
$id = '';
$fout = '';
$alternatief = '';
$woordstatus = '';
$woordtype = '';
$aantekeningen = '';
$result = mysql_query($query) or die (mysql_error());
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
    $count++;
    if ($count == $offset) {
        $id = $row['id'];
        $fout = $row['word'];
        $alternatief = $row['alternatief'];
        $woordstatus = $row['next_version'];
        $woordtype = $row['woordtype'];
        $aantekeningen = $row['aantekeningen'];
        break;
    }
}
if (strcmp($woordstatus, 'x') == 0) {
$woordstatus='Gepland om als incorrect in collectie op te nemen.';
} else {
$woordstatus='Als incorrect in collectie opgenomen.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
                            Correctie bijdragen
        </title>
        <link rel="stylesheet" href="jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet" href="my.css" />
        <link rel="icon" href="/favicon.ico" />
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
    <body OnLoad="document.bijdrage.correctie.focus();">
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="false">
                        <h3>
                            Correctie bijdragen
                        </h3>
                        Het is hier mogelijk om <a href="index.php" data-transition="fade">bijdragen</a> te leveren aan OpenTaal omtrent correcties van spelfouten. Geef hieronder aan wat de meeste waarschijnlijke correctie is voor het gegeven woord. Voor sommige woorden hebben we al een correctie en deze is dan vooringevuld en kan, indien nodig, worden aangepast. Als er niets vooringevuld is kan men zelf een correctie invoeren. Voorbeelden van correcties zijn <em>stoel</em> voor <em>steol</em>, <em>pannenkoek</em> voor <em>pannekoek</em>, <em>stationshal</em> voor <em>stationhal</em>, <em>starter</em> voor <em>startert</em>, <em>België</em> voor <em>Belgie</em>, <em>móét</em> voor <em>móet</em> en <em>ééuw</em> voor <em>ééúw</em>. Zie ook de naslagwerken <a target="_blank" href="http://taaladvies.net">Taaladvies</a>, <a target="_blank" href="http://woordenlijst.org/leidraad/inhoudsopgave/">Leidraad Spelling</a> en <a target="_blank" href="http://taaltelefoon.vlaanderen.be/nlapps/docs/default.asp?id=2594">Taaltelefoon</a>. Sommige woorden hebben geen zinvolle correctie. In dat geval kan een leeg veld worden ingediend. Als het te moeilijk is om een correctie te vinden kan het woord voorlopig worden overgeslagen. Indien een woord eigenlijk geen spelfout bevat, en een correctie dus onzinnig is, kan dit onderaan het formulier als een fout worden gemeld.
                    </div>
                </div>
Te doen: <?PHP echo $todo;?>
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="<?PHP if (strcmp($woordtype, '') || strcmp($aantekeningen, '')) {echo 'false';} else {echo 'true';}?>">
                        <h3><?PHP echo $fout;?></h3>
                        <strong>status:</strong> <?PHP echo $woordstatus;?>
			<?PHP if (strcmp($woordtype, '')) {echo ' <strong>type:</strong> '.$woordtype;}?>
			<?PHP if (strcmp($aantekeningen, '')) {echo ' <strong>aantekening:</strong> '.$aantekeningen;}?>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="http://data.opentaal.org/opentaalbank/woorddetails.php?word=<?PHP echo $fout;?>"><img src="images/opentaal.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="https://nl.wikipedia.org/wiki/<?PHP echo $fout;?>"><img src="images/wikipedia.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="https://nl.wiktionary.org/wiki/<?PHP echo $fout;?>"><img src="images/wiktionary.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href='https://google.nl/#hl=nl&q="<?PHP echo $fout;?>"'><img src="images/google.png"></a>
                    </div>
                </div>
                <form name="bijdrage" action="correctie.php" method="POST">
                        <div data-role="fieldcontain">
                                <input name="base" id="correctie" placeholder="" value="<?PHP echo $alternatief;?>" type="text" />
                        </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <input data-theme="b" value="Sla over" type="submit" />
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
                        Het woord <?PHP echo $fout;?> met id <?PHP echo $id;?> is niet incorrect omdat dit
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
