<?php


    require_once 'connect.php';
    require_once 'header.php';

    $id = $_GET['id'];
    $querySelectById = "SELECT * FROM artikel WHERE id='$id'";
    $result = $connect->query($querySelectById);
    $row = $result->fetch_assoc(); 

    $id = $row['id'];
    $judul = $row['judul'];
    $kategori = $row['kategori'];
    $deskripsi = $row['deskripsi'];
    $status = $row['status'];
?>



<div class="container       ">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Article</h5>
                    <form class="row g-3 " action="" method="post">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="judul" value="<?=$judul?>" required=true class="form-control" placeholder="Insert Judul"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <input type="text" name="kategori" value="<?=$kategori?>" required=true class="form-control" placeholder="Insert Category"></textarea>
                        </div>
                        <div class="col-12">
                            <class="form-label">Description</label>
                            <textarea name="deskripsi" required=true id="editor" class="form-control" placeholder="Insert Description"><?=$deskripsi?></textarea>
                        </div>
                        <div class="col-12">
                            <class="form-label">Status</label>
                            <select name="status" class="form-select" required=true>
                                <option value="">Choose</option>
                                <option value="Publish"<?php if($status =="Publish") echo "selected";?>>Published</option>
                                <option value="Unpublish"<?php if($status =="Unpublish") echo "selected";?>>Unpublished</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <a href="index.php" class="btn btn-danger">Back</a>
                            <button type="submit" name="submit" class="btn btn-primary float-end">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];     
        $judul = $_POST ['judul'];
        $kategori = $_POST ['kategori'];
        $deskripsi = $_POST ['deskripsi'];
        $status = $_POST ['status'];

        $queryInsert = "UPDATE artikel SET judul='$judul',kategori='$kategori',deskripsi='$deskripsi',status='$status'
        WHERE id='$id' ";

            move_uploaded_file('$image_tmp','$image_name');

        if ($connect->query($queryInsert)) {
            echo "<script>
                alert('Success');
                window.location.href='index.php';
                </script>";
        }  
    };
?>

<?php
    require_once 'footer.php';
?>