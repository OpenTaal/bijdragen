<?PHP
require_once '../include/db_connectTweak.php';
db_connect("light");
require_once '../include/lib.php';
require_once '../include/top.php';
require_once '../i_lib.php';
mysql_set_charset('utf8');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
                            Beheer
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
                    <div data-role="collapsible" data-collapsed="false">
                        <h3>
                            Beheer
                        </h3>
                        TODO
                    </div>
                </div>
Hieronder staan alle testen die momenteel in onze database zitten. Deze testen moeten door elke gebruiker 100% correct worden gedaan alvorens ze echt bijdragen mogen gaan leveren. Standaard foucodes zijn: FOUT_WANT_MOET_ZIJN_BASISVORM, ..., ..., ... Dit moeten opties zijn in het foutformulier (TODO)
<?PHP
$query="select * from mobile_type";
$result = mysql_query($query) or die (mysql_error());
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
//echo $row['type_id'].'<br>';
echo "<h3>".$row['description']." (type_id=".$row['type_id'].")</h3>\n";
echo "<table border='1'>\n";
echo "<tr><th>woord id</th><th>woord</th><th>suggestie(s)</th></tr>\n";
$query2="select wl.id,wl.word,mt.suggestion from mobile_tests as mt left join words_list as wl on (mt.word_id = wl.id) where mt.type_id = ".$row['type_id']." and wl.id = mt.word_id";
$result2 = mysql_query($query2) or die (mysql_error());
while ($row2=mysql_fetch_array($result2, MYSQL_ASSOC)) {
echo "<tr><td>".$row2['id']."</td><td>".$row2['word']."</td><td>".$row2['suggestion']."</td></tr>\n";
}
echo "</table>\n";
}
?>
            </div>
        </div>
        <script>
            //App custom javascript
        </script>
    </body>
</html>
