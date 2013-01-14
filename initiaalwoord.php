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
    <body>
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="false">
                        <h3>
                            Initiaalwoorden vinden
                        </h3>
                        <p>... letterwoord (NAVO, havo) initiaalwoord (ANWB, tzt)</p>
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>ANWB</h3>
                        <p>... woorddetails </p>
                    </div>
                </div>
                        <form action="initiaalwoord.php" method="POST">
<div data-role="fieldcontain">
<input id="radio1" name="" value="" type="radio">
<label for="radio1">Initiaalwoord</label>
<input id="radio2" name="" value="" type="radio">
<label for="radio2">Letterwoord</label>
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
                        <div data-role="fieldcontain">
                                <input name="woord" id="woord" placeholder="" value="Nederlands" type="hidden" />
                                <textarea name="opmerking" id="opmerking" placeholder="" value="" type="textarea">Het woord ANWB </textarea>
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
