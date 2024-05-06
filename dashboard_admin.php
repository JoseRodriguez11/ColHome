<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    <title>Dashboard</title>
</head>

<body>
    <header>
        <div class="menu">
            <a href="#" class="logo">COLHOME</a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="imgs/menu.png" class="menu-icono" alt="">
            </label>

            <a class="btn-login" href="index.html">ir a la pagina</a>
        </div>

    </header>

    <main>


        <div class="title-section">
            <div class="title-content">
                <h2>Administración De Inmuebles </h2>
                <hr>
            </div>
        </div>
        <a class="btn btn-agregar" href="#">Agregar </a>

        <div class="container-dashboard container">
           
            <table >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Categoia</th>
                        <th>Ciudad</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Accion</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Casa</td>
                        <td>Popayan </td>
                        <td>5 Habitacione 3 Baños </td>
                        <td>600.000.000</td>
                        <td>
                            <a class="btn-dasboard btn-editar" href="#">Editar</a>
                            <a class="btn-dasboard btn-eliminar" href="#">Eliminar</a>
                        </td>
                    </tr>

                </tbody>

                <tbody>
                    <tr>
                        <td>2</td>
                        <td>Casa</td>
                        <td>Popayan </td>
                        <td>5 Habitacione 3 Baños </td>
                        <td>600.000.000</td>
                        <td>
                            <a class="btn-dasboard btn-editar" href="#">Editar</a>
                            <a class="btn-dasboard btn-eliminar" href="#">Eliminar</a>
                        </td>
                    </tr>

                </tbody>
                
                <tbody>
                    <tr>
                        <td>3</td>
                        <td>Casa</td>
                        <td>Popayan </td>
                        <td>5 Habitacione 3 Baños </td>
                        <td>600.000.000</td>
                        <td>
                            <a class="btn-dasboard btn-editar" href="#">Editar</a>
                            <a class="btn-dasboard btn-eliminar" href="#">Eliminar</a>
                        </td>
                    </tr>

                </tbody>
                <tbody>
                    <tr>
                        <td>4</td>
                        <td>Casa</td>
                        <td>Popayan </td>
                        <td>5 Habitacione 3 Baños </td>
                        <td>600.000.000</td>
                        <td>
                            <a class="btn-dasboard btn-editar" href="#">Editar</a>
                            <a class="btn-dasboard btn-eliminar" href="#">Eliminar</a>
                        </td>
                    </tr>

                </tbody>

            </table>


        </div>

    </main>

</body>

</html>