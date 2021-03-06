<!DOCTYPE html>
<html lang="it" ng-app="bookcoverApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Crea un PDF con le base per una copertina">
        <meta name="keywords" content="PDF, base, linee, copertina, cover, lines, export, margin, template">
        <meta name="author" content="Emilie Rollandin">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Copertina libro</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Personalizzazione -->
        <link href="css/mioTema.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
        <script src="js/script.js"></script>
        <script src="js/validazione.js"></script>
    </head>
    <body role="document" ng-controller="mainController">
        <div class="container theme-showcase" role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <h1>BASE COPERTINA</h1>
                <p>Vengono create le linee base della copertina su di un file PDF</p>
            </div>
            <div class="alert alert-success" role="alert">Il file si pu&ograve; aprire per modifiche con Adobe Illustrator, Photoshop o Inkscape</div>
            <form class="form-horizontal" name="formDati" action="exportPDF.php" method="get" onsubmit="return validazione()">

                <div class="page-header">
                    <h1>Seleziona il tipo di copertina</h1>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="tipologia" id="senzaAlette" ng-value="0" ng-model="tipologia.selezionato" checked>
                                Copertina senza alette/bandelle
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="tipologia" id="conAlette" ng-value="1" ng-model="tipologia.selezionato">
                                Copertina con alette/bandelle
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-8">
                        <img src="{{immagine}}" class="img-responsive" alt="Copertina senza alette">
                    </div>
                </div>

                <div class="page-header">
                    <h1>Dimensioni</h1>
                </div>

                <div class="form-group">
                    <label for="inputLarghezza" class="col-sm-2 control-label">Larghezza pagina</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" name="larghezza" class="form-control" id="inputLarghezza" placeholder="Larghezza in mm" min="0" max="2000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAltezza" class="col-sm-2 control-label">Altezza pagina</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" name="altezza" class="form-control" id="inputAltezza" placeholder="Altezza in mm" min="0" max="2000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputLarghezzaDorso" class="col-sm-2 control-label">Larghezza dorso</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" name="dorso" class="form-control" id="inputLarghezzaDorso" placeholder="Larghezza dorso/costa in mm" min="0" max="2000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAbbondanza" class="col-sm-2 control-label">Abbondanza</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" name="abbondanza" class="form-control" id="inputAbbondanza" placeholder="Abbondanza in mm" min="0" max="2000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTaglio" class="col-sm-2 control-label">Segni di taglio</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" name="taglio" class="form-control" id="inputTaglio" placeholder="Lunghezza segni di taglio in mm" min="0" max="2000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMargineInterno" class="col-sm-2 control-label">Margine interno</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" name="margineInterno" class="form-control" id="inputMargineInterno" placeholder="Margine interno in mm" min="0" max="2000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAletta" class="col-sm-2 control-label">Larghezza alette</label>
                    <div class="col-sm-10">
                        <input type="number" step="any" name="aletta" class="form-control" id="inputAletta" placeholder="Larghezza aletta/bandella in mm (0 se non ci sono)" min="0" max="2000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputISBN" class="col-sm-2 control-label">ISBN</br><small>Es. 9788897192602</small></label>
                    <div class="col-sm-10">
                        <input type="text" name="ISBN" class="form-control" id="inputISBN" placeholder="ISBN - EAN 13">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input name="stampaInfo" type="checkbox"> Stampa le informazioni di riepilogo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-block btn-lg"> CREA IL PDF</button></br>
                        <div class="alert alert-warning" role="alert"><strong>RICORDARSI</strong> prima di mandare in stampa di cancellare tutte le linee superflue e di lasciare solo i segni di taglio</div>
                        <h3>Copertine create: <?php require('SQLconta.php'); SQLconta(); ?></h3>
                    </div>
                </div>
            </form>

            <div class="table-responsive" id="Tabella">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipologia</th>
                            <th>Larghezza</th>
                            <th>Altezza</th>
                            <th>Dorso</th>
                            <th>Abbondanza</th>
                            <th>Taglio</th>
                            <th>Alette</th>
                            <th>ISBN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Visualizza lista ultime 10 copertine
                        require('SQLvisualizza.php');
                        SQLvisualizza();
                        ?>
                    </tbody>
                </table>
            </div>

            </br>
        </div> <!-- Fine div container -->

        <footer class="footer">
            <div class="container">
                <p class="text-muted text-center">Studio Archistico di Rollandin Emilie</p>
            </div>
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
