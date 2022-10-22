<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $nohp = isset($_POST['nohp']) ? $_POST['nohp'] : '';
        $gmail = isset($_POST['gmail']) ? $_POST['gmail'] : '';
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE dim SET id = ?, nama = ?, nohp = ?, gmail = ?, alamat = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $nohp, $gmail, $alamat, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM dim WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="<?=$contact['id']?>" id="id">
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="no hp">No Hp</label>
        <label for="gmail">No. Telp</label>
        <input type="text" name="nohp" value="<?=$contact['nohp']?>" id="nohp">
        <input type="text" name="gmail" value="<?=$contact['gmail']?>" id="gmail">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="<?=$contact['alamat']?>" id="title">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>