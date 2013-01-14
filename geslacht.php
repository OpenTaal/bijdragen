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
    <body>
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b" data-content-theme="b">
                    <div data-role="collapsible" data-collapsed="false">
                        <h3>
                            Geslacht bijdragen
                        </h3>
                        <p>asdf</p>
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                </div>
                <div data-role="collapsible-set" data-theme="b" data-content-theme="b">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>goederentreinwagon</h3>
                    </div>
                </div>
                <form action="geslacht.php" method="POST">
                <div class="ui-grid-a">
                    <div class="ui-block-a">
<div id="checkboxes1" data-role="fieldcontain">
<input id="checkbox1" name="" type="checkbox">
<label for="checkbox1">Mannelijk (de)</label>
<input id="checkbox2" name="" type="checkbox">
<label for="checkbox2">Vrouwelijk (de)</label>
</div>

                    </div>
                    <div class="ui-block-b">
<div id="checkboxes1" data-role="fieldcontain">
<input id="checkbox3" name="" type="checkbox">
<label for="checkbox3">Onzijdig (het)</label>
<input id="checkbox4" name="" type="checkbox">
<label for="checkbox4">Onbekend (Linux)</label><!--TODO deselecteer alle andere via javascript-->
</div>
                    </div>
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
                        <form action="geslacht.php" method="POST">
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
