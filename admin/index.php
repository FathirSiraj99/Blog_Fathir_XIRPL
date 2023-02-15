<?php
require_once 'connect.php';
require_once 'header.php';
?>
<!-- Main html -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Status</th>
                        <th scope="col" colspan="2">Created Time</th>
                        <th scope="col" colspan="2">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $querySelect = "SELECT * FROM artikel";
                    $result = $connect->query($querySelect);
                    if ($result->num_rows > 0) :
                        while ($row = $result->fetch_assoc()) :
                    ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['judul'] ?></td>
                                <td><?= $row['kategori'] ?></td>
                                <td><?= $row['deskripsi'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['created_time'] ?></td>
                                <td><img src="<?=$row['filename']?> width="150px" height="150px"></td>
                                <td></td>
                                <td><a href="formEdit.php?id=<?=$row['id']?>" class="btn btn-primary fa-sharp fa-solid fa-pencil"></a></td>
                                <td><a href="delete.php?id=<?=$row['id']?>" class="btn btn-danger fa-solid fa-trash "></a></td>
                            </tr>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </tbody>
            </table>
            <a href="formAdd.php" class="btn btn-success float-end">Add</a> 
            <a href="deleteAll.php" class="btn btn-danger">Delete All</a> 
        </div>
    </div>
</div>


<?php
require_once 'footer.php';
?>