<?php 
    /* Cek apakah tombol login sudah ditekan atau belum */
    if (isset($_POST["login"])){
        
        /* Menamngkap Data  */
        $username = $_POST["username"];
        $password = $_POST["password"];

        /* Menghubungkan ke database */
        require  "../connection.php";


        /* Cek apakah ada username ditabase dengan username yang diinputkan */
        $qry_login=mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");

        /* Cek username */
        if(mysqli_num_rows($qry_login) > 0){
            /* Jalankan session */
            session_start();
        
             /* 
            mysqli_num_row : ada berapa baris dari fungsi SELECT. jika hasil = 1 cek password dibawah
            */

            /* Cek Password */
            /* Mengambil isi database */
            $dt_login=mysqli_fetch_assoc($qry_login);

            /* Menyamakan data */
            $_SESSION["id_petugas"]=$dt_login["id_petugas"];
            $_SESSION["nama_petugas"]=$dt_login["nama_petugas"];
            $_SESSION["username"]=$dt_login["username"];
            $_SESSION["alamat"]=$dt_login["alamat"];
            $_SESSION["telp"]=$dt_login["telp"];
            $_SESSION["role"]=$dt_login["role"];
            $_SESSION["status_login_admin"] = true;
            header("location: data_penjualan.php");
        } else{
            echo "<script>alert('username dan password tidak benar'); location.href='login.php';</script>";
    
        }
    }
    
?>