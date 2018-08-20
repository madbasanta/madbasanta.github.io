<?php 

$donators = $app["database"]->selectRaw("SELECT sum(d.pay_amt) amt, users.name from donors as d left join users on d.user_id = users.id group by users.name");

if(count($donators))
	foreach($donators as $key => $d):
?>

        <div class="carousel-item <?= $key == 0 ? "active" : "" ?> mt-2" style="background: #f1f1f1;">
          <div class="bg-success p-2">	
          <h3 class="text-center text-white">
          	<?= $d->name  ?>
          </h3>
	          	<span class="d-block text-center text-white">Donation Made</span>
	          	<span class="d-block text-center h5 text-white">$ <?= $d->amt ?></span>
          </div>
        </div>

<?php 
	endforeach;
 ?>

