<?php
  require_once('authorize.php');
  require_once('appvars.php');
  require_once('connectvars.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // retrieve the score data from MYSQL
  $query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting is as html
  echo '<table>';
  echo '<tr><th>Name</th><th>Date</th><th>Score</th><th>Action</th></tr>';
  while ($row = mysqli_fetch_array($data))
  {
    echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['score'] . '</td>';
    echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
          '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] . '&amp;screenshot=' .
          $row['screenshot'] . '">Remove</a>';
    // Checks to see if score is unapproved.
    if ($row['approved'] == '0')
    {
      // If so, generate the approve link
      echo ' / <a href="approvescore.php?id=' . $row['id'] . '&amp;date='.
      $row['date'] . '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] .
      '&amp;screenshot=' . $row['screenshot'] . '">Approve</a>';
    }
  echo '</td></tr>';
  }
  echo '</table>';

  mysqli_close($dbc);

?>
