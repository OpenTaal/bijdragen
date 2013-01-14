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
                            Eigennaam categoriseren
                        </h3>
                        <p>asdf</p>
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>Nederlands</h3>
                    </div>
                </div>
                <form action="eigennaam.php" method="POST">
                <div class="ui-grid-b">
                    <div class="ui-block-a">
<div id="checkboxes1" data-role="fieldcontain">
<input id="checkbox1" name="" type="checkbox">
<label for="checkbox1">Voornaam, M en/of V</label>
<!--input id="checkbox2" name="" type="checkbox">
<label for="checkbox2">Tussenvoegsel, voorvoegsel</label-->
<input id="checkbox3" name="" type="checkbox">
<label for="checkbox3">Achternaam, meisjesnaam</label>
<input id="checkbox4" name="" type="checkbox">
<label for="checkbox4">Volledige naam</label>
<input id="checkbox0" name="" type="checkbox">
<label for="checkbox0">Fictief (Spiderman)</label>
<input id="checkboxr" name="" type="checkbox">
<label for="checkboxr">Genitief, bezittelijk</label>
</div>
                    </div>
                    <div class="ui-block-b">
<div id="checkboxes2" data-role="fieldcontain">
<input id="checkbox5" name="" type="checkbox">
<label for="checkbox5">Instantie, overheid</label>
<input id="checkbox6" name="" type="checkbox">
<label for="checkbox6">Non-profit, community</label>
<input id="checkbox7" name="" type="checkbox">
<label for="checkbox7">Bedrijf, handelsnaam</label>
<input id="checkbox8" name="" type="checkbox">
<label for="checkbox8">Product, merk, type</label>
<input id="checkboxz" name="" type="checkbox">
<label for="checkboxz">Geen eigennaam</label><!--TODO deselecteer alle andere via javascript-->
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
                        <div data-role="fieldcontain">
                                <input name="woord" id="woord" placeholder="" value="Nederlands" type="hidden" />
                                <textarea name="opmerking" id="opmerking" placeholder="" value="" type="textarea">De eigennaam Nederlands </textarea>
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
