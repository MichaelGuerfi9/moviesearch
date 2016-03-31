<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MovieSearch</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="./js/jquery-2.2.0.min.js"></script>
    <script src="./js/script.js">
    </script>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="well">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="titleInput" class="col-sm-2 control-label">Titre</label>
                    <div class="col-sm-10">
                        <input name="title" type="text" class="form-control" id="titleInput"
                               placeholder="Titre du film">
                    </div>
                </div>
                <div class="form-group">
                    <label for="directorInput" class="col-sm-2 control-label">Producer</label>
                    <div class="col-sm-10">
                        <input name="producer" type="text" class="form-control" id="producer" placeholder="Producer">
                    </div>
                    <br><br><br><label for="gender" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-1">
                        <select name="gender" class="form-control" id="gender">
                            <option value="">Tous</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <label for="duration" class="col-sm-2 control-label">Duration</label>
                    <div class="col-sm-1">
                        <select name="duration" class="form-control" id="duration">
                            <option value="All">Tous</option>
                            <option value="1">Moins d'une heure</option>
                            <option value="2">Entre 1h et 1h30</option>
                            <option value="3">Entre 1h30 et 2h30</option>
                            <option value="4">Plus de 2h30</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Année</label>
                    <div class="col-sm-1">
                        Entre
                    </div>
                    <div class="col-sm-1">
                        <input name="year_start" type="text" class="form-control" id="titleInput" placeholder="start">
                    </div>
                    <div class="col-sm-1">
                        Et
                    </div>
                    <div class="col-sm-1">
                        <input name="year_end" type="text" class="form-control" id="titleInput" placeholder="end">
                    </div>
                </div>
                <div class="form-group"><br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Chercher</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="results">
</div>

</body>
</html>
