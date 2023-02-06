<!DOCTYPE html>
<html>
<head>
  <title>Conexión a la base de datos</title>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 15px;
      text-align: left;
    }
  </style>
</head>
<body>
  <?php
    // Datos de conexión a la base de datos
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "usuario";
    
    // Crea la conexión
    $conn = mysqli_connect($host, $user, $password, $dbname);
    
    // Verifica la conexión
    if (!$conn) {
      die("Conexión fallida: " . mysqli_connect_error());
    }
    echo "Conexión exitosa";
    
    // Ejecuta la consulta SQL
    $sql = "SELECT nombre, apellido FROM usuario";
    $result = mysqli_query($conn, $sql);
    
    // Verifica si la consulta ha devuelto algún resultado
    if (mysqli_num_rows($result) > 0) {
      echo "<table><tr><th>Nombre</th><th>Apellido</th></tr>";
      // Imprime los resultados en una tabla
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["apellido"] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "No se han encontrado resultados";
    }
    
    // Cierra la conexión
    mysqli_close($conn);
  ?>
</body>
</html>
