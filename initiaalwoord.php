<?PHP
require_once '../include/db_connectTweak.php';
db_connect("light");
require_once '../include/lib.php';
require_once '../include/top.php';
require_once '../i_lib.php';
mysql_set_charset('utf8');

$query="select id,word,next_version,woordtype,aantekeningen from words_list where (next_version = 'b' or next_version = 'B' or next_version = 'k' or next_version = 'K' or next_version = 'v' or next_version = 'V' or next_version = 'w' or next_version = 'W' or next_version = 'd' or next_version = 'D') and word rlike '^[ÅÇÑA-Z0-9]{2,}$' limit 1024";
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
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Initiaalwoorden vinden
                        </h3>
                        <p>... letterwoord (NAVO, havo) initiaalwoord (ANWB, tzt) mengvorm XS4ALL </p>
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3><?PHP echo $woord;?></h3>
                        status: <?PHP echo $woordstatus;?>
			<?PHP if (strcmp($woordtype, '')) {echo ' type: '.$woordtype;}?>
			<?PHP if (strcmp($aantekeningen, '')) {echo ' aantekening: '.$aantekeningen;}?>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="https://nl.wikipedia.org/wiki/<?PHP echo $woord;?>"><img src="images/wikipedia.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href="https://nl.wiktionary.org/wiki/<?PHP echo $flexievorm;?>"><img src="images/wiktionary.png"></a>
                        &nbsp;&nbsp;&nbsp;<a target="_blank" href='https://google.nl/#hl=nl&q="<?PHP echo $woord;?>"'><img src="images/google.png"></a>
                    </div>
                </div>
                        <form action="initiaalwoord.php" method="POST">
<div data-role="fieldcontain">
<input id="radio1" name="" value="" type="radio">
<label for="radio1">Initiaalwoord</label>
<input id="radio2" name="" value="" type="radio">
<label for="radio2">Mengvorm</label>
<input id="radio3" name="" value="" type="radio">
<label for="radio3">Letterwoord</label>
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
