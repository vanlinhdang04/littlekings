<?php
include('class/sanpham.class.php');
class ShopSingle extends SanPham{
	public $id;
	public function __construct($id){
		parent::__construct();
		$this->id=$id;
	}
	public function productdetails(){
		$sql="SELECT * From products WHERE Status=1 AND ID='$this->id'";
		
		SanPham::select($sql);
		while($row=SanPham::fetch_array_table()){
			$image=explode(",,",$row['ImageList']);
			$str='<div class="col-md-6">';
			$str.='<img src="images/products/'.$row["Image"].'" width="320px" height="480px" alt="Image" class="img-fluid float-right mr-5" id="imageshow">';
			$str.='<div class="ml-5">';
			$str.='<img src="images/products/'.$row["Image"].'" width="70px" height="60px" class="mt-3 mr-1 ml-3" name="image">';
			for($i=0;$i<count($image);$i++){
				$str.='<img src="images/products/'.$image[$i].'" width="70px" height="60px" style="opacity:0.7" class="mt-3 mr-1 ml-3" name="image">';
			}
			$str.='</div>
          </div>';
			$str.='<div class="col-md-6">';
			$str.='<h2 class="text-black">'.$row["Name"].'</h2>';
			$str.='<p>'.$row["Description"].'</p>';
			$str.='<p><strong class="text-primary h4">PRICE : $'.$row["Price"].'</strong></p>';
			$str.='<div class="mb-1 d-flex">';
			// $str.='<label for="option-sm" class="d-flex mr-3 mb-3">
   //              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes" value="s"></span> <span class="d-inline-block text-black">Small</span>
   //            </label>
   //            <label for="option-md" class="d-flex mr-3 mb-3">
   //              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes" value="m"></span> <span class="d-inline-block text-black">Medium</span>
   //            </label>
   //            <label for="option-lg" class="d-flex mr-3 mb-3">
   //              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes" value="l"></span> <span class="d-inline-block text-black">Large</span>
   //            </label>
   //            <label for="option-xl" class="d-flex mr-3 mb-3">
   //              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes" value="xl"></span> <span class="d-inline-block text-black"> Extra Large</span>
   //            </label>';
			$str.='</div>';
			$str.='<div class="mb-5">';
			$str.='<div class="input-group mb-3" style="max-width: 120px;">';
			$str.='<div class="input-group-prepend">';
			$str.='<button class="btn btn-outline-primary " type="button" id="minus">&minus;</button>';
			$str.='</div>';
			$str.='<input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" id="sl" max='.$row["Amount"].' readonly>';
			$str.='<div class="input-group-append">
                <button class="btn btn-outline-primary " type="button" id="plus">&plus;</button>
              </div>';
			$str.='</div>';
			$str.='<div>Amount available : '.$row["Amount"].'</div>';
			$str.='</div>';
			if($row['Amount']==0){
				$str.='<p><a class="buy-now btn btn-sm btn-default" style="color:black" disable>Sold out</a></p>';
			}else{
				$str.='<p id="addCart" title="'.$row["ID"].'"><a class="buy-now btn btn-sm btn-primary" style="color:white">Add To Cart</a></p>';
			}
			
			$str.='</div>';
		};
		return($str);
	}
	public function productslist(){
		$str="";
		$sql1="SELECT * From products WHERE Status=1 Order by rand() Limit 5";
		SanPham::select($sql1);
		//$dem=0;
		while($row=SanPham::fetch_array_table()){
				$str.='<div class="owl-item active">';
				$str.='<div class="item">';
				$str.='<div class="block-4 text-center">';
				$str.='<figure class="block-4-image">';
				$str.='<a href="shop-single.php?id='.$row["ID"].'">';
				$str.='<img src="images/products/'.$row["Image"].'" alt="Image placeholder" height="350px" >';
				$str.='</a>';
				$str.='</figure>';
				$str.='<div class="block-4-text p-4">';
				$str.='<h3><a href="shop-single.php?id='.$row["ID"].'">'.$row["Name"].'</a></h3>';
				$str.='<p class="mb-0"></p>';
				$str.='<p class="text-primary font-weight-bold">$'.$row["Price"].'</p>';
				$str.='</div></div></div></div>';
		}
		
		return($str);
	}
	public function close(){
		SanPham::close();
	}
}
?>