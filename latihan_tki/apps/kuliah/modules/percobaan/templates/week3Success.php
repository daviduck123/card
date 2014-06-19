<ul>
    <?php foreach ($kat as $kategori) : ?>
    <li><?php
    $ceta="";
    $tamp=$kategori->getDeskripsi();
    for($x=0;$x<strlen($tamp);$x++)
    {
        if($tamp[$x]%2!=0)
        {
            $ceta="ya";
        }
    }
    if($ceta=="ya"){echo $kategori->getId() .'deskripsi:'.$kategori->getDeskripsi();}?></li>
    <?php endforeach; ?>
