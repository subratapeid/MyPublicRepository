<?php

    $bcaId = !empty($_SESSION['bcaId']) ? $_SESSION['bcaId'] : '';
    $bcaName = !empty($_SESSION['bcaName']) ? $_SESSION['bcaName'] : '';
    $auditNumber = !empty($_SESSION['auditNumber']) ? $_SESSION['auditNumber'] : '';
    $progress = 1;
if ($bcaId && $bcaName || $auditNumber) {
  // All variables are present and not empty
  // echo $bcaId;
  // echo $bcaName;
  // echo $auditNumber;
} else {
  // Redirect if any of the variables are missing or empty
  echo "<script>
          alert('Invalid Request.');
          window.location.href = '/bcaudit/audit-list.php';
        </script>";
  exit; // Ensure to stop further execution after redirection
}
?>