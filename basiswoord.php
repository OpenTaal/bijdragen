<?PHP
require_once '../include/db_connectTweak.php';
db_connect("light");
require_once '../include/lib.php';
require_once '../include/top.php';
require_once '../i_lib.php';
mysql_set_charset('utf8');

$query="SELECT suggested,correct,incorrect,show_help,completed_test FROM mobile_score WHERE user_id = 3 AND type_id = 1";
$suggested = '0';
$correct = '0';
$incorrect = '0';
$show_help = '1';
$completed_test = '0';
$result = mysql_query($query) or die (mysql_error());
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
  $suggested = $row['suggested'];
  $correct = $row['correct'];
  $incorrect = $row['incorrect'];
  $show_help = $row['show_help'];
  $completed_test = $row['completed_test'];
}

$query="SELECT id,word,next_version,woordtype,aantekeningen FROM words_list WHERE (next_version = 'f' OR next_version = 'F' OR next_version OR next_version = 'U' OR next_version = 'u') LIMIT 0,1000";
$result = mysql_query($query) or die (mysql_error());
$num = mysql_num_rows($result);
$offset = rand(1, $num);
$count = 0;
$id = '';
$flexievorm = '';
$woordstatus = '';
$woordtype = '';
$aantekeningen = '';
$result = mysql_query($query) or die (mysql_error());
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
    $count++;
    if ($count == $offset) {
        $id = $row['id'];
        $flexievorm = $row['word'];
        $woordstatus = $row['next_version'];
        $woordtype = $row['woordtype'];
        $aantekeningen = $row['aantekeningen'];
        break;
    }
}
$lengte = mb_strlen($flexievorm);
$suggestie = $flexievorm;
  if (mb_substr($flexievorm, $lengte-5) == 'nkjes') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."g";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'ices') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."ex";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'nkje') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3)."g";
  } elseif (mb_substr($flexievorm, $lengte-8) == 'kinderen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."kind";
  } elseif (mb_substr($flexievorm, $lengte-7) == 'ruimten' || mb_substr($flexievorm, $lengte-7) == 'ruimtes') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-7)."ruimte";

  } elseif (mb_substr($flexievorm, $lengte-4) == 'mmen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == 'nnen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == 'tten') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == 'llen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == 'sche') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-1);
  } elseif (mb_substr($flexievorm, $lengte-4) == "ggen") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == "kken") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == "ppen") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == "dden") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == "ssen") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);

  } elseif (mb_substr($flexievorm, $lengte-6) == "steden") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-6)."stad";
  } elseif (mb_substr($flexievorm, $lengte-5) == "heden") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-5)."heid";
  } elseif (mb_substr($flexievorm, $lengte-5) == "'tjes") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-5);
  } elseif (mb_substr($flexievorm, $lengte-4) == 'tjes') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4);
  } elseif (mb_substr($flexievorm, $lengte-4) == 'tra') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3)."trum";
  } elseif (mb_substr($flexievorm, $lengte-3) == 'dde') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-2);
  } elseif (mb_substr($flexievorm, $lengte-4) == 'ende') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-2);
  } elseif (mb_substr($flexievorm, $lengte-3) == 'jes') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-4) == 'oven') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."oof";
  } elseif (mb_substr($flexievorm, $lengte-3) == 'ven') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3)."f";

  } elseif (mb_substr($flexievorm, $lengte-3) == 'are') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3)."aar";
  } elseif (mb_substr($flexievorm, $lengte-3) == 'ele') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3)."eel";
  } elseif (mb_substr($flexievorm, $lengte-3) == 'ame') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3)."aam";
  } elseif (mb_substr($flexievorm, $lengte-3) == 'one') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3)."oon";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'uren') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."uur";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'aken') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."aak";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'aden') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."aad";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'aren') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."aar";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'alen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."aal";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'inen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."ine";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'amen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."aam";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'eden' && mb_substr($flexievorm, $lengte-5) != 'ieden' && mb_substr($flexievorm, $lengte-5) != 'oeden') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."id";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'elen' && mb_substr($flexievorm, $lengte-5) != 'ielen' && mb_substr($flexievorm, $lengte-5) != 'oelen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."eel";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'emen' && mb_substr($flexievorm, $lengte-5) != 'iemen' && mb_substr($flexievorm, $lengte-5) != 'oemen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."eem";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'eken' && mb_substr($flexievorm, $lengte-5) != 'ieken' && mb_substr($flexievorm, $lengte-5) != 'oeken') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."eek";

  } elseif (mb_substr($flexievorm, $lengte-4) == 'agen' && mb_substr($flexievorm, $lengte-5) != 'dagen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."aag";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'ogen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."oog";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'oten') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."oot";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'aten') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."aat";
  } elseif (mb_substr($flexievorm, $lengte-4) == 'omen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-4)."oom";

  } elseif (mb_substr($flexievorm, $lengte-3) == 'zen') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3)."s";
//  } elseif (mb_substr($flexievorm, $lengte-5) == 'ingen') {
//    $suggestie = mb_substr($flexievorm, 0, $lengte-5)."en";
  } elseif (mb_substr($flexievorm, $lengte-3) == 'pje') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-3) == 'pje') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-3);
  } elseif (mb_substr($flexievorm, $lengte-2) == 'en') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-2);
  } elseif (mb_substr($flexievorm, $lengte-2) == 'je') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-2);
  } elseif (mb_substr($flexievorm, $lengte-2) == "'s") {
    $suggestie = mb_substr($flexievorm, 0, $lengte-2);
  } elseif (mb_substr($flexievorm, $lengte-1) == 's') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-1);
  } elseif (mb_substr($flexievorm, $lengte-1) == 'e') {
    $suggestie = mb_substr($flexievorm, 0, $lengte-1);
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
    <body OnLoad="document.bijdrage.basiswoord.focus();">
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="<?PHP if (strcmp($show_help, '0') == 0) { echo 'true';} else {echo 'false';}?>">
                        <h3>
                            Basiswoorden bijdragen
                        </h3>
                 <p>Via dit formulier kan de basisvorm worden aangegeven voor een flexievorm. Voorbeelden zijn:</p>
<table border='1'>
<tr><th>flexievorm</th><th colspan='2'>basisvorm</th></tr>
<tr><td>kook, kookt, kookte, kookten, gekookt, kokend, kokende</td><td>werkwoord</td><td>koken</td></tr>
<tr><td>grote, groter, grotere, grootst, grootste</td><td>bijvoeglijk naamwoord</td><td>groot</td></tr>
<tr><td>mannen, mannetje, mannetjes</td><td>zelfstandignaamwoord</td><td>man</td></tr>
<tr><td>(buiten)meisjes, (bier)viltjes, (dans)marietjes</td><td>zelfstandignaamwoord</td><td>(buiten)meisje, (bier)viltje, (dans)marietje</td></tr>
</table>
<strong>Let op!:</strong> de laatste regel met voorbeelden zijn <a target="_blank" href="http://data.opentaal.org/opentaalbank/spellingcontrole/next_version/uitzonderingen.php">uitzonderingen</a> omdat meis e.d niet bestaan.<br>
<strong>Let op!!:</strong> sommige woorden hebben geen enkelvoud. Voorbeelden zijn hersenen, wegwerkzaamheden, etc. Vul dan letterlijk in <strong>PLURALE TANTUM</strong>.<br>
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3><?PHP echo $flexievorm;?></h3>
                        status: <i><?PHP echo $woordstatus;?></i>
			<?PHP if (strcmp($woordtype, '')) {echo ' type: <i>'.$woordtype.'</i> ';}?>
			<?PHP if (strcmp($aantekeningen, '')) {echo ' aantekening: <i>'.$aantekeningen.'</i> ';}?>
                        <a target="_blank" href="https://nl.wikipedia.org/wiki/<?PHP echo $flexievorm;?>"><img src="images/wikipedia.png"></a>
                        <a target="_blank" href="https://nl.wiktionary.org/wiki/<?PHP echo $flexievorm;?>"><img src="images/wiktionary.png"></a>
                        <a target="_blank" href='https://google.nl/#hl=nl&q="<?PHP echo $flexievorm;?>"'><img src="images/google.png"></a>
                    </div>
                </div>
                <form name="bijdrage" action="basiswoord.php" method="POST">
                        <div data-role="fieldcontain">
                                <input name="base" id="basiswoord" placeholder="" value="<?PHP echo $suggestie;?>" type="text" />
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
                        <form action="basiswoord.php" method="POST">
                        De flexievorm <?PHP echo $flexievorm;?> is fout omdat deze
                        <div data-role="fieldcontain">
                                <input name="woord" id="id" placeholder="" value="<?PHP echo $id;?>" type="hidden" />
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
