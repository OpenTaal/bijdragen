<?PHP
require_once '../include/db_connectTweak.php';
db_connect("light");
require_once '../include/lib.php';
require_once '../include/top.php';
require_once '../i_lib.php';
mysql_set_charset('utf8');

$query="SELECT suggested,correct,incorrect,show_help,completed_test FROM mobile_score WHERE user_id = 3";
$suggested = '0';
$correct = '0';
$incorrect = '0';
$show_help = '1';
$completed_test = '0';
$result = mysql_query($query) or die (mysql_error());
while ($row=mysql_fetch_array($result, MYSQL_ASSOC)) {
//FIXME accumulate scores
  $suggested = $row['suggested'];
  $correct = $row['correct'];
  $incorrect = $row['incorrect'];
  $show_help = $row['show_help'];
  $completed_test = $row['completed_test'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
                            Bijdragen
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
                            Bijdragen
                        </h3>
                        <p>asdf</p>
                    </div>
                </div>
ingediend: <?PHP echo $suggested;?><br>
uiteindelijk correct: <?PHP echo $correct;?><br>
uiteindelijk incorrect: <?PHP echo $incorrect;?><br>
toon help: <?PHP echo $show_help;?><br>
test afgerond: <?PHP echo $completed_test;?><br>
                <h3><a href="basiswoord.php" data-transition="fade">basiswoord</a></h3>
                <h3><a href="correctie.php" data-transition="fade">correctie</a></h3>
                <h3><a href="afkorting.php" data-transition="fade">afkorting</a></h3>
                <h3><a href="meervoud.php" data-transition="fade">meervoud</a></h3>
                <h3><a href="eigennaam.php" data-transition="fade">eigennaam</a></h3>
                <h3><a href="geslacht.php" data-transition="fade">geslacht</a> (moeilijk)</h3>
in- en uitloggen
            </div>
        </div>
        <script>
            //App custom javascript
        </script>
    </body>
</html>
