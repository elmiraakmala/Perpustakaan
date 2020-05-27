<?php


$servername = "localhost";

$username = "root";

$password = "";

$dbname = "tokobuku";



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}



$sql = "SELECT buku, idpenerbit, MIN(stok) as stok FROM buku";

$result = $conn->query($sql);

// echo "<a href='http://localhost/unibookstore/addpenerbit.php'><button>Tambah Penerbit</button></a>";
// echo "<a href='http://localhost/unibookstore/adminbuku.php'><button>Tampilan Buku</button></a>";
if ($result->num_rows > 0) {

    // output data of each row

    echo "<table border=1 style='width:60%';>";

    echo "<th>judul nama</th>";
    echo "<th>nama penerbit</th>";
    echo "<th>Stok</th>";
    

    while($row = $result->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" . $row["buku"]."</td>";
        echo "<td>" . $row["idpenerbit"]."</td>";
        echo "<td>" . $row["stok"]."</td>";
        

        echo "</tr>";

    }

    echo "</table>";

} else {

    echo "0 results";

}

$conn->close();
?>
