<?php
  $seller = new SellersControl();
  $sellers = $seller->acceptDisplaySellers();
?>
<div class="uk-container uk-margin">
<div class="">
  <div class="uk-overflow-auto">
  <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
    <thead>
      <tr>
        <th class="uk-table-shrink"><h1 class="uk-heading">Sellers</h1> </th>
      </tr>
    </thead>
    <tbody>
<?php foreach ($sellers as $seller): ?>
      <tr>
        <td><a class="uk-link-reset" href="#"><?php echo ucwords($seller['username']); ?></a></td>
        <td><a href="store?store_id=<?php echo $seller['id']; ?>"><img class="uk-preserve-width uk-border-circle" src="images/avatar.jpg" width="40" alt=""></a> </td>
        <td class="uk-table-link">
        <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
        </td>
        <td class=""><a class="uk-button uk-button-default" href="store?store_id=<?php echo $seller['id']; ?>">View Store</a></td>
        <td class="uk-text-nowrap"><a class="uk-button uk-button-default" href="store?store_id=<?php echo $seller['id']; ?>">Contact Seller</a></td>
      </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
</div>
