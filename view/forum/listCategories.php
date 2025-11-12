<?php
    global $result;
    $categories = $result["data"]["categories"];

    use App\Session as Session;

?>

    <h1>Liste des Catégories</h1>

<?php

    if( Session::isAdmin() ) {

        echo '
<div class="container text-center">
  <div class="row">
    <div class="col">
      <section>';
        foreach( $categories as $category ) {
            echo '<div class="text-center padd">
        <a href="index.php?ctrl=forum&action=findTopicByCat&id=' . $category->getId() . '">' . $category->getName() . '</a></div>';
        }
        echo '
    </section>
    </div>
  </div>
</div>';

        include_once( "addCategory.php" );

    } else if( Session::getUser() ) {
        echo '
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <section>';
        foreach( $categories as $category ) {
            echo '<div class="text-center padd">
          <a href="index.php?ctrl=forum&action=findTopicByCat&id=' . $category->getId() . '">' . $category->getName() . '</a></div>';
        }
        echo '
      </section>
      </div>
    </div>
  </div>';

    } else {
        echo '
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <section>';
        foreach( $categories as $category ) {
            echo '<div class="text-center padd">
          <a href="index.php?ctrl=forum&action=findTopicByCat&id=' . $category->getId() . '">' . $category->getName() . '</a></div>';
        }
        echo '
      </section>
      </div>
    </div>
  </div>';
    }