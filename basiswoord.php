<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
        </title>
        <!--link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.mobile/1.2.0/jquery.mobile-1.2.0.min.css" /-->
        <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet" href="my.css" />
        <style>
            /* App custom styles */
        </style>
        <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"-->
        <script src="jquery.min.js">
        </script>
        <!--script src="https://ajax.aspnetcdn.com/ajax/jquery.mobile/1.2.0/jquery.mobile-1.2.0.min.js"-->
        <script src="jquery.mobile-1.2.0.min.js">
        </script>
        <script src="my.js">
        </script>
    </head>
    <body OnLoad="document.bijdrage.basiswoord.focus();">
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b" data-content-theme="b">
                    <div data-role="collapsible" data-collapsed="false">
                        <h3>
                            Basiswoorden bijdragen
                        </h3>
                        <p>asdf</p>
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                </div>
                <div data-role="collapsible-set" data-theme="b" data-content-theme="b">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>goederentreinwagons</h3>
                        <p>woorddetails</p>
                    </div>
                </div>
                <form name="bijdrage" action="basiswoord.php" method="POST">
                        <div data-role="fieldcontain">
                                <input name="base" id="basiswoord" placeholder="" value="goederentreinwagon" type="text" />
                        </div>
                <div class="ui-grid-b">
                    <div class="ui-block-a">
                    </div>
                    <div class="ui-block-b">
                        <input data-theme="b" value="Sla over" type="submit" />
                    </div>
                    <div class="ui-block-c">
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
                        <div data-role="fieldcontain">
                                <input name="woord" id="woord" placeholder="" value="Nederlands" type="hidden" />
                                <textarea name="opmerking" id="opmerking" placeholder="" value="" type="textarea"></textarea>
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
