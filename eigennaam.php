<?PHP
require_once '../include/db_connectTweak.php';
db_connect("light");
require_once '../include/lib.php';
require_once '../include/top.php';
require_once '../i_lib.php';
mysql_set_charset('utf8');

$query="select id,word,next_version,woordtype,aantekeningen from words_list where (next_version = 'b' or next_version = 'B' or next_version = 'k' or next_version = 'K' or next_version = 'v' or next_version = 'V' or next_version = 'w' or next_version = 'W' or next_version = 'd' or next_version = 'D') and (word rlike '^[ÅÇA-Z].*' or word rlike '^[0-9][ÅÇA-Z].*') and (word <> '3D' and word <> '3D-visualisatie' and word not rlike '^[ÅÇA-Z]-[^ÅÇA-Z0-9].*') limit 1024";//TODO voeg toe aan middelste  or word rlike '^[åça-z][ÅÇA-Z0-9^éèëêáàäâíìïîóòöôúùüûñç].*' maar zorg dat woorden als bèta niet doorkomen
$result = mysql_query($query) or die (mysql_error());
$num = mysql_num_rows($result);
$offset = rand(1, $num);
$count = 0;
$id = '';
$eigennaam = '';
$woordstatus = '';
$woordtype = '';
$aantekeningen = '';
$result = mysql_query($query) or die (mysql_error());
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
    $count++;
    if ($count == $offset) {
        $id = $row['id'];
        $eigennaam = $row['word'];
	$woordstatus = $row['next_version'];
	$woordtype = $row['woordtype'];
        $aantekeningen = $row['aantekeningen'];
        break;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
                            Eigennaam categoriseren
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
    <body>
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Eigennaam categoriseren
                        </h3>
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3><?PHP echo $eigennaam;?></h3>
                        status: <?PHP echo $woordstatus;?>
			<?PHP if (strcmp($woordtype, '')) {echo ' type: '.$woordtype;}?>
			<?PHP if (strcmp($aantekeningen, '')) {echo ' aantekening: '.$aantekeningen;}?>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="https://nl.wikipedia.org/wiki/<?PHP echo $eigennaam;?>"><img src="images/wikipedia.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="https://nl.wiktionary.org/wiki/<?PHP echo $flexievorm;?>"><img src="images/wiktionary.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href='https://google.nl/#hl=nl&q="<?PHP echo $eigennaam;?>"'><img src="images/google.png"></a>
                    </div>
                </div>
                <form action="eigennaam.php" method="POST">
                <div class="ui-grid-b">
                    <div class="ui-block-a">
<div id="checkboxes1" data-role="fieldcontain">
<input id="checkbox1" name="" type="checkbox">
<label for="checkbox1">Voornaam, man (M)</label>
<input id="checkboxy" name="" type="checkbox">
<label for="checkboxy">Voornaam, vrouw (V)</label>
<input id="checkboxg" name="" type="checkbox">
<label for="checkboxg">Voornaam, M en V</label>
<!--input id="checkbox2" name="" type="checkbox">
<label for="checkbox2">Tussenvoegsel, voorvoegsel</label-->
<input id="checkbox3" name="" type="checkbox">
<label for="checkbox3">Achternaam, meisjesnaam</label>
<input id="checkbox4" name="" type="checkbox">
<label for="checkbox4">Volledige naam</label>
<input id="checkboxI" name="" type="checkbox">
<label for="checkboxI">Rang, titelatuur</label><!-- Generaal, Luitenant-kolonel, Kapitein-Luitenant ter zee, Luitenant-ter-zee, Eerste Hoofdcommissaris, Agent, Brigadier, BA, BSc, MSc, PhD, géén adel (koningin, prins, hertog, baron) behalve Z.K.H., H.K.H., Zr. Ms., Hr. Ms. , geen mr. ir. dr. -->
<input id="checkboxr" name="" type="checkbox">
<label for="checkboxr">Genitief, bezittelijk</label>
</div>
                    </div>
                    <div class="ui-block-b">
<div id="checkboxes2" data-role="fieldcontain">
<input id="checkbox5" name="" type="checkbox">
<label for="checkbox5">Instantie, overheid</label><!-- VN Tweede Kamer -->
<input id="checkbox6" name="" type="checkbox">
<label for="checkbox6">Groep, non-profit</label><!-- VVD, OpenTaal, Rode Kruis-->
<input id="checkbox7" name="" type="checkbox">
<label for="checkbox7">Bedrijf, handelsnaam</label><!--Philips Sony -->
<input id="checkbox8" name="" type="checkbox">
<label for="checkbox8">Product, type, merk</label><!-- Philipshave Vaio -->
<input id="checkboxT" name="" type="checkbox">
<label for="checkboxT">Grootheid, eenheid</label><!-- m3 IV VI dB V-->
<input id="checkboxH" name="" type="checkbox">
<label for="checkboxH">Bijbels, feestdag</label><!--Hemelvaart, God, D-Day Pasen Sinterklaas (de dag)-->
<input id="checkbox0" name="" type="checkbox">
<label for="checkbox0">Fictief (Spiderman)</label><!-- Sinterklaas (de persoon)-->
</div>
                    </div>
                    <div class="ui-block-c">
<div id="checkboxes3" data-role="fieldcontain">
<input id="checkbox9" name="" type="checkbox">
<label for="checkbox9">Hydroniem, water</label>
<input id="checkboxa" name="" type="checkbox">
<label for="checkboxa">Hodoniem, straat</label>
<input id="checkboxb" name="" type="checkbox">
<label for="checkboxb">Oroniem, gebergte</label>
<input id="checkboxc" name="" type="checkbox">
<label for="checkboxc">Plaats, gebied</label>
<input id="checkboxd" name="" type="checkbox">
<label for="checkboxd">Gebouw, object</label>
<input id="checkboxz" name="" type="checkbox">
<label for="checkboxz">Hoofdletter&shy;schrijfwijze</label><!--TODO deselecteer alle andere via javascript-->
<input id="checkboxj" name="" type="checkbox">
<label for="checkboxj">Geen eigennaam</label><!--TODO desekect rest--><!-- ADHD-kind AOW-uitkering? ABC-wapens DNA-test Paasmaaltijd CDA-minister -->
</div>
                    </div>
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
                <div data-role="collapsible-set" data-theme="e" data-content-theme="e"><!-- verberg normale submitknoppen-->
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Fout melden
                        </h3>
                        <form action="eigennaam.php" method="POST">
                        De eigennaam <?PHP echo $eigennaam;?> is fout omdat deze
                        <div data-role="fieldcontain">
                                <input name="woord" id="id" placeholder="" value=" <?PHP echo $id;?>" type="hidden" />
                                <input name="base" id="opmerking" placeholder="" value="" type="text" />
                        </div>
                        <input data-theme="e" value="Meld fout" type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //App custom javascript
        </script>
    </body>
</html>
