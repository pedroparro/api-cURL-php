<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API CURL PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>API cURL PHP</h2>
    <!--table-->
    <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">NOME</th>
                <th scope="col">ALTURA</th>
                <th scope="col">ANO NASCIMENTO</th>
                <th scope="col">SEXO</th>
                <th scope="col">COR DOS OLHOS</th>
                <th scope="col">FILMES</th>
                </tr>
            </thead>
            <tbody>
                 <!--php-->
                    <?php 
                        //url swapi
                        $url = "https://swapi.dev/api/people/";
                        // inicia o curl
                        $ch = curl_init($url);
                        // converte em array - 'true' não deixa em uma string única
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        // curl ssl - string única
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        //tipo de requisição GET (opcional, funciona mesmo sem essa linha de código)
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                        // executa o curl e decodifica os dados em json_decode
                        $result = json_decode(curl_exec($ch));

                        // foreach 1 - lendo os resultados
                        foreach ($result->results as $people) {

                            // posições name, height, birth_year, gender, eye_color
                            $people->name;
                            $people->height;
                            $people->birth_year;
                            $people->gender;
                            $people->eye_color;

                            // foreach 2 - lendo os resultados posição films
                            foreach ($people->films as $film) {

                            $film;
                    ?>
                <tr>
                <th scope="row"><?php echo $people->name; ?></th>
                <td><?php echo $people->height; ?></td>
                <td><?php echo $people->birth_year; ?></td>
                <td><?php echo $people->gender; ?></td>
                <td><?php echo $people->eye_color; ?></td>
                <td><?php echo $film; ?></td>
                </tr>
                <!--end foreach people-->
                <?php } ?>
                <!--end foreach film-->
                    <?php } ?>
            </tbody>
  
    </table>
</body>
</html>