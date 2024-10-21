<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penduduk</title>
</head>

<body>
    <?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "latihan7b");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM penduduk";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1px'><tr>
            <th>Kecamatan</th>
            <th>ID</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Luas</th>
            <th>Jumlah Penduduk</th>
            <th>Action</th>"; // Menambahkan header untuk kolom aksi

        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["kecamatan"] . "</td>
                <td>" . $row["id"] . "</td>
                <td>" . $row["longitude"] . "</td>
                <td>" . $row["latitude"] . "</td>
                <td>" . $row["luas"] . "</td>
                <td align='right'>" . $row["jumlah_penduduk"] . "</td>
                <td>
                    <a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Delete</a>
                </td>
                </tr>"; 
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>

</html>
