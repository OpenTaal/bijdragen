<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
                            Meervoud bijdragen
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
    <body OnLoad="document.bijdrage.meervoud.focus();">
        <!-- Home -->
        <div data-role="page" id="page1">
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="b">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Meervoud bijdragen
                        </h3>
                        <p>asdf éß</p><!--FIXME cjharset default charset apache-->
                                                    <a href="index.php" data-transition="fade">bijdragen</a>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>goederentreinwagon</h3>
                        <p>woorddetails</p>
                    </div>
                </div>
                <form name="bijdrage" action="meervoud.php" method="POST">
                        <div data-role="fieldcontain">
                                <input name="base" id="meervoud" placeholder="" value="goederentreinwagons" type="text" />
                        </div>
<div data-role="fieldcontain">
<input id="radio0" name="" value="" type="radio" checked>
<label for="radio0">Eén of meer meervoudsvormen, gescheiden door ;</label><!--TODO restore veld-->
<input id="radio1" name="" value="" type="radio">
<label for="radio1">Singulare tantum, niet-telbaar enkelvoud</label><!--TODO hide veld-->
<input id="radio2" name="" value="" type="radio">
<label for="radio2">Plurale tantum, niet-telbaar meervoud</label><!--TODO hide veld-->
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
                        <form action="meervoud.php" method="POST">
                        De meervoudsvorm <?PHP echo $woord;?> met id <?PHP echo $id;?> is fout omdat deze
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
