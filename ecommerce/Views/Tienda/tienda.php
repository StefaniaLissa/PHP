<?php 
headerTienda($data);
$arrProductos = $data['productos'];
 ?>
<br><br><br>
<hr>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<h3><?= $data['page_title']; ?></h3>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						&nbsp;&nbsp;
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Categoría &nbsp;
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
			<?php 
				for ($p=0; $p < count($arrProductos); $p++) { 
					$ruta = $arrProductos[$p]['ruta'];
					if(count($arrProductos[$p]['images']) > 0 ){
						$portada = $arrProductos[$p]['images'][0]['url_image'];
					}else{
						$portada = media().'/images/uploads/product.png';
					}
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?= $portada ?>" alt="<?= $arrProductos[$p]['nombre'] ?>">
							<a href="<?= base_url().'/tienda/producto/'.$arrProductos[$p]['idproducto'].'/'.$ruta; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Ver producto
							</a>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?= base_url().'/tienda/producto/'.$arrProductos[$p]['idproducto'].'/'.$ruta; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $arrProductos[$p]['nombre'] ?>
								</a>
								<span class="stext-105 cl3">
									<?= SMONEY.formatMoney($arrProductos[$p]['precio']); ?>
								</span>
							</div>
							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="<?= base_url().'/tienda/producto/'.$arrProductos[$p]['nombre']; ?>" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="<?= media() ?>/tienda/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?= media() ?>/tienda/images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
<?php 
	footerTienda($data);
?>