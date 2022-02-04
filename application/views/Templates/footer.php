
  <script src="<?= base_url();?>assets/js/jQuery_v3.1.1.min.js"></script>
  <script src="<?= base_url();?>assets/js/owl.carousel.min.js"></script>
  <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.magnific-popup.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.firstVisitPopup.js"></script>
  <script src="<?= base_url();?>assets/js/custom.js"></script>
</body>
</html>
<script>
  
$(document).ready(function(){
  
 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>My_controller/fetch_product",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

<script>
function load_product_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>My_controller/pagination/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#result').html(data.result);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_product_data(page);
 });

 
  load_product_data(1);

</script>

<script>
$(document).ready(function(){
  $("#add").on("click",".add_cart", function(){
  alert("success");
 });
$('.add_cart').click(function()
{
   var product_id = $(this).data("productid");
   var picture = $(this).data("picture");
   var product_name = $(this).data("productname");
   var product_price = $(this).data("price");
   var item_count = $(this).data("item");
   var quantity = 1;
   product_name = product_name.slice(0, 10) +"...";
   $.ajax({
    url:"<?php echo base_url(); ?>My_controller/add",
    method:"POST",
    data:{product_id:product_id,picture:picture, product_name:product_name, product_price:product_price, quantity:quantity},
    success:function(data)
    {
      alert("Product Added into Cart");
     $('#cart_detail').html(data);
     $(count_item).html(item_count);
     $('#' + product_id).val('');
    }
   });

});
 $('#cart_detail').load("<?php echo base_url(); ?>My_controller/load");
 $('#count_item').load("<?php echo base_url(); ?>My_controller/count_item");
 
 
 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>My_controller/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
     alert("Product removed from Cart");
     $('#cart_detail').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

});
</script>