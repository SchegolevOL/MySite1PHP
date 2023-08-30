<ul class="nav nav-pills mt-2 m-lg-2">
    <li class="nav-item">
        <a class="nav-link
        <?= isset($_GET['page']) ? ($_GET['page'] == '1') ? 'active' : '' : 'active' ?>"
                href="index.php?page=1" id="home">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link
        <?= isset($_GET['page']) ? $_GET['page'] == '2' ? isset($_SESSION['user'])? 'active' : 'disabled' : '':'' ?>"
           href="index.php?page=2">Upload</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= isset($_GET['page']) ? $_GET['page'] == '3' ? isset($_SESSION['user'])? 'active' : 'disabled' : '':'' ?>"
           href="index.php?page=3">Gallery</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link <?= isset($_GET['page']) ? $_GET['page'] == '4' ? 'active' : '' : '' ?>"
           href="index.php?page=4">Registration</a>
    </li>
</ul>
