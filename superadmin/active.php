<?php
include "connection.php";
$id = $_GET["id"];
mysqli_query($link,"update teacher_registration set isjury='1' WHERE id=$id");

?>
<script type="text/javascript">
    window.location="display_teachers_info.php";
</script>
