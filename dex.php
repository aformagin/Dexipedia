<!DOCTYPE html>
<html>
    <head>
        <!-- Meta information needs to go here-->
        <title>The Dex</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <!-- nav div -->
        <div>
            <nav>

            </nav>
        </div>
        <div class="shadow" style="max-width: max-content; margin-right: auto; margin-left: auto;">
            <div class="container-fluid form-group">
                <form action="pokemon.php" method="POST" style="padding: 10px;">
                    <table>
                        <tr>
                            <td>
                                <label class="form-control-plaintext">Pokemon Name: </label>
                            </td>
                            <td>
                                <input class="form-control" type="text" name="pname">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-control-plaintext">Pokemon ID: </label>
                            </td>
                            <td>
                                <input class="form-control" type="number" name="pid" min="1" max="898">
                            </td>
                        </tr>
                    </table>
                    <input class="btn btn-success" type="submit" value="Search Dex">
                </form>
            </div>
        </div>
    </body>
</html>