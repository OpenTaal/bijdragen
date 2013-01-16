<?PHP
require_once '../include/db_connectTweak.php';
db_connect("light");
require_once '../include/lib.php';
require_once '../include/top.php';
require_once '../i_lib.php';
mysql_set_charset('utf8');

$query="select id,word,alternatief,next_version,woordtype,aantekeningen from words_list WHERE (next_version = 'x' or next_version = 'X') limit 1000";
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
    <body OnLoad="document.bijdrage.correctie.focus();">
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Correctie bijdragen
                        </h3>
                        <p>asdf</p>
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3><?PHP echo $fout;?></h3>
                        <strong>status:</strong> <?PHP echo $woordstatus;?>
			<?PHP if (strcmp($woordtype, '')) {echo ' <strong>type:</strong> '.$woordtype;}?>
			<?PHP if (strcmp($aantekeningen, '')) {echo ' <strong>aantekening:</strong> '.$aantekeningen;}?>
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
                        <form action="correctie.php" method="POST">
                        <div data-role="fieldcontain">
                                <input name="woord" id="woord" placeholder="" value="Nederlands" type="hidden" />
                                <textarea name="opmerking" id="opmerking" placeholder="" value="" type="textarea">De fout goederentreinwagno </textarea>
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
