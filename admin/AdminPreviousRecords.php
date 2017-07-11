<!DOCTYPE html>
<html>
<head>
    <title>Previous Record Page</title>
    <link rel = "stylesheet" href ="../member/css/Search%20Book.css"/>
    <link rel = "stylesheet" href ="../member/css/Search%20Book%20Result.css"/>
    <link rel = "stylesheet" href ="css/ViewCatalog.css"/>

</head>
<body>
<header>
    <div class="head_top"><img class="siyanelogo" src="images/siyane_logo.jpg">
        <div class="logo_name">
            <h1>LIBRARY</h1>
            <h3>Siyane National College Of Education<br />Veyangoda</h3>
        </div>
    </div>
    <div class="bgimage">
        <nav>
            <ul>
                <li><a href="Member Page.php">HOME</a></li>
                <li class="logout"><a href="../index.php">LOGOUT</a></li>
            </ul>
        </nav>
    </div>
</header>

<div>
    <form action="ViewCatalog.php" method="post">
        <div class="searchbar">
            <input class="searchtext"  type="search" name="Search" placeholder="Search..">
            <button class="submit_3" type="submit" name="search">Search</button>
        </div>
        <div class="option">
            <input class="radioBtn" type="radio" name="searchOption" value="author" required/>Search by Author
            <input class="radioBtn" type="radio" name="searchOption" value="title" required/>Search by Title<br/>
            <input class="radioBtn" type="radio" name="searchOption" value="isbn" required/>Search by ISBN<br/>

        </div>
    </form>

</div>

<?php
include("../database.php");
include("../table.php");
include("../book.php");
include("../book_session.php");
$dbObj=database::getInstance();
$dbObj->connect('localhost','root','','lms_db');

$bk_sess = new book_session();
$sql = "Select id,book_title,date_of_borrowal,date_to_be_returned,date_of_return from book_sessions where member_id = 1 ";

$result = $bk_sess->featuredLoad($dbObj,$sql);
$numOfRows = mysqli_num_rows($result);


?>
<?php if(!$result){ echo "No records found";}
else{ ?>
    <div style="overflow:auto;" class="addminprevRcd">
        <table style="width:100%">
            <caption>Previous Records</caption>
            <tr>
                <th>No:</th>
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Date of Borrowal</th>
                <th>Date to be Returned</th>
                <th>Date of Return</th>
            </tr>

            <?php
            for($i=0;$i<$numOfRows;$i++){?>
            <tr>
                <td><?php echo ($i+1)."." ?></td><?php
                foreach (mysqli_fetch_assoc($result) as $key=>$value) {
                    ?>
                    <td><?php echo $value ;?></td>
                <?php } echo "<br />";}?></tr>


        </table>
    </div>
<?php }?>
</body>
</html>



