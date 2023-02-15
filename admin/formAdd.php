<?php
require_once 'connect.php';
require_once 'header.php';
?>

<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-tittle"> FORM ADD ARTIKEL</h5>
                    <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Judul</label>
                            <input type="text" name="Judul" class="form-control" required="true">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="Kategori" class="form-control" required="true">
                        </div>
                        <div class="col-12">
                            <label  class="form-label">Deskripsi</label>
                            <textarea type="text" name="Deskripsi" id="editor" class="form-control"  required="true"></textarea>
                        </div>
                        <div class="col-12">
                            <label  class="form-label">Status</label>
                            <select type="text" name="Status" class="form-select"  required="true">
                                <option value="">Choose</option>
                                <option value="Publish">Publish</option>
                                <option value="Unpublish">Unpublish</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">image</label>
                            <input type="file" name="filename" class="form-control">
                        </div>

                        <div class="col-12">
                           <button type="submit" name="submit" class="btn btn-primary mt-3 float-end" formnovalidate="formnovalidate">Submit</button>
                           <a href="index.php" class="btn btn-dark mt-3">Back</a> 
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    if (isset($_POST['submit'])) {
        $judul = $_POST['Judul'];
        $kategori = $_POST['Kategori'];
        $deskripsi = $_POST['Deskripsi'];
        $status = $_POST['Status'];

        $image_name = $_FILES['filename']['name'];
        $image_tmp = $_FILES['filename']['tmp_name'];


        $queryInsert = "INSERT INTO artikel(judul,kategori,deskripsi,status,filename)    
        VALUES ('$judul','$kategori','$deskripsi','$status','$image_name')";

            move_uploaded_file($image_tmp,$image_name);

            if ($connect->query($queryInsert)) {
                echo "
                    <script> alert('sukses');
                    window.location.href='index.php';
                    </script>
                ";
            }
            
    }
?>

<?php
require_once 'footer.php';
?>