<?php

include "koneksi.php";

if($_POST['idx']) {

    $id = $_POST['idx'];      

    $sql = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");

    while ($result = mysqli_fetch_array($sql)){
        $sql2 = mysqli_query($conn, "SELECT * FROM categories WHERE id = ".$result['category_id']);
        $result2 = mysqli_fetch_row($sql2);
        $id_kategori = $result2[0];
        $kategori = $result2[1];
        ?>

        <form action="php_action/edit.php" method="post">
            <input type="hidden" id="id" name="id" value="<?= $result['id']; ?>">
            <div class="form-group">
                <select class="form-control" id="kategori" name="kategori"">
                    <option value="<?= $id_kategori; ?>"><?= $kategori; ?></option>
                    <?php
                    $sql2 = "SELECT * FROM categories;";
                    $result2 = mysqli_query($conn, $sql2);
                    while($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                        <option value="<?= $row2['id']; ?>"><?= $row2['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="produk" name="produk" value="<?= $result['name']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="stok" name="stok" value="<?= $result['stok']; ?>">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $result['deskripsi']; ?></textarea>
            </div>
            <div class="form-group float-right">
                <button class="btn btn-warning" type="submit" name="edit">Edit</button>
            </div>
        </form>    

    <?php } }

    ?>
    <!-- plugins - jquery -->
    <!-- <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script> -->
    <script>
        function GetSalary(id) {
            if (id.length == 0) { 
                alert("Work ..");
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myArr = JSON.parse(this.responseText);
                        removeOptions(document.getElementById("salary2"));
                        set_salary(myArr);
                    }
                };
                xmlhttp.open("GET", "php_action/get_salary.php?id=" + id, true);
                xmlhttp.send();
            }
        }
        function set_salary(data) {
            for(var i = 0; i < data.length; i++) {
                $('#salary2').append(
                    $("<option></option>").text(data[i].nama).val(data[i].id)
                    );
            }
        }
        function removeOptions(selectbox){
            var i;
            for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
            {
                selectbox.remove(i);
            }
        }
    </script>