<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $nohp = isset($_POST['nohp']) ? $_POST['nohp'] : '';
    $gmail = isset($_POST['gmail']) ? $_POST['gmail'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';

    $stmt = $pdo->prepare('INSERT INTO dim VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $nohp, $gmail, $alamat]);

    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="id">Id</label>
        <label for="nama">Nama</label>
        <input type="text" name="id" value="auto" id="id">
        <input type="text" name="nama" id="nama">
        <label for="nohp">No Hp</label>
        <label for="gmail">gmail</label>
        <input type="text" name="nohp" id="nohp">
        <input type="text" name="gmail" id="gmail">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>